<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagUnion as Union;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;

class TagUnion extends AbstractTagParser
{

    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::getTags()
     * @return array[\WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Tag\TagUnion]
     */
    public function getTags()
    {
        return parent::getTags();
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            $this->parseUnion($tag);
        }
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseSchema()
     */
    protected function parseSchema(Wsdl $wsdl, Schema $schema)
    {
        $this->parseWsdl($wsdl);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parsingTag()
     */
    protected function parsingTag()
    {
        return WsdlDocument::TAG_UNION;
    }
    /**
     * @param Union $union
     */
    public function parseUnion(Union $union)
    {
        $parent = $union->getSuitableParent();
        if ($parent !== null) {
            $model  = $this->getModel($parent);
            if ($model !== null) {
                $modelInheritance = $model->getInheritance();
                $memberTypes      = $union->getAttributeMemberTypes();
                if (empty($modelInheritance) && !empty($memberTypes)) {
                    $model->addMeta('union', $memberTypes);
                    $model->setInheritance($this->findSuitableInheritance($memberTypes));
                }
            }
        }
    }
    /**
     * @param array $values
     * @return string
     */
    protected function findSuitableInheritance(array $values)
    {
        $validInheritance = '';
        while (empty($validInheritance)) {
            foreach ($values as $value) {
                $model = $this->getStructByName($value);
                while($model !== null && $model->getInheritance() !== '') {
                    $model = $this->getModel($model->getInheritance());
                }
                if ($model !== null) {
                    $validInheritance = $model->getName();
                    break;
                }
            }
        }
        return $validInheritance;
    }
}
