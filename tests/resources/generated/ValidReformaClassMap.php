<?php

namespace Api;

/**
 * Class which returns the class map definition
 * @package Api
 */
class ApiClassMap
{
    /**
     * Returns the mapping between the WSDL Structs and generated Structs' classes
     * This array is sent to the \SoapClient when calling the WS
     * @return string[]
     */
    final public static function get()
    {
        return array(
            'RequestState' => '\\Api\\StructType\\ApiRequestState',
            'SetRequestForSubmitInnStatus' => '\\Api\\StructType\\ApiSetRequestForSubmitInnStatus',
            'FiasAddress' => '\\Api\\StructType\\ApiFiasAddress',
            'FullAddress' => '\\Api\\StructType\\ApiFullAddress',
            'HouseInfo' => '\\Api\\StructType\\ApiHouseInfo',
            'Facade' => '\\Api\\StructType\\ApiFacade',
            'Roof' => '\\Api\\StructType\\ApiRoof',
            'Basement' => '\\Api\\StructType\\ApiBasement',
            'CommonSpace' => '\\Api\\StructType\\ApiCommonSpace',
            'Chute' => '\\Api\\StructType\\ApiChute',
            'HeatingSystem' => '\\Api\\StructType\\ApiHeatingSystem',
            'HotWaterSystem' => '\\Api\\StructType\\ApiHotWaterSystem',
            'ColdWaterSystem' => '\\Api\\StructType\\ApiColdWaterSystem',
            'SewerageSystem' => '\\Api\\StructType\\ApiSewerageSystem',
            'ElectricitySystem' => '\\Api\\StructType\\ApiElectricitySystem',
            'GasSystem' => '\\Api\\StructType\\ApiGasSystem',
            'Lift' => '\\Api\\StructType\\ApiLift',
            'ManagementContract' => '\\Api\\StructType\\ApiManagementContract',
            'Provider' => '\\Api\\StructType\\ApiProvider',
            'Finance' => '\\Api\\StructType\\ApiFinance',
            'HouseProfileData' => '\\Api\\StructType\\ApiHouseProfileData',
            'FileInfo' => '\\Api\\StructType\\ApiFileInfo',
            'GetHouseProfileResponse' => '\\Api\\StructType\\ApiGetHouseProfileResponse',
            'HouseCadastralNumber' => '\\Api\\StructType\\ApiHouseCadastralNumber',
            'HouseFacade' => '\\Api\\StructType\\ApiHouseFacade',
            'HouseRoof' => '\\Api\\StructType\\ApiHouseRoof',
            'HouseAdditionalEquipment' => '\\Api\\StructType\\ApiHouseAdditionalEquipment',
            'HouseMeteringDevice' => '\\Api\\StructType\\ApiHouseMeteringDevice',
            'HouseLift' => '\\Api\\StructType\\ApiHouseLift',
            'HouseManagementContract' => '\\Api\\StructType\\ApiHouseManagementContract',
            'HouseServiceReportVolume' => '\\Api\\StructType\\ApiHouseServiceReportVolume',
            'HouseServiceReport' => '\\Api\\StructType\\ApiHouseServiceReport',
            'HouseService' => '\\Api\\StructType\\ApiHouseService',
            'HouseCommunalServiceCost' => '\\Api\\StructType\\ApiHouseCommunalServiceCost',
            'HouseCommunalServiceNormativeAct' => '\\Api\\StructType\\ApiHouseCommunalServiceNormativeAct',
            'HouseCommunalServiceVolumesReport' => '\\Api\\StructType\\ApiHouseCommunalServiceVolumesReport',
            'HouseCommunalService' => '\\Api\\StructType\\ApiHouseCommunalService',
            'HouseOverhaul' => '\\Api\\StructType\\ApiHouseOverhaul',
            'HouseCommonMeeting' => '\\Api\\StructType\\ApiHouseCommonMeeting',
            'HouseCommonPropertyRent' => '\\Api\\StructType\\ApiHouseCommonPropertyRent',
            'HouseCommonProperty' => '\\Api\\StructType\\ApiHouseCommonProperty',
            'HouseReportCommon' => '\\Api\\StructType\\ApiHouseReportCommon',
            'HouseReportCommunalService' => '\\Api\\StructType\\ApiHouseReportCommunalService',
            'HouseReportClaimsToConsumers' => '\\Api\\StructType\\ApiHouseReportClaimsToConsumers',
            'HouseReportQualityOfWorkClaims' => '\\Api\\StructType\\ApiHouseReportQualityOfWorkClaims',
            'HouseReport' => '\\Api\\StructType\\ApiHouseReport',
            'HouseAlarmFailure' => '\\Api\\StructType\\ApiHouseAlarmFailure',
            'HouseAlarm' => '\\Api\\StructType\\ApiHouseAlarm',
            'HouseProfileData988' => '\\Api\\StructType\\ApiHouseProfileData988',
            'GetHouseProfile988Response' => '\\Api\\StructType\\ApiGetHouseProfile988Response',
            'GetHouseProfileSFResponse' => '\\Api\\StructType\\ApiGetHouseProfileSFResponse',
            'GetHouseProfileSF988Response' => '\\Api\\StructType\\ApiGetHouseProfileSF988Response',
            'HouseData' => '\\Api\\StructType\\ApiHouseData',
            'NewCompanyProfileData' => '\\Api\\StructType\\ApiNewCompanyProfileData',
            'CountDismissed' => '\\Api\\StructType\\ApiCountDismissed',
            'CountHousesUnderMngReportDate' => '\\Api\\StructType\\ApiCountHousesUnderMngReportDate',
            'CountHousesUnderMngStartPeriod' => '\\Api\\StructType\\ApiCountHousesUnderMngStartPeriod',
            'SumSqHousesUnderMngReportDate' => '\\Api\\StructType\\ApiSumSqHousesUnderMngReportDate',
            'SumSqHousesUnderMngStartPeriod' => '\\Api\\StructType\\ApiSumSqHousesUnderMngStartPeriod',
            'AvgTimeServiceMkd' => '\\Api\\StructType\\ApiAvgTimeServiceMkd',
            'IncomeOfMng' => '\\Api\\StructType\\ApiIncomeOfMng',
            'IncomeOfUsage' => '\\Api\\StructType\\ApiIncomeOfUsage',
            'IncomeOfKu' => '\\Api\\StructType\\ApiIncomeOfKu',
            'SpendingOfMng' => '\\Api\\StructType\\ApiSpendingOfMng',
            'ClaimsByContractsMng' => '\\Api\\StructType\\ApiClaimsByContractsMng',
            'ClaimsByRso' => '\\Api\\StructType\\ApiClaimsByRso',
            'DebtForMng' => '\\Api\\StructType\\ApiDebtForMng',
            'DebtOwnersForKu' => '\\Api\\StructType\\ApiDebtOwnersForKu',
            'DebtUoForKu' => '\\Api\\StructType\\ApiDebtUoForKu',
            'ChargedForMng' => '\\Api\\StructType\\ApiChargedForMng',
            'ChargedForResources' => '\\Api\\StructType\\ApiChargedForResources',
            'SpendingRepair' => '\\Api\\StructType\\ApiSpendingRepair',
            'SpendingBeauty' => '\\Api\\StructType\\ApiSpendingBeauty',
            'SpendingRepairInvests' => '\\Api\\StructType\\ApiSpendingRepairInvests',
            'PayedKuByStatements' => '\\Api\\StructType\\ApiPayedKuByStatements',
            'PayedKuByNeeds' => '\\Api\\StructType\\ApiPayedKuByNeeds',
            'CompanyProfileData' => '\\Api\\StructType\\ApiCompanyProfileData',
            'GetCompanyProfileResponse' => '\\Api\\StructType\\ApiGetCompanyProfileResponse',
            'Disturbance' => '\\Api\\StructType\\ApiDisturbance',
            'License' => '\\Api\\StructType\\ApiLicense',
            'CompanyProfileData988' => '\\Api\\StructType\\ApiCompanyProfileData988',
            'GetCompanyProfile988Response' => '\\Api\\StructType\\ApiGetCompanyProfile988Response',
            'GetCompanyProfileSFResponse' => '\\Api\\StructType\\ApiGetCompanyProfileSFResponse',
            'GetCompanyProfileSF988Response' => '\\Api\\StructType\\ApiGetCompanyProfileSF988Response',
            'ReportingPeriod' => '\\Api\\StructType\\ApiReportingPeriod',
            'FileObject' => '\\Api\\StructType\\ApiFileObject',
            'ErrorDetails' => '\\Api\\StructType\\ApiErrorDetails',
        );
    }
}
