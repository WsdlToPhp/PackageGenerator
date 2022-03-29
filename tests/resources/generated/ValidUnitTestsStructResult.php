<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Result StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiResult extends AbstractStructBase
{
    /**
     * The Success
     * Meta information extracted from the WSDL
     * - base: xsd:boolean
     * - choice: Success | Errors
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - default: false
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var bool|null
     */
    protected ?bool $Success = null;
    /**
     * The Errors
     * Meta information extracted from the WSDL
     * - choice: Success | Errors
     * - choiceMaxOccurs: 1
     * - choiceMinOccurs: 1
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiErrors|null
     */
    protected ?\StructType\ApiErrors $Errors = null;
    /**
     * The Warnings
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \StructType\ApiWarnings|null
     */
    protected ?\StructType\ApiWarnings $Warnings = null;
    /**
     * Constructor method for Result
     * @uses ApiResult::setSuccess()
     * @uses ApiResult::setErrors()
     * @uses ApiResult::setWarnings()
     * @param bool $success
     * @param \StructType\ApiErrors $errors
     * @param \StructType\ApiWarnings $warnings
     */
    public function __construct(?bool $success = false, ?\StructType\ApiErrors $errors = null, ?\StructType\ApiWarnings $warnings = null)
    {
        $this
            ->setSuccess($success)
            ->setErrors($errors)
            ->setWarnings($warnings);
    }
    /**
     * Get Success value
     * @return bool|null
     */
    public function getSuccess(): ?bool
    {
        return $this->Success ?? null;
    }
    /**
     * This method is responsible for validating the value passed to the setSuccess method
     * This method is willingly generated in order to preserve the one-line inline validation within the setSuccess method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateSuccessForChoiceConstraintsFromSetSuccess($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'Errors',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property Success can\'t be set as the property %s is already set. Only one property must be set among these properties: Success, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set Success value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @param bool $success
     * @return \StructType\ApiResult
     */
    public function setSuccess(?bool $success = false): self
    {
        // validation for constraint: boolean
        if (!is_null($success) && !is_bool($success)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a bool, %s given', var_export($success, true), gettype($success)), __LINE__);
        }
        // validation for constraint: choice(Success, Errors)
        if ('' !== ($successChoiceErrorMessage = self::validateSuccessForChoiceConstraintsFromSetSuccess($success))) {
            throw new InvalidArgumentException($successChoiceErrorMessage, __LINE__);
        }
        if (is_null($success) || (is_array($success) && empty($success))) {
            unset($this->Success);
        } else {
            $this->Success = $success;
        }
        
        return $this;
    }
    /**
     * Get Errors value
     * @return \StructType\ApiErrors|null
     */
    public function getErrors(): ?\StructType\ApiErrors
    {
        return $this->Errors ?? null;
    }
    /**
     * This method is responsible for validating the value passed to the setErrors method
     * This method is willingly generated in order to preserve the one-line inline validation within the setErrors method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateErrorsForChoiceConstraintsFromSetErrors($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'Success',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property Errors can\'t be set as the property %s is already set. Only one property must be set among these properties: Errors, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set Errors value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @param \StructType\ApiErrors $errors
     * @return \StructType\ApiResult
     */
    public function setErrors(?\StructType\ApiErrors $errors = null): self
    {
        // validation for constraint: choice(Success, Errors)
        if ('' !== ($errorsChoiceErrorMessage = self::validateErrorsForChoiceConstraintsFromSetErrors($errors))) {
            throw new InvalidArgumentException($errorsChoiceErrorMessage, __LINE__);
        }
        if (is_null($errors) || (is_array($errors) && empty($errors))) {
            unset($this->Errors);
        } else {
            $this->Errors = $errors;
        }
        
        return $this;
    }
    /**
     * Get Warnings value
     * @return \StructType\ApiWarnings|null
     */
    public function getWarnings(): ?\StructType\ApiWarnings
    {
        return $this->Warnings;
    }
    /**
     * Set Warnings value
     * @param \StructType\ApiWarnings $warnings
     * @return \StructType\ApiResult
     */
    public function setWarnings(?\StructType\ApiWarnings $warnings = null): self
    {
        $this->Warnings = $warnings;
        
        return $this;
    }
}
