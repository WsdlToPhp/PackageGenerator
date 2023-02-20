<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container;

use WsdlToPhp\PackageGenerator\Generator\AbstractGeneratorAware;

abstract class AbstractObjectContainer extends AbstractGeneratorAware implements \ArrayAccess, \Iterator, \Countable, \JsonSerializable
{
    public const PROPERTY_NAME = 'name';

    protected array $objects = [];

    protected int $offset = 0;

    public function offsetExists($offset): bool
    {
        $element = array_slice($this->objects, $offset, 1);

        return !empty($element);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        $element = array_slice($this->objects, $offset, 1);

        return $this->offsetExists($offset) ? array_shift($element) : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        throw new \InvalidArgumentException('This method can\'t be used as object are stored with a string as array index', __LINE__);
    }

    #[\ReturnTypeWillChange]
    public function offsetUnset($offset): void
    {
        if ($this->offsetExists($offset)) {
            unset($this->objects[$this->getObjectKey($this->offsetGet($offset))]);
        }
    }

    /**
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
        $current = array_slice($this->objects, $this->offset, 1);

        return array_shift($current);
    }

    #[\ReturnTypeWillChange]
    public function next(): void
    {
        ++$this->offset;
    }

    #[\ReturnTypeWillChange]
    public function key(): int
    {
        return $this->offset;
    }

    public function valid(): bool
    {
        return 0 < count(array_slice($this->objects, $this->offset, 1));
    }

    #[\ReturnTypeWillChange]
    public function rewind(): void
    {
        $this->offset = 0;
    }

    #[\ReturnTypeWillChange]
    public function count(): int
    {
        return count($this->objects);
    }

    public function add(object $object): self
    {
        $this->beforeObjectIsStored($object);
        $this->objects[$this->getObjectKey($object)] = $object;

        return $this;
    }

    public function get($value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" can\'t be used to get an object from "%s"', is_object($value) ? get_class($value) : var_export($value, true), get_class($this)), __LINE__);
        }

        return array_key_exists($value, $this->objects) ? $this->objects[$value] : null;
    }

    public function jsonSerialize(): array
    {
        return array_values($this->objects);
    }

    /**
     * Must return the object class name that this container is made to contain.
     */
    abstract protected function objectClass(): string;

    /**
     * Must return the object's property name that this container is using to store the object.
     */
    abstract protected function objectProperty(): string;

    /**
     * This method is called before the object has been stored.
     *
     * @throws \InvalidArgumentException
     */
    protected function beforeObjectIsStored(object $object): void
    {
        $objectClass = $this->objectClass();

        if (!$object instanceof $objectClass) {
            throw new \InvalidArgumentException(sprintf('Model of type "%s" does not match the object contained by this class: "%s"', get_class($object), $objectClass), __LINE__);
        }
    }

    protected function getObjectKey(object $object)
    {
        $get = sprintf('get%s', ucfirst($this->objectProperty()));
        if (!method_exists($object, $get)) {
            throw new \InvalidArgumentException(sprintf('Method "%s" is required in "%s" in order to be stored in "%s"', $get, get_class($object), get_class($this)), __LINE__);
        }

        $key = $object->{$get}();
        if (!is_scalar($key)) {
            throw new \InvalidArgumentException(sprintf('Property "%s" of "%s" must be scalar, "%s" returned', $this->objectProperty(), get_class($object), gettype($key)), __LINE__);
        }

        return $key;
    }
}
