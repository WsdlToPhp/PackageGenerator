<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;

/**
 * @internal
 * @coversDefaultClass
 */
final class FalseObjectContainerTest extends AbstractObjectContainer
{
    protected function objectProperty(): string
    {
        return 'foo';
    }

    protected function objectClass(): string
    {
        return FalseObjectTest::class;
    }
}
