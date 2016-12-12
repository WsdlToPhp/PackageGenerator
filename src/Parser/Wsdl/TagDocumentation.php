<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagDocumentation as Documentation;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagEnumeration as Enumeration;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructValue;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;

class TagDocumentation extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     * @param Wsdl $wsdl
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof Documentation) {
                $this->parseDocumentation($tag);
            }
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_DOCUMENTATION;
    }
    /**
     * @param Documentation $documentation
     */
    public function parseDocumentation(Documentation $documentation)
    {
        $content = $documentation->getContent();
        $parent = $documentation->getSuitableParent();
        $parentParent = $parent instanceof AbstractTag ? $parent->getSuitableParent() : null;
        if (!empty($content) && $parent instanceof AbstractTag) {
            /**
             * Is it an element ? part of a struct
             * Finds parent node of this documentation node
             */
            if ($parent->hasAttribute('type') && $parentParent instanceof AbstractTag) {
                if (($model = $this->getModel($parentParent)) instanceof Struct && ($attribute = $model->getAttribute($parent->getAttributeName())) instanceof StructAttribute) {
                    $attribute->setDocumentation($content);
                }
            } elseif ($parent instanceof Enumeration && $parentParent instanceof AbstractTag) {
                if (($model = $this->getModel($parentParent)) instanceof Struct && ($structValue = $model->getValue($parent->getValue())) instanceof StructValue) {
                    $structValue->setDocumentation($content);
                }
            } elseif ($this->getModel($parent) instanceof AbstractModel) {
                $this->getModel($parent)->setDocumentation($content);
            }
        }
    }
}
