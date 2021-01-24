<?php

namespace WsdlToPhp\PackageGenerator\Tests\File;

use WsdlToPhp\PackageGenerator\File\AbstractFile as File;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Structs as StructsParser;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Functions as FunctionsParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagAttribute as TagAttributeParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType as TagComplexTypeParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagChoice as TagChoiceParser;
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
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

abstract class AbstractFile extends TestCase
{
    /**
     * @param string $wsdl
     * @return Generator
     */
    public static function getInstance($wsdl, $reset = true, $gatherMethods = GeneratorOptions::VALUE_START)
    {
        AbstractModel::purgeUniqueNames();
        AbstractModel::purgePhpReservedKeywords();
        $g = parent::getInstance($wsdl, $reset)
            ->setOptionPrefix('Api')
            ->setOptionAddComments([
                'release' => '1.1.0',
            ])
            ->setOptionCategory(GeneratorOptions::VALUE_CAT)
            ->setOptionGatherMethods($gatherMethods);
        self::applyParsers($g, $wsdl);
        return $g;
    }
    /**
     * @param Generator $generator
     */
    private static function applyParsers(Generator $generator)
    {
        $parsers = [
            new FunctionsParser($generator),
            new StructsParser($generator),
            new TagIncludeParser($generator),
            new TagImportParser($generator),
            new TagAttributeParser($generator),
            new TagComplexTypeParser($generator),
            new TagElementParser($generator),
            new TagEnumerationParser($generator),
            new TagExtensionParser($generator),
            new TagHeaderParser($generator),
            new TagInputParser($generator),
            new TagOutputParser($generator),
            new TagRestrictionParser($generator),
            new TagUnionParser($generator),
            new TagListParser($generator),
            new TagChoiceParser($generator),
            new TagDocumentationParser($generator),
        ];
        foreach ($parsers as $parser) {
            $parser->parse();
        }
    }
    /**
     * @param string $valid
     * @param File $file
     */
    protected function assertSameFileContent($valid, File $file, $fileExtension = 'php')
    {
        if (!is_file($file->getFileName())) {
            return $this->fail(sprintf('Generated file "%s" could not be found', $file->getFileName()));
        }
        // uncomment next line to easily regenerate all valid files :)
        // file_put_contents(sprintf('%s%s.%s', self::getTestDirectory(), $valid, $fileExtension), str_replace($file->getGenerator()->getWsdl()->getName(), '__WSDL_URL__', file_get_contents($file->getFileName())));
        $validContent = file_get_contents(sprintf('%s%s.%s', self::getTestDirectory(), $valid, $fileExtension));
        $validContent = str_replace('__WSDL_URL__', $file->getGenerator()->getWsdl()->getName(), $validContent);
        $toBeValidatedContent = file_get_contents($file->getFileName());
        $this->assertSame($validContent, $toBeValidatedContent);
        unlink($file->getFileName());
    }
}
