<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Model\StructAttribute as Model;

final class StructAttribute extends AbstractModel
{
    public function getStructAttributeByName(string $name): ?Model
    {
        return $this->get($name);
    }

    public function getStructAttributeByCleanName(string $cleanedName): ?Model
    {
        return $this->getByCleanName($cleanedName);
    }

    public function getByCleanName(string $cleanedName): ?Model
    {
        $attribute = null;
        foreach ($this->objects as $object) {
            if ($object instanceof Model && $cleanedName === $object->getCleanName()) {
                $attribute = $object;

                break;
            }
        }

        return $attribute;
    }

    protected function objectClass(): string
    {
        return Model::class;
    }
}
