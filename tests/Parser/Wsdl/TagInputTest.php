<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInput;

class TagInputTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInput
     */
    public static function myBoardPackInstanceParser()
    {
        return new TagInput(self::generatorInstance(self::wsdlMyBoardPackPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInput
     */
    public static function lnpInstanceParser()
    {
        return new TagInput(self::generatorInstance(self::wsdlLnpPath()));
    }
    /**
     * @return \SoapClient
     */
    public static function myBoardPackSoapClient()
    {
        return new \SoapClient(self::wsdlMyBoardPackPath());
    }
    /**
     * @return \SoapClient
     */
    public static function lnpSoapClient()
    {
        return new \SoapClient(self::wsdlLnpPath());
    }
    /**
     *
     */
    public function testParseMyBoardpack()
    {
        $tagInputParser = self::myBoardPackInstanceParser();
        $soapClient = self::myBoardPackSoapClient();

        $tagInputParser->parse();

        $count = 0;
        $soapFunctions = $soapClient->__getFunctions();
        foreach ($soapFunctions as $soapFunction) {
            $methodData = self::getMethodDataFromSoapFunction($soapFunction);
            $method = $tagInputParser->getGenerator()->getServiceMethod($methodData['name']);
            if (strtolower($methodData['parameter']) === TagInput::UNKNOWN) {
                $this->assertNotSame(TagInput::UNKNOWN, strtolower($method->getParameterType()));
                $count++;
            }
        }
        $this->assertSame(128, $count);
    }
    /**
     *
     */
    public function testParseLnp()
    {
        $tagInputParser = self::lnpInstanceParser();
        $soapClient = self::lnpSoapClient();

        $tagInputParser->parse();

        $count = 0;
        $soapFunctions = $soapClient->__getFunctions();
        foreach ($soapFunctions as $soapFunction) {
            $methodData = self::getMethodDataFromSoapFunction($soapFunction);
            $method = $tagInputParser->getGenerator()->getServiceMethod($methodData['name']);
            if (strtolower($methodData['parameter']) === TagInput::UNKNOWN) {
                if (is_array($method->getParameterType())) {
                    foreach ($method->getParameterType() as $methodParameterType) {
                        $this->assertNotSame(TagInput::UNKNOWN, strtolower($methodParameterType));
                    }
                } else {
                    $this->assertNotSame(TagInput::UNKNOWN, strtolower($method->getParameterType()));
                }
                $count++;
            }
        }
        $this->assertSame(7, $count);
    }
    /**
     * @param string $soapFunction
     * @return string[]
     */
    public static function getMethodDataFromSoapFunction($soapFunction)
    {
        if (stripos($soapFunction, TagInput::UNKNOWN) !== false) {
            $parameterType = TagInput::UNKNOWN;
        } else {
            $parameterType = '[a-zA-Z_]*';
        }
        $matches = [];
        preg_match(sprintf('/[a-zA-Z_]*\s([a-zA-Z_]*)\(.*(%s)\s/i', $parameterType), $soapFunction, $matches);
        $name = isset($matches[1]) ? $matches[1] : '';
        $parameter = isset($matches[2]) ? $matches[2] : '';
        return [
            'name' => $name,
            'parameter' => $parameter,
        ];
    }
}
