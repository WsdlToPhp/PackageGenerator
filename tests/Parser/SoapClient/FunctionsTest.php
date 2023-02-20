<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\SoapClient;

use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Service;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Functions;

/**
 * @internal
 * @coversDefaultClass
 */
final class FunctionsTest extends SoapClientParser
{
    public function testReforma(): void
    {
        $generator = self::getReformaInstance();

        $parser = new Functions($generator);
        $parser->parse();

        if (($login = $generator->getServiceMethod('Login')) instanceof Method) {
            $this->assertSame([
                'login' => 'string',
                'password' => 'string',
            ], $login->getParameterType());
        } else {
            $this->fail('Unable to find parsed Login operation');
        }
    }

    public function testBullhornstaffing(): void
    {
        $generator = self::getBullhornstaffingInstance();

        $parser = new Functions($generator);
        $parser->parse();

        $this->assertInstanceOf(Service::class, $generator->getService('Events'));
        $this->assertInstanceOf(Service::class, $generator->getService('Export'));
    }

    public function testOmniture(): void
    {
        $generator = self::getOmnitureInstance();

        $parser = new Functions($generator);
        $parser->parse();

        if (($saint = $generator->getServiceMethod('Saint.CreateFTP')) instanceof Method) {
            $this->assertSame([
                'description' => 'string',
                'email' => 'string',
                'export' => 'boolean',
                'overwrite' => 'boolean',
                'relation_id' => 'int',
                'rsid_list' => 'string_array',
            ], $saint->getParameterType());
        } else {
            $this->fail('Unable to find Saint.CreateFTP method');
        }

        if (($saint = $generator->getServiceMethod('Saint.CheckJobStatus')) instanceof Method) {
            $this->assertSame([
                'job_id' => 'int',
            ], $saint->getParameterType());
        } else {
            $this->fail('Unable to find Saint.CheckJobStatus method');
        }
    }

    public function testLnp(): void
    {
        $generator = self::getLnpInstance();

        $parser = new Functions($generator);
        $parser->parse();

        $count = 0;
        foreach ($generator->getServices() as $service) {
            foreach ($service->getMethods() as $method) {
                switch ($method->getName()) {
                    case 'portingQualification':
                        $expected = [
                            'baseNumber' => 'string',
                            'groupSize' => 'int',
                        ];
                        ++$count;

                        break;

                    case 'createPortingOrderCatA':
                        $expected = [
                            'portingOrderCatACreationParameters' => 'UNKNOWN',
                        ];
                        ++$count;

                        break;

                    case 'createPortingOrderCatC':
                        $expected = [
                            'portingOrderCatCCreationParameters' => 'UNKNOWN',
                        ];
                        ++$count;

                        break;

                    case 'uploadPaf':
                        $expected = [
                            'orderId' => 'long',
                            'fileName' => 'string',
                            'fileContent' => 'base64Binary',
                        ];
                        ++$count;

                        break;

                    case 'getPortingOrderStatus':
                        $expected = [
                            'orderId' => 'long',
                        ];
                        ++$count;

                        break;

                    case 'cancelPortingOrder':
                        $expected = [
                            'orderId' => 'long',
                        ];
                        ++$count;

                        break;

                    case 'listActorPortingOrders':
                        $expected = null;
                        ++$count;

                        break;

                    case 'listAvailablePublicNumberGroups':
                        $expected = [
                            'publicNumberGroupSearchParams' => 'UNKNOWN',
                        ];
                        ++$count;

                        break;

                    case 'importPublicNumberGroup':
                        $expected = [
                            'importPublicNumberGroupParams' => 'UNKNOWN',
                        ];
                        ++$count;

                        break;

                    case 'leasePublicNumberGroup':
                        $expected = [
                            'params' => 'UNKNOWN',
                        ];
                        ++$count;

                        break;

                    case 'unleasePublicNumberGroup':
                        $expected = [
                            'actorId' => 'long',
                            'baseNumber' => 'string',
                        ];
                        ++$count;

                        break;

                    case 'mapIpndDetailsToNumber':
                        $expected = [
                            'number' => 'string',
                            'ipndInformation' => 'UNKNOWN',
                        ];
                        ++$count;

                        break;
                }
                $this->assertSame($expected, $method->getParameterType());
            }
        }
        $this->assertSame(12, $count);
    }
}
