<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagUnion as Union;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\AbstractTag;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;

class TagUnion extends AbstractTagParser
{
    /**
     * @see \WsdlToPhp\PackageGenerator\Parser\Wsdl\AbstractParser::parseWsdl()
     * @param Wsdl $wsdl
     */
    protected function parseWsdl(Wsdl $wsdl)
    {
        foreach ($this->getTags() as $tag) {
            if ($tag instanceof Union) {
                $this->parseUnion($tag);
            }
        }
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
        if ($parent instanceof AbstractTag) {
            $model = $this->getModel($parent);
            if ($model instanceof AbstractModel) {
                $modelInheritance = $model->getInheritance();
                $memberTypes = $union->getAttributeMemberTypes();
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
        foreach ($values as $value) {
            $model = $this->getStructByName($value);
            while ($model instanceof AbstractModel && $model->getInheritance() !== '') {
                $model = $this->getStructByName($validInheritance = $model->getInheritance());
            }
            if ($model instanceof AbstractModel) {
                $validInheritance = $model->getName();
                break;
            }
        }
        return $validInheritance;
    }
}
