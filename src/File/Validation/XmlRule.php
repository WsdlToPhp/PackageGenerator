<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

final class XmlRule extends AbstractRule
{
    public function name(): string
    {
        return 'xml';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf(($itemType ? '' : '!is_null($%1$s) && ').'!$%1$s instanceof \DOMDocument && (!is_string($%1$s) || (is_string($%1$s) && (empty($%1$s) || (($%1$sDoc = new \DOMDocument()) && false === $%1$sDoc->loadXML($%1$s)))))', $parameterName);
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf('sprintf(\'Invalid value %%s, please provide a valid XML string\', var_export($%1$s, true))', $parameterName);
    }
}
