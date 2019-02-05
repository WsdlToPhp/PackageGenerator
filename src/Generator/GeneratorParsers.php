<?php

namespace WsdlToPhp\PackageGenerator\Generator;

use WsdlToPhp\PackageGenerator\Container\Parser as ParserContainer;
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
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagChoice as TagChoiceParser;

class GeneratorParsers extends AbstractGeneratorAware
{
    /**
     * @var ParserContainer
     */
    protected $parsers;
    /**
     * @param Generator $generator
     */
    public function __construct(Generator $generator)
    {
        parent::__construct($generator);
        $this->initParsers();
    }
    /**
     * @return GeneratorParsers
     */
    protected function initParsers()
    {
        if (!isset($this->parsers)) {
            $this->parsers = new ParserContainer($this->generator);
            $this->parsers
                ->add(new FunctionsParser($this->generator))
                ->add(new StructsParser($this->generator))
                ->add(new TagIncludeParser($this->generator))
                ->add(new TagImportParser($this->generator))
                ->add(new TagEnumerationParser($this->generator))
                ->add(new TagAttributeParser($this->generator))
                ->add(new TagComplexTypeParser($this->generator))
                ->add(new TagElementParser($this->generator))
                ->add(new TagExtensionParser($this->generator))
                ->add(new TagHeaderParser($this->generator))
                ->add(new TagInputParser($this->generator))
                ->add(new TagOutputParser($this->generator))
                ->add(new TagRestrictionParser($this->generator))
                ->add(new TagUnionParser($this->generator))
                ->add(new TagListParser($this->generator))
                ->add(new TagChoiceParser($this->generator))
                ->add(new TagDocumentationParser($this->generator));
        }
        return $this;
    }
    /**
     * @return GeneratorParsers
     */
    public function doParse()
    {
        foreach ($this->parsers as $parser) {
            $parser->parse();
        }
        return $this;
    }
    /**
     * @return ParserContainer
     */
    public function getParsers()
    {
        return $this->parsers;
    }
}
