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
}
