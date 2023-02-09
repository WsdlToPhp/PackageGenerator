<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInput;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagInputTest extends WsdlParser
{
    public static function myBoardPackInstanceParser(): TagInput
    {
        return new TagInput(self::generatorInstance(self::wsdlMyBoardPackPath()));
    }

    public static function lnpInstanceParser(): TagInput
    {
        return new TagInput(self::generatorInstance(self::wsdlLnpPath()));
    }

    public static function myBoardPackSoapClient(): \SoapClient
    {
        return new \SoapClient(self::wsdlMyBoardPackPath());
    }

    public static function lnpSoapClient(): \SoapClient
    {
        return new \SoapClient(self::wsdlLnpPath());
    }

    public function testParseMyBoardpack(): void
    {
        $tagInputParser = self::myBoardPackInstanceParser();
        $soapClient = self::myBoardPackSoapClient();

        $tagInputParser->parse();

        $count = 0;
        $soapFunctions = $soapClient->__getFunctions();
        foreach ($soapFunctions as $soapFunction) {
            $methodData = self::getMethodDataFromSoapFunction($soapFunction);
            $method = $tagInputParser->getGenerator()->getServiceMethod($methodData['name']);
            if (TagInput::UNKNOWN === strtolower($methodData['parameter'])) {
                $this->assertNotSame(TagInput::UNKNOWN, strtolower($method->getParameterType()));
                ++$count;
            }
        }
        $this->assertSame(128, $count);
    }

    public function testParseLnp(): void
    {
        $tagInputParser = self::lnpInstanceParser();
        $soapClient = self::lnpSoapClient();

        $tagInputParser->parse();

        $count = 0;
        $soapFunctions = $soapClient->__getFunctions();
        foreach ($soapFunctions as $soapFunction) {
            $methodData = self::getMethodDataFromSoapFunction($soapFunction);
            $method = $tagInputParser->getGenerator()->getServiceMethod($methodData['name']);
            if (TagInput::UNKNOWN === strtolower($methodData['parameter'])) {
                if (is_array($method->getParameterType())) {
                    foreach ($method->getParameterType() as $methodParameterType) {
                        $this->assertNotSame(TagInput::UNKNOWN, strtolower($methodParameterType));
                    }
                } else {
                    $this->assertNotSame(TagInput::UNKNOWN, strtolower($method->getParameterType()));
                }
                ++$count;
            }
        }
        $this->assertSame(7, $count);
    }

    /**
     * @param string $soapFunction
     *
     * @return string[]
     */
    public static function getMethodDataFromSoapFunction($soapFunction)
    {
        if (false !== stripos($soapFunction, TagInput::UNKNOWN)) {
            $parameterType = TagInput::UNKNOWN;
        } else {
            $parameterType = '[a-zA-Z_]*';
        }
        $matches = [];
        preg_match(sprintf('/[a-zA-Z_]*\s([a-zA-Z_]*)\(.*(%s)\s/i', $parameterType), $soapFunction, $matches);
        $name = $matches[1] ?? '';
        $parameter = $matches[2] ?? '';

        return [
            'name' => $name,
            'parameter' => $parameter,
        ];
    }
}
