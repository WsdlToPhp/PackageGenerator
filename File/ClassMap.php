<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Component\PhpClass;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\File\AbstractFile;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property as PropertyContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;

class ClassMap extends AbstractModelFile
{
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
    /**
     * @param MethodContainer $methods
     */
    protected function getClassMethods(MethodContainer $methods)
    {
        $method = new PhpMethod('classMap', array(), PhpMethod::ACCESS_PUBLIC, false, true, true);
        $this->addMethodBody($method);
        $methods->add($method);
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock|null
     */
    protected function getMethodAnnotationBlock(PhpMethod $method)
    {
        return new PhpAnnotationBlock(array(
            'Returns the mapping between the WSDL Structs and generated Structs\' classes',
            'This array is sent to the \SoapClient when calling the WS',
            new PhpAnnotation(AbstractModelFile::ANNOTATION_RETURN, 'string[]'),
        ));
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getClassAnnotationBlock()
     * @return PhpAnnotationBlock
     */
    protected function getClassAnnotationBlock()
    {
        return new PhpAnnotationBlock(array(
            'Class which returns the class map definition',
            new PhpAnnotation(self::ANNOTATION_PACKAGE, $this->getGenerator()->getPackageName()),
        ));
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::defineStringMethod()
     */
    protected function defineStringMethod(PhpClass $class)
    {
        return $this;
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
        if ($struct->getIsStruct() && !$struct->getIsRestriction()) {
            $method->addChild($method->getIndentedString(sprintf('\'%s\' => \'%s\',', $struct->getName(), $struct->getPackagedName(true)), 1));
        }
        return $this;
    }
}
