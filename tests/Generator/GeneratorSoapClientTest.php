<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
class GeneratorSoapClientTest extends AbstractTestCase
{
    public function testExceptionOnWsdl(): void
    {
        $options = GeneratorOptions::instance();
        $options
            ->setComposerName('wsdltophp/invalid')
            ->setDestination(self::getTestDirectory())
            ->setOrigin(self::schemaPartnerPath())
        ;

        $this->expectException(\InvalidArgumentException::class);

        new Generator($options);
    }
}
