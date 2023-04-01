<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Parser\SoapClient;

final class Structs extends AbstractParser
{
    public const STRUCT_DECLARATION = 'struct';
    public const UNION_DECLARATION = 'union';
    public const ANY_XML_DECLARATION = '<anyXML>';
    public const ANY_XML_TYPE = \DOMDocument::class;

    protected array $definedStructs = [];

    public function parse(): void
    {
        $types = $this
            ->getGenerator()
            ->getSoapClient()
            ->getSoapClient()
            ->getSoapClient()
            ->__getTypes()
        ;

        foreach ($types as $type) {
            $this->parseType($type);
        }
    }

    protected function parseType(string $type): void
    {
        if ($this->isStructDefined($type)) {
            return;
        }

        $cleanType = self::cleanType($type);
        $typeDef = explode(' ', $cleanType);

        if (array_key_exists(1, $typeDef)) {
            $structName = $typeDef[1];
            if (self::UNION_DECLARATION === $typeDef[0]) {
                $this->parseUnionStruct($typeDef);
            } elseif (self::STRUCT_DECLARATION === $typeDef[0]) {
                $this->parseComplexStruct($typeDef);
            } else {
                $this->getGenerator()->getStructs()->addVirtualStruct($structName, $typeDef[0]);
            }
        }

        $this->structHasBeenDefined($type);
    }

    protected function parseComplexStruct(array $typeDef): void
    {
        $typeDefCount = count($typeDef);
        if (3 < $typeDefCount) {
            for ($i = 2; $i < $typeDefCount; $i += 2) {
                $structParamType = str_replace(self::ANY_XML_DECLARATION, self::ANY_XML_TYPE, $typeDef[$i]);
                $structParamName = $typeDef[$i + 1];
                $this->getGenerator()->getStructs()->addStructWithAttribute($typeDef[1], $structParamName, $structParamType);
            }
        } else {
            $this->getGenerator()->getStructs()->addStruct($typeDef[1]);
        }
    }

    /**
     * union types are passed such as ",dateTime,time" or ",PMS_ResStatusType,TransactionActionType,UpperCaseAlphaLength1to2".
     */
    protected function parseUnionStruct(array $typeDef): void
    {
        $typeDefCount = count($typeDef);
        if (3 === $typeDefCount) {
            $unionName = $typeDef[1];
            $unionTypes = array_filter(explode(',', $typeDef[2]), fn ($type) => !empty($type));
            sort($unionTypes);
            $this->getGenerator()->getStructs()->addUnionStruct($unionName, $unionTypes);
        }
    }

    /**
     * Remove useless break line, tabs
     * Remove curly braces
     * Remove brackets
     * Adds space before semicolon to parse it
     * Remove duplicated spaces.
     */
    protected static function cleanType(string $type): string
    {
        $type = str_replace([
            "\r",
            "\n",
            "\t",
            '{',
            '}',
            '[',
            ']',
            ';',
        ], '', $type);
        $type = preg_replace('/[\s]+/', ' ', $type);

        return trim($type);
    }

    protected function isStructDefined(string $type): bool
    {
        return in_array(self::typeSignature($type), $this->definedStructs);
    }

    protected function structHasBeenDefined(string $type): Structs
    {
        $this->definedStructs[] = self::typeSignature($type);

        return $this;
    }

    protected static function typeSignature(string $type): string
    {
        return md5($type);
    }
}
