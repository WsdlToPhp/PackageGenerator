<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Constant as ConstantContainer;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Property as PropertyContainer;
use WsdlToPhp\PackageGenerator\File\Element\PhpFunctionParameter;
use WsdlToPhp\PackageGenerator\File\Validation\Rules;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Service as ServiceModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PhpGenerator\Element\PhpConstant;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter as PhpFunctionParameterBase;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpProperty;

final class Service extends AbstractModelFile
{
    public const METHOD_SET_HEADER_PREFIX = 'setSoapHeader';
    public const PARAM_SET_HEADER_NAMESPACE = 'namespace';
    public const PARAM_SET_HEADER_MUSTUNDERSTAND = 'mustUnderstand';
    public const PARAM_SET_HEADER_ACTOR = 'actor';
    public const METHOD_GET_RESULT = 'getResult';

    /**
     * Method model can't be found in case the original method's name is unclean:
     * - ex: my.operation.name becomes my_operation_name
     * thus the Model from Model\Service::getMethod() can't be found
     * So we store the generated name associated to the original method object.
     */
    protected array $methodNames = [];

    public static function getOperationMethodReturnType(MethodModel $method, Generator $generator): string
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

    public function setModel(AbstractModel $model): self
    {
        if (!$model instanceof ServiceModel) {
            throw new \InvalidArgumentException('Model must be an instance of a Service', __LINE__);
        }

        return parent::setModel($model);
    }

    public function getModel(): ?ServiceModel
    {
        return parent::getModel();
    }

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

    protected function defineUseStatements(): AbstractModelFile
    {
        $this->getFile()->addUse(\SoapFault::class);

        /** @var Method $method */
        foreach ($this->getModel()->getMethods() as $method) {
            $soapHeaderTypes = $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES, []);
            if (!is_array($soapHeaderTypes)) {
                continue;
            }
            foreach ($soapHeaderTypes as $soapHeaderType) {
                $model = $this->getModelByName($soapHeaderType);
                if (!$model instanceof StructModel) {
                    continue;
                }
                if (!$model->isRestriction()) {
                    continue;
                }

                $this->getFile()->addUse(\InvalidArgumentException::class);

                break 2;
            }
        }

        return parent::defineUseStatements();
    }

    protected function getClassDeclarationLineText(): string
    {
        return GeneratorOptions::VALUE_NONE === $this->getGenerator()->getOptionGatherMethods() ? 'This class stands for all operations' : parent::getClassDeclarationLineText();
    }

    protected function fillClassMethods(): void
    {
        $this
            ->addSoapHeaderMethods()
            ->addOperationsMethods()
            ->addGetResultMethod()
        ;
    }

    protected function addSoapHeaderMethods(): self
    {
        foreach ($this->getModel()->getMethods() as $method) {
            $this->addSoapHeaderFromMethod($method);
        }

        return $this;
    }

    protected function addSoapHeaderFromMethod(MethodModel $method): self
    {
        $soapHeaderNames = $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES, []);
        $soapHeaderNamespaces = $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES, []);
        $soapHeaderTypes = $method->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES, []);
        if (is_array($soapHeaderNames) && is_array($soapHeaderNamespaces) && is_array($soapHeaderTypes)) {
            foreach ($soapHeaderNames as $index => $soapHeaderName) {
                $methodName = $this->getSoapHeaderMethodName($soapHeaderName);
                if (is_null($this->methods->get($methodName))) {
                    $soapHeaderNamespace = array_key_exists($index, $soapHeaderNamespaces) ? $soapHeaderNamespaces[$index] : null;
                    $soapHeaderType = array_key_exists($index, $soapHeaderTypes) ? $soapHeaderTypes[$index] : null;
                    $this->methods->add($this->getSoapHeaderMethod($methodName, $soapHeaderName, $soapHeaderNamespace, $soapHeaderType));
                }
            }
        }

        return $this;
    }

    protected function getSoapHeaderMethod(string $methodName, string $soapHeaderName, string $soapHeaderNamespace, string $soapHeaderType): PhpMethod
    {
        try {
            $method = new PhpMethod($methodName, [
                $firstParameter = new PhpFunctionParameter(lcfirst($soapHeaderName), PhpFunctionParameterBase::NO_VALUE, $this->getTypeFromName($soapHeaderType)),
                new PhpFunctionParameterBase(self::PARAM_SET_HEADER_NAMESPACE, $soapHeaderNamespace, self::TYPE_STRING),
                new PhpFunctionParameterBase(self::PARAM_SET_HEADER_MUSTUNDERSTAND, false, self::TYPE_BOOL),
                new PhpFunctionParameterBase(self::PARAM_SET_HEADER_ACTOR, null, '?'.self::TYPE_STRING),
            ], self::TYPE_SELF);

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

    protected function getTypeFromName(string $name): ?string
    {
        return self::getPhpType(
            $this->getStructAttributeTypeAsPhpType(new StructAttributeModel($this->generator, 'any', $name)),
            $this->getGenerator()->getOptionXsdTypesPath(),
            $this->getStructAttributeTypeAsPhpType(new StructAttributeModel($this->generator, 'any', $name))
        );
    }

    protected function getSoapHeaderMethodName(string $soapHeaderName): string
    {
        return sprintf('%s%s', self::METHOD_SET_HEADER_PREFIX, ucfirst($soapHeaderName));
    }

    protected function addOperationsMethods(): self
    {
        foreach ($this->getModel()->getMethods() as $method) {
            $this->addMainMethod($method);
        }

        return $this;
    }

    protected function addGetResultMethod(): self
    {
        $method = new PhpMethod(self::METHOD_GET_RESULT);
        $method->addChild('return parent::getResult();');
        $this->methods->add($method);

        return $this;
    }

    protected function addMainMethod(MethodModel $method): self
    {
        $methodFile = new Operation($method, $this->getGenerator());
        $mainMethod = $methodFile->getMainMethod();
        $this->methods->add($mainMethod);
        $this->setModelFromMethod($mainMethod, $method);

        return $this;
    }

    protected function getMethodAnnotationBlock(PhpMethod $method): PhpAnnotationBlock
    {
        $annotationBlock = new PhpAnnotationBlock();
        if (0 === mb_stripos($method->getName(), self::METHOD_SET_HEADER_PREFIX)) {
            $this->addAnnotationBlockForSoapHeaderMethod($annotationBlock, $method);
        } elseif (self::METHOD_GET_RESULT === $method->getName()) {
            $this->addAnnotationBlockForgetResultMethod($annotationBlock);
        } else {
            $this->addAnnotationBlockForOperationMethod($annotationBlock, $method);
        }

        return $annotationBlock;
    }

    protected function addAnnotationBlockForSoapHeaderMethod(PhpAnnotationBlock $annotationBlock, PhpMethod $method): self
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
                        ->addChild(new PhpAnnotation(self::ANNOTATION_THROWS, \InvalidArgumentException::class))
                    ;
                }
            }
            $annotationBlock
                ->addChild(new PhpAnnotation(self::ANNOTATION_USES, sprintf('%s::%s()', $this->getModel()->getExtends(true), self::METHOD_SET_HEADER_PREFIX)))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', $firstParameterType, $firstParameter->getName())))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', self::TYPE_STRING, self::PARAM_SET_HEADER_NAMESPACE)))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s $%s', self::TYPE_BOOL, self::PARAM_SET_HEADER_MUSTUNDERSTAND)))
                ->addChild(new PhpAnnotation(self::ANNOTATION_PARAM, sprintf('%s|null $%s', self::TYPE_STRING, self::PARAM_SET_HEADER_ACTOR)))
                ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getModel()->getPackagedName(true)))
            ;
        }

        return $this;
    }

    protected function addAnnotationBlockForOperationMethod(PhpAnnotationBlock $annotationBlock, PhpMethod $method): self
    {
        if (($model = $this->getModelFromMethod($method)) instanceof MethodModel) {
            $operationAnnotationBlock = new OperationAnnotationBlock($model, $this->getGenerator());
            $operationAnnotationBlock->addAnnotationBlockForOperationMethod($annotationBlock);
        }

        return $this;
    }

    protected function addAnnotationBlockForgetResultMethod(PhpAnnotationBlock $annotationBlock): self
    {
        $annotationBlock
            ->addChild('Returns the result')->addChild(new PhpAnnotation(self::ANNOTATION_SEE, sprintf('%s::getResult()', $this->getModel()->getExtends(true))))
            ->addChild(new PhpAnnotation(self::ANNOTATION_RETURN, $this->getServiceReturnTypes()))
        ;

        return $this;
    }

    protected function getServiceReturnTypes(): string
    {
        $returnTypes = [];
        foreach ($this->getModel()->getMethods() as $method) {
            $returnTypes[] = self::getOperationMethodReturnType($method, $this->getGenerator());
        }
        natcasesort($returnTypes);

        return implode('|', array_unique($returnTypes));
    }

    protected function getModelFromMethod(PhpMethod $method): ?MethodModel
    {
        $model = $this->getGenerator()->getServiceMethod($method->getName());
        if (!$model instanceof MethodModel) {
            $model = array_key_exists($method->getName(), $this->methodNames) ? $this->methodNames[$method->getName()] : null;
        }

        return $model;
    }

    protected function setModelFromMethod(PhpMethod $phpMethod, MethodModel $methodModel): self
    {
        $this->methodNames[$phpMethod->getName()] = $methodModel;

        return $this;
    }
}
