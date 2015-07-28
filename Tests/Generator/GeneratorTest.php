<?php

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class GeneratorTest extends TestCase
{
    /**
     *
     */
    public function testGetOptionCategory()
    {
        $this->assertSame(GeneratorOptions::VALUE_CAT, self::getBingGeneratorInstance()->getOptionCategory());
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
        $this->assertSame(GeneratorOptions::VALUE_START, self::getBingGeneratorInstance()->getOptionGatherMethods());
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
        $this->assertTrue(self::getBingGeneratorInstance()->getOptionGenerateTutorialFile());
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
        $this->assertFalse(self::getBingGeneratorInstance()->getOptionGenericConstantsNames());
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
        $this->assertEmpty(self::getBingGeneratorInstance()->getOptionNamespacePrefix());
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
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractSoapClientBase', self::getBingGeneratorInstance()->getOptionSoapClientClass());
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
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractStructBase', self::getBingGeneratorInstance()->getOptionStructClass());
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
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractStructArrayBase', self::getBingGeneratorInstance()->getOptionStructArrayClass());
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
        $this->assertTrue(self::getBingGeneratorInstance()->getOptionStandalone());
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
        $this->assertEmpty(self::getBingGeneratorInstance()->getOptionAddComments());
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
        $instance->setPackageName('samplePackageName');

        $this->assertSame('samplePackageName', $instance->getPackageName(false));
    }
    /**
     *
     */
    public function testSetPackageNameUcFirst()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setPackageName('samplePackageName');

        $this->assertSame('SamplePackageName', $instance->getPackageName(true));
    }
}
