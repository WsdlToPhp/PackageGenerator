<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property as PropertyContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;

class ClassMap extends AbstractModelFile
{
    /**
     * @var string
     */
    const METHOD_NAME = 'get';
    /**
     * @param ConstantContainer $constants
     */
    protected function getClassConstants(ConstantContainer $constants)
    {
    }
    /**
     * @param PhpConstant $constant
     * @return PhpAnnotationBlock|null
     */
    protected function getConstantAnnotationBlock(PhpConstant $constant)
    {
    }
    /**
     * @param PropertyContainer $properties
     */
    protected function getClassProperties(PropertyContainer $properties)
    {
    }
    /**
     * @param PhpProperty $property
     * @return PhpAnnotationBlock|null
     */
    protected function getPropertyAnnotationBlock(PhpProperty $property)
    {
    }
    protected function fillClassMethods()
    {
        $method = new PhpMethod(self::METHOD_NAME, [], PhpMethod::ACCESS_PUBLIC, false, true, true);
        $this->addMethodBody($method);
        $this->methods->add($method);
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock|null
     */
    protected function getMethodAnnotationBlock(PhpMethod $method)
    {
        return new PhpAnnotationBlock([
            'Returns the mapping between the WSDL Structs and generated Structs\' classes',
            'This array is sent to the \SoapClient when calling the WS',
            new PhpAnnotation(AbstractModelFile::ANNOTATION_RETURN, 'string[]'),
        ]);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getClassAnnotationBlock()
     * @return PhpAnnotationBlock
     */
    protected function getClassAnnotationBlock()
    {
        return new PhpAnnotationBlock([
            'Class which returns the class map definition',
            new PhpAnnotation(self::ANNOTATION_PACKAGE, $this->getGenerator()->getOptionPrefix()),
        ]);
    }
    /**
     * @param PhpMethod $method
     * @return ClassMap
     */
    protected function addMethodBody(PhpMethod $method)
    {
        if ($this->getGenerator()->getStructs()->count() > 0) {
            $method->addChild('return array(');
            foreach ($this->getGenerator()->getStructs() as $struct) {
                $this->addStructToClassMapList($method, $struct);
            }
            $method->addChild(');');
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @param StructModel $struct
     * @return ClassMap
     */
    protected function addStructToClassMapList(PhpMethod $method, StructModel $struct)
    {
        if ($struct->isStruct() && !$struct->isRestriction()) {
            $method->addChild($method->getIndentedString(sprintf('\'%s\' => \'%s\',', $struct->getName(), $this->getStructName($struct)), 1));
        }
        return $this;
    }
    /**
     * work around for https://bugs.php.net/bug.php?id=69280
     * @param StructModel $struct
     * @return string
     */
    protected function getStructName(StructModel $struct)
    {
        return str_replace('\\', '\\\\', $struct->getPackagedName(true));
    }
}
