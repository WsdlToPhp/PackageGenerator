<?php

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Tests\ConfigurationReader\GeneratorOptionsTest;

class GeneratorTest extends TestCase
{
    /**
     * @var Generator
     */
    private static $localInstance;
    /**
     * @return Generator
     */
    public static function localInstance()
    {
        if (!isset(self::$localInstance)) {
            $options = GeneratorOptionsTest::optionsInstance();
            $options
                ->setOrigin(self::wsdlBingPath())
                ->setDestination(self::getTestDirectory());
            self::$localInstance = new Generator($options);
        }
        return self::$localInstance;
    }
    /**
     *
     */
    public function testGetOptionCategory()
    {
        $this->assertSame(GeneratorOptions::VALUE_CAT, self::localInstance()->getOptionCategory());
    }
    /**
     *
     */
    public function testSetOptionCategory()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionCategory(GeneratorOptions::VALUE_NONE);

        $this->assertSame(GeneratorOptions::VALUE_NONE, $instance->getOptionCategory());
    }
    /**
     *
     */
    public function testGetOptionGatherMethods()
    {
        $this->assertSame(GeneratorOptions::VALUE_START, self::localInstance()->getOptionGatherMethods());
    }
    /**
     *
     */
    public function testSetOptionGatherMethods()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionGatherMethods(GeneratorOptions::VALUE_END);

        $this->assertSame(GeneratorOptions::VALUE_END, $instance->getOptionGatherMethods());
    }
    /**
     *
     */
    public function testGetOptionGenerateTutorialFile()
    {
        $this->assertTrue(self::localInstance()->getOptionGenerateTutorialFile());
    }
    /**
     *
     */
    public function testSetOptionGenerateTutorialFile()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionGenerateTutorialFile(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getOptionGenerateTutorialFile());
    }
    /**
     *
     */
    public function testGetOptionGenericConstantsNames()
    {
        $this->assertFalse(self::localInstance()->getOptionGenericConstantsNames());
    }
    /**
     *
     */
    public function testSetOptionGenericConstantsNames()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionGenericConstantsNames(GeneratorOptions::VALUE_TRUE);

        $this->assertTrue($instance->getOptionGenericConstantsNames());
    }
    /**
     *
     */
    public function testGetOptionNamespacePrefix()
    {
        $this->assertEmpty(self::localInstance()->getOptionNamespacePrefix());
    }
    /**
     *
     */
    public function testSetOptionNamespacePrefix()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionNamespacePrefix('My\\Project');

        $this->assertSame('My\\Project', $instance->getOptionNamespacePrefix());
    }
    /**
     *
     */
    public function testGetOptionSoapClientClass()
    {
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractSoapClientBase', self::localInstance()->getOptionSoapClientClass());
    }
    /**
     *
     */
    public function testSetOptionSoapClientClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionSoapClientClass('My\\Project\\SoapClientClass');

        $this->assertSame('My\\Project\\SoapClientClass', $instance->getOptionSoapClientClass());
    }
    /**
     *
     */
    public function testGetOptionStructClass()
    {
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractStructBase', self::localInstance()->getOptionStructClass());
    }
    /**
     *
     */
    public function testSetOptionStructClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructClass('My\\Project\\StructClass');

        $this->assertSame('My\\Project\\StructClass', $instance->getOptionStructClass());
    }
    /**
     *
     */
    public function testGetOptionStructArrayClass()
    {
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractStructArrayBase', self::localInstance()->getOptionStructArrayClass());
    }
    /**
     *
     */
    public function testSetOptionStructArrayClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructArrayClass('My\\Project\\StructArrayClass');

        $this->assertSame('My\\Project\\StructArrayClass', $instance->getOptionStructArrayClass());
    }
    /**
     *
     */
    public function testGetOptionStandalone()
    {
        $this->assertTrue(self::localInstance()->getOptionStandalone());
    }
    /**
     *
     */
    public function testSetOptionStandalone()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStandalone(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getOptionStandalone());
    }
    /**
     *
     */
    public function testGetOptionAddComments()
    {
        $this->assertEmpty(self::localInstance()->getOptionAddComments());
    }
    /**
     *
     */
    public function testSetOptionAddComments()
    {
        $comments = array(
            'date' => '2015-09-07',
            'release' => '1.3.0',
        );
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionAddComments($comments);

        $this->assertSame($comments, $instance->getOptionAddComments());
    }
    /**
     *
     */
    public function testSetPackageName()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionPrefix('samplePackageName');

        $this->assertSame('samplePackageName', $instance->getOptionPrefix(false));
    }
    /**
     *
     */
    public function testSetPackageNameUcFirst()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionPrefix('samplePackageName');

        $this->assertSame('SamplePackageName', $instance->getOptionPrefix(true));
    }
}
