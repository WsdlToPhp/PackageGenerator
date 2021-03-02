<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;

/**
 * @internal
 * @coversDefaultClass
 */
final class ObjectContainerTest extends AbstractObjectContainer
{
    protected function objectProperty(): string
    {
        return self::PROPERTY_NAME;
    }

    protected function objectClass(): string
    {
        return ObjectTest::class;
    }
}
