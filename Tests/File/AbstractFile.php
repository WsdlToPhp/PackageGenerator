<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\AbstractFile as File;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Structs as StructsParser;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Functions as FunctionsParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagAttribute as TagAttributeParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType as TagComplexTypeParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation as TagDocumentationParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagElement as TagElementParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration as TagEnumerationParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagExtension as TagExtensionParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader as TagHeaderParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport as TagImportParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInclude as TagIncludeParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInput as TagInputParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagList as TagListParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagOutput as TagOutputParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction as TagRestrictionParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagUnion as TagUnionParser;
use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;

abstract class AbstractFile extends TestCase
{
    /**
     * @return Generator
     */
    public static function bingGeneratorInstance()
    {
        return self::getInstance(self::wsdlBingPath());
    }
    /**
     * @return Generator
     */
    public static function actonGeneratorInstance()
    {
        return self::getInstance(self::wsdlActonPath(), true);
    }
    /**
     * @return Generator
     */
    public static function portalGeneratorInstance()
    {
        return self::getInstance(self::wsdlPortalPath());
    }
    /**
     * @return Generator
     */
    public static function reformaGeneratorInstance()
    {
        return self::getInstance(self::wsdlReformaPath(), true);
    }
    /**
     * @return Generator
     */
    public static function queueGeneratorInstance()
    {
        return self::getInstance(self::wsdlQueuePath());
    }
    /**
     * @return Generator
     */
    public static function omnitureGeneratorInstance()
    {
        return self::getInstance(self::wsdlOmniturePath());
    }
    /**
     * @return Generator
     */
    public static function odigeoGeneratorInstance()
    {
        return self::getInstance(self::wsdlOdigeoPath());
    }
    /**
     * @return Generator
     */
    public static function payPalGeneratorInstance()
    {
        return self::getInstance(self::wsdlPayPalPath());
    }
    /**
     * @param string $wsdl
     * @return Generator
     */
    public static function getInstance($wsdl, $reset = false)
    {
        AbstractModel::purgeUniqueNames();
        AbstractModel::purgeReservedKeywords();
        $g = parent::getInstance($wsdl, $reset);
        $g->setPackageName('Api');
        $g->setOptionAddComments(array(
            'release' => '1.1.0',
        ));
        self::applyParsers($g, $wsdl);
        return $g;
    }
    /**
     * @param Generator $generator
     * @param unknown $wsdlPath
     */
    private static function applyParsers(Generator $generator, $wsdlPath)
    {
        $parsers = array(
            new FunctionsParser($generator),
            new StructsParser($generator),
            new TagIncludeParser($generator),
            new TagImportParser($generator),
            new TagAttributeParser($generator),
            new TagComplexTypeParser($generator),
            new TagDocumentationParser($generator),
            new TagElementParser($generator),
            new TagEnumerationParser($generator),
            new TagExtensionParser($generator),
            new TagHeaderParser($generator),
            new TagInputParser($generator),
            new TagOutputParser($generator),
            new TagRestrictionParser($generator),
            new TagUnionParser($generator),
            new TagListParser($generator),
        );
        foreach ($parsers as $parser) {
            $parser->parse();
        }
    }
    /**
     * @return string
     */
    protected function getTestDirectory()
    {
        return __DIR__ . '/../resources/generated/';
    }
    /**
     * @param string $valid
     * @param File $file
     */
    protected function assertSameFileContent($valid, File $file)
    {
        if (!is_file($file->getFileName())) {
            return $this->assertFalse(true, sprintf('Generated file "%s" could not be find', $file->getFileName()));
        }
        $validContent = file_get_contents(sprintf('%s%s.php', $this->getTestDirectory(), $valid));
        $validContent = str_replace('__WSDL_URL__', $file->getGenerator()->getWsdl(0)->getName(), $validContent);
        $toBeValidatedContent = file_get_contents($file->getFileName());
        $this->assertSame($validContent, $toBeValidatedContent);
        unlink($file->getFileName());
    }
}
