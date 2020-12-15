<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property as PropertyContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Service as ServiceModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter as PhpFunctionParameterBase;
use WsdlToPhp\PackageGenerator\File\Element\PhpFunctionParameter;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;

class Service extends AbstractModelFile
{
    /**
     * @var string
     */
    const METHOD_SET_HEADER_PREFIX = 'setSoapHeader';
    /**
     * @var string
     */
    const PARAM_SET_HEADER_NAMESPACE = 'nameSpace';
    /**
     * @var string
     */
    const PARAM_SET_HEADER_MUSTUNDERSTAND = 'mustUnderstand';
    /**
     * @var string
     */
    const PARAM_SET_HEADER_ACTOR = 'actor';
    /**
     * @var string
     */
    const METHOD_GET_RESULT = 'getResult';
    /**
     * Method model can't be found in case the original method's name is unclean:
     * - ex: my.operation.name becomes my_operation_name
     * thus the Model from Model\Service::getMethod() can't be found
     * So we store the generated name associated to the original method object
     * @var array
     */
    protected $methodNames = [];
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getClassConstants()
     */
    protected function getClassConstants(ConstantContainer $constants)
    {
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getConstantAnnotationBlock()
     */
    protected function getConstantAnnotationBlock(PhpConstant $constant)
    {
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getClassProperties()
     */
    protected function getClassProperties(PropertyContainer $properties)
    {
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getPropertyAnnotationBlock()
     */
    protected function getPropertyAnnotationBlock(PhpProperty $property)
    {
    }
    /**
     * @return string
     */
    protected function getClassDeclarationLineText()
    {
        return $this->getGenerator()->getOptionGatherMethods() === GeneratorOptions::VALUE_NONE ? 'This class stands for all operations' : parent::getClassDeclarationLineText();
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::fillClassMethods()
     */
    protected function fillClassMethods()
    {
        $this
            ->addSoapHeaderMethods()
            ->addOperationsMethods()
            ->addGetResultMethod();
    }
    /**
     * @return Service
     */
    protected function addSoapHeaderMethods()
    {
        foreach ($this->getModel()->getMethods() as $method) {
            $this->addSoapHeaderFromMethod($method);
        }
        return $this;
    }
    /**
     * @param MethodModel $method
     * @return Service
     */
    protected function addSoapHeaderFromMethod(MethodModel $method)
    {
        $soapHeaderNames = $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES, []);
        $soapHeaderNamespaces = $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES, []);
        $soapHeaderTypes = $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES, []);
        if (is_array($soapHeaderNames) && is_array($soapHeaderNamespaces) && is_array($soapHeaderTypes)) {
            foreach ($soapHeaderNames as $index => $soapHeaderName) {
                $methodName = $this->getSoapHeaderMethodName($soapHeaderName);
                if ($this->methods->get($methodName) === null) {
                    $soapHeaderNamespace = array_key_exists($index, $soapHeaderNamespaces) ? $soapHeaderNamespaces[$index] : null;
                    $soapHeaderType = array_key_exists($index, $soapHeaderTypes) ? $soapHeaderTypes[$index] : null;
                    $this->methods->add($this->getSoapHeaderMethod($methodName, $soapHeaderName, $soapHeaderNamespace, $soapHeaderType));
                }
            }
        }
        return $this;
    }
    /**
     * @param string $methodName
     * @param string $soapHeaderName
     * @param string $soapHeaderNamespace
     * @param string $soapHeaderType
     * @return PhpMethod
     */
    protected function getSoapHeaderMethod($methodName, $soapHeaderName, $soapHeaderNamespace, $soapHeaderType)
    {
        try {
            $method = new PhpMethod($methodName, [
                $firstParameter = new PhpFunctionParameter(lcfirst($soapHeaderName), PhpFunctionParameterBase::NO_VALUE, $this->getTypeFromName($soapHeaderType)),
                new PhpFunctionParameterBase(self::PARAM_SET_HEADER_NAMESPACE, $soapHeaderNamespace),
                new PhpFunctionParameterBase(self::PARAM_SET_HEADER_MUSTUNDERSTAND, false),
                new PhpFunctionParameterBase(self::PARAM_SET_HEADER_ACTOR, null),
            ]);
            $model = $this->getModelByName($soapHeaderType);
            if ($model instanceof StructModel) {
                $rules = new Rules($this, $method, new StructAttributeModel($model->getGenerator(), $soapHeaderType, $model->getName(), $model), $this->methods);
                $rules->applyRules(lcfirst($soapHeaderName));
                $firstParameter->setModel($model);
            }
            $method->addChild(sprintf('return $this->%s($%s, \'%s\', $%s, $%s, $%s);', self::METHOD_SET_HEADER_PREFIX, self::PARAM_SET_HEADER_NAMESPACE, $soapHeaderName, lcfirst($soapHeaderName), self::PARAM_SET_HEADER_MUSTUNDERSTAND, self::PARAM_SET_HEADER_ACTOR));
        } catch (\InvalidArgumentException $exception) {
            throw new \InvalidArgumentException(sprintf('Unable to create function parameter for service "%s" with type "%s"', $this->getModel()->getName(), var_export($this->getTypeFromName($soapHeaderName), true)), __LINE__, $exception);
        }
        return $method;
    }
    /**
     * @param string $name
     * @return string
     */
    protected function getTypeFromName($name)
    {
        return self::getValidType($this->getStructAttributeTypeAsPhpType(new StructAttributeModel($this->generator, 'any', $name)), $this->getGenerator()->getOptionXsdTypesPath());
    }
    /**
     * @param string $soapHeaderName
     * @return string
     */
    protected function getSoapHeaderMethodName($soapHeaderName)
    {
        return sprintf('%s%s', self::METHOD_SET_HEADER_PREFIX, ucfirst($soapHeaderName));
    }
    /**
     * @return Service
     */
    protected function addOperationsMethods()
    {
        foreach ($this->getModel()->getMethods() as $method) {
            $this->addMainMethod($method);
        }
        return $this;
    }
    /**
     * @return Service
     */
    protected function addGetResultMethod()
    {
        $method = new PhpMethod(self::METHOD_GET_RESULT);
        $method->addChild('return parent::getResult();');
        $this->methods->add($method);
        return $this;
    }
    /**
     * @param MethodModel $method
     * @return Service
     */
    protected function addMainMethod(MethodModel $method)
    {
        $methodFile = new Operation($method, $this->getGenerator());
        $mainMethod = $methodFile->getMainMethod();
        $this->methods->add($mainMethod);
        $this->setModelFromMethod($mainMethod, $method);
        return $this;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getMethodAnnotationBlock()
     */
    protected function getMethodAnnotationBlock(PhpMethod $method)
    {
        $annotationBlock = new PhpAnnotationBlock();
        if (mb_stripos($method->getName(), self::METHOD_SET_HEADER_PREFIX) === 0) {
            $this->addAnnotationBlockForSoapHeaderMethod($annotationBlock, $method);
        } elseif ($method->getName() === self::METHOD_GET_RESULT) {
            $this->addAnnotationBlockForgetResultMethod($annotationBlock);
        } else {
            $this->addAnnotationBlockForOperationMethod($annotationBlock, $method);
        }
        return $annotationBlock;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @param PhpMethod $method
     * @return Service
     */
    protected function addAnnotationBlockForSoapHeaderMethod(PhpAnnotationBlock $annotationBlock, PhpMethod $method)
    {
        $methodParameters = $method->getParameters();
        $firstParameter = array_shift($methodParameters);
        if ($firstParameter instanceof PhpFunctionParameter) {
            $annotationBlock->addChild(sprintf('Sets the %s SoapHeader param', ucfirst($firstParameter->getName())));
            $firstParameterType = $firstParameter->getType();
            if ($firstParameter->getModel() instanceof StructModel) {
                $firstParameterType = $this->getStructAttributeTypeAsPhpType(new StructAttributeModel($firstParameter->getModel()->getGenerator(), $firstParameter->getName(), $firstParameter->getModel()->getName(), $firstParameter->getModel()));
                if ($firstParameter->getModel()->isRestriction()) {
                    $annotationBlock
                        ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $firstParameter->getModel()->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID)))
                        ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $firstParameter->getModel()->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES)))
                        ->addChild(new PhpAnnotation(self::ANNOTATION_THROWS, '\InvalidArgumentException'));
                }
            }
            $annotationBlock
                ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::setSoapHeader()', $this->getModel()->getExtends(true))))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', $firstParameterType, $firstParameter->getName())))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('string $%s', self::PARAM_SET_HEADER_NAMESPACE)))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('bool $%s', self::PARAM_SET_HEADER_MUSTUNDERSTAND)))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('string $%s', self::PARAM_SET_HEADER_ACTOR)))
                ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, 'bool'));
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @param PhpMethod $method
     * @return Service
     */
    protected function addAnnotationBlockForOperationMethod(PhpAnnotationBlock $annotationBlock, PhpMethod $method)
    {
        if (($model = $this->getModelFromMethod($method)) instanceof MethodModel) {
            $operationAnnotationBlock = new OperationAnnotationBlock($model, $this->getGenerator());
            $operationAnnotationBlock->addAnnotationBlockForOperationMethod($annotationBlock);
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return Service
     */
    protected function addAnnotationBlockForgetResultMethod(PhpAnnotationBlock $annotationBlock)
    {
        $annotationBlock
            ->addChild('Returns the result')->addChild(new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::getResult()', $this->getModel()->getExtends(true))))
            ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getServiceReturnTypes()));
        return $this;
    }
    /**
     * @return string
     */
    protected function getServiceReturnTypes()
    {
        $returnTypes = [];
        foreach ($this->getModel()->getMethods() as $method) {
            $returnTypes[] = self::getOperationMethodReturnType($method, $this->getGenerator());
        }
        natcasesort($returnTypes);
        return implode('|', array_unique($returnTypes));
    }
    /**
     * @param MethodModel $method
     * @return string
     */
    public static function getOperationMethodReturnType(MethodModel $method, Generator $generator)
    {
        $returnType = $method->getReturnType();

        if (is_null($returnType)) {
            return 'null';
        }

        if ((($struct = $generator->getStructByName($returnType)) instanceof StructModel) && !$struct->isRestriction()) {
            if ($struct->isStruct()) {
                $returnType = $struct->getPackagedName(true);
            } elseif ($struct->isArray()) {
                if (($structInheritance = $struct->getInheritanceStruct()) instanceof StructModel) {
                    $returnType = sprintf('%s[]', $structInheritance->getPackagedName(true));
                } else {
                    $returnType = $struct->getInheritance();
                }
            }
        }
        return $returnType;
    }
    /**
     * @param PhpMethod $method
     * @return MethodModel|null
     */
    protected function getModelFromMethod(PhpMethod $method)
    {
        $model = $this->getGenerator()->getServiceMethod($method->getName());
        if (!$model instanceof MethodModel) {
            $model = array_key_exists($method->getName(), $this->methodNames) ? $this->methodNames[$method->getName()] : null;
        }
        return $model;
    }
    /**
     * @param PhpMethod $phpMethod
     * @param MethodModel $methodModel
     * @return Service
     */
    protected function setModelFromMethod(PhpMethod $phpMethod, MethodModel $methodModel)
    {
        $this->methodNames[$phpMethod->getName()] = $methodModel;
        return $this;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getModel()
     * @return ServiceModel
     */
    public function getModel()
    {
        return parent::getModel();
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::setModel()
     * @throws \InvalidArgumentException
     * @param AbstractModel $model
     * @return Service
     */
    public function setModel(AbstractModel $model)
    {
        if (!$model instanceof ServiceModel) {
            throw new \InvalidArgumentException('Model must be an instance of a Service', __LINE__);
        }
        return parent::setModel($model);
    }
}
