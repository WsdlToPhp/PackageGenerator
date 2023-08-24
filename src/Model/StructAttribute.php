<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\ConfigurationReader\AbstractReservedWord;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Generator\Utils;

/**
 * Class StructAttribute stands for an available struct attribute described in the WSDL.
 */
final class StructAttribute extends AbstractModel
{
    protected string $type = '';

    /**
     * Defines that this property is not a simple value but an array of values
     * Infos at {@link https://www.w3.org/TR/xmlschema-0/#OccurrenceConstraints}.
     */
    protected bool $containsElements = false;

    /**
     * Defines that this property can be removed from request or not.
     * The property can be removed from the request (meaning from the Struct) as soon as the nillable=true && minOccurs=0
     * Infos at {@link http://www.w3schools.com/xml/el_element.asp}.
     */
    protected bool $removableFromRequest = false;

    public function __construct(Generator $generator, string $name, string $type = '', ?Struct $struct = null)
    {
        parent::__construct($generator, $name);
        $this
            ->setType($type)
            ->setOwner($struct)
        ;
    }

    public function getUniqueString(string $string, string $additionalContext = ''): string
    {
        return self::uniqueName($string, spl_object_hash($this->getOwner()).$this->getOwner()->getName().$additionalContext);
    }

    public function getUniqueName(string $additionalContext = ''): string
    {
        return $this->getUniqueString($this->getCleanName(), $additionalContext);
    }

    public function getGetterName(): string
    {
        return $this->replaceReservedMethod(sprintf('get%s', ucfirst($this->getUniqueName('get'))), $this->getOwner()->getPackagedName());
    }

    public function getSetterName(): string
    {
        return $this->replaceReservedMethod(sprintf('set%s', ucfirst($this->getUniqueName('set'))), $this->getOwner()->getPackagedName());
    }

    public function getType(bool $useTypeStruct = false): string
    {
        if ($useTypeStruct) {
            $typeStruct = $this->getTypeStruct();
            if ($typeStruct instanceof Struct) {
                $type = $typeStruct->getTopInheritance();

                return $type ?: $this->type;
            }
        }

        return $this->type;
    }

    public function setType(string $type): StructAttribute
    {
        $this->type = $type;

        return $this;
    }

    public function getContainsElements(): bool
    {
        return $this->containsElements;
    }

    /**
     * If already able to contain several occurrences, it must stay as it is, the wider behaviour wins.
     */
    public function setContainsElements(bool $containsElements = true): StructAttribute
    {
        $this->containsElements = $this->containsElements || $containsElements;

        return $this;
    }

    public function getRemovableFromRequest(): bool
    {
        return $this->removableFromRequest;
    }

    public function isAChoice(): bool
    {
        return is_array($this->getMetaValue('choice'));
    }

    /**
     * If already able to be removed from request, it must stay as it is, the wider behaviour wins.
     */
    public function setRemovableFromRequest(bool $removableFromRequest = true): StructAttribute
    {
        $this->removableFromRequest = $this->removableFromRequest || $removableFromRequest;

        return $this;
    }

    /**
     * If this attribute contains elements then it's an array
     * only if its parent, the Struct, is not itself an array,
     * if the parent is an array, then it is certainly an array too.
     */
    public function isArray(): bool
    {
        return $this->containsElements || $this->isTypeStructArray();
    }

    /**
     * If this attribute is based on a struct that is a list,
     * then it is a list of basic scalar values that are sent space-separated.
     */
    public function isList(): bool
    {
        $typeStruct = $this->getTypeStruct();

        return $typeStruct && $typeStruct->isList();
    }

    /**
     * @return null|array|bool|float|int|string
     */
    public function getDefaultValue(?string $type = null)
    {
        if (($struct = $this->getTypeStruct()) && $struct->isStruct()) {
            return null;
        }

        return Utils::getValueWithinItsType($this->getMetaValueFirstSet([
            'default',
            'Default',
            'DefaultValue',
            'defaultValue',
            'defaultvalue',
        ]), $type);
    }

    public function isRequired(): bool
    {
        return 'required' === $this->getMetaValue('use', '') || 0 < $this->getMetaValueFirstSet([
            'minOccurs',
            'minoccurs',
            'MinOccurs',
            'Minoccurs',
        ], 0);
    }

    public function isNullable(): bool
    {
        return 'true' === $this->getMetaValue('nillable', 'false');
    }

    public function getOwner(): Struct
    {
        return parent::getOwner();
    }

    public function isXml(): bool
    {
        return \DOMDocument::class === $this->getType();
    }

    public function getTypeStruct(): ?Struct
    {
        $struct = $this->getGenerator()->getStructByNameAndType($this->getType(), $this->getInheritance());

        return $struct ?: $this->getGenerator()->getStructByName($this->getType());
    }

    public function getTypeStructMeta(): array
    {
        $typeStruct = $this->getTypeStruct();

        return ($typeStruct && !$typeStruct->isStruct()) ? $typeStruct->getMeta() : [];
    }

    public function isTypeStructArray(): bool
    {
        $typeStruct = $this->getTypeStruct();

        return $typeStruct && $typeStruct->isArray() && !$typeStruct->isStruct();
    }

    public function getInheritanceStruct(): ?Struct
    {
        return $this->getGenerator()->getStructByName($this->getInheritance());
    }

    public function getInheritanceStructMeta(): array
    {
        $inheritanceStruct = $this->getInheritanceStruct();

        return ($inheritanceStruct && !$inheritanceStruct->isStruct()) ? $inheritanceStruct->getMeta() : [];
    }

    public function getMeta(): array
    {
        return $this->mergeMeta($this->getInheritanceStructMeta(), $this->getTypeStructMeta(), parent::getMeta());
    }

    public function getReservedMethodsInstance(?string $filename = null): AbstractReservedWord
    {
        return $this->getOwner()->getReservedMethodsInstance($filename);
    }

    protected function toJsonSerialize(): array
    {
        return [
            'containsElements' => $this->containsElements,
            'removableFromRequest' => $this->removableFromRequest,
            'type' => $this->type,
        ];
    }
}
