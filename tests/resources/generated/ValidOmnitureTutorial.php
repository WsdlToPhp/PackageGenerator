<?php
/**
 * This file aims to show you how to use this generated package.
 * In addition, the goal is to show which methods are available and the first needed parameter(s)
 * You have to use an associative array such as:
 * - the key must be a constant beginning with WSDL_ from AbstractSoapClientBase class (each generated ServiceType class extends this class)
 * - the value must be the corresponding key value (each option matches a {@link http://www.php.net/manual/en/soapclient.soapclient.php} option)
 * $options = array(
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => '__WSDL_URL__',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_TRACE => true,
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_LOGIN => 'you_secret_login',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_PASSWORD => 'you_secret_password',
 * );
 * etc...
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Minimal options
 */
$options = array(
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => '__WSDL_URL__',
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => \Api\ApiClassMap::get(),
);
/**
 * Samples for Code ServiceType
 */
$code = new \Api\ServiceType\ApiCode($options);
/**
 * Sample call for CodeManager_DeleteCodeArchive operation/method
 */
if ($code->CodeManager_DeleteCodeArchive($archive_id) !== false) {
    print_r($code->getResult());
} else {
    print_r($code->getLastError());
}
/**
 * Sample call for CodeManager_GenerateCode operation/method
 */
if ($code->CodeManager_GenerateCode($char_set, $code_type, $cookie_domain_periods, $currency_code, $rsid, $secure) !== false) {
    print_r($code->getResult());
} else {
    print_r($code->getLastError());
}
/**
 * Sample call for CodeManager_GetCodeArchives operation/method
 */
if ($code->CodeManager_GetCodeArchives($archive_id_list, $binary_encoding, $populate_code_items) !== false) {
    print_r($code->getResult());
} else {
    print_r($code->getLastError());
}
/**
 * Sample call for CodeManager_SaveCodeArchive operation/method
 */
if ($code->CodeManager_SaveCodeArchive($archive_description, $archive_id, $archive_name, $code) !== false) {
    print_r($code->getResult());
} else {
    print_r($code->getLastError());
}
/**
 * Samples for Company ServiceType
 */
$company = new \Api\ServiceType\ApiCompany($options);
/**
 * Sample call for Company_CancelQueueItem operation/method
 */
if ($company->Company_CancelQueueItem($qid) !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Sample call for Company_DownloadProduct operation/method
 */
if ($company->Company_DownloadProduct($productType) !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Sample call for Company_GetEndpoint operation/method
 */
if ($company->Company_GetEndpoint($company) !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Sample call for Company_GetQueue operation/method
 */
if ($company->Company_GetQueue() !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Sample call for Company_GetReportSuites operation/method
 */
if ($company->Company_GetReportSuites($rs_types, $sp) !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Sample call for Company_GetTokenCount operation/method
 */
if ($company->Company_GetTokenCount() !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Sample call for Company_GetTokenUsage operation/method
 */
if ($company->Company_GetTokenUsage() !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Sample call for Company_GetTrackingServer operation/method
 */
if ($company->Company_GetTrackingServer($rsid) !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Sample call for Company_GetVersionAccess operation/method
 */
if ($company->Company_GetVersionAccess() !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Sample call for Company_ResetTokenCount operation/method
 */
if ($company->Company_ResetTokenCount($auth_key) !== false) {
    print_r($company->getResult());
} else {
    print_r($company->getLastError());
}
/**
 * Samples for Dashboards ServiceType
 */
$dashboards = new \Api\ServiceType\ApiDashboards($options);
/**
 * Sample call for Dashboards_GetDashboardAPI operation/method
 */
if ($dashboards->Dashboards_GetDashboardAPI($dashboard_id, $dashboard_type) !== false) {
    print_r($dashboards->getResult());
} else {
    print_r($dashboards->getLastError());
}
/**
 * Sample call for Dashboards_GetReportletDataAPI operation/method
 */
if ($dashboards->Dashboards_GetReportletDataAPI($reportlet_id) !== false) {
    print_r($dashboards->getResult());
} else {
    print_r($dashboards->getLastError());
}
/**
 * Samples for Data ServiceType
 */
$data = new \Api\ServiceType\ApiData($options);
/**
 * Sample call for DataSource_AppendDataBlock operation/method
 */
if ($data->DataSource_AppendDataBlock($blockID, $dataSourceID, $endOfBlock, $reportSuiteID, $rows) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_BeginDataBlock operation/method
 */
if ($data->DataSource_BeginDataBlock($blockName, $columnNames, $dataSourceID, $endOfBlock, $reportSuiteID, $rows) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_Deactivate operation/method
 */
if ($data->DataSource_Deactivate($dataSourceID, $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_GetFileIDs operation/method
 */
if ($data->DataSource_GetFileIDs($dataSourceID, $filter, $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_GetFileInfo operation/method
 */
if ($data->DataSource_GetFileInfo($dataSourceID, $filter, $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_GetFileStatus operation/method
 */
if ($data->DataSource_GetFileStatus($dataSourceFileID, $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_GetIDs operation/method
 */
if ($data->DataSource_GetIDs($reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_GetInfo operation/method
 */
if ($data->DataSource_GetInfo($filter, $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_ProcessIncompleteVisits operation/method
 */
if ($data->DataSource_ProcessIncompleteVisits($dataSourceID, $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_Restart operation/method
 */
if ($data->DataSource_Restart($dataSourceID, $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_SetupFull operation/method
 */
if ($data->DataSource_SetupFull($dataSourceID, new \Api\StructType\ApiDs_full_settings(), $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_SetupGeneric operation/method
 */
if ($data->DataSource_SetupGeneric($dataSourceID, new \Api\StructType\ApiDs_generic_settings(), $dataSourceType, $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_SetupTraffic operation/method
 */
if ($data->DataSource_SetupTraffic($dataSourceID, new \Api\StructType\ApiDs_traffic_settings(), $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataSource_SetupWebLog operation/method
 */
if ($data->DataSource_SetupWebLog($dataSourceID, new \Api\StructType\ApiDs_weblog_settings(), $reportSuiteID) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataWarehouse_CancelRequest operation/method
 */
if ($data->DataWarehouse_CancelRequest($Request_Id) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataWarehouse_CheckRequest operation/method
 */
if ($data->DataWarehouse_CheckRequest($Request_Id) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataWarehouse_CreateSegment operation/method
 */
if ($data->DataWarehouse_CreateSegment($hidden, $rsid, new \Api\StructType\ApiData_warehouse_segment()) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataWarehouse_GetReportData operation/method
 */
if ($data->DataWarehouse_GetReportData($Request_Id, $rsid, $start_row) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataWarehouse_GetSegment operation/method
 */
if ($data->DataWarehouse_GetSegment($rsid, $segment) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataWarehouse_GetSegments operation/method
 */
if ($data->DataWarehouse_GetSegments($rsid) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataWarehouse_ReplaceSegment operation/method
 */
if ($data->DataWarehouse_ReplaceSegment($id, $rsid, new \Api\StructType\ApiData_warehouse_segment()) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataWarehouse_Request operation/method
 */
if ($data->DataWarehouse_Request($Breakdown_List, $Contact_Name, $Contact_Phone, $Date_From, $Date_Granularity, $Date_Preset, $Date_To, $Date_Type, $Email_Subject, $Email_To, $FTP_Dir, $FTP_Host, $FTP_Password, $FTP_Port, $FTP_UserName, $File_Name, $Metric_List, $Report_Description, $Report_Name, $Segment_Id, $rsid) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Sample call for DataWarehouse_VerifySegment operation/method
 */
if ($data->DataWarehouse_VerifySegment(new \Api\StructType\ApiData_warehouse_segment()) !== false) {
    print_r($data->getResult());
} else {
    print_r($data->getLastError());
}
/**
 * Samples for Delivery ServiceType
 */
$delivery = new \Api\ServiceType\ApiDelivery($options);
/**
 * Sample call for DeliveryList_Delete operation/method
 */
if ($delivery->DeliveryList_Delete($dist_list_id) !== false) {
    print_r($delivery->getResult());
} else {
    print_r($delivery->getLastError());
}
/**
 * Sample call for DeliveryList_Get operation/method
 */
if ($delivery->DeliveryList_Get($search_name) !== false) {
    print_r($delivery->getResult());
} else {
    print_r($delivery->getLastError());
}
/**
 * Sample call for DeliveryList_Save operation/method
 */
if ($delivery->DeliveryList_Save($delivery_list_name, $dist_list_id) !== false) {
    print_r($delivery->getResult());
} else {
    print_r($delivery->getLastError());
}
/**
 * Samples for Discover ServiceType
 */
$discover = new \Api\ServiceType\ApiDiscover($options);
/**
 * Sample call for Discover_GetSegments operation/method
 */
if ($discover->Discover_GetSegments($end_date, $rsid, $start_date) !== false) {
    print_r($discover->getResult());
} else {
    print_r($discover->getLastError());
}
/**
 * Sample call for Discover_QueueDiscoverOvertime operation/method
 */
if ($discover->Discover_QueueDiscoverOvertime(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($discover->getResult());
} else {
    print_r($discover->getLastError());
}
/**
 * Sample call for Discover_QueueDiscoverRanked operation/method
 */
if ($discover->Discover_QueueDiscoverRanked(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($discover->getResult());
} else {
    print_r($discover->getLastError());
}
/**
 * Sample call for Discover_QueueDiscoverTrended operation/method
 */
if ($discover->Discover_QueueDiscoverTrended(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($discover->getResult());
} else {
    print_r($discover->getLastError());
}
/**
 * Samples for Logs ServiceType
 */
$logs = new \Api\ServiceType\ApiLogs($options);
/**
 * Sample call for Logs_GetAdminConsoleCompanyLog operation/method
 */
if ($logs->Logs_GetAdminConsoleCompanyLog($company, $end_date, $filter_rule, $filters, $rsid_list, $start_date) !== false) {
    print_r($logs->getResult());
} else {
    print_r($logs->getLastError());
}
/**
 * Sample call for Logs_GetAdminConsoleLog operation/method
 */
if ($logs->Logs_GetAdminConsoleLog($company, $end_date, $filter_rule, $filters, $rsid_list, $start_date) !== false) {
    print_r($logs->getResult());
} else {
    print_r($logs->getLastError());
}
/**
 * Sample call for Logs_GetUsageLog operation/method
 */
if ($logs->Logs_GetUsageLog($date_from, $date_to, $event_details, $event_type, $ip, $login, $report_suite) !== false) {
    print_r($logs->getResult());
} else {
    print_r($logs->getLastError());
}
/**
 * Samples for Permissions ServiceType
 */
$permissions = new \Api\ServiceType\ApiPermissions($options);
/**
 * Sample call for Permissions_AddLogin operation/method
 */
if ($permissions->Permissions_AddLogin($admin, $change_password, $create_dashboards, $dashboard_rsid, $email, $first_name, $last_name, $login, $password, $phone_number, $selected_group_list, $temp_login, $temp_login_end, $temp_login_start, $title) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_Authenticate operation/method
 */
if ($permissions->Permissions_Authenticate($login, $password) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_DeleteGroup operation/method
 */
if ($permissions->Permissions_DeleteGroup($groupid) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_DeleteLogin operation/method
 */
if ($permissions->Permissions_DeleteLogin($login) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_GetCRMInfo operation/method
 */
if ($permissions->Permissions_GetCRMInfo($company, $login) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_GetCategories operation/method
 */
if ($permissions->Permissions_GetCategories($categoryid, $groupid) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_GetGroup operation/method
 */
if ($permissions->Permissions_GetGroup($group_type, $groupid) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_GetGroups operation/method
 */
if ($permissions->Permissions_GetGroups($field, $search) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_GetLogin operation/method
 */
if ($permissions->Permissions_GetLogin($login) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_GetLogins operation/method
 */
if ($permissions->Permissions_GetLogins($login_search_field, $login_search_value) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_GetReportBuilderLogin operation/method
 */
if ($permissions->Permissions_GetReportBuilderLogin($locale) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_GetReportSuiteGroupCount operation/method
 */
if ($permissions->Permissions_GetReportSuiteGroupCount($search_field, $search_val) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_GetReportSuiteGroups operation/method
 */
if ($permissions->Permissions_GetReportSuiteGroups($rsid) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_HasPrivilege operation/method
 */
if ($permissions->Permissions_HasPrivilege($privilegeToken) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_SaveGroup operation/method
 */
if ($permissions->Permissions_SaveGroup($group_description, $group_name, $group_type, $groupid, $perm_info, new \Api\StructType\ApiReport_categories(), $report_id_list, $rsid_list, $user_list) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_SaveLogin operation/method
 */
if ($permissions->Permissions_SaveLogin($admin, $change_password, $email, $first_name, $last_name, $login, $password, $phone_number, $selected_group_list, $send_welcome_email, $temp_end_date, $temp_login, $temp_start_date, $title) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Sample call for Permissions_SaveReportSuiteGroups operation/method
 */
if ($permissions->Permissions_SaveReportSuiteGroups($rsid, $selected_groups) !== false) {
    print_r($permissions->getResult());
} else {
    print_r($permissions->getLastError());
}
/**
 * Samples for Report ServiceType
 */
$report = new \Api\ServiceType\ApiReport($options);
/**
 * Sample call for Report_CancelReport operation/method
 */
if ($report->Report_CancelReport($reportID) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_GetElementNames operation/method
 */
if ($report->Report_GetElementNames(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_GetOvertimeReport operation/method
 */
if ($report->Report_GetOvertimeReport(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_GetRankedReport operation/method
 */
if ($report->Report_GetRankedReport(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_GetReport operation/method
 */
if ($report->Report_GetReport($reportID) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_GetReportQueue operation/method
 */
if ($report->Report_GetReportQueue() !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_GetStatus operation/method
 */
if ($report->Report_GetStatus($reportID) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_GetTrendedReport operation/method
 */
if ($report->Report_GetTrendedReport(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_QueueOvertime operation/method
 */
if ($report->Report_QueueOvertime(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_QueueRanked operation/method
 */
if ($report->Report_QueueRanked(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_QueueSCMRanked operation/method
 */
if ($report->Report_QueueSCMRanked(new \Api\StructType\ApiSCM_reportDescription()) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for Report_QueueTrended operation/method
 */
if ($report->Report_QueueTrended(new \Api\StructType\ApiReportDescription()) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_AddCorrelations operation/method
 */
if ($report->ReportSuite_AddCorrelations($rel_ids, $rsid_list, $size) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_AddInternalURLFilters operation/method
 */
if ($report->ReportSuite_AddInternalURLFilters($filters, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_AddKeyVisitors operation/method
 */
if ($report->ReportSuite_AddKeyVisitors($key_visitors, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_AddSavedFilters operation/method
 */
if ($report->ReportSuite_AddSavedFilters($savedFilters) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_Create operation/method
 */
if ($report->ReportSuite_Create($base_currency, $base_url, $default_page, $duplicate_rsid, $go_live_date, $hits_per_day, $latin1, $rsid, $site_title, $time_zone) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteBaseURL operation/method
 */
if ($report->ReportSuite_DeleteBaseURL($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteCalculatedMetrics operation/method
 */
if ($report->ReportSuite_DeleteCalculatedMetrics($calculated_metrics, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteClassifications operation/method
 */
if ($report->ReportSuite_DeleteClassifications($c_view, $div_num, $parent_div_num, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteCorrelations operation/method
 */
if ($report->ReportSuite_DeleteCorrelations($rel_ids, $rsid_list, $size) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteDefaultPage operation/method
 */
if ($report->ReportSuite_DeleteDefaultPage($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteIPAddressExclusions operation/method
 */
if ($report->ReportSuite_DeleteIPAddressExclusions($ip_list, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteInternalURLFilters operation/method
 */
if ($report->ReportSuite_DeleteInternalURLFilters($filters, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteKeyVisitors operation/method
 */
if ($report->ReportSuite_DeleteKeyVisitors($key_visitors, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteMarketingChannelCost operation/method
 */
if ($report->ReportSuite_DeleteMarketingChannelCost($channel_type, $cost_group, $id, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteMarketingChannels operation/method
 */
if ($report->ReportSuite_DeleteMarketingChannels($channel_ids, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeletePages operation/method
 */
if ($report->ReportSuite_DeletePages($page_id_list, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeletePaidSearch operation/method
 */
if ($report->ReportSuite_DeletePaidSearch($filter, $rsid_list, $rule, $search_engine) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_DeleteSavedFilter operation/method
 */
if ($report->ReportSuite_DeleteSavedFilter($savedFilterIds) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetActivation operation/method
 */
if ($report->ReportSuite_GetActivation($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetAvailableElements operation/method
 */
if ($report->ReportSuite_GetAvailableElements($return_datawarehouse_elements, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetAvailableMetrics operation/method
 */
if ($report->ReportSuite_GetAvailableMetrics($return_datawarehouse_metrics, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetAxleStartDate operation/method
 */
if ($report->ReportSuite_GetAxleStartDate($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetBaseCurrency operation/method
 */
if ($report->ReportSuite_GetBaseCurrency($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetBaseURL operation/method
 */
if ($report->ReportSuite_GetBaseURL($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetCalculatedMetrics operation/method
 */
if ($report->ReportSuite_GetCalculatedMetrics($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetClassificationHierarchies operation/method
 */
if ($report->ReportSuite_GetClassificationHierarchies($c_view, $rel_id, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetClassifications operation/method
 */
if ($report->ReportSuite_GetClassifications($c_view, $rel_id, $rsid_list, $type) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetCorrelations operation/method
 */
if ($report->ReportSuite_GetCorrelations($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetCustomCalendar operation/method
 */
if ($report->ReportSuite_GetCustomCalendar($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetDefaultPage operation/method
 */
if ($report->ReportSuite_GetDefaultPage($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetEVars operation/method
 */
if ($report->ReportSuite_GetEVars($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetEcommerce operation/method
 */
if ($report->ReportSuite_GetEcommerce($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetFindingMethods operation/method
 */
if ($report->ReportSuite_GetFindingMethods($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetIPAddressExclusions operation/method
 */
if ($report->ReportSuite_GetIPAddressExclusions($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetIPObfuscation operation/method
 */
if ($report->ReportSuite_GetIPObfuscation($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetInternalURLFilters operation/method
 */
if ($report->ReportSuite_GetInternalURLFilters($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetKeyVisitors operation/method
 */
if ($report->ReportSuite_GetKeyVisitors($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetLocalization operation/method
 */
if ($report->ReportSuite_GetLocalization($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetMarketingChannelCost operation/method
 */
if ($report->ReportSuite_GetMarketingChannelCost($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetMarketingChannelExpiration operation/method
 */
if ($report->ReportSuite_GetMarketingChannelExpiration($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetMarketingChannelRules operation/method
 */
if ($report->ReportSuite_GetMarketingChannelRules($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetMarketingChannels operation/method
 */
if ($report->ReportSuite_GetMarketingChannels($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetMarketingChannelsCustomSubRelations
 * operation/method
 */
if ($report->ReportSuite_GetMarketingChannelsCustomSubRelations($rel_id, $rsid) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetMobileAppReporting operation/method
 */
if ($report->ReportSuite_GetMobileAppReporting($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetPages operation/method
 */
if ($report->ReportSuite_GetPages($limit, $page_search, $rsid_list, $sc_period, $start_point) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetPaidSearch operation/method
 */
if ($report->ReportSuite_GetPaidSearch($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetPermanentTraffic operation/method
 */
if ($report->ReportSuite_GetPermanentTraffic($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetProcessingStatus operation/method
 */
if ($report->ReportSuite_GetProcessingStatus($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetRollupDates operation/method
 */
if ($report->ReportSuite_GetRollupDates($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetRollups operation/method
 */
if ($report->ReportSuite_GetRollups() !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetSavedFilters operation/method
 */
if ($report->ReportSuite_GetSavedFilters() !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetScheduledSpike operation/method
 */
if ($report->ReportSuite_GetScheduledSpike($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetSegments operation/method
 */
if ($report->ReportSuite_GetSegments($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetSettings operation/method
 */
if ($report->ReportSuite_GetSettings($locale, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetSiteTitle operation/method
 */
if ($report->ReportSuite_GetSiteTitle($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetSuccessEvents operation/method
 */
if ($report->ReportSuite_GetSuccessEvents($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetTemplate operation/method
 */
if ($report->ReportSuite_GetTemplate($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetTimeZone operation/method
 */
if ($report->ReportSuite_GetTimeZone($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetTrafficVars operation/method
 */
if ($report->ReportSuite_GetTrafficVars($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetUIVisibility operation/method
 */
if ($report->ReportSuite_GetUIVisibility($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetUniqueVisitorVariable operation/method
 */
if ($report->ReportSuite_GetUniqueVisitorVariable($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetVideoReporting operation/method
 */
if ($report->ReportSuite_GetVideoReporting($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_GetVideoTracking operation/method
 */
if ($report->ReportSuite_GetVideoTracking($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveBaseCurrency operation/method
 */
if ($report->ReportSuite_SaveBaseCurrency($base_currency, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveBaseURL operation/method
 */
if ($report->ReportSuite_SaveBaseURL($base_url, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveCalculatedMetrics operation/method
 */
if ($report->ReportSuite_SaveCalculatedMetrics($calculated_metrics, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveClassificationHierarchies operation/method
 */
if ($report->ReportSuite_SaveClassificationHierarchies($c_options, $c_view, $camp_view, $div_num, $name, $parent_div_num, $rsid_list, $type, $update) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveClassifications operation/method
 */
if ($report->ReportSuite_SaveClassifications($c_options, $c_view, $camp_view, $div_num, $name, $parent_div_num, $rsid_list, $type, $update) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveCustomCalendar operation/method
 */
if ($report->ReportSuite_SaveCustomCalendar($anchor_date, $cal_type, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveDefaultPage operation/method
 */
if ($report->ReportSuite_SaveDefaultPage($default_page, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveEVars operation/method
 */
if ($report->ReportSuite_SaveEVars($evars, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveEcommerce operation/method
 */
if ($report->ReportSuite_SaveEcommerce($ecommerce, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveFindingMethods operation/method
 */
if ($report->ReportSuite_SaveFindingMethods($reports, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveIPAddressExclusions operation/method
 */
if ($report->ReportSuite_SaveIPAddressExclusions($ip_list, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveIPObfuscation operation/method
 */
if ($report->ReportSuite_SaveIPObfuscation($ip_obfuscation, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveMarketingChannelCost operation/method
 */
if ($report->ReportSuite_SaveMarketingChannelCost(new \Api\StructType\ApiCost_item(), $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveMarketingChannelExpiration operation/method
 */
if ($report->ReportSuite_SaveMarketingChannelExpiration($days, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveMarketingChannelRules operation/method
 */
if ($report->ReportSuite_SaveMarketingChannelRules($mchannel_rules, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveMarketingChannels operation/method
 */
if ($report->ReportSuite_SaveMarketingChannels($channels, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveMobileAppReporting operation/method
 */
if ($report->ReportSuite_SaveMobileAppReporting($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SavePaidSearch operation/method
 */
if ($report->ReportSuite_SavePaidSearch($filter, $rsid_list, $rule, $search_engine) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SavePermanentTraffic operation/method
 */
if ($report->ReportSuite_SavePermanentTraffic($new_hits_per_day, $rsid_list, $start_date) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveRollup operation/method
 */
if ($report->ReportSuite_SaveRollup($go_live_date, $rollup_rsids, $rsid, $time_zone) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveSavedFilters operation/method
 */
if ($report->ReportSuite_SaveSavedFilters($savedFilters) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveScheduledSpike operation/method
 */
if ($report->ReportSuite_SaveScheduledSpike($end_date, $rsid_list, $spike_hits_per_day, $start_date) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveSiteTitle operation/method
 */
if ($report->ReportSuite_SaveSiteTitle($rsid_list, $site_title) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveSuccessEvents operation/method
 */
if ($report->ReportSuite_SaveSuccessEvents($events, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveSurveySettings operation/method
 */
if ($report->ReportSuite_SaveSurveySettings($rsid_list, $survey_display_event_num, $survey_evar_num, $survey_submit_event_num) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveTimeZone operation/method
 */
if ($report->ReportSuite_SaveTimeZone($rsid_list, $time_zone) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveTrafficVars operation/method
 */
if ($report->ReportSuite_SaveTrafficVars($property, $rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveUIVisibility operation/method
 */
if ($report->ReportSuite_SaveUIVisibility($rsid_list, $state, $ui_element) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveUniqueVisitorVariable operation/method
 */
if ($report->ReportSuite_SaveUniqueVisitorVariable($rsid_list, $unique_visitor_variable) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Sample call for ReportSuite_SaveVideoReporting operation/method
 */
if ($report->ReportSuite_SaveVideoReporting($rsid_list) !== false) {
    print_r($report->getResult());
} else {
    print_r($report->getLastError());
}
/**
 * Samples for Saint ServiceType
 */
$saint = new \Api\ServiceType\ApiSaint($options);
/**
 * Sample call for Saint_CheckJobStatus operation/method
 */
if ($saint->Saint_CheckJobStatus($job_id) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_CreateFTP operation/method
 */
if ($saint->Saint_CreateFTP($description, $email, $export, $overwrite, $relation_id, $rsid_list) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_ExportCreateJob operation/method
 */
if ($saint->Saint_ExportCreateJob($campaign_filter_begin_range, $campaign_filter_end_range, $campaign_filter_option, $date_filter_row_end_date, $date_filter_row_start_date, $email_address, $encoding, $relation_id, $report_suite_array, $row_match_filter_empty_column_name, $row_match_filter_match_column_name, $row_match_filter_match_column_value, $select_all_rows, $select_number_of_rows) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_ExportGetFileSegment operation/method
 */
if ($saint->Saint_ExportGetFileSegment($file_id, $segment_id) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_GetCompatabiltyMetrics operation/method
 */
if ($saint->Saint_GetCompatabiltyMetrics($report_suite_array) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_GetFilters operation/method
 */
if ($saint->Saint_GetFilters($relation_id, $report_suite_array) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_GetTemplate operation/method
 */
if ($saint->Saint_GetTemplate($encoding, $numeric_div_nums, $relation_id, $report_suite, $text_div_nums) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_ImportCommitJob operation/method
 */
if ($saint->Saint_ImportCommitJob($job_id) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_ImportCreateJob operation/method
 */
if ($saint->Saint_ImportCreateJob($check_divisions, $description, $email_address, $export_results, $header, $overwrite_conflicts, $relation_id, $report_suite_array) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_ImportPopulateJob operation/method
 */
if ($saint->Saint_ImportPopulateJob($job_id, $page, $rows) !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Sample call for Saint_ListFTP operation/method
 */
if ($saint->Saint_ListFTP() !== false) {
    print_r($saint->getResult());
} else {
    print_r($saint->getLastError());
}
/**
 * Samples for Scheduling ServiceType
 */
$scheduling = new \Api\ServiceType\ApiScheduling($options);
/**
 * Sample call for Scheduling_CreatePublishedReport operation/method
 */
if ($scheduling->Scheduling_CreatePublishedReport($location, $product, new \Api\StructType\ApiScheduledReport(), $workbook) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Sample call for Scheduling_DeletePublishedReport operation/method
 */
if ($scheduling->Scheduling_DeletePublishedReport($product, $scheduledReportIds) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Sample call for Scheduling_DeleteWorkbook operation/method
 */
if ($scheduling->Scheduling_DeleteWorkbook($location, $product, $username, $workbookNames) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Sample call for Scheduling_DownloadWorkbook operation/method
 */
if ($scheduling->Scheduling_DownloadWorkbook($location, $productType, $username, $workbookName) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Sample call for Scheduling_GetPublishedReports operation/method
 */
if ($scheduling->Scheduling_GetPublishedReports($product, $username) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Sample call for Scheduling_GetReportsRunHistory operation/method
 */
if ($scheduling->Scheduling_GetReportsRunHistory($limit, $offset, $product, $username) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Sample call for Scheduling_GetWorkbookList operation/method
 */
if ($scheduling->Scheduling_GetWorkbookList($location, $product) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Sample call for Scheduling_ReRunReport operation/method
 */
if ($scheduling->Scheduling_ReRunReport($id) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Sample call for Scheduling_UpdatePublishedReport operation/method
 */
if ($scheduling->Scheduling_UpdatePublishedReport($product, new \Api\StructType\ApiScheduledReport(), $workbook) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Sample call for Scheduling_UploadWorkbook operation/method
 */
if ($scheduling->Scheduling_UploadWorkbook($description, $filename, $location, $product, $workbook) !== false) {
    print_r($scheduling->getResult());
} else {
    print_r($scheduling->getLastError());
}
/**
 * Samples for Survey ServiceType
 */
$survey = new \Api\ServiceType\ApiSurvey($options);
/**
 * Sample call for Survey_GetSummaryList operation/method
 */
if ($survey->Survey_GetSummaryList($rsid, $status_filter) !== false) {
    print_r($survey->getResult());
} else {
    print_r($survey->getLastError());
}
/**
 * Samples for User ServiceType
 */
$user = new \Api\ServiceType\ApiUser($options);
/**
 * Sample call for User_GetBookmarkFolders operation/method
 */
if ($user->User_GetBookmarkFolders($limit) !== false) {
    print_r($user->getResult());
} else {
    print_r($user->getLastError());
}
/**
 * Sample call for User_GetDashboardsAPI operation/method
 */
if ($user->User_GetDashboardsAPI($limit) !== false) {
    print_r($user->getResult());
} else {
    print_r($user->getLastError());
}
/**
 * Sample call for User_GetLastUsedReportSuite operation/method
 */
if ($user->User_GetLastUsedReportSuite() !== false) {
    print_r($user->getResult());
} else {
    print_r($user->getLastError());
}
/**
 * Sample call for User_LoginEmailExists operation/method
 */
if ($user->User_LoginEmailExists($emailAddress) !== false) {
    print_r($user->getResult());
} else {
    print_r($user->getLastError());
}
