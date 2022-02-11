<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property as PropertyContainer;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;

final class ClassMap extends AbstractModelFile
{
    public const METHOD_NAME = 'get';

    protected function fillClassConstants(ConstantContainer $constants): void
    {
    }

    protected function getConstantAnnotationBlock(PhpConstant $constant): ?PhpAnnotationBlock
    {
        return null;
    }

    protected function fillClassProperties(PropertyContainer $properties): void
    {
    }

    protected function getPropertyAnnotationBlock(PhpProperty $property): ?PhpAnnotationBlock
    {
        return null;
    }

    protected function fillClassMethods(): void
    {
        $method = new PhpMethod(self::METHOD_NAME, [], self::TYPE_ARRAY, PhpMethod::ACCESS_PUBLIC, false, true, true);
        $this->addMethodBody($method);
        $this->methods->add($method);
    }

    protected function getMethodAnnotationBlock(PhpMethod $method): ?PhpAnnotationBlock
    {
        return new PhpAnnotationBlock([
            'Returns the mapping between the WSDL Structs and generated Structs\' classes',
            'This array is sent to the \SoapClient when calling the WS',
            new PhpAnnotation(AbstractModelFile::ANNOTATION_RETURN, 'string[]'),
        ]);
    }

    protected function getClassAnnotationBlock(): PhpAnnotationBlock
    {
        $annotations = [
            'Class which returns the class map definition',
        ];

        if (!empty($this->getGenerator()->getOptionPrefix())) {
            $annotations[] = new PhpAnnotation(self::ANNOTATION_PACKAGE, $this->getGenerator()->getOptionPrefix());
        }

        return new PhpAnnotationBlock($annotations);
    }

    protected function addMethodBody(PhpMethod $method): self
    {
        if ($this->getGenerator()->getStructs()->count() > 0) {
            $method->addChild('return [');
            foreach ($this->getGenerator()->getStructs() as $struct) {
                $this->addStructToClassMapList($method, $struct);
            }
            $method->addChild('];');
        }

        return $this;
    }

    protected function addStructToClassMapList(PhpMethod $method, StructModel $struct): self
    {
        if ($struct->isStruct() && !$struct->isRestriction()) {
            $method->addChild($method->getIndentedString(sprintf('\'%s\' => \'%s\',', $struct->getName(), $this->getStructName($struct)), 1));
        }

        return $this;
    }

    /**
     * Work around for https://bugs.php.net/bug.php?id=69280.
     */
    protected function getStructName(StructModel $struct): string
    {
        return str_replace('\\', '\\\\', $struct->getPackagedName(true));
    }
}
