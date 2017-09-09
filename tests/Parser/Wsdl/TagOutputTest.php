<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagOutput;

class TagOutputTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagOutput
     */
    public static function myBoardPackInstanceParser()
    {
        return new TagOutput(self::generatorInstance(self::wsdlMyBoardPackPath()));
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
        $tagOutputParser = self::myBoardPackInstanceParser();
        $soapClient = self::myBoardPackSoapClient();

        $tagOutputParser->parse();

        $count = 0;
        $soapFunctions = $soapClient->__getFunctions();
        foreach ($soapFunctions as $soapFunction) {
            $methodData = self::getMethodDataFromSoapFunction($soapFunction);
            $method = $tagOutputParser->getGenerator()->getServiceMethod($methodData['name']);
            if (strtolower($methodData['return']) === TagOutput::UNKNOWN) {
                $this->assertNotSame(TagOutput::UNKNOWN, strtolower($method->getReturnType()));
                $count++;
            }
        }
        $this->assertSame(126, $count);
    }
    /**
     * @param string $soapFunction
     * @return string[]
     */
    public static function getMethodDataFromSoapFunction($soapFunction)
    {
        if (stripos($soapFunction, TagOutput::UNKNOWN) === 0) {
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
