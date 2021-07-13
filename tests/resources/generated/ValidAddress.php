<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

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
     * @var string|null
     */
    protected ?string $СубъектРФ = null;
    /**
     * The СвРайМО
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var \StructType\ApiСвРайМО|null
     */
    protected ?\StructType\ApiСвРайМО $СвРайМО = null;
    /**
     * The Город
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $Город = null;
    /**
     * The ВнутригРайон
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $ВнутригРайон = null;
    /**
     * The НаселПункт
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $НаселПункт = null;
    /**
     * The Улица
     * Meta information extracted from the WSDL
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $Улица = null;
    /**
     * The ДопАдрЭл
     * Meta information extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * @var \StructType\ApiДопАдрЭл[]
     */
    protected ?array $ДопАдрЭл = null;
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
     * @param \StructType\ApiСвРайМО $СвРайМО
     * @param string $Город
     * @param string $ВнутригРайон
     * @param string $НаселПункт
     * @param string $Улица
     * @param \StructType\ApiДопАдрЭл[] $ДопАдрЭл
     */
    public function __construct(?string $СубъектРФ = null, ?\StructType\ApiСвРайМО $СвРайМО = null, ?string $Город = null, ?string $ВнутригРайон = null, ?string $НаселПункт = null, ?string $Улица = null, ?array $ДопАдрЭл = null)
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
    public function getСубъектРФ(): ?string
    {
        return $this->СубъектРФ;
    }
    /**
     * Set СубъектРФ value
     * @param string $СубъектРФ
     * @return \StructType\ApiАдресРФ
     */
    public function setСубъектРФ(?string $СубъектРФ = null): self
    {
        // validation for constraint: string
        if (!is_null($СубъектРФ) && !is_string($СубъектРФ)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($СубъектРФ, true), gettype($СубъектРФ)), __LINE__);
        }
        $this->СубъектРФ = $СубъектРФ;
        
        return $this;
    }
    /**
     * Get СвРайМО value
     * @return \StructType\ApiСвРайМО|null
     */
    public function getСвРайМО(): ?\StructType\ApiСвРайМО
    {
        return $this->СвРайМО;
    }
    /**
     * Set СвРайМО value
     * @param \StructType\ApiСвРайМО $СвРайМО
     * @return \StructType\ApiАдресРФ
     */
    public function setСвРайМО(?\StructType\ApiСвРайМО $СвРайМО = null): self
    {
        $this->СвРайМО = $СвРайМО;
        
        return $this;
    }
    /**
     * Get Город value
     * @return string|null
     */
    public function getГород(): ?string
    {
        return $this->Город;
    }
    /**
     * Set Город value
     * @param string $Город
     * @return \StructType\ApiАдресРФ
     */
    public function setГород(?string $Город = null): self
    {
        // validation for constraint: string
        if (!is_null($Город) && !is_string($Город)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($Город, true), gettype($Город)), __LINE__);
        }
        $this->Город = $Город;
        
        return $this;
    }
    /**
     * Get ВнутригРайон value
     * @return string|null
     */
    public function getВнутригРайон(): ?string
    {
        return $this->ВнутригРайон;
    }
    /**
     * Set ВнутригРайон value
     * @param string $ВнутригРайон
     * @return \StructType\ApiАдресРФ
     */
    public function setВнутригРайон(?string $ВнутригРайон = null): self
    {
        // validation for constraint: string
        if (!is_null($ВнутригРайон) && !is_string($ВнутригРайон)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($ВнутригРайон, true), gettype($ВнутригРайон)), __LINE__);
        }
        $this->ВнутригРайон = $ВнутригРайон;
        
        return $this;
    }
    /**
     * Get НаселПункт value
     * @return string|null
     */
    public function getНаселПункт(): ?string
    {
        return $this->НаселПункт;
    }
    /**
     * Set НаселПункт value
     * @param string $НаселПункт
     * @return \StructType\ApiАдресРФ
     */
    public function setНаселПункт(?string $НаселПункт = null): self
    {
        // validation for constraint: string
        if (!is_null($НаселПункт) && !is_string($НаселПункт)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($НаселПункт, true), gettype($НаселПункт)), __LINE__);
        }
        $this->НаселПункт = $НаселПункт;
        
        return $this;
    }
    /**
     * Get Улица value
     * @return string|null
     */
    public function getУлица(): ?string
    {
        return $this->Улица;
    }
    /**
     * Set Улица value
     * @param string $Улица
     * @return \StructType\ApiАдресРФ
     */
    public function setУлица(?string $Улица = null): self
    {
        // validation for constraint: string
        if (!is_null($Улица) && !is_string($Улица)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($Улица, true), gettype($Улица)), __LINE__);
        }
        $this->Улица = $Улица;
        
        return $this;
    }
    /**
     * Get ДопАдрЭл value
     * @return \StructType\ApiДопАдрЭл[]
     */
    public function getДопАдрЭл(): ?array
    {
        return $this->ДопАдрЭл;
    }
    /**
     * This method is responsible for validating the values passed to the setДопАдрЭл method
     * This method is willingly generated in order to preserve the one-line inline validation within the setДопАдрЭл method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateДопАдрЭлForArrayConstraintsFromSetДопАдрЭл(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $АдресРФДопАдрЭлItem) {
            // validation for constraint: itemType
            if (!$АдресРФДопАдрЭлItem instanceof \StructType\ApiДопАдрЭл) {
                $invalidValues[] = is_object($АдресРФДопАдрЭлItem) ? get_class($АдресРФДопАдрЭлItem) : sprintf('%s(%s)', gettype($АдресРФДопАдрЭлItem), var_export($АдресРФДопАдрЭлItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The ДопАдрЭл property can only contain items of type \StructType\ApiДопАдрЭл, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * Set ДопАдрЭл value
     * @throws InvalidArgumentException
     * @param \StructType\ApiДопАдрЭл[] $ДопАдрЭл
     * @return \StructType\ApiАдресРФ
     */
    public function setДопАдрЭл(?array $ДопАдрЭл = null): self
    {
        // validation for constraint: array
        if ('' !== ($ДопАдрЭлArrayErrorMessage = self::validateДопАдрЭлForArrayConstraintsFromSetДопАдрЭл($ДопАдрЭл))) {
            throw new InvalidArgumentException($ДопАдрЭлArrayErrorMessage, __LINE__);
        }
        $this->ДопАдрЭл = $ДопАдрЭл;
        
        return $this;
    }
    /**
     * Add item to ДопАдрЭл value
     * @throws InvalidArgumentException
     * @param \StructType\ApiДопАдрЭл $item
     * @return \StructType\ApiАдресРФ
     */
    public function addToДопАдрЭл(\StructType\ApiДопАдрЭл $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiДопАдрЭл) {
            throw new InvalidArgumentException(sprintf('The ДопАдрЭл property can only contain items of type \StructType\ApiДопАдрЭл, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        $this->ДопАдрЭл[] = $item;
        
        return $this;
    }
}
