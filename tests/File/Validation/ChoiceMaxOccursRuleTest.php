<?php

declare(strict_types=1);

namespace Validation;

use StructType\SearchStatusResponse;
use WsdlToPhp\PackageGenerator\Tests\File\Validation\AbstractRule;

/**
 * @internal
 */
final class ChoiceMaxOccursRuleTest extends AbstractRule
{
    /**
     * @throws \ReflectionException
     */
    public function testUnboundedMaxOccursValue(): void
    {
        /** @var SearchStatusResponse $instance */
        $instance = self::getOdigeoSearchStatusResponseInstance();

        $this->expectNotToPerformAssertions();

        $instance->setItineraryResultsPages([]);
    }
}
