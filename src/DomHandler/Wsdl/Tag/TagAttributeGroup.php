<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagAttributeGroup extends AbstractTag
{
    public function getReferencingElements()
    {
        $elements = array();
        $attributeGroups = $this->getDomDocumentHandler()->getElementsByNameAndAttributes('attributeGroup', array(
            'ref' => sprintf('*:%s', $this->getAttributeName()),
        ));
        /**
         * In case of a referencing element that use this attributeGroup that is not namespaced,
         * use the non namespaced value
         */
        if (empty($attributeGroups)) {
            $attributeGroups = $this->getDomDocumentHandler()->getElementsByNameAndAttributes('attributeGroup', array(
                'ref' => sprintf('*%s', $this->getAttributeName()),
            ));
        }
        /**
         * Reset current tag as using getElementsByNameAndAttributes method set currentTag to attributeGroup
         * as soon as currentTag has been set, if a valid DOMElement is found
         * then without taking care of the actual DOMElement tag name,
         * a TagEnumeration is always returned.
         * @todo If it's possible, find a cleaner way to solve this 'issue'
         */
        $this->getDomDocumentHandler()->setCurrentTag('');
        foreach ($attributeGroups as $attributeGroup) {
            $parent = $attributeGroup->getSuitableParent();
            if ($parent instanceof AbstractTag) {
                $elements[] = $parent;
            }
        }
        return $elements;
    }
}
