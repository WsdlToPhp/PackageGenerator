<?php

namespace WsdlToPhp\PackageGenerator\Parser\SoapClient;

class Structs extends AbstractParser
{
    /**
     * @var string
     */
    const STRUCT_DECLARATION = 'struct';
    /**
     * @var string
     */
    const ANY_XML_DECLARATION = '<anyXML>';
    /**
     * @var string
     */
    const ANY_XML_TYPE = '\DOMDocument';
    /**
     * @var string[]
     */
    private $definedStructs = array();
    /**
     * Parses the SoapClient types
     * @see \WsdlToPhp\PackageGenerator\Parser\ParserInterface::parse()
     */
    public function parse()
    {
        $types = $this->generator->__getTypes();
        if (is_array($types)) {
            foreach ($types as $type) {
                $this->parseType($type);
            }
        }
    }
    /**
     * @param string $type
     */
    protected function parseType($type)
    {
        if (!$this->isStructDefined($type)) {
            $cleanType = self::cleanType($type);
            $typeDef = explode(' ', $cleanType);
            if (array_key_exists(1, $typeDef) && !empty($typeDef)) {
                $structName = $typeDef[1];
                if ($typeDef[0] !== self::STRUCT_DECLARATION) {
                    $this->generator->getStructs()->addVirtualStruct($this->generator, $structName);
                } else {
                    $this->parseComplexStruct($typeDef);
                }
            }
            $this->structHasBeenDefined($type);
        }
    }
    /**
     * @param array $typeDef
     */
    protected function parseComplexStruct($typeDef)
    {
        $typeDefCount = count($typeDef);
        if ($typeDefCount > 3) {
            for ($i = 2; $i < $typeDefCount; $i += 2) {
                $structParamType = str_replace(self::ANY_XML_DECLARATION, self::ANY_XML_TYPE, $typeDef[$i]);
                $structParamName = $typeDef[$i + 1];
                $this->generator->getStructs()->addStructWithAttribute($this->generator, $typeDef[1], $structParamName, $structParamType);
            }
        } else {
            $this->generator->getStructs()->addStruct($this->generator, $typeDef[1]);
        }
    }
    /**
     * Remove useless break line, tabs
     * Remove curly braces
     * Remove brackets
     * Adds space before semicolon to parse it
     * Remove duplicated spaces
     * @param string $type
     * @return string
     */
    protected static function cleanType($type)
    {
        $type = str_replace(array(
            "\r",
            "\n",
            "\t",
            '{',
            '}',
            '[',
            ']',
            ';',
        ), '', $type);
        $type = preg_replace('/[\s]+/', ' ', $type);
        return trim($type);
    }
    /**
     * @param string $type
     * @return boolean
     */
    private function isStructDefined($type)
    {
        return in_array(self::typeSignature($type), $this->definedStructs);
    }
    /**
     * @param string $type
     * @return Structs
     */
    private function structHasBeenDefined($type)
    {
        $this->definedStructs[] = self::typeSignature($type);
        return $this;
    }
    /**
     * @param string $type
     * @return string
     */
    private static function typeSignature($type)
    {
        return md5($type);
    }
}
