<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;

abstract class AbstractOperation
{
    /**
     * @var string
     */
    const DEFAULT_TYPE = 'string';
    /**
     * @var string
     */
    const ARRAY_TYPE = 'array';
    /**
     * @var string
     */
    const SOAP_CALL_NAME = '__soapCall';
    /**
     * @var MethodModel
     */
    protected $method;
    /**
     * @var Generator
     */
    protected $generator;
    /**
     * @param MethodModel $method
     * @param Generator $generator
     */
    public function __construct(MethodModel $method, Generator $generator)
    {
        $this->setMethod($method)->setGenerator($generator);
    }
    /**
     * @return StructModel|null
     */
    protected function getParameterTypeModel()
    {
        return $this->isParameterTypeAString() ? $this->getGenerator()->getStructByName($this->getMethod()->getParameterType()) : null;
    }
    /**
     * @return bool
     */
    protected function isParameterTypeEmpty()
    {
        $parameterType = $this->getMethod()->getParameterType();
        return empty($parameterType);
    }
    /**
     * @return bool
     */
    protected function isParameterTypeAnArray()
    {
        return is_array($this->getMethod()->getParameterType());
    }
    /**
     * @param bool $methodUsage
     * @return string[]
     */
    protected function getParameterTypeArrayTypes($methodUsage = false)
    {
        $types = [];
        $parameterTypes = $this->getMethod()->getParameterType();
        if (is_array($parameterTypes)) {
            foreach ($parameterTypes as $parameterName => $parameterType) {
                $type = $methodUsage ? null : self::DEFAULT_TYPE;
                if (($model = $this->getGenerator()->getStructByName($parameterType)) instanceof StructModel) {
                    if ($model->isStruct() && !$model->isRestriction()) {
                        $type = $model->getPackagedName(true);
                    } elseif (!$model->isStruct() && $model->isArray()) {
                        if ($methodUsage) {
                            $type = self::ARRAY_TYPE;
                        } else {
                            $type = ($struct = $model->getTopInheritanceStruct()) ? sprintf('%s[]', $struct->getPackagedName(true)) : $model->getTopInheritance();
                        }
                    }
                }
                $types[$parameterName] = $type;
            }
        }
        return $types;
    }
    /**
     * @return bool
     */
    protected function isParameterTypeAString()
    {
        return is_string($this->getMethod()->getParameterType());
    }
    /**
     * @return bool
     */
    protected function isParameterTypeAModel()
    {
        return $this->getParameterTypeModel() instanceof StructModel;
    }
    /**
     * @param string $name
     * @return string
     */
    protected function getParameterName($name)
    {
        return lcfirst(AbstractModel::cleanString($name));
    }
    /**
     * @param string $name
     * @param string $type
     * @return PhpFunctionParameter
     */
    protected function getMethodParameter($name, $type = null)
    {
        try {
            return new PhpFunctionParameter($name, PhpFunctionParameter::NO_VALUE, $type);
        } catch (\InvalidArgumentException $exception) {
            throw new \InvalidArgumentException(sprintf('Unable to create function parameter for method "%s" with type "%s" and name "%s"', $this->getMethod()->getName(), var_export($type, true), $name), __LINE__, $exception);
        }
    }
    /**
     * @param Generator $generator
     * @return AbstractOperation
     */
    public function setGenerator(Generator $generator)
    {
        $this->generator = $generator;
        return $this;
    }
    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->generator;
    }
    /**
     * @param MethodModel $method
     * @return AbstractOperation
     */
    public function setMethod(MethodModel $method)
    {
        $this->method = $method;
        return $this;
    }
    /**
     * @return MethodModel
     */
    public function getMethod()
    {
        return $this->method;
    }
    /**
     * @param string $name
     * @return StructModel|null
     */
    protected function getModelByName($name)
    {
        return $this->getGenerator()->getStructByName($name);
    }
}
