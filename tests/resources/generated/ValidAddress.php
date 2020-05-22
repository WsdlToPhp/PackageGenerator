<?php

namespace Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for АдресРФ StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiАдресРФ extends ApiСостав
{
    /**
     * The СубъектРФ
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $СубъектРФ;
    /**
     * The СвРайМО
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var \Api\StructType\ApiСвРайМО
     */
    public $СвРайМО;
    /**
     * The Город
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $Город;
    /**
     * The ВнутригРайон
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $ВнутригРайон;
    /**
     * The НаселПункт
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $НаселПункт;
    /**
     * The Улица
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $Улица;
    /**
     * The ДопАдрЭл
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \Api\StructType\ApiДопАдрЭл[]
     */
    public $ДопАдрЭл;
    /**
     * Constructor method for АдресРФ
     * @uses ApiАдресРФ::setСубъектРФ()
     * @uses ApiАдресРФ::setСвРайМО()
     * @uses ApiАдресРФ::setГород()
     * @uses ApiАдресРФ::setВнутригРайон()
     * @uses ApiАдресРФ::setНаселПункт()
     * @uses ApiАдресРФ::setУлица()
     * @uses ApiАдресРФ::setДопАдрЭл()
     * @param string $СубъектРФ
     * @param \Api\StructType\ApiСвРайМО $СвРайМО
     * @param string $Город
     * @param string $ВнутригРайон
     * @param string $НаселПункт
     * @param string $Улица
     * @param \Api\StructType\ApiДопАдрЭл[] $ДопАдрЭл
     */
    public function __construct($СубъектРФ = null, \Api\StructType\ApiСвРайМО $СвРайМО = null, $Город = null, $ВнутригРайон = null, $НаселПункт = null, $Улица = null, array $ДопАдрЭл = array())
    {
        $this
            ->setСубъектРФ($СубъектРФ)
            ->setСвРайМО($СвРайМО)
            ->setГород($Город)
            ->setВнутригРайон($ВнутригРайон)
            ->setНаселПункт($НаселПункт)
            ->setУлица($Улица)
            ->setДопАдрЭл($ДопАдрЭл);
    }
    /**
     * Get СубъектРФ value
     * @return string|null
     */
    public function getСубъектРФ()
    {
        return $this->СубъектРФ;
    }
    /**
     * Set СубъектРФ value
     * @param string $СубъектРФ
     * @return \Api\StructType\ApiАдресРФ
     */
    public function setСубъектРФ($СубъектРФ = null)
    {
        // validation for constraint: string
        if (!is_null($СубъектРФ) && !is_string($СубъектРФ)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($СубъектРФ, true), gettype($СубъектРФ)), __LINE__);
        }
        $this->СубъектРФ = $СубъектРФ;
        return $this;
    }
    /**
     * Get СвРайМО value
     * @return \Api\StructType\ApiСвРайМО|null
     */
    public function getСвРайМО()
    {
        return $this->СвРайМО;
    }
    /**
     * Set СвРайМО value
     * @param \Api\StructType\ApiСвРайМО $СвРайМО
     * @return \Api\StructType\ApiАдресРФ
     */
    public function setСвРайМО(\Api\StructType\ApiСвРайМО $СвРайМО = null)
    {
        $this->СвРайМО = $СвРайМО;
        return $this;
    }
    /**
     * Get Город value
     * @return string|null
     */
    public function getГород()
    {
        return $this->Город;
    }
    /**
     * Set Город value
     * @param string $Город
     * @return \Api\StructType\ApiАдресРФ
     */
    public function setГород($Город = null)
    {
        // validation for constraint: string
        if (!is_null($Город) && !is_string($Город)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($Город, true), gettype($Город)), __LINE__);
        }
        $this->Город = $Город;
        return $this;
    }
    /**
     * Get ВнутригРайон value
     * @return string|null
     */
    public function getВнутригРайон()
    {
        return $this->ВнутригРайон;
    }
    /**
     * Set ВнутригРайон value
     * @param string $ВнутригРайон
     * @return \Api\StructType\ApiАдресРФ
     */
    public function setВнутригРайон($ВнутригРайон = null)
    {
        // validation for constraint: string
        if (!is_null($ВнутригРайон) && !is_string($ВнутригРайон)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($ВнутригРайон, true), gettype($ВнутригРайон)), __LINE__);
        }
        $this->ВнутригРайон = $ВнутригРайон;
        return $this;
    }
    /**
     * Get НаселПункт value
     * @return string|null
     */
    public function getНаселПункт()
    {
        return $this->НаселПункт;
    }
    /**
     * Set НаселПункт value
     * @param string $НаселПункт
     * @return \Api\StructType\ApiАдресРФ
     */
    public function setНаселПункт($НаселПункт = null)
    {
        // validation for constraint: string
        if (!is_null($НаселПункт) && !is_string($НаселПункт)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($НаселПункт, true), gettype($НаселПункт)), __LINE__);
        }
        $this->НаселПункт = $НаселПункт;
        return $this;
    }
    /**
     * Get Улица value
     * @return string|null
     */
    public function getУлица()
    {
        return $this->Улица;
    }
    /**
     * Set Улица value
     * @param string $Улица
     * @return \Api\StructType\ApiАдресРФ
     */
    public function setУлица($Улица = null)
    {
        // validation for constraint: string
        if (!is_null($Улица) && !is_string($Улица)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($Улица, true), gettype($Улица)), __LINE__);
        }
        $this->Улица = $Улица;
        return $this;
    }
    /**
     * Get ДопАдрЭл value
     * @return \Api\StructType\ApiДопАдрЭл[]|null
     */
    public function getДопАдрЭл()
    {
        return $this->ДопАдрЭл;
    }
    /**
     * This method is responsible for validating the values passed to the setДопАдрЭл method
     * This method is willingly generated in order to preserve the one-line inline validation within the setДопАдрЭл method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateДопАдрЭлForArrayConstraintsFromSetДопАдрЭл(array $values = array())
    {
        $message = '';
        $invalidValues = [];
        foreach ($values as $АдресРФДопАдрЭлItem) {
            // validation for constraint: itemType
            if (!$АдресРФДопАдрЭлItem instanceof \Api\StructType\ApiДопАдрЭл) {
                $invalidValues[] = is_object($АдресРФДопАдрЭлItem) ? get_class($АдресРФДопАдрЭлItem) : sprintf('%s(%s)', gettype($АдресРФДопАдрЭлItem), var_export($АдресРФДопАдрЭлItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The ДопАдрЭл property can only contain items of type \Api\StructType\ApiДопАдрЭл, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        return $message;
    }
    /**
     * Set ДопАдрЭл value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiДопАдрЭл[] $ДопАдрЭл
     * @return \Api\StructType\ApiАдресРФ
     */
    public function setДопАдрЭл(array $ДопАдрЭл = array())
    {
        // validation for constraint: array
        if ('' !== ($ДопАдрЭлArrayErrorMessage = self::validateДопАдрЭлForArrayConstraintsFromSetДопАдрЭл($ДопАдрЭл))) {
            throw new \InvalidArgumentException($ДопАдрЭлArrayErrorMessage, __LINE__);
        }
        $this->ДопАдрЭл = $ДопАдрЭл;
        return $this;
    }
    /**
     * Add item to ДопАдрЭл value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiДопАдрЭл $item
     * @return \Api\StructType\ApiАдресРФ
     */
    public function addToДопАдрЭл(\Api\StructType\ApiДопАдрЭл $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Api\StructType\ApiДопАдрЭл) {
            throw new \InvalidArgumentException(sprintf('The ДопАдрЭл property can only contain items of type \Api\StructType\ApiДопАдрЭл, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->ДопАдрЭл[] = $item;
        return $this;
    }
}
