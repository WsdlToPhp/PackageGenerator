<?php
namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\AbstractTag as Tag;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Generator\Generator;

abstract class AbstractTagParser extends AbstractParser
{
    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->generator;
    }
    /**
     * Return the model on which the method will be called
     * @param Tag $tag
     * @return Struct|Method
     */
    protected function getModel(Tag $tag)
    {
        switch ($tag->getName()) {
            case WsdlDocument::TAG_OPERATION:
                $model = $this->getMethodByName($tag->getAttributeName());
                break;
            default:
                $model = $this->getStructByName($tag->getAttributeName());
                break;
        }
        return $model;
    }
    /**
     * @param string $name
     * @return null|\WsdlToPhp\PackageGenerator\Model\Struct
     */
    protected function getStructByName($name)
    {
        return $this->generator->getStruct($name);
    }
    /**
     * @param string $name
     * @return null|\WsdlToPhp\PackageGenerator\Model\Method
     */
    protected function getMethodByName($name)
    {
        return $this->generator->getServiceMethod($name);
    }
}