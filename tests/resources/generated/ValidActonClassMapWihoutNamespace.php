<?php

declare(strict_types=1);
/**
 * Class which returns the class map definition
 */
class ClassMap
{
    /**
     * Returns the mapping between the WSDL Structs and generated Structs' classes
     * This array is sent to the \SoapClient when calling the WS
     * @return string[]
     */
    final public static function get(): array
    {
        return [
            'base64Binary' => '\\StructType\\Base64Binary',
            'hexBinary' => '\\StructType\\HexBinary',
            'AttachmentType' => '\\StructType\\AttachmentType',
            'SessionHeader' => '\\StructType\\SessionHeader',
            'ClusterHeader' => '\\StructType\\ClusterHeader',
            'PartnerHeader' => '\\StructType\\PartnerHeader',
            'ActonFaultType' => '\\StructType\\ActonFaultType',
            'LoginResult' => '\\StructType\\LoginResult',
            'login' => '\\StructType\\Login',
            'loginResponse' => '\\StructType\\LoginResponse',
            'list' => '\\StructType\\_list',
            'listResponse' => '\\StructType\\ListResponse',
            'Item' => '\\StructType\\Item',
            'sendEmail' => '\\StructType\\SendEmail',
            'CustomEmail' => '\\StructType\\CustomEmail',
            'launchParameters' => '\\StructType\\LaunchParameters',
            'senderFrom' => '\\StructType\\SenderFrom',
            'sendEmailResponse' => '\\StructType\\SendEmailResponse',
            'UploadContactRecordType' => '\\StructType\\UploadContactRecordType',
            'uploadList' => '\\StructType\\UploadList',
            'columnDef' => '\\StructType\\ColumnDef',
            'mergeOptions' => '\\StructType\\MergeOptions',
            'columnMap' => '\\StructType\\ColumnMap',
            'uploadListResponse' => '\\StructType\\UploadListResponse',
            'getUploadResultRequest' => '\\StructType\\GetUploadResultRequest',
            'getUploadResultResponse' => '\\StructType\\GetUploadResultResponse',
            'appendedRecords' => '\\StructType\\AppendedRecords',
            'updatedRecords' => '\\StructType\\UpdatedRecords',
            'unchangedRecords' => '\\StructType\\UnchangedRecords',
            'downloadList' => '\\StructType\\DownloadList',
            'deleteList' => '\\StructType\\DeleteList',
            'messageReport' => '\\StructType\\MessageReport',
            'fullDetail' => '\\StructType\\FullDetail',
            'contactFields' => '\\StructType\\ContactFields',
            'messageReportResponse' => '\\StructType\\MessageReportResponse',
            'summary' => '\\StructType\\Summary',
            'uniqueCounts' => '\\StructType\\UniqueCounts',
            'totalCounts' => '\\StructType\\TotalCounts',
            'messageInfo' => '\\StructType\\MessageInfo',
            'detail' => '\\StructType\\Detail',
            'actionRecordDetailType' => '\\StructType\\ActionRecordDetailType',
            'actionRecord' => '\\StructType\\ActionRecord',
            'contactField' => '\\StructType\\ContactField',
        ];
    }
}
