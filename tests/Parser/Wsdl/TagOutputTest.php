<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagOutput;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagOutputTest extends WsdlParser
{
    public static function myBoardPackInstanceParser(): TagOutput
    {
        return new TagOutput(self::generatorInstance(self::wsdlMyBoardPackPath()));
    }

    public static function myBoardPackSoapClient(): \SoapClient
    {
        return new \SoapClient(self::wsdlMyBoardPackPath());
    }

    public function testParseMyBoardpack(): void
    {
        $tagOutputParser = self::myBoardPackInstanceParser();
        $soapClient = self::myBoardPackSoapClient();

        $tagOutputParser->parse();

        $count = 0;
        $soapFunctions = $soapClient->__getFunctions();
        foreach ($soapFunctions as $soapFunction) {
            $methodData = self::getMethodDataFromSoapFunction($soapFunction);
            $method = $tagOutputParser->getGenerator()->getServiceMethod($methodData['name']);
            if (TagOutput::UNKNOWN === strtolower($methodData['return'])) {
                $this->assertNotSame(TagOutput::UNKNOWN, strtolower($method->getReturnType()));
                ++$count;
            }
        }
        $this->assertSame(126, $count);
    }

    /**
     * @param string $soapFunction
     *
     * @return string[]
     */
    public static function getMethodDataFromSoapFunction($soapFunction)
    {
        if (0 === stripos($soapFunction, TagOutput::UNKNOWN)) {
            $returnType = sprintf('(%s)', TagOutput::UNKNOWN);
        } else {
            $returnType = '([a-zA-Z_]*)';
        }
        $matches = [];
        preg_match(sprintf('/%s\s([a-zA-Z_]*)\(.*/i', $returnType), $soapFunction, $matches);

        return [
            'name' => $matches[2],
            'return' => $matches[1],
        ];
    }
}
