<?php
namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\AttributeHandler;
use WsdlToPhp\PackageGenerator\DomHandler\AbstractAttributeHandler;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag as Tag;
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
     * @return Struct|Method
     */
    protected function getModel(Tag $tag)
    {
        switch ($tag->getName()) {
            case WsdlDocument::TAG_OPERATION:
                $model = $this->getMethodByName($tag->getAttributeName());
                break;
            default:
                $model = $this->getStructByName($tag->getAttributeName());
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
        return $this->generator->getStruct($name);
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
        if ($model instanceof AbstractModel) {
            foreach ($tag->getAttributes() as $attribute) {
                switch ($attribute->getName()) {
                    case AbstractAttributeHandler::ATTRIBUTE_NAME:
                        /**
                         * Avoid this attribute to be added as meta
                         */
                        break;
                    case AbstractAttributeHandler::ATTRIBUTE_ABSTRACT:
                        $model->setIsAbstract($attribute->getValue(false, true, 'bool'));
                        break;
                    case AbstractAttributeHandler::ATTRIBUTE_VALUE:
                        if ($model instanceof StructValue) {
                            /**
                             * Enumeration does not need its own value as meta information,
                             * it's like the name for struct attribute
                             */
                        } else {
                            $model->addMeta($attribute->getName(), $attribute->getValue(true));
                        }
                        break;
                    case AbstractAttributeHandler::ATTRIBUTE_TYPE:
                        if ($structAttribute instanceof StructAttribute) {
                            $this->parseTagAttributeType($attribute, $structAttribute);
                        } else {
                            $model->addMeta($attribute->getName(), $attribute->getValue(true));
                        }
                        break;
                    default:
                        $currentModel = $structAttribute instanceof StructAttribute ? $structAttribute : $model;
                        $currentModel->addMeta($attribute->getName(), $attribute->getValue(true));
                        break;
                }
            }
        }
    }
    /**
     * @param AttributeHandler $tagAttribute
     * @param StructAttribute $attribute
     */
    protected function parseTagAttributeType(AttributeHandler $tagAttribute, StructAttribute $attribute)
    {
        $type = $tagAttribute->getValue();
        if ($type !== null) {
            $typeModel = $this->generator->getStruct($type);
            $modelAttributeType = $attribute->getType();
            if ($typeModel instanceof Struct && (empty($modelAttributeType) || strtolower($modelAttributeType) === 'unknown')) {
                if ($typeModel->getIsRestriction()) {
                    $attribute->setType($typeModel->getName());
                } elseif (!$typeModel->getIsStruct() && $typeModel->getInheritance()) {
                    $attribute->setType($typeModel->getInheritance());
                }
            }
        }
    }
}
