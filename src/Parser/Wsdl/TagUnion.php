<?php

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagUnion as Union;
use WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagSimpleType as SimpleType;
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
        if ($parent) {
            $model = $this->getModel($parent);
            if ($model) {
                $memberTypes = $union->getAttributeMemberTypes();
                if ($union->hasMemberTypesAsChildren()) {
                    $memberTypes = array_unique(array_merge($memberTypes, $this->getUnionMemberTypesFromChildren($union)));
                }
                $memberTypes = array_filter($memberTypes, function ($memberType) use ($model) {
                    return $model->getName() !== $memberType;
                });
                if (!empty($memberTypes)) {
                    $model->addMeta('union', $memberTypes);
                    $model->setInheritance($this->findSuitableInheritance($memberTypes));
                }
            }
        }
    }
    /**
     * @param string[] $values
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
    /**
     * @param Union $union
     * @return string[]
     */
    protected function getUnionMemberTypesFromChildren(Union $union)
    {
        $memberTypes = [];
        foreach ($union->getMemberTypesChildren() as $child) {
            if ($child instanceof SimpleType && $child->hasRestrictionChild() && '' !== $child->getFirstRestrictionChild()->getAttributeBase()) {
                $memberTypes[] = $child->getFirstRestrictionChild()->getAttributeBase();
            }
        }
        return array_unique($memberTypes);
    }
}
