<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Method as Model;

class Method extends AbstractModel
{
    public const KEY_PARAMETER_TYPE = 'parameterType';

    protected function objectClass(): string
    {
        return Model::class;
    }

    protected function objectProperty(): string
    {
        return 'methodName';
    }

    public function getMethodByName(string $name): ?Model
    {
        return $this->get($name);
    }

    public function get($value): ?Model
    {
        foreach ($this->objects as $object) {
            if ($object instanceof Model && $value === $object->getName()) {
                return $object;
            }
        }

        return null;
    }
}
