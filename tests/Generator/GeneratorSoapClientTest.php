<?php

namespace WsdlToPhp\PackageGenerator\Test\Generator;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class GeneratorSoapClientTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnWsdl()
    {
        $options = GeneratorOptions::instance();
        $options
            ->setComposerName('wsdltophp/invalid')
            ->setDestination(self::getTestDirectory())
            ->setOrigin(self::schemaPartnerPath());

        new Generator($options);
    }
}
