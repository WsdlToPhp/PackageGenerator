<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\DomHandler\AbstractAttributeHandler;
use WsdlToPhp\DomHandler\AttributeHandler;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\StructValue;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

abstract class AbstractTagParser extends AbstractParser
{
    public function getName(): string
    {
        return $this->parsingTag();
    }

    protected function getModel(Tag $tag, string $type = ''): ?AbstractModel
    {
        switch ($tag->getName()) {
            case WsdlDocument::TAG_OPERATION:
                $model = $this->getMethodByName($tag->getAttributeName());

                break;

            default:
                if (empty($type)) {
                    $model = $this->getStructByName($tag->getAttributeName());
                } else {
                    $model = $this->getStructByNameAndType($tag->getAttributeName(), $type);
                }

                break;
        }

        return $model;
    }

    protected function getStructByName(string $name): ?Struct
    {
        return $this->generator->getStructByName($name);
    }

    protected function getStructByNameAndType(string $name, string $type): ?Struct
    {
        return $this->generator->getStructByNameAndType($name, $type);
    }

    protected function getMethodByName(string $name): ?Method
    {
        return $this->generator->getServiceMethod($name);
    }

    /**
     * Most of he time, this method is not used, even if it used,
     * for now, knowing that we are in a schema is not a useful information,
     * so we can simply parse the tag with only the wsdl as parameter.
     */
    protected function parseSchema(Wsdl $wsdl, Schema $schema): void
    {
        $this->parseWsdl($wsdl);
    }

    protected function parseTagAttributes(Tag $tag, AbstractModel $model = null, StructAttribute $structAttribute = null): void
    {
        $model = $model instanceof AbstractModel ? $model : $this->getModel($tag);
        if (!$model) {
            return;
        }

        /** @var AbstractAttributeHandler $attribute */
        foreach ($tag->getAttributes() as $attribute) {
            $methodToCall = $this->getParseTagAttributeMethod($attribute->getName());
            if (is_array($methodToCall)) {
                call_user_func_array($methodToCall, [
                    $attribute,
                    $model,
                    $structAttribute,
                ]);
            } else {
                ($structAttribute ?? $model)->addMeta($attribute->getName(), $attribute->getValue(true));
            }
        }
    }

    protected function getParseTagAttributeMethod(string $tagName): ?array
    {
        $methodName = sprintf('parseTagAttribute%s', ucfirst($tagName));
        if (method_exists($this, $methodName)) {
            return [
                $this,
                $methodName,
            ];
        }

        return null;
    }

    protected function parseTagAttributeType(AttributeHandler $tagAttribute, AbstractModel $model, StructAttribute $structAttribute = null): void
    {
        if ($structAttribute instanceof StructAttribute) {
            $type = $tagAttribute->getValue();
            if (is_null($type)) {
                return;
            }

            $typeModel = $this->generator->getStructByName($type);
            $modelAttributeType = $structAttribute->getType();

            if ($typeModel instanceof Struct && (empty($modelAttributeType) || 'unknown' === mb_strtolower($modelAttributeType))) {
                if ($typeModel->isRestriction()) {
                    $structAttribute->setType($typeModel->getName());
                } elseif (!$typeModel->isStruct() && $typeModel->getInheritance()) {
                    $structAttribute->setType($typeModel->getInheritance());
                }
            }
        } else {
            $model->addMeta($tagAttribute->getName(), $tagAttribute->getValue(true));
        }
    }

    /**
     * Avoid the "name" attribute to be added as meta.
     */
    protected function parseTagAttributeName(): void
    {
    }

    protected function parseTagAttributeAbstract(AttributeHandler $tagAttribute, AbstractModel $model): void
    {
        $model->setAbstract($tagAttribute->getValue(false, true, 'bool'));
    }

    /**
     * Enumeration does not need its own value as meta information, it's like the name for struct attribute.
     */
    protected function parseTagAttributeValue(AttributeHandler $tagAttribute, AbstractModel $model): void
    {
        if ($model instanceof StructValue) {
            return;
        }

        $model->addMeta($tagAttribute->getName(), $tagAttribute->getValue(true));
    }
}
