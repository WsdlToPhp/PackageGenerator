<?php

declare(strict_types=1);
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
    final public static function get(): array
    {
        return [
            'base64Binary' => '\\StructType\\ApiBase64Binary',
            'hexBinary' => '\\StructType\\ApiHexBinary',
            'AttachmentType' => '\\StructType\\ApiAttachmentType',
            'SessionHeader' => '\\StructType\\ApiSessionHeader',
            'ClusterHeader' => '\\StructType\\ApiClusterHeader',
            'PartnerHeader' => '\\StructType\\ApiPartnerHeader',
            'ActonFaultType' => '\\StructType\\ApiActonFaultType',
            'LoginResult' => '\\StructType\\ApiLoginResult',
            'login' => '\\StructType\\ApiLogin',
            'loginResponse' => '\\StructType\\ApiLoginResponse',
            'list' => '\\StructType\\ApiList',
            'listResponse' => '\\StructType\\ApiListResponse',
            'Item' => '\\StructType\\ApiItem',
            'sendEmail' => '\\StructType\\ApiSendEmail',
            'CustomEmail' => '\\StructType\\ApiCustomEmail',
            'launchParameters' => '\\StructType\\ApiLaunchParameters',
            'senderFrom' => '\\StructType\\ApiSenderFrom',
            'sendEmailResponse' => '\\StructType\\ApiSendEmailResponse',
            'UploadContactRecordType' => '\\StructType\\ApiUploadContactRecordType',
            'uploadList' => '\\StructType\\ApiUploadList',
            'columnDef' => '\\StructType\\ApiColumnDef',
            'mergeOptions' => '\\StructType\\ApiMergeOptions',
            'columnMap' => '\\StructType\\ApiColumnMap',
            'uploadListResponse' => '\\StructType\\ApiUploadListResponse',
            'getUploadResultRequest' => '\\StructType\\ApiGetUploadResultRequest',
            'getUploadResultResponse' => '\\StructType\\ApiGetUploadResultResponse',
            'appendedRecords' => '\\StructType\\ApiAppendedRecords',
            'updatedRecords' => '\\StructType\\ApiUpdatedRecords',
            'unchangedRecords' => '\\StructType\\ApiUnchangedRecords',
            'downloadList' => '\\StructType\\ApiDownloadList',
            'deleteList' => '\\StructType\\ApiDeleteList',
            'messageReport' => '\\StructType\\ApiMessageReport',
            'fullDetail' => '\\StructType\\ApiFullDetail',
            'contactFields' => '\\StructType\\ApiContactFields',
            'messageReportResponse' => '\\StructType\\ApiMessageReportResponse',
            'summary' => '\\StructType\\ApiSummary',
            'uniqueCounts' => '\\StructType\\ApiUniqueCounts',
            'totalCounts' => '\\StructType\\ApiTotalCounts',
            'messageInfo' => '\\StructType\\ApiMessageInfo',
            'detail' => '\\StructType\\ApiDetail',
            'actionRecordDetailType' => '\\StructType\\ApiActionRecordDetailType',
            'actionRecord' => '\\StructType\\ApiActionRecord',
            'contactField' => '\\StructType\\ApiContactField',
        ];
    }
}
