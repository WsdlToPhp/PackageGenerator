<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use WsdlToPhp\PackageGenerator\File\Validation\MinExclusiveRule;

/**
 * @internal
 * @coversDefaultClass
 */
final class MinExclusiveRuleTest extends AbstractRule
{
    public function testApplyRuleWithExactSameValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $functionName = parent::createRuleFunction(MinExclusiveRule::class, 2);
        call_user_func($functionName, 2);
    }

    public function testApplyRuleWithGreaterValue(): void
    {
        $functionName = parent::createRuleFunction(MinExclusiveRule::class, 2);
        $this->assertTrue(call_user_func($functionName, 2.1));
    }

    public function testApplyRuleWithLowerValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $functionName = parent::createRuleFunction(MinExclusiveRule::class, 2);
        call_user_func($functionName, 1.99);
    }

    public function testApplyRuleWithNull(): void
    {
        $functionName = parent::createRuleFunction(MinExclusiveRule::class, 2);
        $this->assertTrue(call_user_func($functionName, null));
    }

    public function testApplyRuleWithDateIntervalMustBeFalseWithLowerInterval(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'-P10675199DT2H49M6.4775807S\', the value must be chronologically greater than -P10675199DT2H49M5.4775807S');

        $functionName = parent::createRuleFunction(MinExclusiveRule::class, '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, '-P10675199DT2H49M6.4775807S'));
    }

    public function testApplyRuleWithDateIntervalMustBeFalseWithSameInterval(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'-P10675199DT2H49M5.4775807S\', the value must be chronologically greater than -P10675199DT2H49M5.4775807S');

        $functionName = parent::createRuleFunction(MinExclusiveRule::class, $interval = '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, $interval));
    }

    public function testApplyRuleWithDateIntervalMustBeTrueWthHigherInterval(): void
    {
        $functionName = parent::createRuleFunction(MinExclusiveRule::class, '-P10675199DT2H49M5.4775807S');
        $this->assertTrue(call_user_func($functionName, '-P10675199DT2H49M4.4775807S'));
    }
}
