<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ControlsType StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiControlsType extends AbstractStructBase
{
    /**
     * The ProcessByDistributor
     * Meta information extracted from the WSDL
     * - base: xsd:boolean
     * - pattern: true | false
     * @var bool|null
     */
    protected ?bool $ProcessByDistributor = null;
    /**
     * Constructor method for ControlsType
     * @uses ApiControlsType::setProcessByDistributor()
     * @param bool $processByDistributor
     */
    public function __construct(?bool $processByDistributor = null)
    {
        $this
            ->setProcessByDistributor($processByDistributor);
    }
    /**
     * Get ProcessByDistributor value
     * @return bool|null
     */
    public function getProcessByDistributor(): ?bool
    {
        return $this->ProcessByDistributor;
    }
    /**
     * Set ProcessByDistributor value
     * @param bool $processByDistributor
     * @return \StructType\ApiControlsType
     */
    public function setProcessByDistributor(?bool $processByDistributor = null): self
    {
        // validation for constraint: boolean
        if (!is_null($processByDistributor) && !is_bool($processByDistributor)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a bool, %s given', var_export($processByDistributor, true), gettype($processByDistributor)), __LINE__);
        }
        $this->ProcessByDistributor = $processByDistributor;
        
        return $this;
    }
}
