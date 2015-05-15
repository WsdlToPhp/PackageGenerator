<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInput;

class TagInputTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInput
     */
    public static function myBoardPackInstance()
    {
        return new TagInput(self::generatorInstance(self::wsdlMyBoardPackPath()));
    }
    /**
     * @return \SoapClient
     */
    public static function myBoardPackSoapClient()
    {
        return new \SoapClient(self::wsdlMyBoardPackPath());
    }
    /**
     *
     */
    public function testParseMyBoardpack()
    {
        $tagInputParser = self::myBoardPackInstance();
        $soapClient     = self::myBoardPackSoapClient();
        AbstractObjectContainer::purgeAllCache();

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
     * @param string $soapFunction
     * @return array[string]
     */
    public static function getMethodDataFromSoapFunction($soapFunction)
    {
        if (stripos($soapFunction, TagInput::UNKNOWN) !== false) {
            $parameterType = TagInput::UNKNOWN;
        } else {
            $parameterType = '[a-zA-Z_]*';
        }
        $matches = array();
        preg_match(sprintf('/[a-zA-Z_]*\s([a-zA-Z_]*)\((%s)\s/i', $parameterType), $soapFunction, $matches);
        return array(
            'name'      => $matches[1],
            'parameter' => $matches[2],
        );
    }
}
