<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Container\PhpElement\Method;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Component\PhpClass;

abstract class AbstractModelFile extends AbstractFile
{
    const ANNOTATION_LONG_LENGTH = '500';
    /**
     * @var string
     */
    const ANNOTATION_PACKAGE = 'package';
    /**
     * @var string
     */
    const ANNOTATION_SUB_PACKAGE = 'subpackage';
    /**
     * @var string
     */
    const ANNOTATION_RETURN = 'return';
    /**
     * @var string
     */
    const ANNOTATION_USES = 'uses';
    /**
     * @var string
     */
    const ANNOTATION_PARAM = 'param';
    /**
     * @var string
     */
    const ANNOTATION_VAR = 'var';
    /**
     * @var string
     */
    const ANNOTATION_SEE = 'see';
    /**
     * @var string
     */
    const METHOD_CONSTRUCT = '__construct';
    /**
     * @var string
     */
    const METHOD_SET_STATE = '__set_state';
    /**
     * @var string
     */
    const TYPE_STRING = 'string';
    /**
     * @var AbstractModel
     */
    protected $model;
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractFile::beforeWrite()
     */
    public function beforeWrite()
    {
        parent::beforeWrite();
        $this
            ->defineNamespace()
            ->defineUseStatement()
            ->addAnnotationBlock()
            ->addClassElement();
    }
    /**
     * @return AbstractModelFile
     */
    protected function addAnnotationBlock()
    {
        $this
            ->getFile()
                ->addAnnotationBlockElement($this->getClassAnnotationBlock());
        return $this;
    }
    /**
     * @param AbstractModel $model
     * @return AbstractModelFile
     */
    public function setModel(AbstractModel $model)
    {
        $this->model = $model;
        $this->getFile()->getMainElement()->setName($model->getPackagedName());
        return $this;
    }
    /**
     * @return AbstractModel
     */
    public function getModel()
    {
        return $this->model;
    }
    /**
     * @param PhpAnnotationBlock $block
     * @return AbstractModelFile
     */
    protected function definePackageAnnotations(PhpAnnotationBlock $block)
    {
        $block->addChild(new PhpAnnotation(self::ANNOTATION_PACKAGE, Generator::getPackageName()));
        if (count($this->getModel()->getDocSubPackages()) > 0) {
            $block->addChild(new PhpAnnotation(self::ANNOTATION_SUB_PACKAGE, implode(',', $this->getModel()->getDocSubPackages())));
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $block
     * @return AbstractModelFile
     */
    protected function defineGeneralAnnotations(PhpAnnotationBlock $block)
    {
        if (count($this->getGenerator()->getOptionAddComments()) > 0) {
            foreach ($this->getGenerator()->getOptionAddComments() as $tagName => $tagValue) {
                $block->addChild(new PhpAnnotation($tagName, $tagValue));
            }
        }
        return $this;
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getClassAnnotationBlock()
    {
        $block = new PhpAnnotationBlock();
        $block->addChild($this->getClassDeclarationLine());
        if ($this->getModel()->getDocumentation() !== '') {
            $block->addChild($this->getModel()->getDocumentation());
        }
        $this
            ->defineModelAnnotationsFromWsdl($block)
            ->defineModelAnnotationsFromInheritance($block)
            ->definePackageAnnotations($block)
            ->defineGeneralAnnotations($block);
        return $block;
    }
    /**
     * @return string
     */
    protected function getClassDeclarationLine()
    {
        return sprintf('This class stands for %s %s', $this->getModel()->getName(), $this->getModel()->getContextualPart());
    }
    /**
     * @param PhpAnnotationBlock $block
     * @param AbstractModel $model
     * @return AbstractModelFile
     */
    protected function defineModelAnnotationsFromWsdl(PhpAnnotationBlock $block, AbstractModel $model = null)
    {
        $validMeta = $this->getValidMetaValues($model instanceof AbstractModel ? $model : $this->getModel());
        if (!empty($validMeta)) {
            /**
             * First line is the "The {propertyName}"
             */
            if (count($block->getChildren()) === 1) {
                $block->addChild('Meta informations extracted from the WSDL');
            }
            foreach ($validMeta as $meta) {
                $block->addChild($meta);
            }
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $block
     * @return AbstractModelFile
     */
    protected function defineModelAnnotationsFromInheritance(PhpAnnotationBlock $block)
    {
        $struct = $this->getGenerator()->getStruct($this->getModel()->getInheritance());
        if ($struct instanceof StructModel && $struct->getIsStruct() === false) {
            $validMeta = $this->getValidMetaValues($struct);
            foreach ($validMeta as $meta) {
                $block->addChild($meta);
            }
        }
        return $this;
    }
    /**
     * @param AbstractModel $model
     * @return string[]
     */
    protected function getValidMetaValues(AbstractModel $model)
    {
        $meta = $model->getMeta();
        $validMeta = array();
        foreach ($meta as $metaName=>$metaValue) {
            $finalMeta = $this->getMetaValueAnnotation($metaName, $metaValue);
            if (is_scalar($finalMeta)) {
                $validMeta[] = $finalMeta;
            }
        }
        return $validMeta;
    }
    /**
     * @param string $metaName
     * @param mixed $metaValue
     * @return string|null
     */
    protected function getMetaValueAnnotation($metaName, $metaValue)
    {
        $meta = null;
        if (is_array($metaValue)) {
            $metaValue = implode(' | ', $metaValue);
        }
        $metaValue = Utils::cleanComment($metaValue, ', ', stripos($metaName, 'SOAPHeader') === false);
        if (is_scalar($metaValue)) {
            $meta = sprintf("\t- %s: %s", $metaName, $this->transformMetaValue($metaName, $metaValue));
        }
        return $meta;
    }
    /**
     * @param string $metaName
     * @param string $metaValue
     * @return string
     */
    protected function transformMetaValue($metaName, $metaValue)
    {
        if ($metaName === AbstractModel::META_FROM_SCHEMA && stripos($metaValue, 'http') !== false) {
            $metaValue = sprintf('{@link %s}', $metaValue);
        }
        return $metaValue;
    }
    /**
     * @return AbstractModelFile
     */
    protected function addClassElement()
    {
        $class = new PhpClass($this->getModel()->getPackagedName(), $this->getModel()->getIsAbstract(), $this->getModel()->getExtendsClassName() === '' ? null : $this->getModel()->getExtendsClassName());
        $this
            ->defineConstants($class)
            ->defineProperties($class)
            ->defineMethods($class)
            ->defineStringMethod($class)
            ->getFile()
                ->addClassComponent($class);
        return $this;
    }
    /**
     * @return AbstractModelFile
     */
    protected function defineNamespace()
    {
        return $this;
    }
    /**
     * @return AbstractModelFile
     */
    protected function defineUseStatement()
    {
        if ($this->getModel()->getExtends() !== '') {
            $this
                ->getFile()
                    ->addUse($this->getModel()->getExtends(), null, true);
        }
        return $this;
    }
    /**
     * @param PhpClass $class
     * @return AbstractModelFile
     */
    protected function defineConstants(PhpClass $class)
    {
        $constants = new Constant();
        $this->getClassConstants($constants);
        if ($constants->count() > 0) {
            foreach ($constants as $constant) {
                $annotationBlock = $this->getConstantAnnotationBlock($constant);
                if (!empty($annotationBlock)) {
                    $class->addAnnotationBlockElement($annotationBlock);
                }
                $class->addConstantElement($constant);
            }
        }
        return $this;
    }
    /**
     * @param PhpClass $class
     * @return AbstractModelFile
     */
    protected function defineProperties(PhpClass $class)
    {
        $properties = new Property();
        $this->getClassProperties($properties);
        if ($properties->count() > 0) {
            foreach ($properties as $property) {
                $annotationBlock = $this->getPropertyAnnotationBlock($property);
                if (!empty($annotationBlock)) {
                    $class->addAnnotationBlockElement($annotationBlock);
                }
                $class->addPropertyElement($property);
            }
        }
        return $this;
    }
    /**
     * @param PhpClass $class
     * @return AbstractModelFile
     */
    protected function defineMethods(PhpClass $class)
    {
        $methods = new Method();
        $this->getClassMethods($methods);
        if ($methods->count() > 0) {
            foreach ($methods as $method) {
                $annotationBlock = $this->getMethodAnnotationBlock($method);
                if (!empty($annotationBlock)) {
                    $class->addAnnotationBlockElement($annotationBlock);
                }
                $class->addMethodElement($method);
            }
        }
        return $this;
    }
    /**
     * @param Constant
     */
    abstract protected function getClassConstants(Constant $constants);
    /**
     * @param PhpConstant $constant
     * @return PhpAnnotationBlock|null
     */
    abstract protected function getConstantAnnotationBlock(PhpConstant $constant);
    /**
     * @param Property
     */
    abstract protected function getClassProperties(Property $properties);
    /**
     * @param PhpProperty $property
     * @return PhpAnnotationBlock|null
     */
    abstract protected function getPropertyAnnotationBlock(PhpProperty $property);
    /**
     * @param Method
     */
    abstract protected function getClassMethods(Method $methods);
    /**
     * @param PhpMethod $method
     * @return PhpAnnotationBlock|null
     */
    abstract protected function getMethodAnnotationBlock(PhpMethod $method);
    /**
     * @param PhpClass $class
     */
    protected function defineStringMethod(PhpClass $class)
    {
        $class->addAnnotationBlockElement($this->getToStringMethodAnnotationBlock());
        $class->addMethodElement($this->getToStringMethod());
        return $this;
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getToStringMethodAnnotationBlock()
    {
        return new PhpAnnotationBlock(array(
            'Method returning the class name',
            new PhpAnnotation(self::ANNOTATION_RETURN, 'string __CLASS__'),
        ));
    }
    /**
     * @return PhpMethod
     */
    protected function getToStringMethod()
    {
        $method = new PhpMethod('__toString');
        $method->addChild('return __CLASS__;');
        return $method;
    }
    /**
     * @param StructAttributeModel $attribute
     * @return StructAttributeModel
     */
    protected function getStructAttribute(StructAttributeModel $attribute = null)
    {
        $struct = $this->getModel();
        if (empty($attribute) && $struct instanceof StructModel && $struct->getAttributes()->count() === 1) {
            $attribute = $struct->getAttributes()->offsetGet(0);
        }
        return $attribute;
    }
    /**
     * @param StructAttributeModel $attribute
     * @return StructModel|null
     */
    protected function getModelFromStructAttribute(StructAttributeModel $attribute = null)
    {
        $model = null;
        $attribute = $this->getStructAttribute($attribute);
        if ($attribute instanceof StructAttributeModel) {
            $model = $this->getGenerator()->getStruct($attribute->getType());
        }
        return $model;
    }
    /**
     * @param StructAttributeModel $attribute
     * @param bool $returnAnnotation
     * @return string
     */
    protected function getStructAttributeType(StructAttributeModel $attribute = null, $returnAnnotation = false)
    {
        $attribute = $this->getStructAttribute($attribute);
        $type = $attribute->getType();
        $model = $this->getModelFromStructAttribute($attribute);
        if ($model instanceof StructModel) {
            if ($model->getIsStruct() === false || ($model->getPackagedName() === $attribute->getOwner()->getPackagedName() && $model->getInheritance() !== '')) {
                $type = $model->getInheritance();
            } elseif ($model->getIsRestriction() === true) {
                $type = $model->getInheritance() !== '' ? $model->getInheritance() : self::TYPE_STRING;
            } else {
                $type = $model->getPackagedName();
            }
        }
        if ($returnAnnotation === true && $attribute->isRequired() === false) {
            $type = sprintf('%s|null', $type);
        }
        return $type;
    }
}
