<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PhpGenerator\Component\PhpClass;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\File\AbstractFile;

class ClassMap extends AbstractFile
{
    /**
     * @var string
     */
    const FILE_NAME_SUFFIX = 'ClassMap';
    /**
     * @param Generator $generator
     * @param string $name
     * @param string $destination
     */
    public function __construct(Generator $generator, $name, $destination)
    {
        parent::__construct($generator, self::getClassMapName(), $destination);
    }
    /**
     * @param bool $packagedName
     * @return string
     */
    public static function getClassMapName($packagedName = false)
    {
        return ($packagedName ? sprintf('\\%s\\', Generator::getPackageName()) : '') . sprintf('%s%s', Generator::getPackageName(), self::FILE_NAME_SUFFIX);
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractFile::beforeWrite()
     */
    public function beforeWrite()
    {
        parent::beforeWrite();
        $this
            ->addNamespace()
            ->addMainAnnotationBlock()
            ->addClassContent();

    }
    /**
     * @return ClassMap
     */
    protected function addNamespace()
    {
        $this->getFile()->setNamespace(Generator::getPackageName());
        return $this;
    }
    /**
     * @return ClassMap
     */
    protected function addMainAnnotationBlock()
    {
        $this
            ->getFile()
            ->addAnnotationBlockElement(new PhpAnnotationBlock(array(
                new PhpAnnotation(PhpAnnotation::NO_NAME, 'Class which returns the class map definition by the static method ApiClassMap::classMap()', AbstractModelFile::ANNOTATION_LONG_LENGTH),
                new PhpAnnotation(AbstractModelFile::ANNOTATION_PACKAGE, Generator::getPackageName()),
            )));
        return $this;
    }
    /**
     * @return ClassMap
     */
    protected function addClassContent()
    {
        $class = new PhpClass(self::getClassMapName());
        return $this
            ->addMethodAnnotationBlock($class)
            ->addMethodContent($class)
            ->getFile()
                ->addClassComponent($class);
    }
    /**
     * @param PhpClass $class
     * @return ClassMap
     */
    protected function addMethodAnnotationBlock(PhpClass $class)
    {
        $class
            ->addAnnotationBlockElement(new PhpAnnotationBlock(array(
                new PhpAnnotation(PhpAnnotation::NO_NAME, 'This method returns the array containing the mapping between WSDL structs and generated classes', AbstractModelFile::ANNOTATION_LONG_LENGTH),
                'This array is sent to the \SoapClient when calling the WS',
                new PhpAnnotation(AbstractModelFile::ANNOTATION_RETURN, 'string[]'),
            )));
        return $this;
    }
    /**
     * @param PhpClass $class
     * @return ClassMap
     */
    protected function addMethodContent(PhpClass $class)
    {
        $method = new PhpMethod('classMap', array(), PhpMethod::ACCESS_PUBLIC, false, true, true);
        $this->addMethodBody($method);
        $class
            ->addMethodElement($method);
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
