<?php

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

class GeneratorOptionsTest extends TestCase
{
    /**
     * @return \WsdlToPhp\Generator\GeneratorOptions
     */
    public static function optionsInstance()
    {
        return GeneratorOptions::instance(__DIR__ . '/../resources/generator_options.yml');
    }

    public function testGetDefaultOptionValue()
    {
        $this->assertEquals('cat', self::optionsInstance()->getOptionValue('category'));
        $this->assertEquals('start', self::optionsInstance()->getOptionValue('gather_methods'));
        $this->assertFalse(self::optionsInstance()->getOptionValue('generic_constants_names'));
        $this->assertTrue(self::optionsInstance()->getOptionValue('generate_tutorial_file'));
        $this->assertEquals(array(), self::optionsInstance()->getOptionValue('add_comments'));
        $this->assertEmpty(self::optionsInstance()->getOptionValue('namespace_prefix'));
        $this->assertTrue(self::optionsInstance()->getOptionValue('standalone'));
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractStructBase', self::optionsInstance()->getOptionValue('struct_class'));
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractStructArrayBase', self::optionsInstance()->getOptionValue('struct_array_class'));
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractSoapClientBase', self::optionsInstance()->getOptionValue('soap_client_class'));
    }

    public function testSetExistingOptionValue()
    {
        self::optionsInstance()->setOptionValue('category', 'cat');
        $this->assertEquals('cat', self::optionsInstance()->getOptionValue('category'));
        self::optionsInstance()->setCategory('none');
        $this->assertEquals('none', self::optionsInstance()->getOptionValue('category'));
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetExistingOptionValueWithInvalidValue()
    {
        self::optionsInstance()->setOptionValue('category', 'null');
        self::optionsInstance()->setCategory(null);
    }

    public function testSetUnexistingOptionValue()
    {
        $newOptionKey = 'new_option';

        self::optionsInstance()->setOptionValue($newOptionKey, '1', array(0, 1, 2));

        $this->assertEquals(1, self::optionsInstance()->getOptionValue($newOptionKey));
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetUnexistingOptionValueWithInvalidValue()
    {
        $newOptionKey = 'new_option';

        self::optionsInstance()->setOptionValue($newOptionKey, '1', array(0, 1, 2));

        $this->assertEquals(1, self::optionsInstance()->getOptionValue('new_option'));

        self::optionsInstance()->setOptionValue($newOptionKey, 'null');
    }
}
