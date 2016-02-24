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
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $СубъектРФ;
    /**
     * The СвРайМО
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var \Api\StructType\ApiСвРайМО
     */
    public $СвРайМО;
    /**
     * The Город
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $Город;
    /**
     * The ВнутригРайон
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $ВнутригРайон;
    /**
     * The НаселПункт
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $НаселПункт;
    /**
     * The Улица
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $Улица;
    /**
     * The ДопАдрЭл
     * Meta informations extracted from the WSDL
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
     * Set ДопАдрЭл value
     * @throws \InvalidArgumentException
     * @param \Api\StructType\ApiДопАдрЭл[] $ДопАдрЭл
     * @return \Api\StructType\ApiАдресРФ
     */
    public function setДопАдрЭл(array $ДопАдрЭл = array())
    {
        foreach ($ДопАдрЭл as $АдресРФДопАдрЭлItem) {
            if (!$АдресРФДопАдрЭлItem instanceof \Api\StructType\ApiДопАдрЭл) {
                throw new \InvalidArgumentException(sprintf('The ДопАдрЭл property can only contain items of \Api\StructType\ApiДопАдрЭл, "%s" given', is_object($АдресРФДопАдрЭлItem) ? get_class($АдресРФДопАдрЭлItem) : gettype($АдресРФДопАдрЭлItem)), __LINE__);
            }
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
        if (!$item instanceof \Api\StructType\ApiДопАдрЭл) {
            throw new \InvalidArgumentException(sprintf('The ДопАдрЭл property can only contain items of \Api\StructType\ApiДопАдрЭл, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->ДопАдрЭл[] = $item;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiАдресРФ
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
