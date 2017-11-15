<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\ConfigurationReader\ServiceReservedMethod;

/**
 * Class Method stands for an available operation described in the WSDL
 */
class Method extends AbstractModel
{
    /**
     * Type of the parameter for the operation
     * @var string
     */
    protected $parameterType = '';
    /**
     * Type of the return value for the operation
     * @var string
     */
    protected $returnType = '';
    /**
     * Indicates function is not alone with this name, then its name is contextualized based on its parameter(s)
     * @var bool
     */
    protected $isUnique = true;
    /**
     * Generated method name stored as soon as it has been defined once
     * @var string
     */
    protected $methodName = null;
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses Method::setParameterType()
     * @uses Method::setReturnType()
     * @uses AbstractModel::setOwner()
     * @param Generator $generator
     * @param string $name the function name
     * @param string|array $parameterType the type/name of the parameter
     * @param string|array $returnType the type/name of the return value
     * @param Service $service defines the struct which owns this value
     * @param bool $isUnique defines if the method is unique or not
     */
    public function __construct(Generator $generator, $name, $parameterType = '', $returnType = '', Service $service = null, $isUnique = true)
    {
        parent::__construct($generator, $name);
        $this->setParameterType($parameterType)->setReturnType($returnType)->setUnique($isUnique)->setOwner($service);
    }
    /**
     * Method name can't starts with numbers
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::getCleanName()
     * @param bool $keepMultipleUnderscores
     * @return string
     */
    public function getCleanName($keepMultipleUnderscores = true)
    {
        return preg_replace('/^(\d+)([a-zA-Z0-9]*)$/', '_$2', parent::getCleanName($keepMultipleUnderscores));
    }
    /**
     * Returns the name of the method that is used to call the operation
     * It takes care of the fact that the method might not be the only one named as it is.
     * @uses Method::getCleanName()
     * @uses AbstractModel::replacePhpReservedKeyword()
     * @uses AbstractModel::getOwner()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::uniqueName()
     * @uses Method::getOwner()
     * @uses Method::getParameterType()
     * @uses Method::isUnique()
     * @return string
     */
    public function getMethodName()
    {
        if (empty($this->methodName)) {
            $methodName = $this->getCleanName();
            if (!$this->isUnique()) {
                if (is_string($this->getParameterType())) {
                    $methodName .= ucfirst($this->getParameterType());
                } else {
                    $methodName .= '_' . md5(var_export($this->getParameterType(), true));
                }
            }
            $context = $this->getOwner()->getPackagedName();
            $methodName = $this->replaceReservedMethod($methodName, $context);
            $methodName = self::replacePhpReservedKeyword($methodName, $context);
            $this->methodName = self::uniqueName($methodName, $this->getOwner()->getPackagedName());
        }
        return $this->methodName;
    }
    /**
     * Returns the parameter type
     * @return string|string[]
     */
    public function getParameterType()
    {
        return $this->parameterType;
    }
    /**
     * Set the parameter type
     * @param string|string[]
     * @return Method
     */
    public function setParameterType($parameterType)
    {
        $this->parameterType = $parameterType;
        return $this;
    }
    /**
     * Returns the return type
     * @return string
     */
    public function getReturnType()
    {
        return $this->returnType;
    }
    /**
     * Set the return type
     * @param string|string[]
     * @return Method
     */
    public function setReturnType($returnType)
    {
        $this->returnType = $returnType;
        return $this;
    }
    /**
     * Returns the isUnique property
     * @return bool
     */
    public function isUnique()
    {
        return $this->isUnique;
    }
    /**
     * Set the isUnique property
     * @param bool
     * @return Method
     */
    public function setUnique($isUnique)
    {
        $this->isUnique = $isUnique;
        return $this;
    }
    /**
     * Returns the owner model object, meaning a Service object
     * @see AbstractModel::getOwner()
     * @uses AbstractModel::getOwner()
     * @return Service
     */
    public function getOwner()
    {
        return parent::getOwner();
    }
    /**
     * @param $filename
     * @return ServiceReservedMethod
     */
    public function getReservedMethodsInstance($filename = null)
    {
        return ServiceReservedMethod::instance($filename);
    }
    /**
     * {@inheritDoc}
     * @see \WsdlToPhp\PackageGenerator\Model\AbstractModel::toJsonSerialize()
     */
    protected function toJsonSerialize()
    {
        return [
            'unique' => $this->isUnique,
            'methodName' => $this->methodName,
            'parameterType' => $this->parameterType,
            'returnType' => $this->returnType,
        ];
    }
}
