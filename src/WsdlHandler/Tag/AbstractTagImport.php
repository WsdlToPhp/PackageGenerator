<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

abstract class AbstractTagImport extends Tag
{
    /**
     * @var string
     */
    const ATTRIBUTE_LOCATION = 'location';
    /**
     * @var string
     */
    const ATTRIBUTE_SCHEMA_LOCATION = 'schemaLocation';
    /**
     * @var string
     */
    const ATTRIBUTE_SCHEMA_LOCATION_ = 'schemalocation';
    /**
     * Return the correct location attribute value
     * @return string
     */
    public function getLocationAttribute()
    {
        $location = '';
        if ($this->hasAttribute(self::ATTRIBUTE_LOCATION)) {
            $location = $this->getAttribute(self::ATTRIBUTE_LOCATION)->getValue(true);
        } elseif ($this->hasAttribute(self::ATTRIBUTE_SCHEMA_LOCATION)) {
            $location = $this->getAttribute(self::ATTRIBUTE_SCHEMA_LOCATION)->getValue(true);
        } elseif ($this->hasAttribute(self::ATTRIBUTE_SCHEMA_LOCATION_)) {
            $location = $this->getAttribute(self::ATTRIBUTE_SCHEMA_LOCATION_)->getValue(true);
        }
        if (!empty($location) && mb_substr($location, 0, 2) === './') {
            $location = mb_substr($location, 2);
        }
        return $location;
    }
}
