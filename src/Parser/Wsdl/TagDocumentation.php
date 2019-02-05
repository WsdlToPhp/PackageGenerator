<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\Tag;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagDocumentation as Documentation;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagEnumeration as Enumeration;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructValue;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagAttributeGroup;

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
        $parentParent = $parent instanceof Tag ? $parent->getSuitableParent() : null;
        if (!empty($content) && $parent instanceof Tag) {
            /**
             * Is it an element ? part of an attributeGroup
             * Finds parent node of this documentation node
             */
            if ($parent->hasAttribute('type') && $parentParent instanceof TagAttributeGroup) {
                foreach ($parentParent->getReferencingElements() as $element) {
                    if (($model = $this->getModel($element)) instanceof Struct && ($attribute = $model->getAttribute($parent->getAttributeName())) instanceof StructAttribute) {
                        $attribute->setDocumentation($content);
                    }
                }
            }
            /**
             * Is it an element ? part of a struct
             * Finds parent node of this documentation node
             */
            elseif ($parent->hasAttribute('type') && $parentParent instanceof Tag) {
                if (($model = $this->getModel($parentParent)) instanceof Struct && ($attribute = $model->getAttribute($parent->getAttributeName())) instanceof StructAttribute) {
                    $attribute->setDocumentation($content);
                }
            }
            /**
             * Is it a value of an enumeration ?
             * Finds parent node of this documentation node
             */
            elseif ($parent instanceof Enumeration && $parentParent instanceof Tag) {
                if (($model = $this->getModel($parentParent)) instanceof Struct && ($structValue = $model->getValue($parent->getValue())) instanceof StructValue) {
                    $structValue->setDocumentation($content);
                }
            }
            /**
             * Is it a restriction with enumeration (a real struct) that needs to find the model based on its type ?
             */
            elseif ($parent->hasRestrictionChild() && $parent->getFirstRestrictionChild()->isEnumeration() && $parent->getFirstRestrictionChild()->isTheParent($parent)) {
                $model = $this->getModel($parent, $parent->getFirstRestrictionChild()->getAttributeBase());
                $model = $model ? $model : $this->getModel($parent);
                if ($model instanceof Struct) {
                    $model->setDocumentation($content);
                }
            }
            /**
             * Is it an element ?
             * Finds parent node of this documentation node
             */
            elseif ($model = $this->getModel($parent)) {
                $model->setDocumentation($content);
            }
        }
    }
}
