<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

class TagAttributeGroup extends AbstractTag
{
    public function getReferencingElements()
    {
        $attributeGroups = $this->getDomDocumentHandler()->getElementsByNameAndAttributes('attributeGroup', array(
            'ref' => sprintf('*%s', $this->getAttributeName())
        ));

        return $attributeGroups;
    }
}
