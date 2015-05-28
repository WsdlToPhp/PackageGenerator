<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;

abstract class AbstractTagOperationElement extends AbstractTag
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
     * @return TagMessage
     */
    public function getMessage()
    {
        $messageName = $this->getAttributeMessage();
        if (!empty($messageName)) {
            return $this->getDomDocumentHandler()->getElementByNameAndAttributes('message', array(
                'name' => $messageName,
            ));
        }
        return null;
    }
    /**
     * @return TagPart[]|null
     */
    public function getParts()
    {
        $message = $this->getMessage();
        if ($message instanceof TagMessage) {
            return $message->getChildrenByName(WsdlDocument::TAG_PART);
        }
        return null;
    }
    /**
     * @param string $partName
     * @return TagPart|null
     */
    public function getPart($partName)
    {
        $message = $this->getMessage();
        if ($message instanceof TagMessage && !empty($partName)) {
            return $message->getPart($partName);
        }
        return null;
    }
}
