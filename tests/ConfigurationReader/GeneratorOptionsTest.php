<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageBase\AbstractSoapClientBase;
use WsdlToPhp\PackageBase\AbstractStructArrayBase;
use WsdlToPhp\PackageBase\AbstractStructBase;
use WsdlToPhp\PackageBase\AbstractStructEnumBase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class GeneratorOptionsTest extends AbstractTestCase
{
    public static function optionsInstance(): GeneratorOptions
    {
        return clone GeneratorOptions::instance(__DIR__.'/../resources/generator_options.yml');
    }

    public function testParseException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        GeneratorOptions::instance(__DIR__.'/../resources/bad_generator_options.yml');
    }

    public function testGetPrefix(): void
    {
        $this->assertEmpty(self::optionsInstance()->getPrefix());
    }

    public function testSetPrefix(): void
    {
        $instance = self::optionsInstance();
        $instance->setPrefix('MyPrefix');

        $this->assertSame('MyPrefix', $instance->getPrefix());
    }

    public function testGetSuffix(): void
    {
        $this->assertEmpty(self::optionsInstance()->getSuffix());
    }

    public function testSetSuffix(): void
    {
        $instance = self::optionsInstance();
        $instance->setSuffix('MySuffix');

        $this->assertSame('MySuffix', $instance->getSuffix());
    }

    public function testGetDestination(): void
    {
        $this->assertEmpty(self::optionsInstance()->getDestination());
    }

    public function testSetDestination(): void
    {
        $instance = self::optionsInstance();
        $instance->setDestination('/my/destination/');

        $this->assertSame('/my/destination/', $instance->getDestination());
    }

    public function testGetSrcDirname(): void
    {
        $this->assertSame('src', self::optionsInstance()->getSrcDirname());
    }

    public function testSetSrcDirname(): void
    {
        $instance = self::optionsInstance();
        $instance->setSrcDirname('');

        $this->assertSame('', $instance->getSrcDirname());
    }

    public function testGetOrigin(): void
    {
        $this->assertEmpty(self::optionsInstance()->getOrigin());
    }

    public function testSetOrigin(): void
    {
        $instance = self::optionsInstance();
        $instance->setOrigin('/my/path/to/the/wsdl/file.wsdl');

        $this->assertSame('/my/path/to/the/wsdl/file.wsdl', $instance->getOrigin());
    }

    public function testGetBasicLogin(): void
    {
        $this->assertNull(self::optionsInstance()->getBasicLogin());
    }

    public function testSetBasicLogin(): void
    {
        $instance = self::optionsInstance();
        $instance->setBasicLogin('MyLogin');

        $this->assertSame('MyLogin', $instance->getBasicLogin());
    }

    public function testGetBasicPassword(): void
    {
        $this->assertNull(self::optionsInstance()->getBasicPassword());
    }

    public function testSetBasicPassword(): void
    {
        $instance = self::optionsInstance();
        $instance->setBasicPassword('MyPassword');

        $this->assertSame('MyPassword', $instance->getBasicPassword());
    }

    public function testGetProxyHost(): void
    {
        $this->assertNull(self::optionsInstance()->getProxyHost());
    }

    public function testSetProxyHost(): void
    {
        $instance = self::optionsInstance();
        $instance->setProxyHost('MyProxyHost');

        $this->assertSame('MyProxyHost', $instance->getProxyHost());
    }

    public function testGetProxyPort(): void
    {
        $this->assertNull(self::optionsInstance()->getProxyPort());
    }

    public function testSetProxyPort(): void
    {
        $instance = self::optionsInstance();
        $instance->setProxyPort(3225);

        $this->assertSame(3225, $instance->getProxyPort());
    }

    public function testGetProxyLogin(): void
    {
        $this->assertNull(self::optionsInstance()->getProxyLogin());
    }

    public function testSetProxyLogin(): void
    {
        $instance = self::optionsInstance();
        $instance->setProxyLogin('MyProxyLogin');

        $this->assertSame('MyProxyLogin', $instance->getProxyLogin());
    }

    public function testGetProxyPassword(): void
    {
        $this->assertNull(self::optionsInstance()->getProxyPassword());
    }

    public function testSetProxyPassword(): void
    {
        $instance = self::optionsInstance();
        $instance->setProxyPassword('MyProxyPassword');

        $this->assertSame('MyProxyPassword', $instance->getProxyPassword());
    }

    public function testGetSoapOptions(): void
    {
        $this->assertEmpty(self::optionsInstance()->getSoapOptions());
    }

    public function testSetSoapOptions(): void
    {
        $soapOptions = [
            'trace' => true,
            'soap_version' => SOAP_1_2,
        ];
        $instance = self::optionsInstance();
        $instance->setSoapOptions($soapOptions);

        $this->assertSame($soapOptions, $instance->getSoapOptions());
    }

    public function testGetCategory(): void
    {
        $this->assertSame(GeneratorOptions::VALUE_CAT, self::optionsInstance()->getCategory());
    }

    public function testSetCategory(): void
    {
        $instance = self::optionsInstance();
        $instance->setCategory(GeneratorOptions::VALUE_NONE);

        $this->assertSame(GeneratorOptions::VALUE_NONE, $instance->getCategory());
    }

    public function testGetGatherMethods(): void
    {
        $this->assertSame(GeneratorOptions::VALUE_START, self::optionsInstance()->getGatherMethods());
    }

    public function testSetGatherMethods(): void
    {
        $instance = self::optionsInstance();
        $instance->setGatherMethods(GeneratorOptions::VALUE_END);

        $this->assertSame(GeneratorOptions::VALUE_END, $instance->getGatherMethods());
    }

    public function testSetGatherMethodsNone(): void
    {
        $instance = self::optionsInstance();
        $instance->setGatherMethods(GeneratorOptions::VALUE_NONE);

        $this->assertSame(GeneratorOptions::VALUE_NONE, $instance->getGatherMethods());
    }

    public function testGetGenericConstantsName(): void
    {
        $this->assertFalse(self::optionsInstance()->getGenericConstantsNames());
    }

    public function testSetGenericConstantsName(): void
    {
        $instance = self::optionsInstance();
        $instance->setGenericConstantsNames(GeneratorOptions::VALUE_TRUE);

        $this->assertTrue($instance->getGenericConstantsNames());
    }

    public function testGetGenerateTutorialFile(): void
    {
        $this->assertTrue(self::optionsInstance()->getGenerateTutorialFile());
    }

    public function testSetGenerateTutorialFile(): void
    {
        $instance = self::optionsInstance();
        $instance->setGenerateTutorialFile(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getGenerateTutorialFile());
    }

    public function testGetAddComments(): void
    {
        $comments = [
            'release' => '1.0.2',
            'date' => '2015-09-08',
        ];

        $instance = self::optionsInstance();
        $instance->setAddComments($comments);

        $this->assertSame($comments, $instance->getAddComments());
    }

    public function testSetAddCommentsSimple(): void
    {
        $comments = [
            'release' => '1.0.2',
            'date' => '2015-09-08',
        ];

        $instance = self::optionsInstance();
        $instance->setAddComments([
            'release:1.0.2',
            'date:2015-09-08',
        ]);

        $this->assertSame($comments, $instance->getAddComments());
    }

    public function testSetAddComments(): void
    {
        $comments = [
            'release' => '1.0.2',
            'date' => '2015-09-08',
        ];

        $instance = self::optionsInstance();
        $instance->setAddComments($comments);

        $this->assertSame($comments, $instance->getAddComments());
    }

    public function testGetNamespace(): void
    {
        $this->assertSame('', self::optionsInstance()->getNamespace());
    }

    public function testSetNamespace(): void
    {
        $instance = self::optionsInstance();
        $instance->setNamespace('\My\Project');

        $this->assertSame('\My\Project', $instance->getNamespace());
    }

    public function testGetNamespaceDictatesDirectories(): void
    {
        $this->assertSame(true, self::optionsInstance()->getNamespaceDictatesDirectories());
    }

    public function testSetNamespaceDictatesDirectories(): void
    {
        $instance = self::optionsInstance();
        $instance->setNamespaceDictatesDirectories(false);

        $this->assertSame(false, $instance->getNamespaceDictatesDirectories());
    }

    public function testGetStandalone(): void
    {
        $this->assertTrue(self::optionsInstance()->getStandalone());
    }

    public function testSetStandalone(): void
    {
        $instance = self::optionsInstance();
        $instance->setStandalone(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getStandalone());
    }

    public function testGetValidation(): void
    {
        $this->assertTrue(self::optionsInstance()->getValidation());
    }

    public function testSetValidation(): void
    {
        $instance = self::optionsInstance();
        $instance->setValidation(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getValidation());
    }

    public function testGetStructClass(): void
    {
        $this->assertSame(AbstractStructBase::class, self::optionsInstance()->getStructClass());
    }

    public function testSetStructClass(): void
    {
        $instance = self::optionsInstance();
        $instance->setStructClass('\My\Project\StructClass');

        $this->assertSame('\My\Project\StructClass', $instance->getStructClass());
    }

    public function testGetStructArrayClass(): void
    {
        $this->assertSame(AbstractStructArrayBase::class, self::optionsInstance()->getStructArrayClass());
    }

    public function testSetStructArrayClass(): void
    {
        $instance = self::optionsInstance();
        $instance->setStructArrayClass('\My\Project\StructArrayClass');

        $this->assertSame('\My\Project\StructArrayClass', $instance->getStructArrayClass());
    }

    public function testGetStructEnumClass(): void
    {
        $this->assertSame(AbstractStructEnumBase::class, self::optionsInstance()->getStructEnumClass());
    }

    public function testSetStructEnumClass(): void
    {
        $instance = self::optionsInstance();
        $instance->setStructEnumClass('\My\Project\StructEnumClass');

        $this->assertSame('\My\Project\StructEnumClass', $instance->getStructEnumClass());
    }

    public function testGetSoapClientClass(): void
    {
        $this->assertSame(AbstractSoapClientBase::class, self::optionsInstance()->getSoapClientClass());
    }

    public function testSetSoapClientClass(): void
    {
        $instance = self::optionsInstance();
        $instance->setSoapClientClass('\My\Project\SoapClientClass');

        $this->assertSame('\My\Project\SoapClientClass', $instance->getSoapClientClass());
    }

    public function testGetComposerName(): void
    {
        $this->assertSame('', self::optionsInstance()->getComposerName());
    }

    public function testSetComposerName(): void
    {
        $instance = self::optionsInstance();
        $instance->setComposerName('foo/bar');

        $this->assertSame('foo/bar', $instance->getComposerName());
    }

    public function testGetComposerSettings(): void
    {
        $this->assertSame([], self::optionsInstance()->getComposerSettings());
    }

    public function testSetComposerSettings(): void
    {
        $instance = self::optionsInstance();
        $instance->setComposerSettings([
            'config.disable-tls:true',
            'config.data-dir:/src/foor/bar',
            'require.wsdltophp/packagebase:dev-master',
            'autoload' => [
                'psr-4' => [
                    'Acme\\' => 'src/',
                ],
            ],
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
        ], $instance->getComposerSettings());
    }

    public function testGetStructsFolder(): void
    {
        $this->assertSame('StructType', self::optionsInstance()->getStructsFolder());
    }

    public function testSetStructsFolder(): void
    {
        $instance = self::optionsInstance();
        $instance->setStructsFolder('Structs');

        $this->assertSame('Structs', $instance->getStructsFolder());
    }

    public function testGetEnumsFolder(): void
    {
        $this->assertSame('EnumType', self::optionsInstance()->getEnumsFolder());
    }

    public function testSetEnumsFolder(): void
    {
        $instance = self::optionsInstance();
        $instance->setEnumsFolder('Enums');

        $this->assertSame('Enums', $instance->getEnumsFolder());
    }

    public function testGetArraysFolder(): void
    {
        $this->assertSame('ArrayType', self::optionsInstance()->getArraysFolder());
    }

    public function testSetArraysFolder(): void
    {
        $instance = self::optionsInstance();
        $instance->setArraysFolder('Arrays');

        $this->assertSame('Arrays', $instance->getArraysFolder());
    }

    public function testGetServicesFolder(): void
    {
        $this->assertSame('ServiceType', self::optionsInstance()->getServicesFolder());
    }

    public function testSetServicesFolder(): void
    {
        $instance = self::optionsInstance();
        $instance->setServicesFolder('Services');

        $this->assertSame('Services', $instance->getServicesFolder());
    }

    public function testSetSchemasSave(): void
    {
        $instance = self::optionsInstance();
        $instance->setSchemasSave(false);

        $this->assertSame(false, $instance->getSchemasSave());
    }

    public function testSetSchemasFolder(): void
    {
        $instance = self::optionsInstance();
        $instance->setSchemasFolder('wsdl');

        $this->assertSame('wsdl', $instance->getSchemasFolder());
    }

    public function testSetExistingOptionValue(): void
    {
        $instance = self::optionsInstance();
        $instance->setOptionValue('category', 'cat');
        $this->assertEquals('cat', $instance->getOptionValue('category'));
        $instance->setCategory('none');
        $this->assertEquals('none', $instance->getOptionValue('category'));
    }

    public function testSetExistingOptionValueWithInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        self::optionsInstance()->setOptionValue('category', 'null');
        self::optionsInstance()->setCategory(null);
    }

    public function testSetUnexistingOptionValue(): void
    {
        $newOptionKey = 'new_option';
        $instance = self::optionsInstance();

        $instance->setOptionValue($newOptionKey, '1', [0, 1, 2]);

        $this->assertEquals(1, $instance->getOptionValue($newOptionKey));
    }

    public function testSetUnexistingOptionValueWithInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        self::optionsInstance()->setGenerateTutorialFile('null');
    }

    public function testGetUnexistingOptionValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        self::optionsInstance()->getOptionValue('myOption');
    }

    public function testToArray(): void
    {
        $this->assertSame([
            'category' => 'cat',
            'gather_methods' => 'start',
            'generic_constants_names' => false,
            'generate_tutorial_file' => true,
            'add_comments' => [],
            'namespace_prefix' => '',
            'namespace_dictates_directories' => true,
            'standalone' => true,
            'validation' => true,
            'struct_class' => AbstractStructBase::class,
            'struct_array_class' => AbstractStructArrayBase::class,
            'struct_enum_class' => AbstractStructEnumBase::class,
            'soap_client_class' => AbstractSoapClientBase::class,
            'origin' => '',
            'destination' => '',
            'src_dirname' => 'src',
            'prefix' => '',
            'suffix' => '',
            'basic_login' => null,
            'basic_password' => null,
            'proxy_host' => null,
            'proxy_port' => null,
            'proxy_login' => null,
            'proxy_password' => null,
            'soap_options' => [],
            'composer_name' => '',
            'composer_settings' => [],
            'structs_folder' => 'StructType',
            'arrays_folder' => 'ArrayType',
            'enums_folder' => 'EnumType',
            'services_folder' => 'ServiceType',
            'schemas_save' => false,
            'schemas_folder' => 'wsdl',
            'xsd_types_path' => '',
        ], self::optionsInstance()->toArray());
    }

    public function testJsonSerialize(): void
    {
        $this->assertSame([
            'category' => 'cat',
            'gather_methods' => 'start',
            'generic_constants_names' => false,
            'generate_tutorial_file' => true,
            'add_comments' => [],
            'namespace_prefix' => '',
            'namespace_dictates_directories' => true,
            'standalone' => true,
            'validation' => true,
            'struct_class' => AbstractStructBase::class,
            'struct_array_class' => AbstractStructArrayBase::class,
            'struct_enum_class' => AbstractStructEnumBase::class,
            'soap_client_class' => AbstractSoapClientBase::class,
            'origin' => '',
            'destination' => '',
            'src_dirname' => 'src',
            'prefix' => '',
            'suffix' => '',
            'basic_login' => null,
            'basic_password' => null,
            'proxy_host' => null,
            'proxy_port' => null,
            'proxy_login' => null,
            'proxy_password' => null,
            'soap_options' => [],
            'composer_name' => '',
            'composer_settings' => [],
            'structs_folder' => 'StructType',
            'arrays_folder' => 'ArrayType',
            'enums_folder' => 'EnumType',
            'services_folder' => 'ServiceType',
            'schemas_save' => false,
            'schemas_folder' => 'wsdl',
            'xsd_types_path' => '',
        ], self::optionsInstance()->jsonSerialize());
    }
}
