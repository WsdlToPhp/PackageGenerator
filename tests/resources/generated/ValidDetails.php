<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for details StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiDetails extends AbstractStructBase
{
    /**
     * The mutualSettlementDetailCalcCostShipping
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailCalcCostShipping
     * @var \StructType\ApiMutualSettlementDetailCalcCostShipping[]
     */
    protected ?array $mutualSettlementDetailCalcCostShipping = null;
    /**
     * The mutualSettlementDetailCashFlow
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailCashFlow
     * @var \StructType\ApiMutualSettlementDetailCashFlow[]
     */
    protected ?array $mutualSettlementDetailCashFlow = null;
    /**
     * The mutualSettlementDetailClientPayment
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailClientPayment
     * @var \StructType\ApiMutualSettlementDetailClientPayment[]
     */
    protected ?array $mutualSettlementDetailClientPayment = null;
    /**
     * The mutualSettlementDetailPostReturnRegistry
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailPostReturnRegistry
     * @var \StructType\ApiMutualSettlementDetailPostReturnRegistry[]
     */
    protected ?array $mutualSettlementDetailPostReturnRegistry = null;
    /**
     * The mutualSettlementDetailRouteList
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailRouteList
     * @var \StructType\ApiMutualSettlementDetailRouteList[]
     */
    protected ?array $mutualSettlementDetailRouteList = null;
    /**
     * The mutualSettlementDetailTrackNumberPayment
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailTrackNumberPayment
     * @var \StructType\ApiMutualSettlementDetailTrackNumberPayment[]
     */
    protected ?array $mutualSettlementDetailTrackNumberPayment = null;
    /**
     * The mutualSettlementDetailServiceRegistration
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailServiceRegistration
     * @var \StructType\ApiMutualSettlementDetailServiceRegistration[]
     */
    protected ?array $mutualSettlementDetailServiceRegistration = null;
    /**
     * The mutualSettlementDetailAcceptanceRegistry
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailAcceptanceRegistry
     * @var \StructType\ApiMutualSettlementDetailAcceptanceRegistry[]
     */
    protected ?array $mutualSettlementDetailAcceptanceRegistry = null;
    /**
     * The mutualSettlementDetailAdditionalChargeFare
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailAdditionalChargeFare
     * @var \StructType\ApiMutualSettlementDetailAdditionalChargeFare[]
     */
    protected ?array $mutualSettlementDetailAdditionalChargeFare = null;
    /**
     * The mutualSettlementDetailOutgoingRequestToCarrier
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailOutgoingRequestToCarrier
     * @var \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier[]
     */
    protected ?array $mutualSettlementDetailOutgoingRequestToCarrier = null;
    /**
     * The mutualSettlementDetailSMSInformation
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailSMSInformation
     * @var \StructType\ApiMutualSettlementDetailSMSInformation[]
     */
    protected ?array $mutualSettlementDetailSMSInformation = null;
    /**
     * The mutualSettlementDetailBuyerGoodsReturn
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailBuyerGoodsReturn
     * @var \StructType\ApiMutualSettlementDetailBuyerGoodsReturn[]
     */
    protected ?array $mutualSettlementDetailBuyerGoodsReturn = null;
    /**
     * The mutualSettlementDetailProductsPackaging
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailProductsPackaging
     * @var \StructType\ApiMutualSettlementDetailProductsPackaging[]
     */
    protected ?array $mutualSettlementDetailProductsPackaging = null;
    /**
     * The mutualSettlementDetailAdjustmentWriteRegisters
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailAdjustmentWriteRegisters
     * @var \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters[]
     */
    protected ?array $mutualSettlementDetailAdjustmentWriteRegisters = null;
    /**
     * The mutualSettlementDetailSafeCustody
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailSafeCustody
     * @var \StructType\ApiMutualSettlementDetailSafeCustody[]
     */
    protected ?array $mutualSettlementDetailSafeCustody = null;
    /**
     * The mutualSettlementDetailSafeCustodyCalculation
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailSafeCustodyCalculation
     * @var \StructType\ApiMutualSettlementDetailSafeCustodyCalculation[]
     */
    protected ?array $mutualSettlementDetailSafeCustodyCalculation = null;
    /**
     * The mutualSettlementDetailRegisterStorage
     * Meta information extracted from the WSDL
     * - choice: mutualSettlementDetailCalcCostShipping | mutualSettlementDetailCashFlow | mutualSettlementDetailClientPayment | mutualSettlementDetailPostReturnRegistry | mutualSettlementDetailRouteList | mutualSettlementDetailTrackNumberPayment |
     * mutualSettlementDetailServiceRegistration | mutualSettlementDetailAcceptanceRegistry | mutualSettlementDetailAdditionalChargeFare | mutualSettlementDetailOutgoingRequestToCarrier | mutualSettlementDetailSMSInformation |
     * mutualSettlementDetailBuyerGoodsReturn | mutualSettlementDetailProductsPackaging | mutualSettlementDetailAdjustmentWriteRegisters | mutualSettlementDetailSafeCustody | mutualSettlementDetailSafeCustodyCalculation |
     * mutualSettlementDetailRegisterStorage
     * - choiceMaxOccurs: unbounded
     * - choiceMinOccurs: 0
     * - ref: tns:mutualSettlementDetailRegisterStorage
     * @var \StructType\ApiMutualSettlementDetailRegisterStorage[]
     */
    protected ?array $mutualSettlementDetailRegisterStorage = null;
    /**
     * Constructor method for details
     * @uses ApiDetails::setMutualSettlementDetailCalcCostShipping()
     * @uses ApiDetails::setMutualSettlementDetailCashFlow()
     * @uses ApiDetails::setMutualSettlementDetailClientPayment()
     * @uses ApiDetails::setMutualSettlementDetailPostReturnRegistry()
     * @uses ApiDetails::setMutualSettlementDetailRouteList()
     * @uses ApiDetails::setMutualSettlementDetailTrackNumberPayment()
     * @uses ApiDetails::setMutualSettlementDetailServiceRegistration()
     * @uses ApiDetails::setMutualSettlementDetailAcceptanceRegistry()
     * @uses ApiDetails::setMutualSettlementDetailAdditionalChargeFare()
     * @uses ApiDetails::setMutualSettlementDetailOutgoingRequestToCarrier()
     * @uses ApiDetails::setMutualSettlementDetailSMSInformation()
     * @uses ApiDetails::setMutualSettlementDetailBuyerGoodsReturn()
     * @uses ApiDetails::setMutualSettlementDetailProductsPackaging()
     * @uses ApiDetails::setMutualSettlementDetailAdjustmentWriteRegisters()
     * @uses ApiDetails::setMutualSettlementDetailSafeCustody()
     * @uses ApiDetails::setMutualSettlementDetailSafeCustodyCalculation()
     * @uses ApiDetails::setMutualSettlementDetailRegisterStorage()
     * @param \StructType\ApiMutualSettlementDetailCalcCostShipping[] $mutualSettlementDetailCalcCostShipping
     * @param \StructType\ApiMutualSettlementDetailCashFlow[] $mutualSettlementDetailCashFlow
     * @param \StructType\ApiMutualSettlementDetailClientPayment[] $mutualSettlementDetailClientPayment
     * @param \StructType\ApiMutualSettlementDetailPostReturnRegistry[] $mutualSettlementDetailPostReturnRegistry
     * @param \StructType\ApiMutualSettlementDetailRouteList[] $mutualSettlementDetailRouteList
     * @param \StructType\ApiMutualSettlementDetailTrackNumberPayment[] $mutualSettlementDetailTrackNumberPayment
     * @param \StructType\ApiMutualSettlementDetailServiceRegistration[] $mutualSettlementDetailServiceRegistration
     * @param \StructType\ApiMutualSettlementDetailAcceptanceRegistry[] $mutualSettlementDetailAcceptanceRegistry
     * @param \StructType\ApiMutualSettlementDetailAdditionalChargeFare[] $mutualSettlementDetailAdditionalChargeFare
     * @param \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier[] $mutualSettlementDetailOutgoingRequestToCarrier
     * @param \StructType\ApiMutualSettlementDetailSMSInformation[] $mutualSettlementDetailSMSInformation
     * @param \StructType\ApiMutualSettlementDetailBuyerGoodsReturn[] $mutualSettlementDetailBuyerGoodsReturn
     * @param \StructType\ApiMutualSettlementDetailProductsPackaging[] $mutualSettlementDetailProductsPackaging
     * @param \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters[] $mutualSettlementDetailAdjustmentWriteRegisters
     * @param \StructType\ApiMutualSettlementDetailSafeCustody[] $mutualSettlementDetailSafeCustody
     * @param \StructType\ApiMutualSettlementDetailSafeCustodyCalculation[] $mutualSettlementDetailSafeCustodyCalculation
     * @param \StructType\ApiMutualSettlementDetailRegisterStorage[] $mutualSettlementDetailRegisterStorage
     */
    public function __construct(?array $mutualSettlementDetailCalcCostShipping = null, ?array $mutualSettlementDetailCashFlow = null, ?array $mutualSettlementDetailClientPayment = null, ?array $mutualSettlementDetailPostReturnRegistry = null, ?array $mutualSettlementDetailRouteList = null, ?array $mutualSettlementDetailTrackNumberPayment = null, ?array $mutualSettlementDetailServiceRegistration = null, ?array $mutualSettlementDetailAcceptanceRegistry = null, ?array $mutualSettlementDetailAdditionalChargeFare = null, ?array $mutualSettlementDetailOutgoingRequestToCarrier = null, ?array $mutualSettlementDetailSMSInformation = null, ?array $mutualSettlementDetailBuyerGoodsReturn = null, ?array $mutualSettlementDetailProductsPackaging = null, ?array $mutualSettlementDetailAdjustmentWriteRegisters = null, ?array $mutualSettlementDetailSafeCustody = null, ?array $mutualSettlementDetailSafeCustodyCalculation = null, ?array $mutualSettlementDetailRegisterStorage = null)
    {
        $this
            ->setMutualSettlementDetailCalcCostShipping($mutualSettlementDetailCalcCostShipping)
            ->setMutualSettlementDetailCashFlow($mutualSettlementDetailCashFlow)
            ->setMutualSettlementDetailClientPayment($mutualSettlementDetailClientPayment)
            ->setMutualSettlementDetailPostReturnRegistry($mutualSettlementDetailPostReturnRegistry)
            ->setMutualSettlementDetailRouteList($mutualSettlementDetailRouteList)
            ->setMutualSettlementDetailTrackNumberPayment($mutualSettlementDetailTrackNumberPayment)
            ->setMutualSettlementDetailServiceRegistration($mutualSettlementDetailServiceRegistration)
            ->setMutualSettlementDetailAcceptanceRegistry($mutualSettlementDetailAcceptanceRegistry)
            ->setMutualSettlementDetailAdditionalChargeFare($mutualSettlementDetailAdditionalChargeFare)
            ->setMutualSettlementDetailOutgoingRequestToCarrier($mutualSettlementDetailOutgoingRequestToCarrier)
            ->setMutualSettlementDetailSMSInformation($mutualSettlementDetailSMSInformation)
            ->setMutualSettlementDetailBuyerGoodsReturn($mutualSettlementDetailBuyerGoodsReturn)
            ->setMutualSettlementDetailProductsPackaging($mutualSettlementDetailProductsPackaging)
            ->setMutualSettlementDetailAdjustmentWriteRegisters($mutualSettlementDetailAdjustmentWriteRegisters)
            ->setMutualSettlementDetailSafeCustody($mutualSettlementDetailSafeCustody)
            ->setMutualSettlementDetailSafeCustodyCalculation($mutualSettlementDetailSafeCustodyCalculation)
            ->setMutualSettlementDetailRegisterStorage($mutualSettlementDetailRegisterStorage);
    }
    /**
     * Get mutualSettlementDetailCalcCostShipping value
     * @return \StructType\ApiMutualSettlementDetailCalcCostShipping[]|null
     */
    public function getMutualSettlementDetailCalcCostShipping(): ?array
    {
        return $this->mutualSettlementDetailCalcCostShipping ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailCalcCostShipping method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailCalcCostShipping method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailCalcCostShippingForArrayConstraintsFromSetMutualSettlementDetailCalcCostShipping(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailCalcCostShippingItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailCalcCostShippingItem instanceof \StructType\ApiMutualSettlementDetailCalcCostShipping) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailCalcCostShippingItem) ? get_class($detailsMutualSettlementDetailCalcCostShippingItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailCalcCostShippingItem), var_export($detailsMutualSettlementDetailCalcCostShippingItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailCalcCostShipping property can only contain items of type \StructType\ApiMutualSettlementDetailCalcCostShipping, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailCalcCostShipping method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailCalcCostShipping method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailCalcCostShippingForChoiceConstraintsFromSetMutualSettlementDetailCalcCostShipping($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailCalcCostShipping can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailCalcCostShipping, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailCalcCostShipping value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailCalcCostShipping[] $mutualSettlementDetailCalcCostShipping
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailCalcCostShipping(?array $mutualSettlementDetailCalcCostShipping = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailCalcCostShippingArrayErrorMessage = self::validateMutualSettlementDetailCalcCostShippingForArrayConstraintsFromSetMutualSettlementDetailCalcCostShipping($mutualSettlementDetailCalcCostShipping))) {
            throw new InvalidArgumentException($mutualSettlementDetailCalcCostShippingArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailCalcCostShippingChoiceErrorMessage = self::validateMutualSettlementDetailCalcCostShippingForChoiceConstraintsFromSetMutualSettlementDetailCalcCostShipping($mutualSettlementDetailCalcCostShipping))) {
            throw new InvalidArgumentException($mutualSettlementDetailCalcCostShippingChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailCalcCostShipping) || (is_array($mutualSettlementDetailCalcCostShipping) && empty($mutualSettlementDetailCalcCostShipping))) {
            unset($this->mutualSettlementDetailCalcCostShipping);
        } else {
            $this->mutualSettlementDetailCalcCostShipping = $mutualSettlementDetailCalcCostShipping;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailCalcCostShipping method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailCalcCostShipping method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailCalcCostShipping($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailCalcCostShipping can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailCalcCostShipping, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailCalcCostShipping value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailCalcCostShipping $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailCalcCostShipping(\StructType\ApiMutualSettlementDetailCalcCostShipping $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailCalcCostShipping) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailCalcCostShipping property can only contain items of type \StructType\ApiMutualSettlementDetailCalcCostShipping, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailCalcCostShipping($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailCalcCostShipping[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailCashFlow value
     * @return \StructType\ApiMutualSettlementDetailCashFlow[]|null
     */
    public function getMutualSettlementDetailCashFlow(): ?array
    {
        return $this->mutualSettlementDetailCashFlow ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailCashFlow method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailCashFlow method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailCashFlowForArrayConstraintsFromSetMutualSettlementDetailCashFlow(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailCashFlowItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailCashFlowItem instanceof \StructType\ApiMutualSettlementDetailCashFlow) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailCashFlowItem) ? get_class($detailsMutualSettlementDetailCashFlowItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailCashFlowItem), var_export($detailsMutualSettlementDetailCashFlowItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailCashFlow property can only contain items of type \StructType\ApiMutualSettlementDetailCashFlow, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailCashFlow method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailCashFlow method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailCashFlowForChoiceConstraintsFromSetMutualSettlementDetailCashFlow($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailCashFlow can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailCashFlow, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailCashFlow value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailCashFlow[] $mutualSettlementDetailCashFlow
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailCashFlow(?array $mutualSettlementDetailCashFlow = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailCashFlowArrayErrorMessage = self::validateMutualSettlementDetailCashFlowForArrayConstraintsFromSetMutualSettlementDetailCashFlow($mutualSettlementDetailCashFlow))) {
            throw new InvalidArgumentException($mutualSettlementDetailCashFlowArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailCashFlowChoiceErrorMessage = self::validateMutualSettlementDetailCashFlowForChoiceConstraintsFromSetMutualSettlementDetailCashFlow($mutualSettlementDetailCashFlow))) {
            throw new InvalidArgumentException($mutualSettlementDetailCashFlowChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailCashFlow) || (is_array($mutualSettlementDetailCashFlow) && empty($mutualSettlementDetailCashFlow))) {
            unset($this->mutualSettlementDetailCashFlow);
        } else {
            $this->mutualSettlementDetailCashFlow = $mutualSettlementDetailCashFlow;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailCashFlow method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailCashFlow method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailCashFlow($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailCashFlow can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailCashFlow, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailCashFlow value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailCashFlow $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailCashFlow(\StructType\ApiMutualSettlementDetailCashFlow $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailCashFlow) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailCashFlow property can only contain items of type \StructType\ApiMutualSettlementDetailCashFlow, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailCashFlow($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailCashFlow[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailClientPayment value
     * @return \StructType\ApiMutualSettlementDetailClientPayment[]|null
     */
    public function getMutualSettlementDetailClientPayment(): ?array
    {
        return $this->mutualSettlementDetailClientPayment ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailClientPayment method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailClientPayment method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailClientPaymentForArrayConstraintsFromSetMutualSettlementDetailClientPayment(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailClientPaymentItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailClientPaymentItem instanceof \StructType\ApiMutualSettlementDetailClientPayment) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailClientPaymentItem) ? get_class($detailsMutualSettlementDetailClientPaymentItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailClientPaymentItem), var_export($detailsMutualSettlementDetailClientPaymentItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailClientPayment property can only contain items of type \StructType\ApiMutualSettlementDetailClientPayment, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailClientPayment method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailClientPayment method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailClientPaymentForChoiceConstraintsFromSetMutualSettlementDetailClientPayment($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailClientPayment can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailClientPayment, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailClientPayment value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailClientPayment[] $mutualSettlementDetailClientPayment
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailClientPayment(?array $mutualSettlementDetailClientPayment = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailClientPaymentArrayErrorMessage = self::validateMutualSettlementDetailClientPaymentForArrayConstraintsFromSetMutualSettlementDetailClientPayment($mutualSettlementDetailClientPayment))) {
            throw new InvalidArgumentException($mutualSettlementDetailClientPaymentArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailClientPaymentChoiceErrorMessage = self::validateMutualSettlementDetailClientPaymentForChoiceConstraintsFromSetMutualSettlementDetailClientPayment($mutualSettlementDetailClientPayment))) {
            throw new InvalidArgumentException($mutualSettlementDetailClientPaymentChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailClientPayment) || (is_array($mutualSettlementDetailClientPayment) && empty($mutualSettlementDetailClientPayment))) {
            unset($this->mutualSettlementDetailClientPayment);
        } else {
            $this->mutualSettlementDetailClientPayment = $mutualSettlementDetailClientPayment;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailClientPayment method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailClientPayment method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailClientPayment($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailClientPayment can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailClientPayment, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailClientPayment value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailClientPayment $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailClientPayment(\StructType\ApiMutualSettlementDetailClientPayment $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailClientPayment) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailClientPayment property can only contain items of type \StructType\ApiMutualSettlementDetailClientPayment, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailClientPayment($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailClientPayment[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailPostReturnRegistry value
     * @return \StructType\ApiMutualSettlementDetailPostReturnRegistry[]|null
     */
    public function getMutualSettlementDetailPostReturnRegistry(): ?array
    {
        return $this->mutualSettlementDetailPostReturnRegistry ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailPostReturnRegistry method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailPostReturnRegistry method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailPostReturnRegistryForArrayConstraintsFromSetMutualSettlementDetailPostReturnRegistry(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailPostReturnRegistryItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailPostReturnRegistryItem instanceof \StructType\ApiMutualSettlementDetailPostReturnRegistry) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailPostReturnRegistryItem) ? get_class($detailsMutualSettlementDetailPostReturnRegistryItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailPostReturnRegistryItem), var_export($detailsMutualSettlementDetailPostReturnRegistryItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailPostReturnRegistry property can only contain items of type \StructType\ApiMutualSettlementDetailPostReturnRegistry, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailPostReturnRegistry method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailPostReturnRegistry method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailPostReturnRegistryForChoiceConstraintsFromSetMutualSettlementDetailPostReturnRegistry($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailPostReturnRegistry can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailPostReturnRegistry, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailPostReturnRegistry value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailPostReturnRegistry[] $mutualSettlementDetailPostReturnRegistry
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailPostReturnRegistry(?array $mutualSettlementDetailPostReturnRegistry = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailPostReturnRegistryArrayErrorMessage = self::validateMutualSettlementDetailPostReturnRegistryForArrayConstraintsFromSetMutualSettlementDetailPostReturnRegistry($mutualSettlementDetailPostReturnRegistry))) {
            throw new InvalidArgumentException($mutualSettlementDetailPostReturnRegistryArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailPostReturnRegistryChoiceErrorMessage = self::validateMutualSettlementDetailPostReturnRegistryForChoiceConstraintsFromSetMutualSettlementDetailPostReturnRegistry($mutualSettlementDetailPostReturnRegistry))) {
            throw new InvalidArgumentException($mutualSettlementDetailPostReturnRegistryChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailPostReturnRegistry) || (is_array($mutualSettlementDetailPostReturnRegistry) && empty($mutualSettlementDetailPostReturnRegistry))) {
            unset($this->mutualSettlementDetailPostReturnRegistry);
        } else {
            $this->mutualSettlementDetailPostReturnRegistry = $mutualSettlementDetailPostReturnRegistry;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailPostReturnRegistry method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailPostReturnRegistry method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailPostReturnRegistry($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailPostReturnRegistry can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailPostReturnRegistry, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailPostReturnRegistry value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailPostReturnRegistry $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailPostReturnRegistry(\StructType\ApiMutualSettlementDetailPostReturnRegistry $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailPostReturnRegistry) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailPostReturnRegistry property can only contain items of type \StructType\ApiMutualSettlementDetailPostReturnRegistry, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailPostReturnRegistry($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailPostReturnRegistry[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailRouteList value
     * @return \StructType\ApiMutualSettlementDetailRouteList[]|null
     */
    public function getMutualSettlementDetailRouteList(): ?array
    {
        return $this->mutualSettlementDetailRouteList ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailRouteList method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailRouteList method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailRouteListForArrayConstraintsFromSetMutualSettlementDetailRouteList(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailRouteListItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailRouteListItem instanceof \StructType\ApiMutualSettlementDetailRouteList) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailRouteListItem) ? get_class($detailsMutualSettlementDetailRouteListItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailRouteListItem), var_export($detailsMutualSettlementDetailRouteListItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailRouteList property can only contain items of type \StructType\ApiMutualSettlementDetailRouteList, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailRouteList method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailRouteList method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailRouteListForChoiceConstraintsFromSetMutualSettlementDetailRouteList($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailRouteList can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailRouteList, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailRouteList value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailRouteList[] $mutualSettlementDetailRouteList
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailRouteList(?array $mutualSettlementDetailRouteList = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailRouteListArrayErrorMessage = self::validateMutualSettlementDetailRouteListForArrayConstraintsFromSetMutualSettlementDetailRouteList($mutualSettlementDetailRouteList))) {
            throw new InvalidArgumentException($mutualSettlementDetailRouteListArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailRouteListChoiceErrorMessage = self::validateMutualSettlementDetailRouteListForChoiceConstraintsFromSetMutualSettlementDetailRouteList($mutualSettlementDetailRouteList))) {
            throw new InvalidArgumentException($mutualSettlementDetailRouteListChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailRouteList) || (is_array($mutualSettlementDetailRouteList) && empty($mutualSettlementDetailRouteList))) {
            unset($this->mutualSettlementDetailRouteList);
        } else {
            $this->mutualSettlementDetailRouteList = $mutualSettlementDetailRouteList;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailRouteList method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailRouteList method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailRouteList($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailRouteList can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailRouteList, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailRouteList value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailRouteList $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailRouteList(\StructType\ApiMutualSettlementDetailRouteList $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailRouteList) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailRouteList property can only contain items of type \StructType\ApiMutualSettlementDetailRouteList, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailRouteList($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailRouteList[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailTrackNumberPayment value
     * @return \StructType\ApiMutualSettlementDetailTrackNumberPayment[]|null
     */
    public function getMutualSettlementDetailTrackNumberPayment(): ?array
    {
        return $this->mutualSettlementDetailTrackNumberPayment ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailTrackNumberPayment method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailTrackNumberPayment method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailTrackNumberPaymentForArrayConstraintsFromSetMutualSettlementDetailTrackNumberPayment(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailTrackNumberPaymentItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailTrackNumberPaymentItem instanceof \StructType\ApiMutualSettlementDetailTrackNumberPayment) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailTrackNumberPaymentItem) ? get_class($detailsMutualSettlementDetailTrackNumberPaymentItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailTrackNumberPaymentItem), var_export($detailsMutualSettlementDetailTrackNumberPaymentItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailTrackNumberPayment property can only contain items of type \StructType\ApiMutualSettlementDetailTrackNumberPayment, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailTrackNumberPayment method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailTrackNumberPayment method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailTrackNumberPaymentForChoiceConstraintsFromSetMutualSettlementDetailTrackNumberPayment($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailTrackNumberPayment can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailTrackNumberPayment, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailTrackNumberPayment value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailTrackNumberPayment[] $mutualSettlementDetailTrackNumberPayment
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailTrackNumberPayment(?array $mutualSettlementDetailTrackNumberPayment = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailTrackNumberPaymentArrayErrorMessage = self::validateMutualSettlementDetailTrackNumberPaymentForArrayConstraintsFromSetMutualSettlementDetailTrackNumberPayment($mutualSettlementDetailTrackNumberPayment))) {
            throw new InvalidArgumentException($mutualSettlementDetailTrackNumberPaymentArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailTrackNumberPaymentChoiceErrorMessage = self::validateMutualSettlementDetailTrackNumberPaymentForChoiceConstraintsFromSetMutualSettlementDetailTrackNumberPayment($mutualSettlementDetailTrackNumberPayment))) {
            throw new InvalidArgumentException($mutualSettlementDetailTrackNumberPaymentChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailTrackNumberPayment) || (is_array($mutualSettlementDetailTrackNumberPayment) && empty($mutualSettlementDetailTrackNumberPayment))) {
            unset($this->mutualSettlementDetailTrackNumberPayment);
        } else {
            $this->mutualSettlementDetailTrackNumberPayment = $mutualSettlementDetailTrackNumberPayment;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailTrackNumberPayment method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailTrackNumberPayment method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailTrackNumberPayment($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailTrackNumberPayment can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailTrackNumberPayment, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailTrackNumberPayment value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailTrackNumberPayment $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailTrackNumberPayment(\StructType\ApiMutualSettlementDetailTrackNumberPayment $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailTrackNumberPayment) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailTrackNumberPayment property can only contain items of type \StructType\ApiMutualSettlementDetailTrackNumberPayment, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailTrackNumberPayment($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailTrackNumberPayment[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailServiceRegistration value
     * @return \StructType\ApiMutualSettlementDetailServiceRegistration[]|null
     */
    public function getMutualSettlementDetailServiceRegistration(): ?array
    {
        return $this->mutualSettlementDetailServiceRegistration ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailServiceRegistration method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailServiceRegistration method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailServiceRegistrationForArrayConstraintsFromSetMutualSettlementDetailServiceRegistration(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailServiceRegistrationItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailServiceRegistrationItem instanceof \StructType\ApiMutualSettlementDetailServiceRegistration) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailServiceRegistrationItem) ? get_class($detailsMutualSettlementDetailServiceRegistrationItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailServiceRegistrationItem), var_export($detailsMutualSettlementDetailServiceRegistrationItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailServiceRegistration property can only contain items of type \StructType\ApiMutualSettlementDetailServiceRegistration, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailServiceRegistration method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailServiceRegistration method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailServiceRegistrationForChoiceConstraintsFromSetMutualSettlementDetailServiceRegistration($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailServiceRegistration can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailServiceRegistration, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailServiceRegistration value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailServiceRegistration[] $mutualSettlementDetailServiceRegistration
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailServiceRegistration(?array $mutualSettlementDetailServiceRegistration = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailServiceRegistrationArrayErrorMessage = self::validateMutualSettlementDetailServiceRegistrationForArrayConstraintsFromSetMutualSettlementDetailServiceRegistration($mutualSettlementDetailServiceRegistration))) {
            throw new InvalidArgumentException($mutualSettlementDetailServiceRegistrationArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailServiceRegistrationChoiceErrorMessage = self::validateMutualSettlementDetailServiceRegistrationForChoiceConstraintsFromSetMutualSettlementDetailServiceRegistration($mutualSettlementDetailServiceRegistration))) {
            throw new InvalidArgumentException($mutualSettlementDetailServiceRegistrationChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailServiceRegistration) || (is_array($mutualSettlementDetailServiceRegistration) && empty($mutualSettlementDetailServiceRegistration))) {
            unset($this->mutualSettlementDetailServiceRegistration);
        } else {
            $this->mutualSettlementDetailServiceRegistration = $mutualSettlementDetailServiceRegistration;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailServiceRegistration method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailServiceRegistration method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailServiceRegistration($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailServiceRegistration can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailServiceRegistration, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailServiceRegistration value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailServiceRegistration $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailServiceRegistration(\StructType\ApiMutualSettlementDetailServiceRegistration $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailServiceRegistration) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailServiceRegistration property can only contain items of type \StructType\ApiMutualSettlementDetailServiceRegistration, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailServiceRegistration($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailServiceRegistration[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailAcceptanceRegistry value
     * @return \StructType\ApiMutualSettlementDetailAcceptanceRegistry[]|null
     */
    public function getMutualSettlementDetailAcceptanceRegistry(): ?array
    {
        return $this->mutualSettlementDetailAcceptanceRegistry ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailAcceptanceRegistry method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailAcceptanceRegistry method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailAcceptanceRegistryForArrayConstraintsFromSetMutualSettlementDetailAcceptanceRegistry(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailAcceptanceRegistryItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailAcceptanceRegistryItem instanceof \StructType\ApiMutualSettlementDetailAcceptanceRegistry) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailAcceptanceRegistryItem) ? get_class($detailsMutualSettlementDetailAcceptanceRegistryItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailAcceptanceRegistryItem), var_export($detailsMutualSettlementDetailAcceptanceRegistryItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailAcceptanceRegistry property can only contain items of type \StructType\ApiMutualSettlementDetailAcceptanceRegistry, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailAcceptanceRegistry method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailAcceptanceRegistry method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailAcceptanceRegistryForChoiceConstraintsFromSetMutualSettlementDetailAcceptanceRegistry($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailAcceptanceRegistry can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailAcceptanceRegistry, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailAcceptanceRegistry value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailAcceptanceRegistry[] $mutualSettlementDetailAcceptanceRegistry
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailAcceptanceRegistry(?array $mutualSettlementDetailAcceptanceRegistry = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailAcceptanceRegistryArrayErrorMessage = self::validateMutualSettlementDetailAcceptanceRegistryForArrayConstraintsFromSetMutualSettlementDetailAcceptanceRegistry($mutualSettlementDetailAcceptanceRegistry))) {
            throw new InvalidArgumentException($mutualSettlementDetailAcceptanceRegistryArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailAcceptanceRegistryChoiceErrorMessage = self::validateMutualSettlementDetailAcceptanceRegistryForChoiceConstraintsFromSetMutualSettlementDetailAcceptanceRegistry($mutualSettlementDetailAcceptanceRegistry))) {
            throw new InvalidArgumentException($mutualSettlementDetailAcceptanceRegistryChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailAcceptanceRegistry) || (is_array($mutualSettlementDetailAcceptanceRegistry) && empty($mutualSettlementDetailAcceptanceRegistry))) {
            unset($this->mutualSettlementDetailAcceptanceRegistry);
        } else {
            $this->mutualSettlementDetailAcceptanceRegistry = $mutualSettlementDetailAcceptanceRegistry;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailAcceptanceRegistry method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailAcceptanceRegistry method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailAcceptanceRegistry($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailAcceptanceRegistry can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailAcceptanceRegistry, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailAcceptanceRegistry value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailAcceptanceRegistry $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailAcceptanceRegistry(\StructType\ApiMutualSettlementDetailAcceptanceRegistry $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailAcceptanceRegistry) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailAcceptanceRegistry property can only contain items of type \StructType\ApiMutualSettlementDetailAcceptanceRegistry, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailAcceptanceRegistry($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailAcceptanceRegistry[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailAdditionalChargeFare value
     * @return \StructType\ApiMutualSettlementDetailAdditionalChargeFare[]|null
     */
    public function getMutualSettlementDetailAdditionalChargeFare(): ?array
    {
        return $this->mutualSettlementDetailAdditionalChargeFare ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailAdditionalChargeFare method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailAdditionalChargeFare method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailAdditionalChargeFareForArrayConstraintsFromSetMutualSettlementDetailAdditionalChargeFare(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailAdditionalChargeFareItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailAdditionalChargeFareItem instanceof \StructType\ApiMutualSettlementDetailAdditionalChargeFare) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailAdditionalChargeFareItem) ? get_class($detailsMutualSettlementDetailAdditionalChargeFareItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailAdditionalChargeFareItem), var_export($detailsMutualSettlementDetailAdditionalChargeFareItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailAdditionalChargeFare property can only contain items of type \StructType\ApiMutualSettlementDetailAdditionalChargeFare, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailAdditionalChargeFare method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailAdditionalChargeFare method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailAdditionalChargeFareForChoiceConstraintsFromSetMutualSettlementDetailAdditionalChargeFare($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailAdditionalChargeFare can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailAdditionalChargeFare, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailAdditionalChargeFare value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailAdditionalChargeFare[] $mutualSettlementDetailAdditionalChargeFare
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailAdditionalChargeFare(?array $mutualSettlementDetailAdditionalChargeFare = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailAdditionalChargeFareArrayErrorMessage = self::validateMutualSettlementDetailAdditionalChargeFareForArrayConstraintsFromSetMutualSettlementDetailAdditionalChargeFare($mutualSettlementDetailAdditionalChargeFare))) {
            throw new InvalidArgumentException($mutualSettlementDetailAdditionalChargeFareArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailAdditionalChargeFareChoiceErrorMessage = self::validateMutualSettlementDetailAdditionalChargeFareForChoiceConstraintsFromSetMutualSettlementDetailAdditionalChargeFare($mutualSettlementDetailAdditionalChargeFare))) {
            throw new InvalidArgumentException($mutualSettlementDetailAdditionalChargeFareChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailAdditionalChargeFare) || (is_array($mutualSettlementDetailAdditionalChargeFare) && empty($mutualSettlementDetailAdditionalChargeFare))) {
            unset($this->mutualSettlementDetailAdditionalChargeFare);
        } else {
            $this->mutualSettlementDetailAdditionalChargeFare = $mutualSettlementDetailAdditionalChargeFare;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailAdditionalChargeFare method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailAdditionalChargeFare method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailAdditionalChargeFare($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailAdditionalChargeFare can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailAdditionalChargeFare, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailAdditionalChargeFare value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailAdditionalChargeFare $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailAdditionalChargeFare(\StructType\ApiMutualSettlementDetailAdditionalChargeFare $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailAdditionalChargeFare) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailAdditionalChargeFare property can only contain items of type \StructType\ApiMutualSettlementDetailAdditionalChargeFare, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailAdditionalChargeFare($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailAdditionalChargeFare[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailOutgoingRequestToCarrier value
     * @return \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier[]|null
     */
    public function getMutualSettlementDetailOutgoingRequestToCarrier(): ?array
    {
        return $this->mutualSettlementDetailOutgoingRequestToCarrier ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailOutgoingRequestToCarrier method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailOutgoingRequestToCarrier method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailOutgoingRequestToCarrierForArrayConstraintsFromSetMutualSettlementDetailOutgoingRequestToCarrier(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailOutgoingRequestToCarrierItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailOutgoingRequestToCarrierItem instanceof \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailOutgoingRequestToCarrierItem) ? get_class($detailsMutualSettlementDetailOutgoingRequestToCarrierItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailOutgoingRequestToCarrierItem), var_export($detailsMutualSettlementDetailOutgoingRequestToCarrierItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailOutgoingRequestToCarrier property can only contain items of type \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailOutgoingRequestToCarrier method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailOutgoingRequestToCarrier method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailOutgoingRequestToCarrierForChoiceConstraintsFromSetMutualSettlementDetailOutgoingRequestToCarrier($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailOutgoingRequestToCarrier can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailOutgoingRequestToCarrier, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailOutgoingRequestToCarrier value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier[] $mutualSettlementDetailOutgoingRequestToCarrier
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailOutgoingRequestToCarrier(?array $mutualSettlementDetailOutgoingRequestToCarrier = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailOutgoingRequestToCarrierArrayErrorMessage = self::validateMutualSettlementDetailOutgoingRequestToCarrierForArrayConstraintsFromSetMutualSettlementDetailOutgoingRequestToCarrier($mutualSettlementDetailOutgoingRequestToCarrier))) {
            throw new InvalidArgumentException($mutualSettlementDetailOutgoingRequestToCarrierArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailOutgoingRequestToCarrierChoiceErrorMessage = self::validateMutualSettlementDetailOutgoingRequestToCarrierForChoiceConstraintsFromSetMutualSettlementDetailOutgoingRequestToCarrier($mutualSettlementDetailOutgoingRequestToCarrier))) {
            throw new InvalidArgumentException($mutualSettlementDetailOutgoingRequestToCarrierChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailOutgoingRequestToCarrier) || (is_array($mutualSettlementDetailOutgoingRequestToCarrier) && empty($mutualSettlementDetailOutgoingRequestToCarrier))) {
            unset($this->mutualSettlementDetailOutgoingRequestToCarrier);
        } else {
            $this->mutualSettlementDetailOutgoingRequestToCarrier = $mutualSettlementDetailOutgoingRequestToCarrier;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailOutgoingRequestToCarrier method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailOutgoingRequestToCarrier method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailOutgoingRequestToCarrier($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailOutgoingRequestToCarrier can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailOutgoingRequestToCarrier, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailOutgoingRequestToCarrier value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailOutgoingRequestToCarrier(\StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailOutgoingRequestToCarrier property can only contain items of type \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailOutgoingRequestToCarrier($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailOutgoingRequestToCarrier[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailSMSInformation value
     * @return \StructType\ApiMutualSettlementDetailSMSInformation[]|null
     */
    public function getMutualSettlementDetailSMSInformation(): ?array
    {
        return $this->mutualSettlementDetailSMSInformation ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailSMSInformation method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailSMSInformation method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailSMSInformationForArrayConstraintsFromSetMutualSettlementDetailSMSInformation(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailSMSInformationItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailSMSInformationItem instanceof \StructType\ApiMutualSettlementDetailSMSInformation) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailSMSInformationItem) ? get_class($detailsMutualSettlementDetailSMSInformationItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailSMSInformationItem), var_export($detailsMutualSettlementDetailSMSInformationItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailSMSInformation property can only contain items of type \StructType\ApiMutualSettlementDetailSMSInformation, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailSMSInformation method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailSMSInformation method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailSMSInformationForChoiceConstraintsFromSetMutualSettlementDetailSMSInformation($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailSMSInformation can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailSMSInformation, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailSMSInformation value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailSMSInformation[] $mutualSettlementDetailSMSInformation
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailSMSInformation(?array $mutualSettlementDetailSMSInformation = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailSMSInformationArrayErrorMessage = self::validateMutualSettlementDetailSMSInformationForArrayConstraintsFromSetMutualSettlementDetailSMSInformation($mutualSettlementDetailSMSInformation))) {
            throw new InvalidArgumentException($mutualSettlementDetailSMSInformationArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailSMSInformationChoiceErrorMessage = self::validateMutualSettlementDetailSMSInformationForChoiceConstraintsFromSetMutualSettlementDetailSMSInformation($mutualSettlementDetailSMSInformation))) {
            throw new InvalidArgumentException($mutualSettlementDetailSMSInformationChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailSMSInformation) || (is_array($mutualSettlementDetailSMSInformation) && empty($mutualSettlementDetailSMSInformation))) {
            unset($this->mutualSettlementDetailSMSInformation);
        } else {
            $this->mutualSettlementDetailSMSInformation = $mutualSettlementDetailSMSInformation;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailSMSInformation method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailSMSInformation method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailSMSInformation($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailSMSInformation can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailSMSInformation, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailSMSInformation value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailSMSInformation $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailSMSInformation(\StructType\ApiMutualSettlementDetailSMSInformation $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailSMSInformation) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailSMSInformation property can only contain items of type \StructType\ApiMutualSettlementDetailSMSInformation, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailSMSInformation($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailSMSInformation[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailBuyerGoodsReturn value
     * @return \StructType\ApiMutualSettlementDetailBuyerGoodsReturn[]|null
     */
    public function getMutualSettlementDetailBuyerGoodsReturn(): ?array
    {
        return $this->mutualSettlementDetailBuyerGoodsReturn ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailBuyerGoodsReturn method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailBuyerGoodsReturn method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailBuyerGoodsReturnForArrayConstraintsFromSetMutualSettlementDetailBuyerGoodsReturn(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailBuyerGoodsReturnItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailBuyerGoodsReturnItem instanceof \StructType\ApiMutualSettlementDetailBuyerGoodsReturn) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailBuyerGoodsReturnItem) ? get_class($detailsMutualSettlementDetailBuyerGoodsReturnItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailBuyerGoodsReturnItem), var_export($detailsMutualSettlementDetailBuyerGoodsReturnItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailBuyerGoodsReturn property can only contain items of type \StructType\ApiMutualSettlementDetailBuyerGoodsReturn, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailBuyerGoodsReturn method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailBuyerGoodsReturn method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailBuyerGoodsReturnForChoiceConstraintsFromSetMutualSettlementDetailBuyerGoodsReturn($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailBuyerGoodsReturn can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailBuyerGoodsReturn, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailBuyerGoodsReturn value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailBuyerGoodsReturn[] $mutualSettlementDetailBuyerGoodsReturn
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailBuyerGoodsReturn(?array $mutualSettlementDetailBuyerGoodsReturn = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailBuyerGoodsReturnArrayErrorMessage = self::validateMutualSettlementDetailBuyerGoodsReturnForArrayConstraintsFromSetMutualSettlementDetailBuyerGoodsReturn($mutualSettlementDetailBuyerGoodsReturn))) {
            throw new InvalidArgumentException($mutualSettlementDetailBuyerGoodsReturnArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailBuyerGoodsReturnChoiceErrorMessage = self::validateMutualSettlementDetailBuyerGoodsReturnForChoiceConstraintsFromSetMutualSettlementDetailBuyerGoodsReturn($mutualSettlementDetailBuyerGoodsReturn))) {
            throw new InvalidArgumentException($mutualSettlementDetailBuyerGoodsReturnChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailBuyerGoodsReturn) || (is_array($mutualSettlementDetailBuyerGoodsReturn) && empty($mutualSettlementDetailBuyerGoodsReturn))) {
            unset($this->mutualSettlementDetailBuyerGoodsReturn);
        } else {
            $this->mutualSettlementDetailBuyerGoodsReturn = $mutualSettlementDetailBuyerGoodsReturn;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailBuyerGoodsReturn method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailBuyerGoodsReturn method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailBuyerGoodsReturn($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailBuyerGoodsReturn can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailBuyerGoodsReturn, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailBuyerGoodsReturn value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailBuyerGoodsReturn $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailBuyerGoodsReturn(\StructType\ApiMutualSettlementDetailBuyerGoodsReturn $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailBuyerGoodsReturn) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailBuyerGoodsReturn property can only contain items of type \StructType\ApiMutualSettlementDetailBuyerGoodsReturn, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailBuyerGoodsReturn($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailBuyerGoodsReturn[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailProductsPackaging value
     * @return \StructType\ApiMutualSettlementDetailProductsPackaging[]|null
     */
    public function getMutualSettlementDetailProductsPackaging(): ?array
    {
        return $this->mutualSettlementDetailProductsPackaging ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailProductsPackaging method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailProductsPackaging method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailProductsPackagingForArrayConstraintsFromSetMutualSettlementDetailProductsPackaging(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailProductsPackagingItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailProductsPackagingItem instanceof \StructType\ApiMutualSettlementDetailProductsPackaging) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailProductsPackagingItem) ? get_class($detailsMutualSettlementDetailProductsPackagingItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailProductsPackagingItem), var_export($detailsMutualSettlementDetailProductsPackagingItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailProductsPackaging property can only contain items of type \StructType\ApiMutualSettlementDetailProductsPackaging, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailProductsPackaging method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailProductsPackaging method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailProductsPackagingForChoiceConstraintsFromSetMutualSettlementDetailProductsPackaging($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailProductsPackaging can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailProductsPackaging, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailProductsPackaging value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailProductsPackaging[] $mutualSettlementDetailProductsPackaging
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailProductsPackaging(?array $mutualSettlementDetailProductsPackaging = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailProductsPackagingArrayErrorMessage = self::validateMutualSettlementDetailProductsPackagingForArrayConstraintsFromSetMutualSettlementDetailProductsPackaging($mutualSettlementDetailProductsPackaging))) {
            throw new InvalidArgumentException($mutualSettlementDetailProductsPackagingArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailProductsPackagingChoiceErrorMessage = self::validateMutualSettlementDetailProductsPackagingForChoiceConstraintsFromSetMutualSettlementDetailProductsPackaging($mutualSettlementDetailProductsPackaging))) {
            throw new InvalidArgumentException($mutualSettlementDetailProductsPackagingChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailProductsPackaging) || (is_array($mutualSettlementDetailProductsPackaging) && empty($mutualSettlementDetailProductsPackaging))) {
            unset($this->mutualSettlementDetailProductsPackaging);
        } else {
            $this->mutualSettlementDetailProductsPackaging = $mutualSettlementDetailProductsPackaging;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailProductsPackaging method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailProductsPackaging method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailProductsPackaging($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailProductsPackaging can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailProductsPackaging, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailProductsPackaging value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailProductsPackaging $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailProductsPackaging(\StructType\ApiMutualSettlementDetailProductsPackaging $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailProductsPackaging) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailProductsPackaging property can only contain items of type \StructType\ApiMutualSettlementDetailProductsPackaging, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailProductsPackaging($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailProductsPackaging[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailAdjustmentWriteRegisters value
     * @return \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters[]|null
     */
    public function getMutualSettlementDetailAdjustmentWriteRegisters(): ?array
    {
        return $this->mutualSettlementDetailAdjustmentWriteRegisters ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailAdjustmentWriteRegisters method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailAdjustmentWriteRegisters method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailAdjustmentWriteRegistersForArrayConstraintsFromSetMutualSettlementDetailAdjustmentWriteRegisters(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailAdjustmentWriteRegistersItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailAdjustmentWriteRegistersItem instanceof \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailAdjustmentWriteRegistersItem) ? get_class($detailsMutualSettlementDetailAdjustmentWriteRegistersItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailAdjustmentWriteRegistersItem), var_export($detailsMutualSettlementDetailAdjustmentWriteRegistersItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailAdjustmentWriteRegisters property can only contain items of type \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailAdjustmentWriteRegisters method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailAdjustmentWriteRegisters method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailAdjustmentWriteRegistersForChoiceConstraintsFromSetMutualSettlementDetailAdjustmentWriteRegisters($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailAdjustmentWriteRegisters can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailAdjustmentWriteRegisters, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailAdjustmentWriteRegisters value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters[] $mutualSettlementDetailAdjustmentWriteRegisters
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailAdjustmentWriteRegisters(?array $mutualSettlementDetailAdjustmentWriteRegisters = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailAdjustmentWriteRegistersArrayErrorMessage = self::validateMutualSettlementDetailAdjustmentWriteRegistersForArrayConstraintsFromSetMutualSettlementDetailAdjustmentWriteRegisters($mutualSettlementDetailAdjustmentWriteRegisters))) {
            throw new InvalidArgumentException($mutualSettlementDetailAdjustmentWriteRegistersArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailAdjustmentWriteRegistersChoiceErrorMessage = self::validateMutualSettlementDetailAdjustmentWriteRegistersForChoiceConstraintsFromSetMutualSettlementDetailAdjustmentWriteRegisters($mutualSettlementDetailAdjustmentWriteRegisters))) {
            throw new InvalidArgumentException($mutualSettlementDetailAdjustmentWriteRegistersChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailAdjustmentWriteRegisters) || (is_array($mutualSettlementDetailAdjustmentWriteRegisters) && empty($mutualSettlementDetailAdjustmentWriteRegisters))) {
            unset($this->mutualSettlementDetailAdjustmentWriteRegisters);
        } else {
            $this->mutualSettlementDetailAdjustmentWriteRegisters = $mutualSettlementDetailAdjustmentWriteRegisters;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailAdjustmentWriteRegisters method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailAdjustmentWriteRegisters method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailAdjustmentWriteRegisters($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailAdjustmentWriteRegisters can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailAdjustmentWriteRegisters, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailAdjustmentWriteRegisters value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailAdjustmentWriteRegisters(\StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailAdjustmentWriteRegisters property can only contain items of type \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailAdjustmentWriteRegisters($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailAdjustmentWriteRegisters[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailSafeCustody value
     * @return \StructType\ApiMutualSettlementDetailSafeCustody[]|null
     */
    public function getMutualSettlementDetailSafeCustody(): ?array
    {
        return $this->mutualSettlementDetailSafeCustody ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailSafeCustody method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailSafeCustody method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailSafeCustodyForArrayConstraintsFromSetMutualSettlementDetailSafeCustody(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailSafeCustodyItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailSafeCustodyItem instanceof \StructType\ApiMutualSettlementDetailSafeCustody) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailSafeCustodyItem) ? get_class($detailsMutualSettlementDetailSafeCustodyItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailSafeCustodyItem), var_export($detailsMutualSettlementDetailSafeCustodyItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailSafeCustody property can only contain items of type \StructType\ApiMutualSettlementDetailSafeCustody, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailSafeCustody method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailSafeCustody method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailSafeCustodyForChoiceConstraintsFromSetMutualSettlementDetailSafeCustody($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailSafeCustody can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailSafeCustody, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailSafeCustody value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailSafeCustody[] $mutualSettlementDetailSafeCustody
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailSafeCustody(?array $mutualSettlementDetailSafeCustody = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailSafeCustodyArrayErrorMessage = self::validateMutualSettlementDetailSafeCustodyForArrayConstraintsFromSetMutualSettlementDetailSafeCustody($mutualSettlementDetailSafeCustody))) {
            throw new InvalidArgumentException($mutualSettlementDetailSafeCustodyArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailSafeCustodyChoiceErrorMessage = self::validateMutualSettlementDetailSafeCustodyForChoiceConstraintsFromSetMutualSettlementDetailSafeCustody($mutualSettlementDetailSafeCustody))) {
            throw new InvalidArgumentException($mutualSettlementDetailSafeCustodyChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailSafeCustody) || (is_array($mutualSettlementDetailSafeCustody) && empty($mutualSettlementDetailSafeCustody))) {
            unset($this->mutualSettlementDetailSafeCustody);
        } else {
            $this->mutualSettlementDetailSafeCustody = $mutualSettlementDetailSafeCustody;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailSafeCustody method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailSafeCustody method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailSafeCustody($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustodyCalculation',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailSafeCustody can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailSafeCustody, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailSafeCustody value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailSafeCustody $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailSafeCustody(\StructType\ApiMutualSettlementDetailSafeCustody $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailSafeCustody) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailSafeCustody property can only contain items of type \StructType\ApiMutualSettlementDetailSafeCustody, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailSafeCustody($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailSafeCustody[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailSafeCustodyCalculation value
     * @return \StructType\ApiMutualSettlementDetailSafeCustodyCalculation[]|null
     */
    public function getMutualSettlementDetailSafeCustodyCalculation(): ?array
    {
        return $this->mutualSettlementDetailSafeCustodyCalculation ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailSafeCustodyCalculation method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailSafeCustodyCalculation method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailSafeCustodyCalculationForArrayConstraintsFromSetMutualSettlementDetailSafeCustodyCalculation(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailSafeCustodyCalculationItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailSafeCustodyCalculationItem instanceof \StructType\ApiMutualSettlementDetailSafeCustodyCalculation) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailSafeCustodyCalculationItem) ? get_class($detailsMutualSettlementDetailSafeCustodyCalculationItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailSafeCustodyCalculationItem), var_export($detailsMutualSettlementDetailSafeCustodyCalculationItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailSafeCustodyCalculation property can only contain items of type \StructType\ApiMutualSettlementDetailSafeCustodyCalculation, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailSafeCustodyCalculation method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailSafeCustodyCalculation method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailSafeCustodyCalculationForChoiceConstraintsFromSetMutualSettlementDetailSafeCustodyCalculation($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailSafeCustodyCalculation can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailSafeCustodyCalculation, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailSafeCustodyCalculation value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailSafeCustodyCalculation[] $mutualSettlementDetailSafeCustodyCalculation
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailSafeCustodyCalculation(?array $mutualSettlementDetailSafeCustodyCalculation = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailSafeCustodyCalculationArrayErrorMessage = self::validateMutualSettlementDetailSafeCustodyCalculationForArrayConstraintsFromSetMutualSettlementDetailSafeCustodyCalculation($mutualSettlementDetailSafeCustodyCalculation))) {
            throw new InvalidArgumentException($mutualSettlementDetailSafeCustodyCalculationArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailSafeCustodyCalculationChoiceErrorMessage = self::validateMutualSettlementDetailSafeCustodyCalculationForChoiceConstraintsFromSetMutualSettlementDetailSafeCustodyCalculation($mutualSettlementDetailSafeCustodyCalculation))) {
            throw new InvalidArgumentException($mutualSettlementDetailSafeCustodyCalculationChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailSafeCustodyCalculation) || (is_array($mutualSettlementDetailSafeCustodyCalculation) && empty($mutualSettlementDetailSafeCustodyCalculation))) {
            unset($this->mutualSettlementDetailSafeCustodyCalculation);
        } else {
            $this->mutualSettlementDetailSafeCustodyCalculation = $mutualSettlementDetailSafeCustodyCalculation;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailSafeCustodyCalculation method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailSafeCustodyCalculation method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailSafeCustodyCalculation($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailRegisterStorage',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailSafeCustodyCalculation can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailSafeCustodyCalculation, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailSafeCustodyCalculation value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailSafeCustodyCalculation $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailSafeCustodyCalculation(\StructType\ApiMutualSettlementDetailSafeCustodyCalculation $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailSafeCustodyCalculation) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailSafeCustodyCalculation property can only contain items of type \StructType\ApiMutualSettlementDetailSafeCustodyCalculation, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailSafeCustodyCalculation($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailSafeCustodyCalculation[] = $item;
        
        return $this;
    }
    /**
     * Get mutualSettlementDetailRegisterStorage value
     * @return \StructType\ApiMutualSettlementDetailRegisterStorage[]|null
     */
    public function getMutualSettlementDetailRegisterStorage(): ?array
    {
        return $this->mutualSettlementDetailRegisterStorage ?? null;
    }
    /**
     * This method is responsible for validating the values passed to the setMutualSettlementDetailRegisterStorage method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailRegisterStorage method
     * @param array $values
     * @return string A non-empty message if the values does not match the validation rules
     */
    public static function validateMutualSettlementDetailRegisterStorageForArrayConstraintsFromSetMutualSettlementDetailRegisterStorage(?array $values = []): string
    {
        if (!is_array($values)) {
            return '';
        }
        $message = '';
        $invalidValues = [];
        foreach ($values as $detailsMutualSettlementDetailRegisterStorageItem) {
            // validation for constraint: itemType
            if (!$detailsMutualSettlementDetailRegisterStorageItem instanceof \StructType\ApiMutualSettlementDetailRegisterStorage) {
                $invalidValues[] = is_object($detailsMutualSettlementDetailRegisterStorageItem) ? get_class($detailsMutualSettlementDetailRegisterStorageItem) : sprintf('%s(%s)', gettype($detailsMutualSettlementDetailRegisterStorageItem), var_export($detailsMutualSettlementDetailRegisterStorageItem, true));
            }
        }
        if (!empty($invalidValues)) {
            $message = sprintf('The mutualSettlementDetailRegisterStorage property can only contain items of type \StructType\ApiMutualSettlementDetailRegisterStorage, %s given', is_object($invalidValues) ? get_class($invalidValues) : (is_array($invalidValues) ? implode(', ', $invalidValues) : gettype($invalidValues)));
        }
        unset($invalidValues);
        
        return $message;
    }
    /**
     * This method is responsible for validating the value passed to the setMutualSettlementDetailRegisterStorage method
     * This method is willingly generated in order to preserve the one-line inline validation within the setMutualSettlementDetailRegisterStorage method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateMutualSettlementDetailRegisterStorageForChoiceConstraintsFromSetMutualSettlementDetailRegisterStorage($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailRegisterStorage can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailRegisterStorage, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Set mutualSettlementDetailRegisterStorage value
     * This property belongs to a choice that allows only one property to exist. It is
     * therefore removable from the request, consequently if the value assigned to this
     * property is null, the property is removed from this object
     * @throws InvalidArgumentException
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailRegisterStorage[] $mutualSettlementDetailRegisterStorage
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailRegisterStorage(?array $mutualSettlementDetailRegisterStorage = null): self
    {
        // validation for constraint: array
        if ('' !== ($mutualSettlementDetailRegisterStorageArrayErrorMessage = self::validateMutualSettlementDetailRegisterStorageForArrayConstraintsFromSetMutualSettlementDetailRegisterStorage($mutualSettlementDetailRegisterStorage))) {
            throw new InvalidArgumentException($mutualSettlementDetailRegisterStorageArrayErrorMessage, __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($mutualSettlementDetailRegisterStorageChoiceErrorMessage = self::validateMutualSettlementDetailRegisterStorageForChoiceConstraintsFromSetMutualSettlementDetailRegisterStorage($mutualSettlementDetailRegisterStorage))) {
            throw new InvalidArgumentException($mutualSettlementDetailRegisterStorageChoiceErrorMessage, __LINE__);
        }
        if (is_null($mutualSettlementDetailRegisterStorage) || (is_array($mutualSettlementDetailRegisterStorage) && empty($mutualSettlementDetailRegisterStorage))) {
            unset($this->mutualSettlementDetailRegisterStorage);
        } else {
            $this->mutualSettlementDetailRegisterStorage = $mutualSettlementDetailRegisterStorage;
        }
        
        return $this;
    }
    /**
     * This method is responsible for validating the value passed to the addToMutualSettlementDetailRegisterStorage method
     * This method is willingly generated in order to preserve the one-line inline validation within the addToMutualSettlementDetailRegisterStorage method
     * This has to validate that the property which is being set is the only one among the given choices
     * @param mixed $value
     * @return string A non-empty message if the values does not match the validation rules
     */
    public function validateItemForChoiceConstraintsFromAddToMutualSettlementDetailRegisterStorage($value): string
    {
        $message = '';
        if (is_null($value)) {
            return $message;
        }
        $properties = [
            'mutualSettlementDetailCalcCostShipping',
            'mutualSettlementDetailCashFlow',
            'mutualSettlementDetailClientPayment',
            'mutualSettlementDetailPostReturnRegistry',
            'mutualSettlementDetailRouteList',
            'mutualSettlementDetailTrackNumberPayment',
            'mutualSettlementDetailServiceRegistration',
            'mutualSettlementDetailAcceptanceRegistry',
            'mutualSettlementDetailAdditionalChargeFare',
            'mutualSettlementDetailOutgoingRequestToCarrier',
            'mutualSettlementDetailSMSInformation',
            'mutualSettlementDetailBuyerGoodsReturn',
            'mutualSettlementDetailProductsPackaging',
            'mutualSettlementDetailAdjustmentWriteRegisters',
            'mutualSettlementDetailSafeCustody',
            'mutualSettlementDetailSafeCustodyCalculation',
        ];
        try {
            foreach ($properties as $property) {
                if (isset($this->{$property})) {
                    throw new InvalidArgumentException(sprintf('The property mutualSettlementDetailRegisterStorage can\'t be set as the property %s is already set. Only one property must be set among these properties: mutualSettlementDetailRegisterStorage, %s.', $property, implode(', ', $properties)), __LINE__);
                }
            }
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
        }
        
        return $message;
    }
    /**
     * Add item to mutualSettlementDetailRegisterStorage value
     * @throws InvalidArgumentException
     * @param \StructType\ApiMutualSettlementDetailRegisterStorage $item
     * @return \StructType\ApiDetails
     */
    public function addToMutualSettlementDetailRegisterStorage(\StructType\ApiMutualSettlementDetailRegisterStorage $item): self
    {
        // validation for constraint: itemType
        if (!$item instanceof \StructType\ApiMutualSettlementDetailRegisterStorage) {
            throw new InvalidArgumentException(sprintf('The mutualSettlementDetailRegisterStorage property can only contain items of type \StructType\ApiMutualSettlementDetailRegisterStorage, %s given', is_object($item) ? get_class($item) : (is_array($item) ? implode(', ', $item) : gettype($item))), __LINE__);
        }
        // validation for constraint: choice(mutualSettlementDetailCalcCostShipping, mutualSettlementDetailCashFlow, mutualSettlementDetailClientPayment, mutualSettlementDetailPostReturnRegistry, mutualSettlementDetailRouteList, mutualSettlementDetailTrackNumberPayment, mutualSettlementDetailServiceRegistration, mutualSettlementDetailAcceptanceRegistry, mutualSettlementDetailAdditionalChargeFare, mutualSettlementDetailOutgoingRequestToCarrier, mutualSettlementDetailSMSInformation, mutualSettlementDetailBuyerGoodsReturn, mutualSettlementDetailProductsPackaging, mutualSettlementDetailAdjustmentWriteRegisters, mutualSettlementDetailSafeCustody, mutualSettlementDetailSafeCustodyCalculation, mutualSettlementDetailRegisterStorage)
        if ('' !== ($itemChoiceErrorMessage = self::validateItemForChoiceConstraintsFromAddToMutualSettlementDetailRegisterStorage($item))) {
            throw new InvalidArgumentException($itemChoiceErrorMessage, __LINE__);
        }
        $this->mutualSettlementDetailRegisterStorage[] = $item;
        
        return $this;
    }
}
