<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\AbstractFile as File;
use WsdlToPhp\PackageGenerator\Parser\ParserInterface;
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
use WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl\WsdlParser;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

abstract class AbstractFile extends TestCase
{
    /**
     * @var Generator
     */
    protected static $bingInstance;
    /**
     * @var array
     */
    protected static $parsers = array();
    /**
     * @return Generator
     */
    public static function bingGeneratorInstance()
    {
        if (empty(self::$bingInstance)) {
            self::$bingInstance = Generator::instance(WsdlParser::wsdlBingPath());
            self::$bingInstance->setPackageName('Api');
            self::$bingInstance->setOptionAddComments(array(
                'release' => '1.1.0',
            ));
            self::initParsers(self::$bingInstance, WsdlParser::wsdlBingPath());
            foreach (self::$parsers[WsdlParser::wsdlBingPath()] as $parser) {
                $parser->parse();
            }
        }
        return self::$bingInstance;
    }
    /**
     * @param Generator $generator
     * @param unknown $wsdlPath
     */
    private static function initParsers(Generator $generator, $wsdlPath)
    {
        if (!array_key_exists($wsdlPath, self::$parsers)) {
            self::$parsers[$wsdlPath] = array();
        }
        if (count(self::$parsers[$wsdlPath]) === 0) {
            self::addParser(new FunctionsParser($generator), $wsdlPath);
            self::addParser(new StructsParser($generator), $wsdlPath);
            self::addParser(new TagIncludeParser($generator), $wsdlPath);
            self::addParser(new TagImportParser($generator), $wsdlPath);
            self::addParser(new TagAttributeParser($generator), $wsdlPath);
            self::addParser(new TagComplexTypeParser($generator), $wsdlPath);
            self::addParser(new TagDocumentationParser($generator), $wsdlPath);
            self::addParser(new TagElementParser($generator), $wsdlPath);
            self::addParser(new TagEnumerationParser($generator), $wsdlPath);
            self::addParser(new TagExtensionParser($generator), $wsdlPath);
            self::addParser(new TagHeaderParser($generator), $wsdlPath);
            self::addParser(new TagInputParser($generator), $wsdlPath);
            self::addParser(new TagOutputParser($generator), $wsdlPath);
            self::addParser(new TagRestrictionParser($generator), $wsdlPath);
            self::addParser(new TagUnionParser($generator), $wsdlPath);
            self::addParser(new TagListParser($generator), $wsdlPath);
        }
    }
    /**
     * @param ParserInterface $parser
     * @param unknown $wsdlPath
     */
    private static function addParser(ParserInterface $parser, $wsdlPath)
    {
        self::$parsers[$wsdlPath][] = $parser;
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
        $this->assertSame(file_get_contents(sprintf('%s%s.php', __DIR__ . '/../resources/generated/', $valid)), file_get_contents($file->getFileName()));
        unlink($file->getFileName());
    }
}
