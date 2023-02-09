<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Struct as Model;

final class Struct extends AbstractModel
{
    /**
     * Only for virtually-considered objects (in order to avoid duplications in objects property).
     */
    protected array $virtualObjects = [];

    public function getStructByName(string $name): ?Model
    {
        return $this->get($name);
    }

    public function getStructByNameAndType(string $name, string $type): ?Model
    {
        return $this->getByType($name, $type);
    }

    public function addVirtualStruct(string $structName, string $structType = ''): self
    {
        return $this->addStruct($structName, false, $structType);
    }

    public function addStruct(string $structName, bool $isStruct = true, string $structType = ''): self
    {
        if (null === (empty($structType) ? $this->get($structName) : $this->getByType($structName, $structType))) {
            $model = new Model($this->generator, $structName, $isStruct);
            $this->add($model->setInheritance($structType));
        }

        return $this;
    }

    public function addStructWithAttribute(string $structName, string $attributeName, string $attributeType): self
    {
        $this->addStruct($structName);
        if (($struct = $this->getStructByName($structName)) instanceof Model) {
            $struct->addAttribute($attributeName, $attributeType);
        }

        return $this;
    }

    public function addUnionStruct(string $structName, array $types): self
    {
        $this->addVirtualStruct($structName);
        if (($struct = $this->getStructByName($structName)) instanceof Model) {
            $struct->setTypes($types);
        }

        return $this;
    }

    public function getVirtual(string $value): ?Model
    {
        $key = $this->getVirtualKey($value);

        return array_key_exists($key, $this->virtualObjects) ? $this->virtualObjects[$key] : null;
    }

    public function getByType(string $value, string $type): ?Model
    {
        $key = $this->getTypeKey($value, $type);

        return array_key_exists($key, $this->objects) ? $this->objects[$key] : null;
    }

    public function getObjectKeyWithType(object $object, string $type): string
    {
        return $this->getTypeKey($this->getObjectKey($object), $type);
    }

    public function getObjectKeyWithVirtual(object $object): string
    {
        return $this->getVirtualKey($this->getObjectKey($object));
    }

    /**
     * The key must not conflict with possible key values.
     */
    public function getTypeKey(string $name, string $type): string
    {
        return sprintf('struct_name_%s-type_%s', $name, $type);
    }

    /**
     * The key must not conflict with possible key values.
     */
    public function getVirtualKey(string $name): string
    {
        return sprintf('virtual_struct_name_%s', $name);
    }

    /**
     * By overriding this method, we ensure that each time a new object is stored, it is stored with our new key if the inheritance is defined.
     *
     * @param Model $object
     */
    public function add(object $object): self
    {
        $inheritance = $object->getInheritance();
        if (!empty($inheritance)) {
            $this->virtualObjects[$this->getObjectKeyWithVirtual($object)] = $this->objects[$this->getObjectKeyWithType($object, $object->getInheritance())] = $object;
        } else {
            parent::add($object);
        }

        return $this;
    }

    protected function objectClass(): string
    {
        return Model::class;
    }
}
