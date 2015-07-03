<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property as PropertyContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Service as ServiceModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;

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
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getClassMethods()
     */
    protected function getClassMethods(MethodContainer $methods)
    {
        $this
            ->addSoapHeaderMethods($methods)
            ->addOperationsMethods($methods)
            ->addGetResultMethod($methods);
    }
    /**
     * @param MethodContainer $methods
     * @return Service
     */
    protected function addSoapHeaderMethods(MethodContainer $methods)
    {
        foreach ($this->getModel()->getMethods() as $method) {
            $this->addSoapHeaderFromMethod($methods, $method);
        }
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @param MethodModel $method
     */
    protected function addSoapHeaderFromMethod(MethodContainer $methods, MethodModel $method)
    {
        $soapHeaderNames = $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES, array());
        $soapHeaderTypes = $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES, array());
        $soapHeaderNamespaces = $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES, array());
        foreach ($soapHeaderNames as $index=>$soapHeaderName) {
            $methodName = $this->getSoapHeaderMethodName($soapHeaderName);
            if ($methods->get($methodName) === null) {
                $soapHeaderNamespace = array_key_exists($index, $soapHeaderNamespaces) ? $soapHeaderNamespaces[$index] : null;
                $methods->add($this->getSoapHeaderMethod($methodName, $soapHeaderName, $soapHeaderNamespace));
            }
        }
        return $this;
    }
    /**
     * @param string $methodName
     * @param string $soapHeaderName
     * @param string $soapHeaderNamespace
     * @return PhpMethod
     */
    protected function getSoapHeaderMethod($methodName, $soapHeaderName, $soapHeaderNamespace)
    {
        $method = new PhpMethod($methodName, array(
            new PhpFunctionParameter(lcfirst($soapHeaderName), PhpFunctionParameter::NO_VALUE),
            new PhpFunctionParameter(self::PARAM_SET_HEADER_NAMESPACE, $soapHeaderNamespace),
            new PhpFunctionParameter(self::PARAM_SET_HEADER_MUSTUNDERSTAND, false),
            new PhpFunctionParameter(self::PARAM_SET_HEADER_ACTOR, null),
        ));
        $method->addChild(sprintf('return $this->%s($%s, \'%s\', $%s, $%s, $%s);',
            self::METHOD_SET_HEADER_PREFIX,
            self::PARAM_SET_HEADER_NAMESPACE,
            $soapHeaderName,
            lcfirst($soapHeaderName),
            self::PARAM_SET_HEADER_MUSTUNDERSTAND,
            self::PARAM_SET_HEADER_ACTOR));
        return $method;
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
     * @param MethodContainer $methods
     * @return Service
     */
    protected function addOperationsMethods(MethodContainer $methods)
    {
        foreach ($this->getModel()->getMethods() as $method) {
            $this->addMainMethod($methods, $method);
        }
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @return Service
     */
    protected function addGetResultMethod(MethodContainer $methods)
    {
        $method = new PhpMethod(self::METHOD_GET_RESULT);
        $method->addChild('return parent::getResult();');
        $methods->add($method);
        return $this;
    }
    /**
     * @param MethodContainer $methods
     * @param MethodModel $method
     * @return Service
     */
    protected function addMainMethod(MethodContainer $methods, MethodModel $method)
    {
        $methodFile = new Operation($method, $this->getGenerator());
        $methodFile->addMainMethod($methods);
        return $this;
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractModelFile::getMethodAnnotationBlock()
     */
    protected function getMethodAnnotationBlock(PhpMethod $method)
    {
        $annotationBlock = new PhpAnnotationBlock();
        if (stripos($method->getName(), self::METHOD_SET_HEADER_PREFIX) === 0) {
            $this->addAnnotationBlockForSoapHeaderMethod($annotationBlock, $method);
        } elseif ($method->getName() === self::METHOD_GET_RESULT) {
            $this->addAnnnotationBlockForgetResultMethod($annotationBlock);
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
            $annotationBlock
                ->addChild(sprintf('Sets the %s SoapHeader param', ucfirst($firstParameter->getName())))
                ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::setSoapHeader()', AbstractModel::getGenericWsdlClassName())))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', ucfirst($firstParameter->getName()), $firstParameter->getName())))
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
    protected function addAnnnotationBlockForgetResultMethod(PhpAnnotationBlock $annotationBlock)
    {
        $annotationBlock
            ->addChild('Returns the result')
            ->addChild(new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::getResult()', AbstractModel::getGenericWsdlClassName())))
            ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getServiceReturnTypes(), self::ANNOTATION_LONG_LENGTH));
        return $this;
    }
    /**
     * @return string
     */
    protected function getServiceReturnTypes()
    {
        $returnTypes = array();
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
        if ((($struct = $generator->getStruct($returnType)) instanceof StructModel) && $struct->getIsStruct() && !$struct->getIsRestriction()) {
            $returnType = $struct->getPackagedName();
        }
        return $returnType;
    }
    /**
     * @param PhpMethod $method
     * @return MethodModel|null
     */
    protected function getModelFromMethod(PhpMethod $method)
    {
        return $this->getGenerator()->getServiceMethod($method->getName());
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
     * @throws \InvalidaArgumentException
     * @param AbstractModel $model
     * @return Service
     */
    public function setModel(AbstractModel $model)
    {
        if (!$model instanceof ServiceModel) {
            throw new \InvalidArgumentException('Model must be an instance of a Service');
        }
        return parent::setModel($model);
    }
}
