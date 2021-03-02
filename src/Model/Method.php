<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\ConfigurationReader\ServiceReservedMethod;
use WsdlToPhp\PackageGenerator\Generator\Generator;

/**
 * Class Method stands for an available operation described in the WSDL.
 */
class Method extends AbstractModel
{
    protected $parameterType;

    protected $returnType;

    protected bool $isUnique = true;

    protected ?string $methodName = null;

    public function __construct(Generator $generator, string $name, $parameterType = null, $returnType = null, ?Service $service = null, bool $isUnique = true)
    {
        parent::__construct($generator, $name);
        $this
            ->setParameterType($parameterType)
            ->setReturnType($returnType)
            ->setUnique($isUnique)
            ->setOwner($service)
        ;
    }

    /**
     * Method name can't starts with numbers.
     */
    public function getCleanName(bool $keepMultipleUnderscores = true): string
    {
        return preg_replace('/^(\d+)([a-zA-Z0-9]*)$/', '_$2', parent::getCleanName($keepMultipleUnderscores));
    }

    /**
     * Returns the name of the method that is used to call the operation
     * It takes care of the fact that the method might not be the only one named as it is.
     */
    public function getMethodName(): string
    {
        if (empty($this->methodName)) {
            $methodName = $this->getCleanName();
            if (!$this->isUnique()) {
                if (is_string($this->getParameterType())) {
                    $methodName .= ucfirst($this->getParameterType());
                } else {
                    $methodName .= '_'.md5(var_export($this->getParameterType(), true));
                }
            }
            $context = $this->getOwner()->getPackagedName();
            $methodName = $this->replaceReservedMethod($methodName, $context);
            $methodName = self::replacePhpReservedKeyword($methodName, $context);
            $this->methodName = self::uniqueName($methodName, $this->getOwner()->getPackagedName());
        }

        return $this->methodName;
    }

    public function getParameterType()
    {
        return $this->parameterType;
    }

    public function setParameterType($parameterType): self
    {
        $this->parameterType = $parameterType;

        return $this;
    }

    public function getReturnType()
    {
        return $this->returnType;
    }

    public function setReturnType($returnType): self
    {
        $this->returnType = $returnType;

        return $this;
    }

    public function isUnique(): bool
    {
        return $this->isUnique;
    }

    public function setUnique(bool $isUnique = true): self
    {
        $this->isUnique = $isUnique;

        return $this;
    }

    public function getOwner(): Service
    {
        return parent::getOwner();
    }

    public function getReservedMethodsInstance(?string $filename = null): ServiceReservedMethod
    {
        return ServiceReservedMethod::instance($filename);
    }

    protected function toJsonSerialize(): array
    {
        return [
            'unique' => $this->isUnique,
            'methodName' => $this->methodName,
            'parameterType' => $this->parameterType,
            'returnType' => $this->returnType,
        ];
    }
}
