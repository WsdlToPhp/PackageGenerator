<?php

namespace WsdlToPhp\PackageGenerator\DomHandler\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\ElementHandler;
use WsdlToPhp\PackageGenerator\DomHandler\DomDocumentHandler;
use WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler;

abstract class AbstractDocument extends DomDocumentHandler
{
    const
        TAG_ADDRESS         = 'address',
        TAG_ALL             = 'all',
        TAG_ANNOTATION      = 'annotation',
        TAG_ANY             = 'any',
        TAG_ANY_ATTRIBUTE   = 'anyAttribute',
        TAG_APPINFO         = 'appinfo',
        TAG_ATTRIBUTE       = 'attribute',
        TAG_ATTRIBUTE_GROUP = 'attributeGroup',
        TAG_BINDING         = 'binding',
        TAG_BODY            = 'body',
        TAG_CHOICE          = 'choice',
        TAG_COMPLEX_CONTENT = 'complexContent',
        TAG_COMPLEX_TYPE    = 'complexType',
        TAG_DEFINITIONS     = 'definitions',
        TAG_DOCUMENTATION   = 'documentation',
        TAG_ELEMENT         = 'element',
        TAG_ENUMERATION     = 'enumeration',
        TAG_EXTENSION       = 'extension',
        TAG_FIELD           = 'field',
        TAG_GROUP           = 'group',
        TAG_HEADER          = 'header',
        TAG_IMPORT          = 'import',
        TAG_INCLUDE         = 'include',
        TAG_INPUT           = 'input',
        TAG_KEY             = 'key',
        TAG_KEYREF          = 'keyref',
        TAG_LIST            = 'list',
        TAG_MEMBER_TYPES    = 'memberTypes',
        TAG_MESSAGE         = 'message',
        TAG_NOTATION        = 'notation',
        TAG_OPERATION       = 'operation',
        TAG_OUTPUT          = 'output',
        TAG_PART            = 'part',
        TAG_PORT            = 'port',
        TAG_PORT_TYPE       = 'portType',
        TAG_REDEFINE        = 'redefine',
        TAG_RESTRICTION     = 'restriction',
        TAG_SELECTOR        = 'selector',
        TAG_SEQUENCE        = 'sequence',
        TAG_SCHEMA          = 'schema',
        TAG_SIMPLE_CONTENT  = 'simpleContent',
        TAG_SIMPLE_TYPE     = 'simpleType',
        TAG_TYPES           = 'types',
        TAG_UNION           = 'union',
        TAG_UNIQUE          = 'unique';
    /**
     * @var string
     */
    protected $currentTag;
    /**
     * @param string $currentTag
     * @return \WsdlToPhp\PackageGenerator\DomHandler\Wsdl\AbstractWsdl
     */
    public function setCurrentTag($currentTag)
    {
        $this->currentTag = $currentTag;
        return $this;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getElementHandler()
     * @return ElementHandler
     */
    protected function getElementHandler(\DOMElement $element, AbstractDomDocumentHandler $domDocument, $index = -1)
    {
        $handlerName = '\\WsdlToPhp\\PackageGenerator\\DomHandler\\ElementHandler';
        $tagClass    = sprintf('%s\\Tag\\Tag%s', __NAMESPACE__, ucfirst($this->currentTag));
        if (class_exists($tagClass)) {
            $handlerName = $tagClass;
        }
        return new $handlerName($element, $domDocument, $index);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getElementByName()
     * @return ElementHandler
     */
    public function getElementByName($name)
    {
        $this->currentTag = $name;
        return parent::getElementByName($name);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\DomHandler\AbstractDomDocumentHandler::getElementByName()
     * @return array[AbstractElementHandler]
     */
    public function getElementsByName($name)
    {
        $this->currentTag = $name;
        return parent::getElementsByName($name);
    }
    /**
     * @param string $namespace
     * @return string
     */
    public function getNamespaceUri($namespace)
    {
        $rootElement = $this->getRootElement();
        $uri = '';
        if ($rootElement instanceof ElementHandler && $rootElement->hasAttribute(sprintf('xmlns:%s', $namespace))) {
            $uri = $rootElement->getAttribute(sprintf('xmlns:%s', $namespace))->getValue();
        }
        return $uri;
    }
}
