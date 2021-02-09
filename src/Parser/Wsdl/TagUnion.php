<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\WsdlHandler\Tag\TagSimpleType as SimpleType;
use WsdlToPhp\WsdlHandler\Tag\TagUnion as Union;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

final class TagUnion extends AbstractTagParser
{
    public function parseUnion(Union $union): void
    {
        $parent = $union->getSuitableParent();
        if (!$parent) {
            return;
        }

        $model = $this->getModel($parent);
        if (!$model) {
            return;
        }

        $memberTypes = $union->getAttributeMemberTypes();
        if ($union->hasMemberTypesAsChildren()) {
            $memberTypes = array_unique(array_merge($memberTypes, $this->getUnionMemberTypesFromChildren($union)));
        }

        $memberTypes = array_filter($memberTypes, function ($memberType) use ($model) {
            return $model->getName() !== $memberType;
        });

        if (empty($memberTypes)) {
            return;
        }

        $model->addMeta('union', $memberTypes);
        $model->setInheritance($this->findSuitableInheritance($memberTypes));
    }

    protected function parseWsdl(Wsdl $wsdl): void
    {
        foreach ($this->getTags() as $tag) {
            $this->parseUnion($tag);
        }
    }

    protected function parsingTag(): string
    {
        return WsdlDocument::TAG_UNION;
    }

    protected function findSuitableInheritance(array $values): string
    {
        $validInheritance = '';
        foreach ($values as $value) {
            $model = $this->getStructByName($value);
            while ($model instanceof AbstractModel && !empty($model->getInheritance())) {
                $model = $this->getStructByName($validInheritance = $model->getInheritance());
            }

            if ($model instanceof AbstractModel) {
                $validInheritance = $model->getName();

                break;
            }
        }

        return $validInheritance;
    }

    protected function getUnionMemberTypesFromChildren(Union $union): array
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
