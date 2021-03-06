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
     * @var \StructType\ApiMutualSettlementDetailCalcCostShipping|null
     */
    protected ?\StructType\ApiMutualSettlementDetailCalcCostShipping $mutualSettlementDetailCalcCostShipping = null;
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
     * @var \StructType\ApiMutualSettlementDetailCashFlow|null
     */
    protected ?\StructType\ApiMutualSettlementDetailCashFlow $mutualSettlementDetailCashFlow = null;
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
     * @var \StructType\ApiMutualSettlementDetailClientPayment|null
     */
    protected ?\StructType\ApiMutualSettlementDetailClientPayment $mutualSettlementDetailClientPayment = null;
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
     * @var \StructType\ApiMutualSettlementDetailPostReturnRegistry|null
     */
    protected ?\StructType\ApiMutualSettlementDetailPostReturnRegistry $mutualSettlementDetailPostReturnRegistry = null;
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
     * @var \StructType\ApiMutualSettlementDetailRouteList|null
     */
    protected ?\StructType\ApiMutualSettlementDetailRouteList $mutualSettlementDetailRouteList = null;
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
     * @var \StructType\ApiMutualSettlementDetailTrackNumberPayment|null
     */
    protected ?\StructType\ApiMutualSettlementDetailTrackNumberPayment $mutualSettlementDetailTrackNumberPayment = null;
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
     * @var \StructType\ApiMutualSettlementDetailServiceRegistration|null
     */
    protected ?\StructType\ApiMutualSettlementDetailServiceRegistration $mutualSettlementDetailServiceRegistration = null;
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
     * @var \StructType\ApiMutualSettlementDetailAcceptanceRegistry|null
     */
    protected ?\StructType\ApiMutualSettlementDetailAcceptanceRegistry $mutualSettlementDetailAcceptanceRegistry = null;
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
     * @var \StructType\ApiMutualSettlementDetailAdditionalChargeFare|null
     */
    protected ?\StructType\ApiMutualSettlementDetailAdditionalChargeFare $mutualSettlementDetailAdditionalChargeFare = null;
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
     * @var \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier|null
     */
    protected ?\StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier $mutualSettlementDetailOutgoingRequestToCarrier = null;
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
     * @var \StructType\ApiMutualSettlementDetailSMSInformation|null
     */
    protected ?\StructType\ApiMutualSettlementDetailSMSInformation $mutualSettlementDetailSMSInformation = null;
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
     * @var \StructType\ApiMutualSettlementDetailBuyerGoodsReturn|null
     */
    protected ?\StructType\ApiMutualSettlementDetailBuyerGoodsReturn $mutualSettlementDetailBuyerGoodsReturn = null;
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
     * @var \StructType\ApiMutualSettlementDetailProductsPackaging|null
     */
    protected ?\StructType\ApiMutualSettlementDetailProductsPackaging $mutualSettlementDetailProductsPackaging = null;
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
     * @var \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters|null
     */
    protected ?\StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters $mutualSettlementDetailAdjustmentWriteRegisters = null;
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
     * @var \StructType\ApiMutualSettlementDetailSafeCustody|null
     */
    protected ?\StructType\ApiMutualSettlementDetailSafeCustody $mutualSettlementDetailSafeCustody = null;
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
     * @var \StructType\ApiMutualSettlementDetailSafeCustodyCalculation|null
     */
    protected ?\StructType\ApiMutualSettlementDetailSafeCustodyCalculation $mutualSettlementDetailSafeCustodyCalculation = null;
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
     * @var \StructType\ApiMutualSettlementDetailRegisterStorage|null
     */
    protected ?\StructType\ApiMutualSettlementDetailRegisterStorage $mutualSettlementDetailRegisterStorage = null;
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
     * @param \StructType\ApiMutualSettlementDetailCalcCostShipping $mutualSettlementDetailCalcCostShipping
     * @param \StructType\ApiMutualSettlementDetailCashFlow $mutualSettlementDetailCashFlow
     * @param \StructType\ApiMutualSettlementDetailClientPayment $mutualSettlementDetailClientPayment
     * @param \StructType\ApiMutualSettlementDetailPostReturnRegistry $mutualSettlementDetailPostReturnRegistry
     * @param \StructType\ApiMutualSettlementDetailRouteList $mutualSettlementDetailRouteList
     * @param \StructType\ApiMutualSettlementDetailTrackNumberPayment $mutualSettlementDetailTrackNumberPayment
     * @param \StructType\ApiMutualSettlementDetailServiceRegistration $mutualSettlementDetailServiceRegistration
     * @param \StructType\ApiMutualSettlementDetailAcceptanceRegistry $mutualSettlementDetailAcceptanceRegistry
     * @param \StructType\ApiMutualSettlementDetailAdditionalChargeFare $mutualSettlementDetailAdditionalChargeFare
     * @param \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier $mutualSettlementDetailOutgoingRequestToCarrier
     * @param \StructType\ApiMutualSettlementDetailSMSInformation $mutualSettlementDetailSMSInformation
     * @param \StructType\ApiMutualSettlementDetailBuyerGoodsReturn $mutualSettlementDetailBuyerGoodsReturn
     * @param \StructType\ApiMutualSettlementDetailProductsPackaging $mutualSettlementDetailProductsPackaging
     * @param \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters $mutualSettlementDetailAdjustmentWriteRegisters
     * @param \StructType\ApiMutualSettlementDetailSafeCustody $mutualSettlementDetailSafeCustody
     * @param \StructType\ApiMutualSettlementDetailSafeCustodyCalculation $mutualSettlementDetailSafeCustodyCalculation
     * @param \StructType\ApiMutualSettlementDetailRegisterStorage $mutualSettlementDetailRegisterStorage
     */
    public function __construct(?\StructType\ApiMutualSettlementDetailCalcCostShipping $mutualSettlementDetailCalcCostShipping = null, ?\StructType\ApiMutualSettlementDetailCashFlow $mutualSettlementDetailCashFlow = null, ?\StructType\ApiMutualSettlementDetailClientPayment $mutualSettlementDetailClientPayment = null, ?\StructType\ApiMutualSettlementDetailPostReturnRegistry $mutualSettlementDetailPostReturnRegistry = null, ?\StructType\ApiMutualSettlementDetailRouteList $mutualSettlementDetailRouteList = null, ?\StructType\ApiMutualSettlementDetailTrackNumberPayment $mutualSettlementDetailTrackNumberPayment = null, ?\StructType\ApiMutualSettlementDetailServiceRegistration $mutualSettlementDetailServiceRegistration = null, ?\StructType\ApiMutualSettlementDetailAcceptanceRegistry $mutualSettlementDetailAcceptanceRegistry = null, ?\StructType\ApiMutualSettlementDetailAdditionalChargeFare $mutualSettlementDetailAdditionalChargeFare = null, ?\StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier $mutualSettlementDetailOutgoingRequestToCarrier = null, ?\StructType\ApiMutualSettlementDetailSMSInformation $mutualSettlementDetailSMSInformation = null, ?\StructType\ApiMutualSettlementDetailBuyerGoodsReturn $mutualSettlementDetailBuyerGoodsReturn = null, ?\StructType\ApiMutualSettlementDetailProductsPackaging $mutualSettlementDetailProductsPackaging = null, ?\StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters $mutualSettlementDetailAdjustmentWriteRegisters = null, ?\StructType\ApiMutualSettlementDetailSafeCustody $mutualSettlementDetailSafeCustody = null, ?\StructType\ApiMutualSettlementDetailSafeCustodyCalculation $mutualSettlementDetailSafeCustodyCalculation = null, ?\StructType\ApiMutualSettlementDetailRegisterStorage $mutualSettlementDetailRegisterStorage = null)
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
     * @return \StructType\ApiMutualSettlementDetailCalcCostShipping|null
     */
    public function getMutualSettlementDetailCalcCostShipping(): ?\StructType\ApiMutualSettlementDetailCalcCostShipping
    {
        return isset($this->mutualSettlementDetailCalcCostShipping) ? $this->mutualSettlementDetailCalcCostShipping : null;
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
     * @param \StructType\ApiMutualSettlementDetailCalcCostShipping $mutualSettlementDetailCalcCostShipping
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailCalcCostShipping(?\StructType\ApiMutualSettlementDetailCalcCostShipping $mutualSettlementDetailCalcCostShipping = null): self
    {
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
     * Get mutualSettlementDetailCashFlow value
     * @return \StructType\ApiMutualSettlementDetailCashFlow|null
     */
    public function getMutualSettlementDetailCashFlow(): ?\StructType\ApiMutualSettlementDetailCashFlow
    {
        return isset($this->mutualSettlementDetailCashFlow) ? $this->mutualSettlementDetailCashFlow : null;
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
     * @param \StructType\ApiMutualSettlementDetailCashFlow $mutualSettlementDetailCashFlow
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailCashFlow(?\StructType\ApiMutualSettlementDetailCashFlow $mutualSettlementDetailCashFlow = null): self
    {
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
     * Get mutualSettlementDetailClientPayment value
     * @return \StructType\ApiMutualSettlementDetailClientPayment|null
     */
    public function getMutualSettlementDetailClientPayment(): ?\StructType\ApiMutualSettlementDetailClientPayment
    {
        return isset($this->mutualSettlementDetailClientPayment) ? $this->mutualSettlementDetailClientPayment : null;
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
     * @param \StructType\ApiMutualSettlementDetailClientPayment $mutualSettlementDetailClientPayment
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailClientPayment(?\StructType\ApiMutualSettlementDetailClientPayment $mutualSettlementDetailClientPayment = null): self
    {
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
     * Get mutualSettlementDetailPostReturnRegistry value
     * @return \StructType\ApiMutualSettlementDetailPostReturnRegistry|null
     */
    public function getMutualSettlementDetailPostReturnRegistry(): ?\StructType\ApiMutualSettlementDetailPostReturnRegistry
    {
        return isset($this->mutualSettlementDetailPostReturnRegistry) ? $this->mutualSettlementDetailPostReturnRegistry : null;
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
     * @param \StructType\ApiMutualSettlementDetailPostReturnRegistry $mutualSettlementDetailPostReturnRegistry
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailPostReturnRegistry(?\StructType\ApiMutualSettlementDetailPostReturnRegistry $mutualSettlementDetailPostReturnRegistry = null): self
    {
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
     * Get mutualSettlementDetailRouteList value
     * @return \StructType\ApiMutualSettlementDetailRouteList|null
     */
    public function getMutualSettlementDetailRouteList(): ?\StructType\ApiMutualSettlementDetailRouteList
    {
        return isset($this->mutualSettlementDetailRouteList) ? $this->mutualSettlementDetailRouteList : null;
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
     * @param \StructType\ApiMutualSettlementDetailRouteList $mutualSettlementDetailRouteList
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailRouteList(?\StructType\ApiMutualSettlementDetailRouteList $mutualSettlementDetailRouteList = null): self
    {
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
     * Get mutualSettlementDetailTrackNumberPayment value
     * @return \StructType\ApiMutualSettlementDetailTrackNumberPayment|null
     */
    public function getMutualSettlementDetailTrackNumberPayment(): ?\StructType\ApiMutualSettlementDetailTrackNumberPayment
    {
        return isset($this->mutualSettlementDetailTrackNumberPayment) ? $this->mutualSettlementDetailTrackNumberPayment : null;
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
     * @param \StructType\ApiMutualSettlementDetailTrackNumberPayment $mutualSettlementDetailTrackNumberPayment
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailTrackNumberPayment(?\StructType\ApiMutualSettlementDetailTrackNumberPayment $mutualSettlementDetailTrackNumberPayment = null): self
    {
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
     * Get mutualSettlementDetailServiceRegistration value
     * @return \StructType\ApiMutualSettlementDetailServiceRegistration|null
     */
    public function getMutualSettlementDetailServiceRegistration(): ?\StructType\ApiMutualSettlementDetailServiceRegistration
    {
        return isset($this->mutualSettlementDetailServiceRegistration) ? $this->mutualSettlementDetailServiceRegistration : null;
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
     * @param \StructType\ApiMutualSettlementDetailServiceRegistration $mutualSettlementDetailServiceRegistration
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailServiceRegistration(?\StructType\ApiMutualSettlementDetailServiceRegistration $mutualSettlementDetailServiceRegistration = null): self
    {
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
     * Get mutualSettlementDetailAcceptanceRegistry value
     * @return \StructType\ApiMutualSettlementDetailAcceptanceRegistry|null
     */
    public function getMutualSettlementDetailAcceptanceRegistry(): ?\StructType\ApiMutualSettlementDetailAcceptanceRegistry
    {
        return isset($this->mutualSettlementDetailAcceptanceRegistry) ? $this->mutualSettlementDetailAcceptanceRegistry : null;
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
     * @param \StructType\ApiMutualSettlementDetailAcceptanceRegistry $mutualSettlementDetailAcceptanceRegistry
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailAcceptanceRegistry(?\StructType\ApiMutualSettlementDetailAcceptanceRegistry $mutualSettlementDetailAcceptanceRegistry = null): self
    {
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
     * Get mutualSettlementDetailAdditionalChargeFare value
     * @return \StructType\ApiMutualSettlementDetailAdditionalChargeFare|null
     */
    public function getMutualSettlementDetailAdditionalChargeFare(): ?\StructType\ApiMutualSettlementDetailAdditionalChargeFare
    {
        return isset($this->mutualSettlementDetailAdditionalChargeFare) ? $this->mutualSettlementDetailAdditionalChargeFare : null;
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
     * @param \StructType\ApiMutualSettlementDetailAdditionalChargeFare $mutualSettlementDetailAdditionalChargeFare
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailAdditionalChargeFare(?\StructType\ApiMutualSettlementDetailAdditionalChargeFare $mutualSettlementDetailAdditionalChargeFare = null): self
    {
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
     * Get mutualSettlementDetailOutgoingRequestToCarrier value
     * @return \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier|null
     */
    public function getMutualSettlementDetailOutgoingRequestToCarrier(): ?\StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier
    {
        return isset($this->mutualSettlementDetailOutgoingRequestToCarrier) ? $this->mutualSettlementDetailOutgoingRequestToCarrier : null;
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
     * @param \StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier $mutualSettlementDetailOutgoingRequestToCarrier
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailOutgoingRequestToCarrier(?\StructType\ApiMutualSettlementDetailOutgoingRequestToCarrier $mutualSettlementDetailOutgoingRequestToCarrier = null): self
    {
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
     * Get mutualSettlementDetailSMSInformation value
     * @return \StructType\ApiMutualSettlementDetailSMSInformation|null
     */
    public function getMutualSettlementDetailSMSInformation(): ?\StructType\ApiMutualSettlementDetailSMSInformation
    {
        return isset($this->mutualSettlementDetailSMSInformation) ? $this->mutualSettlementDetailSMSInformation : null;
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
     * @param \StructType\ApiMutualSettlementDetailSMSInformation $mutualSettlementDetailSMSInformation
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailSMSInformation(?\StructType\ApiMutualSettlementDetailSMSInformation $mutualSettlementDetailSMSInformation = null): self
    {
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
     * Get mutualSettlementDetailBuyerGoodsReturn value
     * @return \StructType\ApiMutualSettlementDetailBuyerGoodsReturn|null
     */
    public function getMutualSettlementDetailBuyerGoodsReturn(): ?\StructType\ApiMutualSettlementDetailBuyerGoodsReturn
    {
        return isset($this->mutualSettlementDetailBuyerGoodsReturn) ? $this->mutualSettlementDetailBuyerGoodsReturn : null;
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
     * @param \StructType\ApiMutualSettlementDetailBuyerGoodsReturn $mutualSettlementDetailBuyerGoodsReturn
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailBuyerGoodsReturn(?\StructType\ApiMutualSettlementDetailBuyerGoodsReturn $mutualSettlementDetailBuyerGoodsReturn = null): self
    {
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
     * Get mutualSettlementDetailProductsPackaging value
     * @return \StructType\ApiMutualSettlementDetailProductsPackaging|null
     */
    public function getMutualSettlementDetailProductsPackaging(): ?\StructType\ApiMutualSettlementDetailProductsPackaging
    {
        return isset($this->mutualSettlementDetailProductsPackaging) ? $this->mutualSettlementDetailProductsPackaging : null;
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
     * @param \StructType\ApiMutualSettlementDetailProductsPackaging $mutualSettlementDetailProductsPackaging
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailProductsPackaging(?\StructType\ApiMutualSettlementDetailProductsPackaging $mutualSettlementDetailProductsPackaging = null): self
    {
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
     * Get mutualSettlementDetailAdjustmentWriteRegisters value
     * @return \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters|null
     */
    public function getMutualSettlementDetailAdjustmentWriteRegisters(): ?\StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters
    {
        return isset($this->mutualSettlementDetailAdjustmentWriteRegisters) ? $this->mutualSettlementDetailAdjustmentWriteRegisters : null;
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
     * @param \StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters $mutualSettlementDetailAdjustmentWriteRegisters
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailAdjustmentWriteRegisters(?\StructType\ApiMutualSettlementDetailAdjustmentWriteRegisters $mutualSettlementDetailAdjustmentWriteRegisters = null): self
    {
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
     * Get mutualSettlementDetailSafeCustody value
     * @return \StructType\ApiMutualSettlementDetailSafeCustody|null
     */
    public function getMutualSettlementDetailSafeCustody(): ?\StructType\ApiMutualSettlementDetailSafeCustody
    {
        return isset($this->mutualSettlementDetailSafeCustody) ? $this->mutualSettlementDetailSafeCustody : null;
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
     * @param \StructType\ApiMutualSettlementDetailSafeCustody $mutualSettlementDetailSafeCustody
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailSafeCustody(?\StructType\ApiMutualSettlementDetailSafeCustody $mutualSettlementDetailSafeCustody = null): self
    {
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
     * Get mutualSettlementDetailSafeCustodyCalculation value
     * @return \StructType\ApiMutualSettlementDetailSafeCustodyCalculation|null
     */
    public function getMutualSettlementDetailSafeCustodyCalculation(): ?\StructType\ApiMutualSettlementDetailSafeCustodyCalculation
    {
        return isset($this->mutualSettlementDetailSafeCustodyCalculation) ? $this->mutualSettlementDetailSafeCustodyCalculation : null;
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
     * @param \StructType\ApiMutualSettlementDetailSafeCustodyCalculation $mutualSettlementDetailSafeCustodyCalculation
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailSafeCustodyCalculation(?\StructType\ApiMutualSettlementDetailSafeCustodyCalculation $mutualSettlementDetailSafeCustodyCalculation = null): self
    {
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
     * Get mutualSettlementDetailRegisterStorage value
     * @return \StructType\ApiMutualSettlementDetailRegisterStorage|null
     */
    public function getMutualSettlementDetailRegisterStorage(): ?\StructType\ApiMutualSettlementDetailRegisterStorage
    {
        return isset($this->mutualSettlementDetailRegisterStorage) ? $this->mutualSettlementDetailRegisterStorage : null;
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
     * @param \StructType\ApiMutualSettlementDetailRegisterStorage $mutualSettlementDetailRegisterStorage
     * @return \StructType\ApiDetails
     */
    public function setMutualSettlementDetailRegisterStorage(?\StructType\ApiMutualSettlementDetailRegisterStorage $mutualSettlementDetailRegisterStorage = null): self
    {
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
}
