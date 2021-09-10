<?php

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Tests\ConfigurationReader\GeneratorOptionsTest;
use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

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
    public function testGetOptionSrcDirname()
    {
        $this->assertSame('src', self::localInstance()->getOptionSrcDirname());
    }
    /**
     *
     */
    public function testSetOptionSrcDirname()
    {
        $instance = self::localInstance();
        $instance->setOptionSrcDirname('');

        $this->assertSame('', $instance->getOptionSrcDirname());
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
        $soapOptions = [
            'trace' => true,
            'encoding' => 'utf8',
            'cache_wsdl' => WSDL_CACHE_BOTH,
        ];
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
        $instance->setOptionNamespacePrefix('My\Project');

        $this->assertSame('My\Project', $instance->getOptionNamespacePrefix());
    }
    /**
     *
     */
    public function testGetOptionSoapClientClass()
    {
        $this->assertSame('\WsdlToPhp\PackageBase\AbstractSoapClientBase', self::localInstance()->getOptionSoapClientClass());
    }
    /**
     *
     */
    public function testSetOptionSoapClientClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionSoapClientClass('My\Project\SoapClientClass');

        $this->assertSame('My\Project\SoapClientClass', $instance->getOptionSoapClientClass());
    }
    /**
     *
     */
    public function testGetOptionStructClass()
    {
        $this->assertSame('\WsdlToPhp\PackageBase\AbstractStructBase', self::localInstance()->getOptionStructClass());
    }
    /**
     *
     */
    public function testSetOptionStructClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructClass('My\Project\StructClass');

        $this->assertSame('My\Project\StructClass', $instance->getOptionStructClass());
    }
    /**
     *
     */
    public function testGetOptionStructArrayClass()
    {
        $this->assertSame('\WsdlToPhp\PackageBase\AbstractStructArrayBase', self::localInstance()->getOptionStructArrayClass());
    }
    /**
     *
     */
    public function testSetOptionStructArrayClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructArrayClass('My\Project\StructArrayClass');

        $this->assertSame('My\Project\StructArrayClass', $instance->getOptionStructArrayClass());
    }
    /**
     *
     */
    public function testGetOptionStructEnumClass()
    {
        $this->assertSame('\WsdlToPhp\PackageBase\AbstractStructEnumBase', self::localInstance()->getOptionStructEnumClass());
    }
    /**
     *
     */
    public function testSetOptionStructEnumClass()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructEnumClass('My\Project\StructEnumClass');

        $this->assertSame('My\Project\StructEnumClass', $instance->getOptionStructEnumClass());
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
    public function testGetOptionValidation()
    {
        $this->assertTrue(self::localInstance()->getOptionValidation());
    }
    /**
     *
     */
    public function testSetOptionValidation()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionValidation(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getOptionValidation());
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
        $comments = [
            'date' => '2015-09-07',
            'release' => '1.3.0',
        ];
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
    public function testSetOptionComposerSettings()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionComposerSettings([
            'config.disable-tls:true',
            'config.data-dir:/src/foor/bar',
            'require.wsdltophp/packagebase:dev-master',
            'autoload.psr-4.Acme\\:src/',
        ]);

        $this->assertSame([
            'config' => [
                'disable-tls' => true,
                'data-dir' => '/src/foor/bar',
            ],
            'require' => [
                'wsdltophp/packagebase' => 'dev-master',
            ],
            'autoload' => [
                'psr-4' => [
                    'Acme\\' => 'src/',
                ],
            ],
        ], $instance->getOptionComposerSettings());
    }
    /**
     *
     */
    public function testSetStructsFolder()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructsFolder('Structs');

        $this->assertSame('Structs', $instance->getOptionStructsFolder());
    }
    /**
     *
     */
    public function testSetArraysFolder()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionArraysFolder('Arrays');

        $this->assertSame('Arrays', $instance->getOptionArraysFolder());
    }
    /**
     *
     */
    public function testSetEnumsFolder()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionEnumsFolder('Enums');

        $this->assertSame('Enums', $instance->getOptionEnumsFolder());
    }
    /**
     *
     */
    public function testSetServicesFolder()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionServicesFolder('Services');

        $this->assertSame('Services', $instance->getOptionServicesFolder());
    }
    /**
     *
     */
    public function testSetSchemasSave()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionSchemasSave(false);

        $this->assertSame(false, $instance->getOptionSchemasSave());
    }
    /**
     *
     */
    public function testSetSchemasFolder()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionSchemasFolder('wsdl');

        $this->assertSame('wsdl', $instance->getOptionSchemasFolder());
    }
    /**
     *
     */
    public function testOptionXsdTypesPath()
    {
        $instance = self::localInstance();

        $this->assertEmpty($instance->getOptionXsdTypesPath());

        $instance->setOptionXsdTypesPath('/some/path/file.yml');

        $this->assertSame('/some/path/file.yml', $instance->getOptionXsdTypesPath());
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

        $instance->generatePackage();
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnInvalidComposerName()
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionComposerName('');

        $instance->generatePackage();
    }
    /**
     *
     */
    public function testGenerateBing()
    {
        $this->generate('bing', self::wsdlBingPath());
    }
    /**
     *
     */
    public function testGeneratePartner()
    {
        $this->generate('partner', self::wsdlPartnerPath());
    }
    /**
     *
     */
    public function testGenerateMyBoard()
    {
        $this->generate('myboard', self::wsdlMyBoardPackPath());
    }
    /**
     *
     */
    public function testGenerateOdigeo()
    {
        $this->generate('odigeo', self::wsdlOdigeoPath());
    }
    /**
     *
     */
    public function testGenerateReforma()
    {
        $this->generate('reforma', self::wsdlReformaPath(), false);
    }
    /**
     * @param string $dir
     * @param string $wsdl
     */
    private function generate($dir, $wsdl, $standalone = true)
    {
        Utils::createDirectory($destination = self::getTestDirectory() . $dir);

        $options = GeneratorOptions::instance();
        $options
            ->setGenerateTutorialFile(false)
            ->setAddComments([])
            ->setArraysFolder('ArrayType')
            ->setBasicLogin(null)
            ->setBasicPassword(null)
            ->setCategory(GeneratorOptions::VALUE_CAT)
            ->setComposerName($standalone ? 'wsdltophp/' . $dir : '')
            ->setComposerSettings($standalone ? [
                'require.wsdltophp/wssecurity:~1.0',
                'config.disable-tls:true',
            ] : [])
            ->setDestination($destination)
            ->setEnumsFolder('EnumType')
            ->setGatherMethods(GeneratorOptions::VALUE_START)
            ->setGenerateTutorialFile(true)
            ->setGenericConstantsName(false)
            ->setNamespace('')
            ->setOrigin($wsdl)
            ->setPrefix('')
            ->setProxyHost(null)
            ->setProxyLogin(null)
            ->setProxyPassword(null)
            ->setProxyPort(null)
            ->setServicesFolder('ServiceType')
            ->setSchemasSave(false)
            ->setSchemasFolder('wsdl')
            ->setSoapClientClass('\WsdlToPhp\PackageBase\AbstractSoapClientBase')
            ->setSoapOptions([])
            ->setStandalone($standalone)
            ->setStructArrayClass('\WsdlToPhp\PackageBase\AbstractStructArrayBase')
            ->setStructClass('\WsdlToPhp\PackageBase\AbstractStructBase')
            ->setStructsFolder('StructType')
            ->setSuffix('');

        $generator = new Generator($options);
        $generator->generatePackage();

        $this->assertTrue(is_dir($destination));
        if ($standalone) {
            $this->assertTrue(is_file(sprintf('%s/composer.json', $destination)));
            $this->assertTrue(is_file(sprintf('%s/composer.lock', $destination)));
        }
        $this->assertTrue(is_file(sprintf('%s/tutorial.php', $destination)));
        $this->assertTrue(is_file($generator->getFiles()->getClassmapFile()->getFileName()));
    }
    /**
     *
     */
    public function testGetUrlContent()
    {
        $generator = self::getBingGeneratorInstance();
        $content = $generator->getUrlContent('https://phar.wsdltophp.com/bingsearch.wsdl');
        $this->assertNotNull($content);

        $generator->setOptionSchemasSave(true);
        $generator->setOptionSchemasFolder('wsdl');
        $content = $generator->getUrlContent('https://phar.wsdltophp.com/bingsearch.wsdl');
        $this->assertNotNull($content);
    }
    /**
     *
     */
    public function testGetEmptySoapClientStreamContextOptions()
    {
        $instance = self::getBingGeneratorInstance();

        if (PHP_VERSION_ID < 70015) {
            $this->assertSame([], $instance->getSoapClient()->getSoapClientStreamContextOptions());
        } else {
            $this->assertSame([
                'http' => [
                    'protocol_version' => 1.1000000000000001,
                    'header' => [
                        'Connection: close',
                    ],
                ],
            ], $instance->getSoapClient()->getSoapClientStreamContextOptions());
        }
    }
    /**
     *
     */
    public function testGetSoapClientStreamContextOptions()
    {
        $options = GeneratorOptionsTest::optionsInstance();
        $options
            ->setOrigin(self::onlineWsdlBingPath())
            ->setDestination(self::getTestDirectory())
            ->setSoapOptions([
                AbstractSoapClientBase::WSDL_STREAM_CONTEXT => stream_context_create([
                    'https' => [
                        'X-Header' => 'X-Value',
                    ],
                    'ssl' => [
                        'ca_file' => basename(__FILE__),
                        'ca_path' => __DIR__,
                    ],
                ]),
            ]);
        $instance = new Generator($options);

        // HTTP headers are added to the context options with certain PHP version on certain platform
        // this test is focused on the defined options and not those which are added after
        // so we remove those we are not interested in!
        $contextOptions = $instance->getSoapClient()->getSoapClientStreamContextOptions();
        foreach (array_keys($contextOptions) as $index) {
            if ($index !== 'https' && $index !== 'ssl') {
                unset($contextOptions[$index]);
            }
        }

        $this->assertSame([
            'https' => [
                'X-Header' => 'X-Value',
            ],
            'ssl' => [
                'ca_file' => basename(__FILE__),
                'ca_path' => __DIR__,
            ],
        ], $contextOptions);
    }
    /**
     *
     */
    public function testJsonSerialize()
    {
        $generator = self::getBingGeneratorInstance(true);
        $generator->setOptionStandalone(false);
        $generator->parse();
        $jsonContent = file_get_contents(sprintf('%sjson_serialized.json', self::getTestDirectory()));
        $jsonContent = str_replace([
            '"__ORIGIN__"',
            '"__DESTINATION__"',
        ], [
            json_encode(self::wsdlBingPath()),
            json_encode($generator->getOptionDestination()),
        ], $jsonContent);
        $this->assertSame(trim($jsonContent), trim(json_encode($generator, JSON_PRETTY_PRINT)));
    }
    /**
     *
     */
    public function testGetServices()
    {
        $generator = self::actonGeneratorInstance();
        $this->assertCount(8, $generator->getServices());
        $this->assertCount(8, $generator->getServices()->getMethods());
    }
    /**
     *
     */
    public function testGetServicesGathered()
    {
        $generator = self::actonGeneratorInstance(true, GeneratorOptions::VALUE_NONE);
        $this->assertCount(1, $generator->getServices(true));
        $this->assertCount(8, $generator->getServices()->getMethods());
    }
    /**
     *
     */
    public function testGetStructByNameAndTypeMustReturnAStruct()
    {
        $generator = self::getBingGeneratorInstance();

        $this->assertInstanceOf('\WSdlToPhp\PackageGenerator\Model\Struct', $generator->getStructByNameAndType('AdultOption', 'string'));
    }
    /**
     *
     */
    public function testGetUrlContentMustReturnNull()
    {
        $generator = self::getBingGeneratorInstance();

        $this->assertNull($generator->getUrlContent('my-file.txt'));
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Json is invalid, please check error 4
     */
    public function testinstanceFromSerializedJsonMustThrowAnError()
    {
        Generator::instanceFromSerializedJson('{"the":\'key\'}');
    }
}
