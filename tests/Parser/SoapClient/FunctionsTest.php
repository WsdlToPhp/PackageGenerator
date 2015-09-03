<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\SoapClient;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Functions;

class FunctionsTest extends SoapClientParser
{
    /**
     *
     */
    public function testReforma()
    {
        $generator = self::getReformaInstance();

        $parser = new Functions($generator);
        $parser->parse();

        if (($login = $generator->getServiceMethod('Login')) instanceof Method) {
            $this->assertSame(array(
                'login' => 'string',
                'password' => 'string',
            ), $login->getParameterType());
        } else {
            $this->assertFalse(true, 'Unable to find parsed Login operation');
        }
    }
    /**
     *
     */
    public function testBullhornstaffing()
    {
        $generator = self::getBullhornstaffingInstance();

        $parser = new Functions($generator);
        $parser->parse();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Service', $generator->getService('Events'));
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Service', $generator->getService('Export'));
    }
    /**
     *
     */
    public function testOmniture()
    {
        $generator = self::getOmnitureInstance();

        $parser = new Functions($generator);
        $parser->parse();

        if (($saint = $generator->getServiceMethod('Saint.CreateFTP')) instanceof Method) {
            $this->assertSame(array(
                'description' => 'string',
                'email' => 'string',
                'export' => 'boolean',
                'overwrite' => 'boolean',
                'relation_id' => 'int',
                'rsid_list' => 'string_array',
            ), $saint->getParameterType());
        } else {
            $this->assertTrue(false, 'Unable to find Saint.CreateFTP method');
        }

        if (($saint = $generator->getServiceMethod('Saint.CheckJobStatus')) instanceof Method) {
            $this->assertSame(array(
                'job_id' => 'int',
            ), $saint->getParameterType());
        } else {
            $this->assertTrue(false, 'Unable to find Saint.CheckJobStatus method');
        }
    }
    /**
     *
     */
    public function testLnp()
    {
        $generator = self::getLnpInstance();

        $parser = new Functions($generator);
        $parser->parse();

        $count = 0;
        foreach ($generator->getServices() as $service) {
            foreach ($service->getMethods() as $method) {

                switch ($method->getName()) {
                    case 'portingQualification':
                        $expected = array(
                            'baseNumber' => 'string',
                            'groupSize' => 'int',
                        );
                        $count++;
                        break;
                    case 'createPortingOrderCatA':
                        $expected = array(
                            'portingOrderCatACreationParameters' => 'UNKNOWN',
                        );
                        $count++;
                        break;
                    case 'createPortingOrderCatC':
                        $expected = array(
                            'portingOrderCatCCreationParameters' => 'UNKNOWN',
                        );
                        $count++;
                        break;
                    case 'uploadPaf':
                        $expected = array(
                            'orderId' => 'long',
                            'fileName' => 'string',
                            'fileContent' => 'base64Binary',
                        );
                        $count++;
                        break;
                    case 'getPortingOrderStatus':
                        $expected = array(
                            'orderId' => 'long',
                        );
                        $count++;
                        break;
                    case 'cancelPortingOrder':
                        $expected = array(
                            'orderId' => 'long',
                        );
                        $count++;
                        break;
                    case 'listActorPortingOrders':
                        $expected = null;
                        $count++;
                        break;
                    case 'listAvailablePublicNumberGroups':
                        $expected = array(
                            'publicNumberGroupSearchParams' => 'UNKNOWN',
                        );
                        $count++;
                        break;
                    case 'importPublicNumberGroup':
                        $expected = array(
                            'importPublicNumberGroupParams' => 'UNKNOWN',
                        );
                        $count++;
                        break;
                    case 'leasePublicNumberGroup':
                        $expected = array(
                            'params' => 'UNKNOWN',
                        );
                        $count++;
                        break;
                    case 'unleasePublicNumberGroup':
                        $expected = array(
                            'actorId' => 'long',
                            'baseNumber' => 'string',
                        );
                        $count++;
                        break;
                    case 'mapIpndDetailsToNumber':
                        $expected = array(
                            'number' => 'string',
                            'ipndInformation' => 'UNKNOWN',
                        );
                        $count++;
                        break;
                }
                $this->assertSame($expected, $method->getParameterType());
            }
        }
        $this->assertSame(12, $count);
    }
}
