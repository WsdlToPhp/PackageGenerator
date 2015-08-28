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
            'base64Binary' => '\Api\StructType\ApiBase64Binary',
            'hexBinary' => '\Api\StructType\ApiHexBinary',
            'AttachmentType' => '\Api\StructType\ApiAttachmentType',
            'SessionHeader' => '\Api\StructType\ApiSessionHeader',
            'ClusterHeader' => '\Api\StructType\ApiClusterHeader',
            'PartnerHeader' => '\Api\StructType\ApiPartnerHeader',
            'ActonFaultType' => '\Api\StructType\ApiActonFaultType',
            'LoginResult' => '\Api\StructType\ApiLoginResult',
            'login' => '\Api\StructType\ApiLogin',
            'loginResponse' => '\Api\StructType\ApiLoginResponse',
            'list' => '\Api\StructType\ApiList',
            'listResponse' => '\Api\StructType\ApiListResponse',
            'Item' => '\Api\StructType\ApiItem',
            'sendEmail' => '\Api\StructType\ApiSendEmail',
            'CustomEmail' => '\Api\StructType\ApiCustomEmail',
            'launchParameters' => '\Api\StructType\ApiLaunchParameters',
            'senderFrom' => '\Api\StructType\ApiSenderFrom',
            'sendEmailResponse' => '\Api\StructType\ApiSendEmailResponse',
            'UploadContactRecordType' => '\Api\StructType\ApiUploadContactRecordType',
            'uploadList' => '\Api\StructType\ApiUploadList',
            'columnDef' => '\Api\StructType\ApiColumnDef',
            'mergeOptions' => '\Api\StructType\ApiMergeOptions',
            'columnMap' => '\Api\StructType\ApiColumnMap',
            'uploadListResponse' => '\Api\StructType\ApiUploadListResponse',
            'getUploadResultRequest' => '\Api\StructType\ApiGetUploadResultRequest',
            'getUploadResultResponse' => '\Api\StructType\ApiGetUploadResultResponse',
            'appendedRecords' => '\Api\StructType\ApiAppendedRecords',
            'updatedRecords' => '\Api\StructType\ApiUpdatedRecords',
            'unchangedRecords' => '\Api\StructType\ApiUnchangedRecords',
            'downloadList' => '\Api\StructType\ApiDownloadList',
            'deleteList' => '\Api\StructType\ApiDeleteList',
            'messageReport' => '\Api\StructType\ApiMessageReport',
            'fullDetail' => '\Api\StructType\ApiFullDetail',
            'contactFields' => '\Api\StructType\ApiContactFields',
            'messageReportResponse' => '\Api\StructType\ApiMessageReportResponse',
            'summary' => '\Api\StructType\ApiSummary',
            'uniqueCounts' => '\Api\StructType\ApiUniqueCounts',
            'totalCounts' => '\Api\StructType\ApiTotalCounts',
            'messageInfo' => '\Api\StructType\ApiMessageInfo',
            'detail' => '\Api\StructType\ApiDetail',
            'actionRecordDetailType' => '\Api\StructType\ApiActionRecordDetailType',
            'actionRecord' => '\Api\StructType\ApiActionRecord',
            'contactField' => '\Api\StructType\ApiContactField',
        );
    }
}
