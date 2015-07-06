<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Generator;

/**
 * Class Method stands for an available operation described in the WSDL
 */
class Method extends AbstractModel
{
    /**
     * Type of the parameter for the operation
     * @var string
     */
    private $parameterType = '';
    /**
     * Type of the return value for the operation
     * @var string
     */
    private $returnType = '';
    /**
     * Indicates function is not alone with this name, then its name is contextualized based on its parameter(s)
     * @var bool
     */
    private $isUnique = true;
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses Method::setParameterType()
     * @uses Method::setReturnType()
     * @uses AbstractModel::setOwner()
     * @param string $name the function name
     * @param string|array $parameterType the type/name of the parameter
     * @param string|array $returnType the type/name of the return value
     * @param Service $service defines the struct which owns this value
     * @param bool $isUnique defines if the method is unique or not
     */
    public function __construct($name, $parameterType, $returnType, Service $service, $isUnique = true)
    {
        parent::__construct($name);
        $this
            ->setParameterType($parameterType)
            ->setReturnType($returnType)
            ->setOwner($service)
            ->setIsUnique($isUnique);
    }
    /**
     * Returns the name of the method that is used to call the operation
     * It takes care of the fact that the method might not be the only one named as it is.
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::replaceReservedPhpKeyword()
     * @uses AbstractModel::getOwner()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::uniqueName()
     * @uses Method::getOwner()
     * @uses Method::getParameterType()
     * @uses Method::getIsUnique()
     * @return string
     */
    public function getMethodName()
    {
        $methodName = $this->getCleanName();
        if (!$this->getIsUnique()) {
            if (is_string($this->getParameterType())) {
                $methodName .= ucfirst($this->getParameterType());
            } else {
                $methodName .= '_' . md5(var_export($this->getParameterType(), true));
            }
        }
        $methodName = self::replaceReservedPhpKeyword($methodName, $this->getOwner()->getPackagedName());
        return self::uniqueName($methodName, $this->getOwner()->getPackagedName());
    }
    public function getClassBody(&$class)
    {
    }
    /**
     * Returns the comment lines for this function
     * @see AbstractModel::getComment()
     * @uses Attribute::getGetterName()
     * @uses Method::getParameterType()
     * @uses Method::getReturnType()
     * @uses Method::getIsUnique()
     * @uses Struct::getAttributes()
     * @uses Struct::getIsStruct()
     * @uses Struct::getIsRestriction()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::getModelByName()
     * @uses AbstractModel::addMetaComment()
     * @uses AbstractModel::getDocumentation()
     * @uses AbstractModel::getGenericWsdlClassName()
     * @uses AbstractModel::cleanString()
     * @return array
     */
    public function getComment()
    {
        $comments = array();
        array_push($comments, 'Method to call the operation originally named ' . $this->getName());
        if (!$this->getIsUnique()) {
            array_push($comments, 'This method has been renamed because it is defined several times but with different signature');
        }
        if ($this->getDocumentation() != '') {
            array_push($comments, 'Documentation : ' . $this->getDocumentation());
        }
        $this->addMetaComment($comments, false, true);
        /**
         * @Uses and @Param
         */
        if (Generator::instance()->getOptionGenerateWsdlClassFile()) {
            array_push($comments, '@uses ' . self::getGenericWsdlClassName() . '::getSoapClient()');
            array_push($comments, '@uses ' . self::getGenericWsdlClassName() . '::setResult()');
            array_push($comments, '@uses ' . self::getGenericWsdlClassName() . '::saveLastError()');
        }
        if (is_string($this->getParameterType())) {
            $model = self::getModelByName($this->getParameterType());
            if ($model && $model->getIsStruct() && !$model->getIsRestriction()) {
                array_push($comments, '@param ' . $model->getPackagedName() . ' $' . lcfirst($model->getPackagedName()));
            } else {
                array_push($comments, '@param ' . $this->getParameterType() . ' $' . lcfirst($this->getParameterType()));
            }
        } elseif (is_array($this->getParameterType())) {
            foreach ($this->getParameterType() as $parameterName => $parameterType) {
                $model = self::getModelByName($parameterType);
                if ($model && $model->getIsStruct() && !$model->getIsRestriction()) {
                    array_push($comments, '@param ' . $model->getPackagedName() . ' $' . lcfirst(self::cleanString($parameterName)));
                } else {
                    array_push($comments, '@param ' . $parameterType . ' $' . lcfirst(self::cleanString($parameterName)));
                }
            }
        }
        /**
         * @Return
         */
        $model = self::getModelByName($this->getReturnType());
        if ($model && $model->getIsStruct() && !$model->getIsRestriction()) {
            array_push($comments, '@return ' . $model->getPackagedName());
        } else {
            array_push($comments, '@return ' . $this->getReturnType());
        }
        unset($model);
        return $comments;
    }
    /**
     * Set the function body
     * @uses AbstractModel::getName()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::getModelByName()
     * @uses AbstractModel::nameIsClean()
     * @uses AbstractModel::cleanString()
     * @uses AbstractModel::uniqueName()
     * @uses Method::getParameterType()
     * @uses Method::getOwner()
     * @uses Method::getMethodName()
     * @uses Struct::getAttributes()
     * @uses Struct::getIsStruct()
     * @uses Attribute::getGetterName()
     * @uses Generator::instance()->getOptionResponseAsWsdlObject()
     * @uses Generator::instance()->getOptionSendParametersAsArray()
     * @uses Generator::instance()->getOptionSendArrayAsParameter()
     * @uses Generator::instance()->getOptionSendArrayAsParameter()
     * @param array
     * @return void
     */
    public function getBody(&$body)
    {
        $parameterModel = self::getModelByName($this->getParameterType());
        $parameterModel = ($parameterModel && $parameterModel->getIsStruct() && !$parameterModel->getIsRestriction()) ? $parameterModel : null;
        $parameterModelAttributesCount = $parameterModel instanceof Struct ? $parameterModel->getAttributes(true, true)->count() : 0;
        $returnModel = self::getModelByName($this->getReturnType());
        $returnModel = ($returnModel && $returnModel->getIsStruct() && !$returnModel->getIsRestriction()) ? $returnModel : null;
        if ($parameterModel) {
            if ($parameterModelAttributesCount > 0) {
                $parameterName = '$' . lcfirst($parameterModel->getPackagedName());
                $parameter = $parameterModel->getPackagedName() . ' ' . $parameterName;
            } else {
                $parameterName = $parameter = '';
            }
        } elseif (is_string($this->getParameterType())) {
            $parameterName = $parameter = '$' . lcfirst(self::cleanString($this->getParameterType()));
        } elseif (is_array($this->getParameterType())) {
            $parameters = array();
            foreach ($this->getParameterType() as $parameterName => $parameterType) {
                $model = self::getModelByName($parameterType);
                if (false && $model && $model->getIsStruct() && !$model->getIsRestriction()) {
                    $parameterName = $model->getPackagedName();
                } else {
                    $parameterName = self::cleanString($parameterName);
                }
                array_push($parameters, (($model && $model->getIsStruct() && !$model->getIsRestriction()) ? $model->getPackagedName() . ' ' : '') . '$' . lcfirst($parameterName));
            }
            $parameterName = $parameter = implode(', ', $parameters);
        } else {
            $parameterName = $parameter = '';
        }
        array_push($body, 'public function ' . $this->getMethodName() . '(' . $parameter . ')');
        array_push($body, '{');
        array_push($body, 'try');
        array_push($body, '{');
        /**
         * Response
         */
        $responseAsObjStart = ((Generator::instance()->getOptionResponseAsWsdlObject() && $returnModel) ? 'new ' . $returnModel->getPackagedName() . '(' : '');
        $responseAsObjEnd = ((Generator::instance()->getOptionResponseAsWsdlObject() && $returnModel) ? ')' : '');
        /**
         * Soap parameters
         */
        if ($parameterModel) {
            if ($parameterModelAttributesCount > 0) {
                $soapParametersStart = $parameterName;
                $soapParametersEnd = '';
            } else {
                $soapParametersStart = $soapParametersEnd = '';
            }
        } elseif (is_string($this->getParameterType())) {
            $soapParametersStart = Generator::instance()->getOptionSendArrayAsParameter() ? '\'' . addslashes($this->getParameterType()) . '\'=>' : '';
            $soapParametersEnd = '$' . lcfirst(self::cleanString($this->getParameterType()));
        } elseif (is_array($this->getParameterType())) {
            $soapParametersStart = array();
            $soapParametersEnd = '';
            foreach ($this->getParameterType() as $parameterName => $parameterType) {
                $model = self::getModelByName($parameterType);
                if (false && $model && $model->getIsStruct() && !$model->getIsRestriction()) {
                    $paramName = $model->getPackagedName();
                } else {
                    $paramName = self::cleanString($parameterName);
                }
                array_push($soapParametersStart, (Generator::instance()->getOptionSendArrayAsParameter() ? '\'' . addslashes($parameterName) . '\'=>' : '') . '$' . lcfirst($paramName));
                unset($model);
            }
            $soapParametersStart = implode(', ', $soapParametersStart);
        } else {
            $soapParametersStart = $soapParametersEnd = '';
        }
        /**
         * Soap call
         */
        $soapCallStart = 'self::getSoapClient()->' . ($this->nameIsClean() ? $this->getName() . '(' : '__soapCall(\'' . $this->getName() . '\'' . ((!empty($soapParametersStart) || !empty($soapParametersEnd)) ? ', array(' : ''));
        $soapCallEnd = ((!$this->nameIsClean() && (!empty($soapParametersStart) || !empty($soapParametersEnd))) ? ')' : '') . ')' . (Generator::instance()->getOptionSendParametersAsArray() ? '->parameters' : '');
        /**
         * Send parameters in parameters array
         */
        if (!empty($soapParametersStart) && $this->nameIsClean()) {
            $sendParametersAsArrayStart = (Generator::instance()->getOptionSendParametersAsArray() ? 'array(\'parameters\'=>' : '');
            $sendParametersAsArrayEnd = (Generator::instance()->getOptionSendParametersAsArray() ? ')' : '');
        } else {
            $sendParametersAsArrayStart = $sendParametersAsArrayEnd = '';
        }
        /**
         * Send an array
         */
        if (!empty($soapParametersStart) && $this->nameIsClean()) {
            $sendArrayAsParameterStart = (Generator::instance()->getOptionSendArrayAsParameter() ? 'array(' : '');
            $sendArrayAsParameterEnd = (Generator::instance()->getOptionSendArrayAsParameter() ? ')' : '');
        } else {
            $sendArrayAsParameterStart = $sendArrayAsParameterEnd = '';
        }
        array_push($body, 'return $this->setResult(' . $responseAsObjStart . $soapCallStart . $sendParametersAsArrayStart . $sendArrayAsParameterStart . $soapParametersStart . $soapParametersEnd . $sendArrayAsParameterEnd . $sendParametersAsArrayEnd . $soapCallEnd . $responseAsObjEnd . ');');
        array_push($body, '}');
        array_push($body, 'catch(SoapFault $soapFault)');
        array_push($body, '{');
        array_push($body, 'return !$this->saveLastError(__METHOD__, $soapFault);');
        array_push($body, '}');
        array_push($body, '}');
        unset($parameterModel, $parameter, $responseAsObjStart, $responseAsObjEnd, $soapCallStart, $soapCallEnd, $sendParametersAsArrayStart, $sendParametersAsArrayEnd, $sendParametersAsArrayStart, $sendArrayAsParameterEnd, $soapParametersStart, $soapParametersEnd);
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
     * Returns the retrun type
     * @return string
     */
    public function getReturnType()
    {
        return $this->returnType;
    }
    /**
     * Set the retrun type
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
    public function getIsUnique()
    {
        return $this->isUnique;
    }
    /**
     * Set the isUnique property
     * @param bool
     * @return Method
     */
    public function setIsUnique($isUnique)
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
     * Return class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return 'Method';
    }
}
