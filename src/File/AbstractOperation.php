<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;

abstract class AbstractOperation
{
    public const SOAP_CALL_NAME = '__soapCall';

    protected MethodModel $method;

    protected Generator $generator;

    public function __construct(MethodModel $method, Generator $generator)
    {
        $this
            ->setMethod($method)
            ->setGenerator($generator)
        ;
    }

    public function setGenerator(Generator $generator): self
    {
        $this->generator = $generator;

        return $this;
    }

    public function getGenerator(): Generator
    {
        return $this->generator;
    }

    public function setMethod(MethodModel $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getMethod(): MethodModel
    {
        return $this->method;
    }

    protected function getParameterTypeModel(): ?StructModel
    {
        return $this->isParameterTypeAString() ? $this->getGenerator()->getStructByName($this->getMethod()->getParameterType()) : null;
    }

    protected function isParameterTypeEmpty(): bool
    {
        $parameterType = $this->getMethod()->getParameterType();

        return empty($parameterType);
    }

    protected function isParameterTypeAnArray(): bool
    {
        return is_array($this->getMethod()->getParameterType());
    }

    protected function getParameterTypeArrayTypes(bool $methodUsage = false): array
    {
        $types = [];
        $parameterTypes = $this->getMethod()->getParameterType();
        if (!is_array($parameterTypes)) {
            return [];
        }

        foreach ($parameterTypes as $parameterName => $parameterType) {
            $type = $methodUsage ? null : AbstractModelFile::TYPE_STRING;

            if (($model = $this->getGenerator()->getStructByName($parameterType)) instanceof StructModel) {
                if ($model->isStruct() && !$model->isRestriction()) {
                    $type = $model->getPackagedName(true);
                } elseif (!$model->isStruct() && $model->isArray()) {
                    if ($methodUsage) {
                        $type = AbstractModelFile::TYPE_ARRAY;
                    } else {
                        $type = ($struct = $model->getTopInheritanceStruct()) ? sprintf('%s[]', $struct->getPackagedName(true)) : $model->getTopInheritance();
                    }
                }
            }
            $types[$parameterName] = $type;
        }

        return $types;
    }

    protected function isParameterTypeAString(): bool
    {
        return is_string($this->getMethod()->getParameterType());
    }

    protected function isParameterTypeAModel(): bool
    {
        return $this->getParameterTypeModel() instanceof StructModel;
    }

    protected function getParameterName(string $name): string
    {
        return lcfirst(AbstractModel::cleanString($name));
    }

    protected function getMethodParameter(string $name, ?string $type = null): PhpFunctionParameter
    {
        try {
            return new PhpFunctionParameter($name, PhpFunctionParameter::NO_VALUE, $type);
        } catch (\InvalidArgumentException $exception) {
            throw new \InvalidArgumentException(sprintf('Unable to create function parameter for method "%s" with type "%s" and name "%s"', $this->getMethod()->getName(), var_export($type, true), $name), __LINE__, $exception);
        }
    }

    protected function getModelByName(string $name): ?StructModel
    {
        return $this->getGenerator()->getStructByName($name);
    }
}
