<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PhpGenerator\Element\PhpMethod;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;

class Operation extends AbstractOperation
{
    /**
     * @return PhpMethod
     */
    public function getMainMethod()
    {
        $phpMethod = new PhpMethod($this->getMethod()->getMethodName());
        $this->defineParameters($phpMethod)->defineBody($phpMethod);
        return $phpMethod;
    }
    /**
     * @param PhpMethod $method
     * @return Operation
     */
    protected function defineParameters(PhpMethod $method)
    {
        return $this->defineParametersFromArray($method)->defineParametersFromModel($method)->defineParametersFromString($method);
    }
    /**
     * @param PhpMethod $method
     * @return Operation
     */
    protected function defineParametersFromArray(PhpMethod $method)
    {
        if ($this->isParameterTypeAnArray()) {
            $parameters = [];
            foreach ($this->getParameterTypeArrayTypes(true) as $parameterName => $parameterType) {
                $parameters[] = $this->getMethodParameter($this->getParameterName($parameterName), $parameterType);
            }
            $method->setParameters($parameters);
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Operation
     */
    protected function defineParametersFromModel(PhpMethod $method)
    {
        if ($this->isParameterTypeAModel()) {
            if ($this->getParameterTypeModel()->getAttributes(true, true)->count() > 0) {
                $method->setParameters([
                    $this->getMethodParameter($this->getParameterName($this->getParameterTypeModel()->getPackagedName()), $this->getParameterTypeModel()->getPackagedName(true)),
                ]);
            }
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Operation
     */
    protected function defineParametersFromString(PhpMethod $method)
    {
        if ($this->isParameterTypeAString() && !$this->isParameterTypeAModel()) {
            $method->setParameters([
                $this->getMethodParameter($this->getParameterName($this->getMethod()->getParameterType())),
            ]);
        }
        return $this;
    }
    /**
     * @param PhpMethod $method
     * @return Operation
     */
    protected function defineBody(PhpMethod $method)
    {
        $method->addChild('try {')
            ->addChild($method->getIndentedString(sprintf('$this->setResult($this->getSoapClient()->%s%s));', $this->getSoapCallName(), $this->getOperationCallParameters($method)), 1))
            ->addChild($method->getIndentedString('return $this->getResult();', 1))
            ->addChild('} catch (\SoapFault $soapFault) {')
            ->addChild($method->getIndentedString('$this->saveLastError(__METHOD__, $soapFault);', 1))
            ->addChild($method->getIndentedString('return false;', 1))
            ->addChild('}');
        return $this;
    }
    /**
     * @return string
     */
    protected function getSoapCallName()
    {
        return sprintf('%s(\'%s\'%s', self::SOAP_CALL_NAME, $this->getMethod()->getName(), $this->getOperationCallParametersStarting());
    }
    /**
     * @param PhpMethod $method
     * @return string
     */
    protected function getOperationCallParameters(PhpMethod $method)
    {
        $parameters = [];
        foreach ($method->getParameters() as $parameter) {
            if ($parameter instanceof PhpFunctionParameter) {
                $parameters[] = $this->getOperationCallParameterName($parameter, $method);
            }
        }
        return sprintf('%s%s, array(), array(), $this->outputHeaders', implode('', $parameters), $this->isParameterTypeEmpty() ? '' : PhpMethod::BREAK_LINE_CHAR . ')');
    }
    /**
     * @return string
     */
    protected function getOperationCallParametersStarting()
    {
        return $this->isParameterTypeAnArray() ? ', array(' : ($this->isParameterTypeEmpty() ? ', array()' : ', array(');
    }
    /**
     * @return string
     */
    protected function getOperationCallParametersEnding()
    {
        return sprintf('%s)', PhpMethod::BREAK_LINE_CHAR);
    }
    /**
     * @param PhpFunctionParameter $parameter
     * @param PhpMethod $method
     * @return string
     */
    protected function getOperationCallParameterName(PhpFunctionParameter $parameter, PhpMethod $method)
    {
        $cloneParameter = clone $parameter;
        $cloneParameter->setType(null);
        return sprintf('%s%s', PhpMethod::BREAK_LINE_CHAR, $method->getIndentedString(sprintf('%s,', $cloneParameter->getPhpDeclaration()), 1));
    }
}
