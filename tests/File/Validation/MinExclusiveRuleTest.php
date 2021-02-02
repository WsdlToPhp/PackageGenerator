<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use InvalidArgumentException;

/**
 * @internal
 * @coversDefaultClass
 */
final class MinExclusiveRuleTest extends AbstractRuleTest
{
    public function testApplyRuleWithExactSameValue()
    {
        $this->expectException(InvalidArgumentException::class);

        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        call_user_func($functionName, 2);
    }

    public function testApplyRuleWithGreaterValue()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        $this->assertTrue(call_user_func($functionName, 2.1));
    }

    public function testApplyRuleWithLowerValue()
    {
        $this->expectException(InvalidArgumentException::class);

        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        call_user_func($functionName, 1.99);
    }

    public function testApplyRuleWithNull()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', 2);
        $this->assertTrue(call_user_func($functionName, null));
    }

    public function testApplyRuleWithDateIntervalMustBeFalseWithLowerInterval()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'-P10675199DT2H49M6.4775807S\', the value must be chronologically greater than -P10675199DT2H49M5.4775807S');

        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, '-P10675199DT2H49M6.4775807S'));
    }

    public function testApplyRuleWithDateIntervalMustBeFalseWithSameInterval()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'-P10675199DT2H49M5.4775807S\', the value must be chronologically greater than -P10675199DT2H49M5.4775807S');

        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', $interval = '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, $interval));
    }

    public function testApplyRuleWithDateIntervalMustBeTrueWthHigherInterval()
    {
        $functionName = parent::createRuleFunction('WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule', '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, '-P10675199DT2H49M4.4775807S'));
    }
}
