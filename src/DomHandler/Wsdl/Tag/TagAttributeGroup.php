<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagAttributeGroup extends AbstractTag
{
    public function getReferencingElements()
    {
        $attributeGroups = $this->getDomDocumentHandler()->getElementsByNameAndAttributes('attributeGroup', array(
            'ref' => $this->getAttributeName()
        ));

        return $attributeGroups;
    }
}
