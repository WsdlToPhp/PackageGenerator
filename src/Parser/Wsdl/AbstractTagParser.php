<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\DomHandler\AttributeHandler;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\StructValue;

abstract class AbstractTagParser extends AbstractParser
{
    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->generator;
    }
    /**
     * Return the model on which the method will be called
     * @param Tag $tag
     * @param string $type can be passed to specify the Struct type (inheritance)
     * @return Struct|Method|null
     */
    protected function getModel(Tag $tag, $type = '')
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
    /**
     * @param string $name
     * @return null|\WsdlToPhp\PackageGenerator\Model\Struct
     */
    protected function getStructByName($name)
    {
        return $this->generator->getStructByName($name);
    }
    /**
     * @param string $name
     * @param string $type
     * @return null|\WsdlToPhp\PackageGenerator\Model\Struct
     */
    protected function getStructByNameAndType($name, $type)
    {
        return $this->generator->getStructByNameAndType($name, $type);
    }
    /**
     * @param string $name
     * @return null|\WsdlToPhp\PackageGenerator\Model\Method
     */
    protected function getMethodByName($name)
    {
        return $this->generator->getServiceMethod($name);
    }
    /**
     * Most of he time, this method is not used, even if it used,
     * for now, knowing that we are in a schema is not a useful information,
     * so we can simply parse the tag with only the wsdl as parameter
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseSchema()
     * @param Wsdl $wsdl
     * @param Schema $schema
     */
    protected function parseSchema(Wsdl $wsdl, Schema $schema)
    {
        $this->parseWsdl($wsdl);
    }
    /**
     * @param Tag $tag
     * @param AbstractModel $model
     * @param StructAttribute $structAttribute
     */
    protected function parseTagAttributes(Tag $tag, AbstractModel $model = null, StructAttribute $structAttribute = null)
    {
        $model = $model instanceof AbstractModel ? $model : $this->getModel($tag);
        if ($model) {
            foreach ($tag->getAttributes() as $attribute) {
                $methodToCall = $this->getParseTagAttributeMethod($attribute->getName());
                if (is_array($methodToCall)) {
                    call_user_func_array($methodToCall, [
                        $attribute,
                        $model,
                        $structAttribute,
                    ]);
                } else {
                    $currentModel = $structAttribute instanceof StructAttribute ? $structAttribute : $model;
                    $currentModel->addMeta($attribute->getName(), $attribute->getValue(true));
                }
            }
        }
    }
    /**
     * @param string $tagName
     * @return array|null
     */
    protected function getParseTagAttributeMethod($tagName)
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
    /**
     * @param AttributeHandler $tagAttribute
     * @param AbstractModel $model
     * @param StructAttribute $structAttribute
     */
    protected function parseTagAttributeType(AttributeHandler $tagAttribute, AbstractModel $model, StructAttribute $structAttribute = null)
    {
        if ($structAttribute instanceof StructAttribute) {
            $type = $tagAttribute->getValue();
            if ($type !== null) {
                $typeModel = $this->generator->getStructByName($type);
                $modelAttributeType = $structAttribute->getType();
                if ($typeModel instanceof Struct && (empty($modelAttributeType) || mb_strtolower($modelAttributeType) === 'unknown')) {
                    if ($typeModel->isRestriction()) {
                        $structAttribute->setType($typeModel->getName());
                    } elseif (!$typeModel->isStruct() && $typeModel->getInheritance()) {
                        $structAttribute->setType($typeModel->getInheritance());
                    }
                }
            }
        } else {
            $model->addMeta($tagAttribute->getName(), $tagAttribute->getValue(true));
        }
    }
    /**
     * Avoid this attribute to be added as meta
     */
    protected function parseTagAttributeName()
    {
    }
    /**
     * @param AttributeHandler $tagAttribute
     * @param AbstractModel $model
     */
    protected function parseTagAttributeAbstract(AttributeHandler $tagAttribute, AbstractModel $model)
    {
        $model->setAbstract($tagAttribute->getValue(false, true, 'bool'));
    }
    /**
     * Enumeration does not need its own value as meta information, it's like the name for struct attribute
     * @param AttributeHandler $tagAttribute
     * @param AbstractModel $model
     */
    protected function parseTagAttributeValue(AttributeHandler $tagAttribute, AbstractModel $model)
    {
        if (!$model instanceof StructValue) {
            $model->addMeta($tagAttribute->getName(), $tagAttribute->getValue(true));
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\AbstractParser::getName()
     * @return string
     */
    public function getName()
    {
        return $this->parsingTag();
    }
}
