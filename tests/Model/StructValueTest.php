<?php

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\StructValue;

class StructValueTest extends TestCase
{
    /**
     *
     */
    public function testGetValue()
    {
        $struct = StructTest::instance('Foot', true);
        $struct->setRestriction(true);
        $struct->addValue(1);
        $struct->addValue('Bar');
        $struct->addValue('5.3');

        $this->assertSame(1, $struct->getValue(1)->getValue());
        $this->assertNotSame('1', $struct->getValue(1)->getValue());
        $this->assertSame('5.3', $struct->getValue('5.3')->getValue());
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidIndexValue()
    {
        $struct = StructTest::instance('Foot', true);
        new StructValue($struct->getGenerator(), 'foo', -1, $struct);
        new StructValue($struct->getGenerator(), 'foo', 'bar', $struct);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidIndexValue()
    {
        $struct = StructTest::instance('Foot', true);
        $struct->addValue(1);

        $struct->getValue(1)->setIndex('1');
    }
    /**
     *
     */
    public function testGetCleanName()
    {
        $struct = StructTest::instance('Foo', true);
        $struct->setRestriction(true);
        $struct->addValue(1);
        $struct->addValue('Bar');
        $struct->addValue('5.3');
        $struct->addValue('Microsoft_IIS');
        $struct->addValue('0Value');
        $struct->addValue('0value');
        $struct->addValue('CamelCase');
        $struct->addValue('CamelCase00');
        $struct->addValue('camelCase');
        $struct->addValue('Value0Ok');
        $struct->addValue('value0ok');
        $struct->addValue('value01ok');
        $struct->addValue('15value01ok');
        $struct->addValue('Rirght15value01ok');
        $struct->addValue('valueOk0');
        $struct->addValue('XPosition');

        $this->assertSame('VALUE_1', $struct->getValue(1)->getCleanName());
        $this->assertSame('VALUE_BAR', $struct->getValue('Bar')->getCleanName());
        $this->assertSame('VALUE_5_3', $struct->getValue('5.3')->getCleanName());
        $this->assertSame('VALUE_MICROSOFT_IIS', $struct->getValue('Microsoft_IIS')->getCleanName());
        $this->assertSame('VALUE_0_VALUE', $struct->getValue('0Value')->getCleanName());
        // _1 is added as the previous value has the same constant name
        $this->assertSame('VALUE_0_VALUE_1', $struct->getValue('0value')->getCleanName());
        $this->assertSame('VALUE_CAMEL_CASE', $struct->getValue('CamelCase')->getCleanName());
        // _1 is added as the previous value has the same constant name
        $this->assertSame('VALUE_CAMEL_CASE_1', $struct->getValue('camelCase')->getCleanName());
        $this->assertSame('VALUE_CAMEL_CASE_00', $struct->getValue('CamelCase00')->getCleanName());
        $this->assertSame('VALUE_VALUE_0_OK', $struct->getValue('Value0Ok')->getCleanName());
        // _1 is added as the previous value has the same constant name
        $this->assertSame('VALUE_VALUE_0_OK_1', $struct->getValue('value0ok')->getCleanName());
        $this->assertSame('VALUE_VALUE_01_OK', $struct->getValue('value01ok')->getCleanName());
        $this->assertSame('VALUE_15_VALUE_01_OK', $struct->getValue('15value01ok')->getCleanName());
        $this->assertSame('VALUE_RIRGHT_15_VALUE_01_OK', $struct->getValue('Rirght15value01ok')->getCleanName());
        $this->assertSame('VALUE_VALUE_OK_0', $struct->getValue('valueOk0')->getCleanName());
        $this->assertSame('VALUE_XPOSITION', $struct->getValue('XPosition')->getCleanName());
    }
}
