<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageBase\AbstractSoapClientBase;
use WsdlToPhp\PackageBase\AbstractStructArrayBase;
use WsdlToPhp\PackageBase\AbstractStructBase;
use WsdlToPhp\PackageBase\AbstractStructEnumBase;
use WsdlToPhp\PackageBase\SoapClientInterface;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PackageGenerator\Tests\ConfigurationReader\GeneratorOptionsTest;

/**
 * @internal
 * @coversDefaultClass
 */
final class GeneratorTest extends AbstractTestCase
{
    private static Generator $localInstance;

    public static function localInstance(): Generator
    {
        if (!isset(self::$localInstance)) {
            $options = GeneratorOptionsTest::optionsInstance();
            $options
                ->setOrigin(self::wsdlBingPath())
                ->setDestination(self::getTestDirectory())
            ;
            self::$localInstance = new Generator($options);
        }

        return self::$localInstance;
    }

    public function testGetOptionPrefix(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionPrefix());
    }

    public function testSetOptionPrefix(): void
    {
        $instance = self::localInstance();
        $instance->setOptionPrefix('MyPrefix');

        $this->assertSame('MyPrefix', $instance->getOptionPrefix());
    }

    public function testGetOptionSuffix(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionSuffix());
    }

    public function testSetOptionSuffix(): void
    {
        $instance = self::localInstance();
        $instance->setOptionSuffix('MySuffix');

        $this->assertSame('MySuffix', $instance->getOptionSuffix());
    }

    public function testGetOptionDestination(): void
    {
        $this->assertSame(self::getTestDirectory(), self::localInstance()->getOptionDestination());
    }

    public function testSetOptionDestination(): void
    {
        $instance = self::localInstance();
        $instance->setOptionDestination(self::getTestDirectory());

        $this->assertSame(self::getTestDirectory(), $instance->getOptionDestination());
    }

    public function testGetOptionSrcDirname(): void
    {
        $this->assertSame('src', self::localInstance()->getOptionSrcDirname());
    }

    public function testSetOptionSrcDirname(): void
    {
        $instance = self::localInstance();
        $instance->setOptionSrcDirname('');

        $this->assertSame('', $instance->getOptionSrcDirname());
    }

    public function testGetOptionOrigin(): void
    {
        $this->assertSame(self::wsdlBingPath(), self::localInstance()->getOptionOrigin());
    }

    public function testSetOptionOrigin(): void
    {
        $instance = self::localInstance();
        $instance->setOptionOrigin(self::wsdlOdigeoPath());

        $this->assertSame(self::wsdlOdigeoPath(), $instance->getOptionOrigin());
    }

    public function testGetOptionBasicLogin(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionBasicLogin());
    }

    public function testSetOptionBasicLogin(): void
    {
        $instance = self::localInstance();
        $instance->setOptionBasicLogin('MyLogin');

        $this->assertSame('MyLogin', $instance->getOptionBasicLogin());
    }

    public function testGetOptionBasicPassword(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionBasicPassword());
    }

    public function testSetOptionBasicPassword(): void
    {
        $instance = self::localInstance();
        $instance->setOptionBasicPassword('MyPassword');

        $this->assertSame('MyPassword', $instance->getOptionBasicPassword());
    }

    public function testGetOptionProxyHost(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionProxyHost());
    }

    public function testSetOptionProxyHost(): void
    {
        $instance = self::localInstance();
        $instance->setOptionProxyHost('MyProxyHost');

        $this->assertSame('MyProxyHost', $instance->getOptionProxyHost());
    }

    public function testGetOptionProxyPort(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionProxyPort());
    }

    public function testSetOptionProxyPort(): void
    {
        $instance = self::localInstance();
        $instance->setOptionProxyPort(3225);

        $this->assertSame(3225, $instance->getOptionProxyPort());
    }

    public function testGetOptionProxyLogin(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionProxyLogin());
    }

    public function testSetOptionProxyLogin(): void
    {
        $instance = self::localInstance();
        $instance->setOptionProxyLogin('MyProxyLogin');

        $this->assertSame('MyProxyLogin', $instance->getOptionProxyLogin());
    }

    public function testGetOptionProxyPassword(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionProxyPassword());
    }

    public function testSetOptionProxyPassword(): void
    {
        $instance = self::localInstance();
        $instance->setOptionProxyPassword('MyProxyPassword');

        $this->assertSame('MyProxyPassword', $instance->getOptionProxyPassword());
    }

    public function testGetOptionSoapOptions(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionSoapOptions());
    }

    public function testSetOptionSoapOptions(): void
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

    public function testGetOptionCategory(): void
    {
        $this->assertSame(GeneratorOptions::VALUE_CAT, self::localInstance()->getOptionCategory());
    }

    public function testSetOptionCategory(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionCategory(GeneratorOptions::VALUE_NONE);

        $this->assertSame(GeneratorOptions::VALUE_NONE, $instance->getOptionCategory());
    }

    public function testGetOptionGatherMethods(): void
    {
        $this->assertSame(GeneratorOptions::VALUE_START, self::localInstance()->getOptionGatherMethods());
    }

    public function testSetOptionGatherMethods(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionGatherMethods(GeneratorOptions::VALUE_END);

        $this->assertSame(GeneratorOptions::VALUE_END, $instance->getOptionGatherMethods());
    }

    public function testGetOptionGenerateTutorialFile(): void
    {
        $this->assertTrue(self::localInstance()->getOptionGenerateTutorialFile());
    }

    public function testSetOptionGenerateTutorialFile(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionGenerateTutorialFile(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getOptionGenerateTutorialFile());
    }

    public function testGetOptionGenericConstantsNames(): void
    {
        $this->assertFalse(self::localInstance()->getOptionGenericConstantsNames());
    }

    public function testSetOptionGenericConstantsNames(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionGenericConstantsNames(GeneratorOptions::VALUE_TRUE);

        $this->assertTrue($instance->getOptionGenericConstantsNames());
    }

    public function testGetOptionNamespacePrefix(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionNamespacePrefix());
    }

    public function testSetOptionNamespacePrefix(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionNamespacePrefix('My\Project');

        $this->assertSame('My\Project', $instance->getOptionNamespacePrefix());
    }

    public function testGetOptionNamespaceDictatesDirectories(): void
    {
        $this->assertTrue(self::localInstance()->getOptionNamespaceDictatesDirectories());
    }

    public function testSetOptionNamespaceDictatesDirectories(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionNamespaceDictatesDirectories(false);

        $this->assertSame(false, $instance->getOptionNamespaceDictatesDirectories());
    }

    public function testGetOptionSoapClientClass(): void
    {
        $this->assertSame(AbstractSoapClientBase::class, self::localInstance()->getOptionSoapClientClass());
    }

    public function testSetOptionSoapClientClass(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionSoapClientClass('My\Project\SoapClientClass');

        $this->assertSame('My\Project\SoapClientClass', $instance->getOptionSoapClientClass());
    }

    public function testGetOptionStructClass(): void
    {
        $this->assertSame(AbstractStructBase::class, self::localInstance()->getOptionStructClass());
    }

    public function testSetOptionStructClass(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructClass('My\Project\StructClass');

        $this->assertSame('My\Project\StructClass', $instance->getOptionStructClass());
    }

    public function testGetOptionStructArrayClass(): void
    {
        $this->assertSame(AbstractStructArrayBase::class, self::localInstance()->getOptionStructArrayClass());
    }

    public function testSetOptionStructArrayClass(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructArrayClass('My\Project\StructArrayClass');

        $this->assertSame('My\Project\StructArrayClass', $instance->getOptionStructArrayClass());
    }

    public function testGetOptionStructEnumClass(): void
    {
        $this->assertSame(AbstractStructEnumBase::class, self::localInstance()->getOptionStructEnumClass());
    }

    public function testSetOptionStructEnumClass(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructEnumClass('My\Project\StructEnumClass');

        $this->assertSame('My\Project\StructEnumClass', $instance->getOptionStructEnumClass());
    }

    public function testGetOptionStandalone(): void
    {
        $this->assertTrue(self::localInstance()->getOptionStandalone());
    }

    public function testSetOptionStandalone(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStandalone(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getOptionStandalone());
    }

    public function testGetOptionValidation(): void
    {
        $this->assertTrue(self::localInstance()->getOptionValidation());
    }

    public function testSetOptionValidation(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionValidation(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getOptionValidation());
    }

    public function testGetOptionAddComments(): void
    {
        $this->assertEmpty(self::localInstance()->getOptionAddComments());
    }

    public function testSetOptionAddComments(): void
    {
        $comments = [
            'date' => '2015-09-07',
            'release' => '1.3.0',
        ];
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionAddComments($comments);

        $this->assertSame($comments, $instance->getOptionAddComments());
    }

    public function testSetPackageName(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionPrefix('samplePackageName');

        $this->assertSame('samplePackageName', $instance->getOptionPrefix(false));
    }

    public function testSetOptionComposerName(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionComposerName('foo/bar');

        $this->assertSame('foo/bar', $instance->getOptionComposerName());
    }

    public function testSetOptionComposerSettings(): void
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

    public function testSetStructsFolder(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionStructsFolder('Structs');

        $this->assertSame('Structs', $instance->getOptionStructsFolder());
    }

    public function testSetArraysFolder(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionArraysFolder('Arrays');

        $this->assertSame('Arrays', $instance->getOptionArraysFolder());
    }

    public function testSetEnumsFolder(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionEnumsFolder('Enums');

        $this->assertSame('Enums', $instance->getOptionEnumsFolder());
    }

    public function testSetServicesFolder(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionServicesFolder('Services');

        $this->assertSame('Services', $instance->getOptionServicesFolder());
    }

    public function testSetSchemasSave(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionSchemasSave(false);

        $this->assertSame(false, $instance->getOptionSchemasSave());
    }

    public function testSetSchemasFolder(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionSchemasFolder('wsdl');

        $this->assertSame('wsdl', $instance->getOptionSchemasFolder());
    }

    public function testOptionXsdTypesPath(): void
    {
        $instance = self::localInstance();

        $this->assertEmpty($instance->getOptionXsdTypesPath());

        $instance->setOptionXsdTypesPath('/some/path/file.yml');

        $this->assertSame('/some/path/file.yml', $instance->getOptionXsdTypesPath());
    }

    public function testSetPackageNameUcFirst(): void
    {
        $instance = self::getBingGeneratorInstance();
        $instance->setOptionPrefix('samplePackageName');

        $this->assertSame('SamplePackageName', $instance->getOptionPrefix(true));
    }

    public function testExceptionOnInvalidDestination(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getBingGeneratorInstance();
        $instance->setOptionDestination('');

        $instance->generatePackage();
    }

    public function testExceptionOnInvalidComposerName(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getBingGeneratorInstance();
        $instance->setOptionComposerName('');

        $instance->generatePackage();
    }

    public function testGenerateBing(): void
    {
        $this->generate('bing', self::wsdlBingPath());
    }

    public function testGeneratePartner(): void
    {
        $this->generate('partner', self::wsdlPartnerPath());
    }

    public function testGenerateMyBoard(): void
    {
        $this->generate('myboard', self::wsdlMyBoardPackPath());
    }

    public function testGenerateOdigeo(): void
    {
        $this->generate('odigeo', self::wsdlOdigeoPath());
    }

    public function testGenerateReforma(): void
    {
        $this->generate('reforma', self::wsdlReformaPath(), false);
    }

    public function testGetUrlContent(): void
    {
        $generator = self::getBingGeneratorInstance();
        $content = $generator->getUrlContent('https://phar.wsdltophp.com/bingsearch.wsdl');
        $this->assertNotNull($content);

        $generator->setOptionSchemasSave(true);
        $generator->setOptionSchemasFolder('wsdl');
        $content = $generator->getUrlContent('https://phar.wsdltophp.com/bingsearch.wsdl');
        $this->assertNotNull($content);
    }

    public function testGetEmptySoapClientStreamContextOptions(): void
    {
        $instance = self::getBingGeneratorInstance();

        if (PHP_VERSION_ID < 70015 || PHP_VERSION_ID >= 80100) {
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

    public function testGetSoapClientStreamContextOptions(): void
    {
        $options = GeneratorOptionsTest::optionsInstance();
        $options
            ->setOrigin(self::onlineWsdlBingPath())
            ->setDestination(self::getTestDirectory())
            ->setSoapOptions([
                SoapClientInterface::WSDL_STREAM_CONTEXT => stream_context_create($headers = [
                    'https' => [
                        'X-Header' => 'X-Value',
                    ],
                    'ssl' => [
                        'ca_file' => basename(__FILE__),
                        'ca_path' => __DIR__,
                    ],
                ]),
            ])
        ;
        $instance = new Generator($options);

        // HTTP headers are added to the context options with certain PHP version on certain platform
        // this test is focused on the defined options and not those which are added after
        // so we remove those we are not interested in!
        $contextOptions = $instance->getSoapClient()->getSoapClientStreamContextOptions();
        foreach (array_keys($contextOptions) as $index) {
            if ('https' !== $index && 'ssl' !== $index) {
                unset($contextOptions[$index]);
            }
        }

        if (PHP_VERSION_ID >= 80100) {
            $this->assertSame([], $contextOptions);
        } else {
            $this->assertSame($headers, $contextOptions);
        }
    }

    public function testJsonSerialize(): void
    {
        $generator = self::getBingGeneratorInstance(true);
        $generator->setOptionStandalone(false);
        $generator->parse();
        $jsonContent = file_get_contents(sprintf('%sjson_serialized.json', self::getTestDirectory()));
        $jsonContent = str_replace([
            '"__ORIGIN__"',
            '"__DESTINATION__"',
        ], [
            json_encode(self::wsdlBingPath(), JSON_THROW_ON_ERROR),
            json_encode($generator->getOptionDestination(), JSON_THROW_ON_ERROR),
        ], $jsonContent);
        $this->assertSame(trim($jsonContent), trim(json_encode($generator, JSON_PRETTY_PRINT)));
    }

    public function testGetServices(): void
    {
        $generator = self::actonGeneratorInstance();
        $this->assertCount(8, $generator->getServices());
        $this->assertCount(8, $generator->getServices()->getMethods());
    }

    public function testGetServicesGathered(): void
    {
        $generator = self::actonGeneratorInstance(true, GeneratorOptions::VALUE_NONE);
        $this->assertCount(1, $generator->getServices(true));
        $this->assertCount(8, $generator->getServices()->getMethods());
    }

    public function testGetStructByNameAndTypeMustReturnAStruct(): void
    {
        $generator = self::getBingGeneratorInstance();

        $this->assertInstanceOf(Struct::class, $generator->getStructByNameAndType('AdultOption', 'string'));
    }

    public function testGetUrlContentMustReturnNull(): void
    {
        $generator = self::getBingGeneratorInstance();

        $this->assertNull($generator->getUrlContent('my-file.txt'));
    }

    public function testInstanceFromSerializedJsonMustThrowAnError(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Json is invalid, please check error 4');

        Generator::instanceFromSerializedJson('{"the":\'key\'}');
    }

    /**
     * @param string $dir
     * @param string $wsdl
     * @param mixed  $standalone
     */
    private function generate($dir, $wsdl, $standalone = true)
    {
        Utils::createDirectory($destination = self::getTestDirectory().$dir);

        /** @var GeneratorOptions $options */
        $options = GeneratorOptions::instance();
        $options
            ->setGenerateTutorialFile(false)
            ->setAddComments([])
            ->setArraysFolder('ArrayType')
            ->setBasicLogin('')
            ->setBasicPassword('')
            ->setCategory(GeneratorOptions::VALUE_CAT)
            ->setComposerName($standalone ? 'wsdltophp/'.$dir : '')
            ->setComposerSettings($standalone ? [
                'require.wsdltophp/wssecurity:dev-master',
                'config.disable-tls:true',
            ] : [])
            ->setDestination($destination)
            ->setEnumsFolder('EnumType')
            ->setGatherMethods(GeneratorOptions::VALUE_START)
            ->setGenerateTutorialFile(true)
            ->setGenericConstantsNames(false)
            ->setNamespace('')
            ->setNamespaceDictatesDirectories(true)
            ->setOrigin($wsdl)
            ->setPrefix('')
            ->setProxyHost('')
            ->setProxyLogin('')
            ->setProxyPassword('')
            ->setProxyPort('')
            ->setServicesFolder('ServiceType')
            ->setSchemasSave(false)
            ->setSchemasFolder('wsdl')
            ->setSoapClientClass(AbstractSoapClientBase::class)
            ->setSoapOptions([])
            ->setStandalone($standalone)
            ->setStructArrayClass(AbstractStructArrayBase::class)
            ->setStructClass(AbstractStructBase::class)
            ->setStructsFolder('StructType')
            ->setSuffix('')
        ;

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
}
