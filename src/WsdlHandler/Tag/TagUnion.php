<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\AbstractDocument;

class TagUnion extends Tag
{
    const ATTRIBUTE_MEMBER_TYPES = 'memberTypes';
    /**
     * @return string[]
     */
    public function getAttributeMemberTypes()
    {
        return $this->parseMemberTypes();
    }
    /**
     * @return bool
     */
    public function hasMemberTypesAsChildren()
    {
        return 0 < count($this->getMemberTypesChildren());
    }
    /**
     * @return AbstractTag[]
     */
    public function getMemberTypesChildren()
    {
        return $this->getChildrenByName(AbstractDocument::TAG_SIMPLE_TYPE);
    }
    /**
     * @return string[]
     */
    protected function parseMemberTypes()
    {
        $memberTypes = [];
        $value = $this->hasAttribute(self::ATTRIBUTE_MEMBER_TYPES) ? $this->getAttribute(self::ATTRIBUTE_MEMBER_TYPES)->getValue(true) : '';
        if (!empty($value)) {
            $values = explode(' ', $value);
            foreach ($values as $val) {
                $memberTypes[] = implode('', array_slice(explode(':', $val), -1, 1));
            }
        }
        return $memberTypes;
    }
}
