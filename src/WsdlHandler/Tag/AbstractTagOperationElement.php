<?php

namespace WsdlToPhp\PackageGenerator\WsdlHandler\Tag;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

abstract class AbstractTagOperationElement extends Tag
{
    const ATTRIBUTE_MESSAGE = 'message';
    /**
     * @return TagOperation|null
     */
    public function getParentOperation()
    {
        return $this->getStrictParent(WsdlDocument::TAG_OPERATION);
    }
    /**
     * @return bool
     */
    public function hasAttributeMessage()
    {
        return $this->hasAttribute(self::ATTRIBUTE_MESSAGE);
    }
    /**
     * @return string
     */
    public function getAttributeMessage()
    {
        return $this->hasAttributeMessage() ? $this->getAttribute(self::ATTRIBUTE_MESSAGE)->getValue() : '';
    }
    /**
     * @return string
     */
    public function getAttributeMessageNamespace()
    {
        return $this->hasAttribute(self::ATTRIBUTE_MESSAGE) ? $this->getAttribute(self::ATTRIBUTE_MESSAGE)->getValueNamespace() : '';
    }
    /**
     * @return TagMessage|null
     */
    public function getMessage()
    {
        $message = null;
        $messageName = $this->getAttributeMessage();
        if (!empty($messageName)) {
            $message = $this->getDomDocumentHandler()->getElementByNameAndAttributes('message', [
                'name' => $messageName,
            ], true);
        }
        return $message;
    }
    /**
     * @return TagPart[]|null
     */
    public function getParts()
    {
        $parts = null;
        $message = $this->getMessage();
        if ($message instanceof TagMessage) {
            $parts = $message->getChildrenByName(WsdlDocument::TAG_PART);
        }
        return $parts;
    }
    /**
     * @param string $partName
     * @return TagPart|null
     */
    public function getPart($partName)
    {
        if (empty($partName)) {
            return null;
        }

        $part = null;
        $message = $this->getMessage();
        if ($message instanceof TagMessage) {
            $part = $message->getPart($partName);
        }
        return $part;
    }
    /**
     * @param string $partName
     * @return TagElement|null
     */
    public function getMatchingElement($partName)
    {
        $element = null;
        $part = $this->getPart($partName);
        if ($part instanceof TagPart) {
            $element = $part->getMatchingElement();
        }
        return $element;
    }
}
