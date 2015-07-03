<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;
use WsdlToPhp\PackageGenerator\Container\PhpElement\Method as MethodContainer;

class Operation extends AbstractOperation
{
    /**
     * @param MethodModel $method
     * @return Method
     */
    public function addMainMethod(MethodContainer $methods)
    {
        $phpMethod = new PhpMethod($this->getMethod()->getMethodName());
        $this
            ->defineParameters($phpMethod)
            ->defineBody($phpMethod);
        $methods->add($phpMethod);
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Method
     */
    protected function defineParameters(PhpMethod $method)
    {
        return $this
            ->defineParametersFromArray($method)
            ->defineParametersFromModel($method)
            ->defineParametersFromString($method);
    }
    /**
     * @param PhpMethod $method
     * @return Method
     */
    protected function defineParametersFromArray(PhpMethod $method)
    {
        if ($this->isParameterTypeAnArray()) {
            $parameters = array();
            foreach ($this->getMethod()->getParameterType() as $parameterName => $parameterType) {
                $type = null;
                if (($model = $this->getGenerator()->getStruct($parameterType)) instanceof StructModel && $model->getIsStruct() && !$model->getIsRestriction()) {
                    $type = $model->getPackagedName();
                }
                $parameters[] = $this->getMethodParameter($this->getParameterName($parameterName), $type);
            }
            $method->setParameters($parameters);
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Method
     */
    protected function defineParametersFromModel(PhpMethod $method)
    {
        if ($this->isParameterTypeAModel()) {
            if ($this->getParameterTypeModel()->getAttributes(true, true)->count() > 0) {
                $method->setParameters(array(
                    $this->getMethodParameter($this->getParameterName($this->getParameterTypeModel()->getPackagedName()), $this->getParameterTypeModel()->getPackagedName())
                ));
            }

        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Method
     */
    protected function defineParametersFromString(PhpMethod $method)
    {
        if ($this->isParameterTypeAString() && !$this->isParameterTypeAModel()) {
            $method->setParameters(array(
                $this->getMethodParameter($this->getParameterName($this->getMethod()->getParameterType()))
            ));
        }
        return $this;
    }
    /**
     * @param MethodModel $method
     * @return Method
     */
    protected function defineBody(PhpMethod $method)
    {
        $method
            ->addChild('try {')
                ->addChild($method->getIndentedString(sprintf('return $this->setResult(self::getSoapClient()->%s(%s));', $method->getName(), $this->getOperationCallParameters($method)), 1))
            ->addChild('} catch(SoapFault $soapFault) {')
                ->addChild($method->getIndentedString('return !$this->saveLastError(__METHOD__, $soapFault);', 1))
            ->addChild('}');
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return string
     */
    protected function getOperationCallParameters(PhpMethod $method)
    {
        $parameters = array();
        foreach ($method->getParameters() as $parameter) {
            $parameters[] = $this->getOperationCallParameterName($parameter);
        }
        return implode(', ', $parameters);
    }
    /**
     * @param PhpFunctionParameter $parameter
     * @return string
     */
    protected function getOperationCallParameterName(PhpFunctionParameter $parameter)
    {
        $cloneParameter = clone $parameter;
        $cloneParameter->setType(null);
        return $cloneParameter->getPhpDeclaration();
    }
}
