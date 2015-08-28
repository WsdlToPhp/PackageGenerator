<?php

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Tests\ConfigurationReader\GeneratorOptionsTest;

class GeneratorTest extends TestCase
{
    /**
     * @var Generator
     */
    private static $localInstance;
    /**
     * @return Generator
     */
    public static function localInstance()
    {
        if (!isset(self::$localInstance)) {
            $options = GeneratorOptionsTest::optionsInstance();
            $options
                ->setOrigin(self::wsdlBingPath())
                ->setDestination(self::getTestDirectory());
            self::$localInstance = new Generator($options);
        }
        return self::$localInstance;
    }
    /**
     *
     */
    public function testGetOptionPrefix()
    {
        $this->assertEmpty(self::localInstance()->getOptionPrefix());
    }
    /**
     *
     */
    public function testSetOptionPrefix()
    {
        $instance = self::localInstance();
        $instance->setOptionPrefix('MyPrefix');

        $this->assertSame('MyPrefix', $instance->getOptionPrefix());
    }
    /**
     *
     */
    public function testGetOptionSuffix()
    {
        $this->assertEmpty(self::localInstance()->getOptionSuffix());
    }
    /**
     *
     */
    public function testSetOptionSuffix()
    {
        $instance = self::localInstance();
        $instance->setOptionSuffix('MySuffix');

        $this->assertSame('MySuffix', $instance->getOptionSuffix());
    }
    /**
     *
     */
    public function testGetOptionDestination()
    {
        $this->assertSame(self::getTestDirectory(), self::localInstance()->getOptionDestination());
    }
    /**
     *
     */
    public function testSetOptionDestination()
    {
        $instance = self::localInstance();
        $instance->setOptionDestination(self::getTestDirectory());

        $this->assertSame(self::getTestDirectory(), $instance->getOptionDestination());
    }
    /**
     *
     */
    public function testGetOptionOrigin()
    {
        $this->assertSame(self::wsdlBingPath(), self::localInstance()->getOptionOrigin());
    }
    /**
     *
     */
    public function testSetOptionOrigin()
    {
        $instance = self::localInstance();
        $instance->setOptionOrigin(self::wsdlOdigeoPath());

        $this->assertSame(self::wsdlOdigeoPath(), $instance->getOptionOrigin());
    }
    /**
     *
     */
    public function testGetOptionBasicLogin()
    {
        $this->assertEmpty(self::localInstance()->getOptionBasicLogin());
    }
    /**
     *
     */
    public function testSetOptionBasicLogin()
    {
        $instance = self::localInstance();
        $instance->setOptionBasicLogin('MyLogin');

        $this->assertSame('MyLogin', $instance->getOptionBasicLogin());
    }
    /**
     *
     */
    public function testGetOptionBasicPassword()
    {
        $this->assertEmpty(self::localInstance()->getOptionBasicPassword());
    }
    /**
     *
     */
    public function testSetOptionBasicPassword()
    {
        $instance = self::localInstance();
        $instance->setOptionBasicPassword('MyPassword');

        $this->assertSame('MyPassword', $instance->getOptionBasicPassword());
    }
    /**
     *
     */
    public function testGetOptionProxyHost()
    {
        $this->assertEmpty(self::localInstance()->getOptionProxyHost());
    }
    /**
     *
     */
    public function testSetOptionProxyHost()
    {
        $instance = self::localInstance();
        $instance->setOptionProxyHost('MyProxyHost');

        $this->assertSame('MyProxyHost', $instance->getOptionProxyHost());
    }
    /**
     *
     */
    public function testGetOptionProxyPort()
    {
        $this->assertEmpty(self::localInstance()->getOptionProxyPort());
    }
    /**
     *
     */
    public function testSetOptionProxyPort()
    {
        $instance = self::localInstance();
        $instance->setOptionProxyPort(3225);

        $this->assertSame(3225, $instance->getOptionProxyPort());
    }
    /**
     *
     */
    public function testGetOptionProxyLogin()
    {
        $this->assertEmpty(self::localInstance()->getOptionProxyLogin());
    }
    /**
     *
     */
    public function testSetOptionProxyLogin()
    {
        $instance = self::localInstance();
        $instance->setOptionProxyLogin('MyProxyLogin');

        $this->assertSame('MyProxyLogin', $instance->getOptionProxyLogin());
    }
    /**
     *
     */
    public function testGetOptionProxyPassword()
    {
        $this->assertEmpty(self::localInstance()->getOptionProxyPassword());
    }
    /**
     *
     */
    public function testSetOptionProxyPassword()
    {
        $instance = self::localInstance();
        $instance->setOptionProxyPassword('MyProxyPassword');

        $this->assertSame('MyProxyPassword', $instance->getOptionProxyPassword());
    }
    /**
     *
     */
    public function testGetOptionSoapOptions()
    {
        $this->assertEmpty(self::localInstance()->getOptionSoapOptions());
    }
    /**
     *
     */
    public function testSetOptionSoapOptions()
    {
        $soapOptions = array(
            'trace' => true,
            'encoding' => 'utf8',
            'cache_wsdl' => WSDL_CACHE_BOTH,
        );
        $instance = self::localInstance();
        $instance->setOptionSoapOptions($soapOptions);

        $this->assertSame($soapOptions, $instance->getOptionSoapOptions());
    }
    /**
     *
     */
    public function testGetOptionCategory()
    {
        $this->assertSame(GeneratorOptions::VALUE_CAT, self::localInstance()->getOptionCategory());
    }
    /**
     *
     */
    public function testSetOptionCategory()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionCategory(GeneratorOptions::VALUE_NONE);

        $this->assertSame(GeneratorOptions::VALUE_NONE, $instance->getOptionCategory());
    }
    /**
     *
     */
    public function testGetOptionGatherMethods()
    {
        $this->assertSame(GeneratorOptions::VALUE_START, self::localInstance()->getOptionGatherMethods());
    }
    /**
     *
     */
    public function testSetOptionGatherMethods()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionGatherMethods(GeneratorOptions::VALUE_END);

        $this->assertSame(GeneratorOptions::VALUE_END, $instance->getOptionGatherMethods());
    }
    /**
     *
     */
    public function testGetOptionGenerateTutorialFile()
    {
        $this->assertTrue(self::localInstance()->getOptionGenerateTutorialFile());
    }
    /**
     *
     */
    public function testSetOptionGenerateTutorialFile()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionGenerateTutorialFile(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getOptionGenerateTutorialFile());
    }
    /**
     *
     */
    public function testGetOptionGenericConstantsNames()
    {
        $this->assertFalse(self::localInstance()->getOptionGenericConstantsNames());
    }
    /**
     *
     */
    public function testSetOptionGenericConstantsNames()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionGenericConstantsNames(GeneratorOptions::VALUE_TRUE);

        $this->assertTrue($instance->getOptionGenericConstantsNames());
    }
    /**
     *
     */
    public function testGetOptionNamespacePrefix()
    {
        $this->assertEmpty(self::localInstance()->getOptionNamespacePrefix());
    }
    /**
     *
     */
    public function testSetOptionNamespacePrefix()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionNamespacePrefix('My\\Project');

        $this->assertSame('My\\Project', $instance->getOptionNamespacePrefix());
    }
    /**
     *
     */
    public function testGetOptionSoapClientClass()
    {
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractSoapClientBase', self::localInstance()->getOptionSoapClientClass());
    }
    /**
     *
     */
    public function testSetOptionSoapClientClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionSoapClientClass('My\\Project\\SoapClientClass');

        $this->assertSame('My\\Project\\SoapClientClass', $instance->getOptionSoapClientClass());
    }
    /**
     *
     */
    public function testGetOptionStructClass()
    {
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractStructBase', self::localInstance()->getOptionStructClass());
    }
    /**
     *
     */
    public function testSetOptionStructClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructClass('My\\Project\\StructClass');

        $this->assertSame('My\\Project\\StructClass', $instance->getOptionStructClass());
    }
    /**
     *
     */
    public function testGetOptionStructArrayClass()
    {
        $this->assertSame('\\WsdlToPhp\\PackageBase\\AbstractStructArrayBase', self::localInstance()->getOptionStructArrayClass());
    }
    /**
     *
     */
    public function testSetOptionStructArrayClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructArrayClass('My\\Project\\StructArrayClass');

        $this->assertSame('My\\Project\\StructArrayClass', $instance->getOptionStructArrayClass());
    }
    /**
     *
     */
    public function testGetOptionStandalone()
    {
        $this->assertTrue(self::localInstance()->getOptionStandalone());
    }
    /**
     *
     */
    public function testSetOptionStandalone()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStandalone(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getOptionStandalone());
    }
    /**
     *
     */
    public function testGetOptionAddComments()
    {
        $this->assertEmpty(self::localInstance()->getOptionAddComments());
    }
    /**
     *
     */
    public function testSetOptionAddComments()
    {
        $comments = array(
            'date' => '2015-09-07',
            'release' => '1.3.0',
        );
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionAddComments($comments);

        $this->assertSame($comments, $instance->getOptionAddComments());
    }
    /**
     *
     */
    public function testSetPackageName()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionPrefix('samplePackageName');

        $this->assertSame('samplePackageName', $instance->getOptionPrefix(false));
    }
    /**
     *
     */
    public function testSetOptionComposerName()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionComposerName('foo/bar');

        $this->assertSame('foo/bar', $instance->getOptionComposerName());
    }
    /**
     *
     */
    public function testSetPackageNameUcFirst()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionPrefix('samplePackageName');

        $this->assertSame('SamplePackageName', $instance->getOptionPrefix(true));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnInvalidDestination()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionDestination('');

        print_r($instance->getOptions());
        $instance->generateClasses();
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnInvalidComposerName()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionComposerName('');

        $instance->generateClasses();
    }

}
