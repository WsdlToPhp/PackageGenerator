<?php

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\ReservedKeywords;

class ReservedKeywordsTest extends TestCase
{
    /**
     * @return ReservedKeywords
     */
    public static function instance()
    {
        return ReservedKeywords::instance(__DIR__ . '/../resources/reserved_keywords.yml');
    }
    /**
     * @param string $keyword
     */
    public function testIs()
    {
        $this->assertTrue(self::instance()->is('__CLASS__'));
        $this->assertFalse(self::instance()->is('__class__'));
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testException()
    {
        ReservedKeywords::instance(__DIR__ . '/../resources/bad_reserved_keywords.yml');
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionForUnexistingFile()
    {
        ReservedKeywords::instance(__DIR__ . '/../resources/bad_reserved_keywords');
    }
}
