<?php

namespace WsdlToPhp\PackageGenerator\Tests\ConfigurationReader;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

class GeneratorOptionsTest extends TestCase
{
    /**
     * @return GeneratorOptions
     */
    public static function optionsInstance()
    {
        $options = clone GeneratorOptions::instance(__DIR__ . '/../resources/generator_options.yml');
        return $options;
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public static function testParseException()
    {
        GeneratorOptions::instance(__DIR__ . '/../resources/bad_generator_options.yml');
    }
    /**
     *
     */
    public function testGetPrefix()
    {
        $this->assertEmpty(self::optionsInstance()->getPrefix());
    }
    /**
     *
     */
    public function testSetPrefix()
    {
        $instance = self::optionsInstance();
        $instance->setPrefix('MyPrefix');

        $this->assertSame('MyPrefix', $instance->getPrefix());
    }
    /**
     *
     */
    public function testGetSuffix()
    {
        $this->assertEmpty(self::optionsInstance()->getSuffix());
    }
    /**
     *
     */
    public function testSetSuffix()
    {
        $instance = self::optionsInstance();
        $instance->setSuffix('MySuffix');

        $this->assertSame('MySuffix', $instance->getSuffix());
    }
    /**
     *
     */
    public function testGetDestination()
    {
        $this->assertEmpty(self::optionsInstance()->getDestination());
    }
    /**
     *
     */
    public function testSetDestination()
    {
        $instance = self::optionsInstance();
        $instance->setDestination('/my/destination/');

        $this->assertSame('/my/destination/', $instance->getDestination());
    }
    /**
     *
     */
    public function testGetSrcDirname()
    {
        $this->assertSame('src', self::optionsInstance()->getSrcDirname());
    }
    /**
     *
     */
    public function testSetSrcDirname()
    {
        $instance = self::optionsInstance();
        $instance->setSrcDirName('');

        $this->assertSame('', $instance->getSrcDirname());
    }
    /**
     *
     */
    public function testGetOrigin()
    {
        $this->assertEmpty(self::optionsInstance()->getOrigin());
    }
    /**
     *
     */
    public function testSetOrigin()
    {
        $instance = self::optionsInstance();
        $instance->setOrigin('/my/path/to/the/wsdl/file.wsdl');

        $this->assertSame('/my/path/to/the/wsdl/file.wsdl', $instance->getOrigin());
    }
    /**
     *
     */
    public function testGetBasicLogin()
    {
        $this->assertNull(self::optionsInstance()->getBasicLogin());
    }
    /**
     *
     */
    public function testSetBasicLogin()
    {
        $instance = self::optionsInstance();
        $instance->setBasicLogin('MyLogin');

        $this->assertSame('MyLogin', $instance->getBasicLogin());
    }
    /**
     *
     */
    public function testGetBasicPassword()
    {
        $this->assertNull(self::optionsInstance()->getBasicPassword());
    }
    /**
     *
     */
    public function testSetBasicPassword()
    {
        $instance = self::optionsInstance();
        $instance->setBasicPassword('MyPassword');

        $this->assertSame('MyPassword', $instance->getBasicPassword());
    }
    /**
     *
     */
    public function testGetProxyHost()
    {
        $this->assertNull(self::optionsInstance()->getProxyHost());
    }
    /**
     *
     */
    public function testSetProxyHost()
    {
        $instance = self::optionsInstance();
        $instance->setProxyHost('MyProxyHost');

        $this->assertSame('MyProxyHost', $instance->getProxyHost());
    }
    /**
     *
     */
    public function testGetProxyPort()
    {
        $this->assertNull(self::optionsInstance()->getProxyPort());
    }
    /**
     *
     */
    public function testSetProxyPort()
    {
        $instance = self::optionsInstance();
        $instance->setProxyPort(3225);

        $this->assertSame(3225, $instance->getProxyPort());
    }
    /**
     *
     */
    public function testGetProxyLogin()
    {
        $this->assertNull(self::optionsInstance()->getProxyLogin());
    }
    /**
     *
     */
    public function testSetProxyLogin()
    {
        $instance = self::optionsInstance();
        $instance->setProxyLogin('MyProxyLogin');

        $this->assertSame('MyProxyLogin', $instance->getProxyLogin());
    }
    /**
     *
     */
    public function testGetProxyPassword()
    {
        $this->assertNull(self::optionsInstance()->getProxyPassword());
    }
    /**
     *
     */
    public function testSetProxyPassword()
    {
        $instance = self::optionsInstance();
        $instance->setProxyPassword('MyProxyPassword');

        $this->assertSame('MyProxyPassword', $instance->getProxyPassword());
    }
    /**
     *
     */
    public function testGetSoapOptions()
    {
        $this->assertEmpty(self::optionsInstance()->getSoapOptions());
    }
    /**
     *
     */
    public function testSetSoapOptions()
    {
        $soapOptions = [
            'trace' => true,
            'soap_version' => SOAP_1_2,
        ];
        $instance = self::optionsInstance();
        $instance->setSoapOptions($soapOptions);

        $this->assertSame($soapOptions, $instance->getSoapOptions());
    }
    /**
     *
     */
    public function testGetCategory()
    {
        $this->assertSame(GeneratorOptions::VALUE_CAT, self::optionsInstance()->getCategory());
    }
    /**
     *
     */
    public function testSetCategory()
    {
        $instance = self::optionsInstance();
        $instance->setCategory(GeneratorOptions::VALUE_NONE);

        $this->assertSame(GeneratorOptions::VALUE_NONE, $instance->getCategory());
    }
    /**
     *
     */
    public function testGetGatherMethods()
    {
        $this->assertSame(GeneratorOptions::VALUE_START, self::optionsInstance()->getGatherMethods());
    }
    /**
     *
     */
    public function testSetGatherMethods()
    {
        $instance = self::optionsInstance();
        $instance->setGatherMethods(GeneratorOptions::VALUE_END);

        $this->assertSame(GeneratorOptions::VALUE_END, $instance->getGatherMethods());
    }
    /**
     *
     */
    public function testSetGatherMethodsNone()
    {
        $instance = self::optionsInstance();
        $instance->setGatherMethods(GeneratorOptions::VALUE_NONE);

        $this->assertSame(GeneratorOptions::VALUE_NONE, $instance->getGatherMethods());
    }
    /**
     *
     */
    public function testGetGenericConstantsName()
    {
        $this->assertFalse(self::optionsInstance()->getGenericConstantsName());
    }
    /**
     *
     */
    public function testSetGenericConstantsName()
    {
        $instance = self::optionsInstance();
        $instance->setGenericConstantsName(GeneratorOptions::VALUE_TRUE);

        $this->assertTrue($instance->getGenericConstantsName());
    }
    /**
     *
     */
    public function testGetGenerateTutorialFile()
    {
        $this->assertTrue(self::optionsInstance()->getGenerateTutorialFile());
    }
    /**
     *
     */
    public function testSetGenerateTutorialFile()
    {
        $instance = self::optionsInstance();
        $instance->setGenerateTutorialFile(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getGenerateTutorialFile());
    }
    /**
     *
     */
    public function testGetAddComments()
    {
        $comments = [
            'release' => '1.0.2',
            'date' => '2015-09-08',
        ];

        $instance = self::optionsInstance();
        $instance->setAddComments($comments);

        $this->assertSame($comments, $instance->getAddComments());
    }
    /**
     *
     */
    public function testSetAddCommentsSimple()
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
    /**
     *
     */
    public function testSetAddComments()
    {
        $comments = [
            'release' => '1.0.2',
            'date' => '2015-09-08',
        ];

        $instance = self::optionsInstance();
        $instance->setAddComments($comments);

        $this->assertSame($comments, $instance->getAddComments());
    }
    /**
     *
     */
    public function testGetNamespace()
    {
        $this->assertSame('', self::optionsInstance()->getNamespace());
    }
    /**
     *
     */
    public function testSetNamespace()
    {
        $instance = self::optionsInstance();
        $instance->setNamespace('\My\Project');

        $this->assertSame('\My\Project', $instance->getNamespace());
    }
    /**
     *
     */
    public function testGetStandalone()
    {
        $this->assertTrue(self::optionsInstance()->getStandalone());
    }
    /**
     *
     */
    public function testSetStandalone()
    {
        $instance = self::optionsInstance();
        $instance->setStandalone(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getStandalone());
    }
    /**
     *
     */
    public function testGetValidation()
    {
        $this->assertTrue(self::optionsInstance()->getValidation());
    }
    /**
     *
     */
    public function testSetValidation()
    {
        $instance = self::optionsInstance();
        $instance->setValidation(GeneratorOptions::VALUE_FALSE);

        $this->assertFalse($instance->getValidation());
    }
    /**
     *
     */
    public function testGetStructClass()
    {
        $this->assertSame('\WsdlToPhp\PackageBase\AbstractStructBase', self::optionsInstance()->getStructClass());
    }
    /**
     *
     */
    public function testSetStructClass()
    {
        $instance = self::optionsInstance();
        $instance->setStructClass('\My\Project\StructClass');

        $this->assertSame('\My\Project\StructClass', $instance->getStructClass());
    }
    /**
     *
     */
    public function testGetStructArrayClass()
    {
        $this->assertSame('\WsdlToPhp\PackageBase\AbstractStructArrayBase', self::optionsInstance()->getStructArrayClass());
    }
    /**
     *
     */
    public function testSetStructArrayClass()
    {
        $instance = self::optionsInstance();
        $instance->setStructArrayClass('\My\Project\StructArrayClass');

        $this->assertSame('\My\Project\StructArrayClass', $instance->getStructArrayClass());
    }
    /**
     *
     */
    public function testGetStructEnumClass()
    {
        $this->assertSame('\WsdlToPhp\PackageBase\AbstractStructEnumBase', self::optionsInstance()->getStructEnumClass());
    }
    /**
     *
     */
    public function testSetStructEnumClass()
    {
        $instance = self::optionsInstance();
        $instance->setStructEnumClass('\My\Project\StructEnumClass');

        $this->assertSame('\My\Project\StructEnumClass', $instance->getStructEnumClass());
    }
    /**
     *
     */
    public function testGetSoapClientClass()
    {
        $this->assertSame('\WsdlToPhp\PackageBase\AbstractSoapClientBase', self::optionsInstance()->getSoapClientClass());
    }
    /**
     *
     */
    public function testSetSoapClientClass()
    {
        $instance = self::optionsInstance();
        $instance->setSoapClientClass('\My\Project\SoapClientClass');

        $this->assertSame('\My\Project\SoapClientClass', $instance->getSoapClientClass());
    }
    /**
     *
     */
    public function testGetComposerName()
    {
        $this->assertSame('', self::optionsInstance()->getComposerName());
    }
    /**
     *
     */
    public function testSetComposerName()
    {
        $instance = self::optionsInstance();
        $instance->setComposerName('foo/bar');

        $this->assertSame('foo/bar', $instance->getComposerName());
    }
    /**
     *
     */
    public function testGetComposerSettings()
    {
        $this->assertSame([], self::optionsInstance()->getComposerSettings());
    }
    /**
     *
     */
    public function testSetComposerSettings()
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
    /**
     *
     */
    public function testGetStructsFolder()
    {
        $this->assertSame('StructType', self::optionsInstance()->getStructsFolder());
    }
    /**
     *
     */
    public function testSetStructsFolder()
    {
        $instance = self::optionsInstance();
        $instance->setStructsFolder('Structs');

        $this->assertSame('Structs', $instance->getStructsFolder());
    }
    /**
     *
     */
    public function testGetEnumsFolder()
    {
        $this->assertSame('EnumType', self::optionsInstance()->getEnumsFolder());
    }
    /**
     *
     */
    public function testSetEnumsFolder()
    {
        $instance = self::optionsInstance();
        $instance->setEnumsFolder('Enums');

        $this->assertSame('Enums', $instance->getEnumsFolder());
    }
    /**
     *
     */
    public function testGetArraysFolder()
    {
        $this->assertSame('ArrayType', self::optionsInstance()->getArraysFolder());
    }
    /**
     *
     */
    public function testSetArraysFolder()
    {
        $instance = self::optionsInstance();
        $instance->setArraysFolder('Arrays');

        $this->assertSame('Arrays', $instance->getArraysFolder());
    }
    /**
     *
     */
    public function testGetServicesFolder()
    {
        $this->assertSame('ServiceType', self::optionsInstance()->getServicesFolder());
    }
    /**
     *
     */
    public function testSetServicesFolder()
    {
        $instance = self::optionsInstance();
        $instance->setServicesFolder('Services');

        $this->assertSame('Services', $instance->getServicesFolder());
    }
    /**
     *
     */
    public function testSetSchemasSave()
    {
        $instance = self::optionsInstance();
        $instance->setSchemasSave(false);

        $this->assertSame(false, $instance->getSchemasSave());
    }
    /**
     *
     */
    public function testSetSchemasFolder()
    {
        $instance = self::optionsInstance();
        $instance->setSchemasFolder('wsdl');

        $this->assertSame('wsdl', $instance->getSchemasFolder());
    }
    /**
     *
     */
    public function testSetExistingOptionValue()
    {
        $instance = self::optionsInstance();
        $instance->setOptionValue('category', 'cat');
        $this->assertEquals('cat', $instance->getOptionValue('category'));
        $instance->setCategory('none');
        $this->assertEquals('none', $instance->getOptionValue('category'));
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetExistingOptionValueWithInvalidValue()
    {
        self::optionsInstance()->setOptionValue('category', 'null');
        self::optionsInstance()->setCategory(null);
    }
    /**
     *
     */
    public function testSetUnexistingOptionValue()
    {
        $newOptionKey = 'new_option';
        $instance = self::optionsInstance();

        $instance->setOptionValue($newOptionKey, '1', [0, 1, 2]);

        $this->assertEquals(1, $instance->getOptionValue($newOptionKey));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetUnexistingOptionValueWithInvalidValue()
    {
        self::optionsInstance()->setGenerateTutorialFile('null');
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetUnexistingOptionValue()
    {
        self::optionsInstance()->getOptionValue('myOption');
    }
    /**
     *
     */
    public function testToArray()
    {
        $this->assertSame([
            'category' => 'cat',
            'gather_methods' => 'start',
            'generic_constants_names' => false,
            'generate_tutorial_file' => true,
            'add_comments' => [],
            'namespace_prefix' => '',
            'standalone' => true,
            'validation' => true,
            'struct_class' => '\WsdlToPhp\PackageBase\AbstractStructBase',
            'struct_array_class' => '\WsdlToPhp\PackageBase\AbstractStructArrayBase',
            'struct_enum_class' => '\WsdlToPhp\PackageBase\AbstractStructEnumBase',
            'soap_client_class' => '\WsdlToPhp\PackageBase\AbstractSoapClientBase',
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
    /**
     *
     */
    public function testJsonSerialize()
    {
        $this->assertSame([
            'category' => 'cat',
            'gather_methods' => 'start',
            'generic_constants_names' => false,
            'generate_tutorial_file' => true,
            'add_comments' => [],
            'namespace_prefix' => '',
            'standalone' => true,
            'validation' => true,
            'struct_class' => '\WsdlToPhp\PackageBase\AbstractStructBase',
            'struct_array_class' => '\WsdlToPhp\PackageBase\AbstractStructArrayBase',
            'struct_enum_class' => '\WsdlToPhp\PackageBase\AbstractStructEnumBase',
            'soap_client_class' => '\WsdlToPhp\PackageBase\AbstractSoapClientBase',
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
