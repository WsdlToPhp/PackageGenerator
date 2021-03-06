<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for all operations
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiService extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named CodeManager.DeleteCodeArchive
     * Meta information extracted from the WSDL
     * - documentation: Delete page code.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $archive_id
     * @return int|bool
     */
    public function CodeManager_DeleteCodeArchive($archive_id)
    {
        try {
            $this->setResult($resultCodeManager_DeleteCodeArchive = $this->getSoapClient()->__soapCall('CodeManager.DeleteCodeArchive', [
                $archive_id,
            ], [], [], $this->outputHeaders));
        
            return $resultCodeManager_DeleteCodeArchive;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CodeManager.GenerateCode
     * Meta information extracted from the WSDL
     * - documentation: Generates page code.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $char_set
     * @param string $code_type
     * @param string $cookie_domain_periods
     * @param string $currency_code
     * @param string $rsid
     * @param string $secure
     * @return \StructType\ApiCode_item[]|bool
     */
    public function CodeManager_GenerateCode($char_set, $code_type, $cookie_domain_periods, $currency_code, $rsid, $secure)
    {
        try {
            $this->setResult($resultCodeManager_GenerateCode = $this->getSoapClient()->__soapCall('CodeManager.GenerateCode', [
                $char_set,
                $code_type,
                $cookie_domain_periods,
                $currency_code,
                $rsid,
                $secure,
            ], [], [], $this->outputHeaders));
        
            return $resultCodeManager_GenerateCode;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CodeManager.GetCodeArchives
     * Meta information extracted from the WSDL
     * - documentation: Returns a list of existing code archives.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param int[] $archive_id_list
     * @param string $binary_encoding
     * @param string $populate_code_items
     * @return \StructType\ApiCode_archive[]|bool
     */
    public function CodeManager_GetCodeArchives(array $archive_id_list, $binary_encoding, $populate_code_items)
    {
        try {
            $this->setResult($resultCodeManager_GetCodeArchives = $this->getSoapClient()->__soapCall('CodeManager.GetCodeArchives', [
                $archive_id_list,
                $binary_encoding,
                $populate_code_items,
            ], [], [], $this->outputHeaders));
        
            return $resultCodeManager_GetCodeArchives;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named CodeManager.SaveCodeArchive
     * Meta information extracted from the WSDL
     * - documentation: Saves a page code archive.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $archive_description
     * @param string $archive_id
     * @param string $archive_name
     * @param \StructType\ApiCode_item[] $code
     * @return int|bool
     */
    public function CodeManager_SaveCodeArchive($archive_description, $archive_id, $archive_name, array $code)
    {
        try {
            $this->setResult($resultCodeManager_SaveCodeArchive = $this->getSoapClient()->__soapCall('CodeManager.SaveCodeArchive', [
                $archive_description,
                $archive_id,
                $archive_name,
                $code,
            ], [], [], $this->outputHeaders));
        
            return $resultCodeManager_SaveCodeArchive;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.CancelQueueItem
     * Meta information extracted from the WSDL
     * - documentation: Cancel a pending (queued) action that has yet to be approved.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $qid
     * @return int|bool
     */
    public function Company_CancelQueueItem($qid)
    {
        try {
            $this->setResult($resultCompany_CancelQueueItem = $this->getSoapClient()->__soapCall('Company.CancelQueueItem', [
                $qid,
            ], [], [], $this->outputHeaders));
        
            return $resultCompany_CancelQueueItem;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.DownloadProduct
     * Meta information extracted from the WSDL
     * - documentation: Downloads a product. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $productType
     * @return base64Binary|bool
     */
    public function Company_DownloadProduct($productType)
    {
        try {
            $this->setResult($resultCompany_DownloadProduct = $this->getSoapClient()->__soapCall('Company.DownloadProduct', [
                $productType,
            ], [], [], $this->outputHeaders));
        
            return $resultCompany_DownloadProduct;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetEndpoint
     * Meta information extracted from the WSDL
     * - documentation: Returns the correct SOAP endpoint to be used for API calls
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $company
     * @return string|bool
     */
    public function Company_GetEndpoint($company)
    {
        try {
            $this->setResult($resultCompany_GetEndpoint = $this->getSoapClient()->__soapCall('Company.GetEndpoint', [
                $company,
            ], [], [], $this->outputHeaders));
        
            return $resultCompany_GetEndpoint;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetQueue
     * Meta information extracted from the WSDL
     * - documentation: Returns queued items that are pending approval for the requesting company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \StructType\ApiQueue_item[]|bool
     */
    public function Company_GetQueue()
    {
        try {
            $this->setResult($resultCompany_GetQueue = $this->getSoapClient()->__soapCall('Company.GetQueue', [], [], [], $this->outputHeaders));
        
            return $resultCompany_GetQueue;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetReportSuites
     * Meta information extracted from the WSDL
     * - documentation: Retrieves all report suites associated with your company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rs_types
     * @param string $sp
     * @return \StructType\ApiSimple_report_suites_rval|bool
     */
    public function Company_GetReportSuites(array $rs_types, $sp)
    {
        try {
            $this->setResult($resultCompany_GetReportSuites = $this->getSoapClient()->__soapCall('Company.GetReportSuites', [
                $rs_types,
                $sp,
            ], [], [], $this->outputHeaders));
        
            return $resultCompany_GetReportSuites;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetTokenCount
     * Meta information extracted from the WSDL
     * - documentation: Returns remaining tokens for a given auth key (note that this call also consumes a token).
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return int|bool
     */
    public function Company_GetTokenCount()
    {
        try {
            $this->setResult($resultCompany_GetTokenCount = $this->getSoapClient()->__soapCall('Company.GetTokenCount', [], [], [], $this->outputHeaders));
        
            return $resultCompany_GetTokenCount;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetTokenUsage
     * Meta information extracted from the WSDL
     * - documentation: Returns token usage information (note that this call also consumes a token).
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \StructType\ApiToken_usage_container|bool
     */
    public function Company_GetTokenUsage()
    {
        try {
            $this->setResult($resultCompany_GetTokenUsage = $this->getSoapClient()->__soapCall('Company.GetTokenUsage', [], [], [], $this->outputHeaders));
        
            return $resultCompany_GetTokenUsage;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetTrackingServer
     * Meta information extracted from the WSDL
     * - documentation: Returns the tracking server and namespace for the given report suite
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @return \StructType\ApiTracking_server_data|bool
     */
    public function Company_GetTrackingServer($rsid)
    {
        try {
            $this->setResult($resultCompany_GetTrackingServer = $this->getSoapClient()->__soapCall('Company.GetTrackingServer', [
                $rsid,
            ], [], [], $this->outputHeaders));
        
            return $resultCompany_GetTrackingServer;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetVersionAccess
     * Meta information extracted from the WSDL
     * - documentation: Retrieves version access for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return string[]|bool
     */
    public function Company_GetVersionAccess()
    {
        try {
            $this->setResult($resultCompany_GetVersionAccess = $this->getSoapClient()->__soapCall('Company.GetVersionAccess', [], [], [], $this->outputHeaders));
        
            return $resultCompany_GetVersionAccess;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.ResetTokenCount
     * Meta information extracted from the WSDL
     * - documentation: Resets the token count for the given auth key.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $auth_key
     * @return int|bool
     */
    public function Company_ResetTokenCount($auth_key)
    {
        try {
            $this->setResult($resultCompany_ResetTokenCount = $this->getSoapClient()->__soapCall('Company.ResetTokenCount', [
                $auth_key,
            ], [], [], $this->outputHeaders));
        
            return $resultCompany_ResetTokenCount;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Dashboards.GetDashboardAPI
     * Meta information extracted from the WSDL
     * - documentation: Retrieves a list of reportlets owned by the given dashboard.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dashboard_id
     * @param string $dashboard_type
     * @return \StructType\ApiDashboard_element|bool
     */
    public function Dashboards_GetDashboardAPI($dashboard_id, $dashboard_type)
    {
        try {
            $this->setResult($resultDashboards_GetDashboardAPI = $this->getSoapClient()->__soapCall('Dashboards.GetDashboardAPI', [
                $dashboard_id,
                $dashboard_type,
            ], [], [], $this->outputHeaders));
        
            return $resultDashboards_GetDashboardAPI;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Dashboards.GetReportletDataAPI
     * Meta information extracted from the WSDL
     * - documentation: Retrieves data for a given reportlet.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportlet_id
     * @return \StructType\ApiReportlet|bool
     */
    public function Dashboards_GetReportletDataAPI($reportlet_id)
    {
        try {
            $this->setResult($resultDashboards_GetReportletDataAPI = $this->getSoapClient()->__soapCall('Dashboards.GetReportletDataAPI', [
                $reportlet_id,
            ], [], [], $this->outputHeaders));
        
            return $resultDashboards_GetReportletDataAPI;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.AppendDataBlock
     * Meta information extracted from the WSDL
     * - documentation: Add rows of data to and optionally end a block of data begun by a BeginDataBlock call
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $blockID
     * @param string $dataSourceID
     * @param string $endOfBlock
     * @param string $reportSuiteID
     * @param \ArrayType\ApiColArray[] $rows
     * @return array|bool
     */
    public function DataSource_AppendDataBlock($blockID, $dataSourceID, $endOfBlock, $reportSuiteID, array $rows)
    {
        try {
            $this->setResult($resultDataSource_AppendDataBlock = $this->getSoapClient()->__soapCall('DataSource.AppendDataBlock', [
                $blockID,
                $dataSourceID,
                $endOfBlock,
                $reportSuiteID,
                $rows,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_AppendDataBlock;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.BeginDataBlock
     * Meta information extracted from the WSDL
     * - documentation: Begin and optionally end a block of data to be inserted into the Data Sources processing queue
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $blockName
     * @param string[] $columnNames
     * @param string $dataSourceID
     * @param string $endOfBlock
     * @param string $reportSuiteID
     * @param \ArrayType\ApiColArray[] $rows
     * @return array|bool
     */
    public function DataSource_BeginDataBlock($blockName, array $columnNames, $dataSourceID, $endOfBlock, $reportSuiteID, array $rows)
    {
        try {
            $this->setResult($resultDataSource_BeginDataBlock = $this->getSoapClient()->__soapCall('DataSource.BeginDataBlock', [
                $blockName,
                $columnNames,
                $dataSourceID,
                $endOfBlock,
                $reportSuiteID,
                $rows,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_BeginDataBlock;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.Deactivate
     * Meta information extracted from the WSDL
     * - documentation: Deactivates a Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $reportSuiteID
     * @return \StructType\ApiStatus|bool
     */
    public function DataSource_Deactivate($dataSourceID, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_Deactivate = $this->getSoapClient()->__soapCall('DataSource.Deactivate', [
                $dataSourceID,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_Deactivate;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetFileIDs
     * Meta information extracted from the WSDL
     * - documentation: Returns array of file ids for a given data source id.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $filter
     * @param string $reportSuiteID
     * @return \StructType\ApiFileIDResult|bool
     */
    public function DataSource_GetFileIDs($dataSourceID, $filter, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_GetFileIDs = $this->getSoapClient()->__soapCall('DataSource.GetFileIDs', [
                $dataSourceID,
                $filter,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_GetFileIDs;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetFileInfo
     * Meta information extracted from the WSDL
     * - documentation: Returns dataSource file status information.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $filter
     * @param string $reportSuiteID
     * @return \StructType\ApiDsFileStruct[]|bool
     */
    public function DataSource_GetFileInfo($dataSourceID, $filter, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_GetFileInfo = $this->getSoapClient()->__soapCall('DataSource.GetFileInfo', [
                $dataSourceID,
                $filter,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_GetFileInfo;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetFileStatus
     * Meta information extracted from the WSDL
     * - documentation: Returns dataSource file status information.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceFileID
     * @param string $reportSuiteID
     * @return \StructType\ApiFileStatusResult|bool
     */
    public function DataSource_GetFileStatus($dataSourceFileID, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_GetFileStatus = $this->getSoapClient()->__soapCall('DataSource.GetFileStatus', [
                $dataSourceFileID,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_GetFileStatus;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetIDs
     * Meta information extracted from the WSDL
     * - documentation: Returns a list of data sources that belong to the specified report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportSuiteID
     * @return \StructType\ApiSimpleDataSource[]|bool
     */
    public function DataSource_GetIDs($reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_GetIDs = $this->getSoapClient()->__soapCall('DataSource.GetIDs', [
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_GetIDs;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetInfo
     * Meta information extracted from the WSDL
     * - documentation: Returns dataSource file status information.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $filter
     * @param string $reportSuiteID
     * @return \StructType\ApiDataSourceInfo[]|bool
     */
    public function DataSource_GetInfo($filter, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_GetInfo = $this->getSoapClient()->__soapCall('DataSource.GetInfo', [
                $filter,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_GetInfo;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.ProcessIncompleteVisits
     * Meta information extracted from the WSDL
     * - documentation: Processes incomplete visits for a DataSource
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $reportSuiteID
     * @return \StructType\ApiStatus|bool
     */
    public function DataSource_ProcessIncompleteVisits($dataSourceID, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_ProcessIncompleteVisits = $this->getSoapClient()->__soapCall('DataSource.ProcessIncompleteVisits', [
                $dataSourceID,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_ProcessIncompleteVisits;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.Restart
     * Meta information extracted from the WSDL
     * - documentation: Sets DataSource file state to processing.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $reportSuiteID
     * @return \StructType\ApiStatus|bool
     */
    public function DataSource_Restart($dataSourceID, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_Restart = $this->getSoapClient()->__soapCall('DataSource.Restart', [
                $dataSourceID,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_Restart;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.SetupFull
     * Meta information extracted from the WSDL
     * - documentation: Creates or modifies a Full Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param \StructType\ApiDs_full_settings $dataSourceSettings
     * @param string $reportSuiteID
     * @return \StructType\ApiDs_setup_result|bool
     */
    public function DataSource_SetupFull($dataSourceID, \StructType\ApiDs_full_settings $dataSourceSettings, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_SetupFull = $this->getSoapClient()->__soapCall('DataSource.SetupFull', [
                $dataSourceID,
                $dataSourceSettings,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_SetupFull;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.SetupGeneric
     * Meta information extracted from the WSDL
     * - documentation: Creates or modifies a Generic Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param \StructType\ApiDs_generic_settings $dataSourceSettings
     * @param string $dataSourceType
     * @param string $reportSuiteID
     * @return \StructType\ApiDs_setup_result|bool
     */
    public function DataSource_SetupGeneric($dataSourceID, \StructType\ApiDs_generic_settings $dataSourceSettings, $dataSourceType, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_SetupGeneric = $this->getSoapClient()->__soapCall('DataSource.SetupGeneric', [
                $dataSourceID,
                $dataSourceSettings,
                $dataSourceType,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_SetupGeneric;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.SetupTraffic
     * Meta information extracted from the WSDL
     * - documentation: Creates or modifies a Traffic Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param \StructType\ApiDs_traffic_settings $dataSourceSettings
     * @param string $reportSuiteID
     * @return \StructType\ApiDs_setup_result|bool
     */
    public function DataSource_SetupTraffic($dataSourceID, \StructType\ApiDs_traffic_settings $dataSourceSettings, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_SetupTraffic = $this->getSoapClient()->__soapCall('DataSource.SetupTraffic', [
                $dataSourceID,
                $dataSourceSettings,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_SetupTraffic;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.SetupWebLog
     * Meta information extracted from the WSDL
     * - documentation: Creates or modifies a Webserver Log Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param \StructType\ApiDs_weblog_settings $dataSourceSettings
     * @param string $reportSuiteID
     * @return \StructType\ApiDs_setup_result|bool
     */
    public function DataSource_SetupWebLog($dataSourceID, \StructType\ApiDs_weblog_settings $dataSourceSettings, $reportSuiteID)
    {
        try {
            $this->setResult($resultDataSource_SetupWebLog = $this->getSoapClient()->__soapCall('DataSource.SetupWebLog', [
                $dataSourceID,
                $dataSourceSettings,
                $reportSuiteID,
            ], [], [], $this->outputHeaders));
        
            return $resultDataSource_SetupWebLog;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.CancelRequest
     * Meta information extracted from the WSDL
     * - documentation: Cancels a Data Warehouse Request.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $request_Id
     * @return string|bool
     */
    public function DataWarehouse_CancelRequest($request_Id)
    {
        try {
            $this->setResult($resultDataWarehouse_CancelRequest = $this->getSoapClient()->__soapCall('DataWarehouse.CancelRequest', [
                $request_Id,
            ], [], [], $this->outputHeaders));
        
            return $resultDataWarehouse_CancelRequest;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.CheckRequest
     * Meta information extracted from the WSDL
     * - documentation: Checks the status of a Data Warehouse Request.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $request_Id
     * @return \StructType\ApiData_warehouse_request|bool
     */
    public function DataWarehouse_CheckRequest($request_Id)
    {
        try {
            $this->setResult($resultDataWarehouse_CheckRequest = $this->getSoapClient()->__soapCall('DataWarehouse.CheckRequest', [
                $request_Id,
            ], [], [], $this->outputHeaders));
        
            return $resultDataWarehouse_CheckRequest;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.CreateSegment
     * Meta information extracted from the WSDL
     * - documentation: Create a new data warehouse segment
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $hidden
     * @param string $rsid
     * @param \StructType\ApiData_warehouse_segment $segment
     * @return int|bool
     */
    public function DataWarehouse_CreateSegment($hidden, $rsid, \StructType\ApiData_warehouse_segment $segment)
    {
        try {
            $this->setResult($resultDataWarehouse_CreateSegment = $this->getSoapClient()->__soapCall('DataWarehouse.CreateSegment', [
                $hidden,
                $rsid,
                $segment,
            ], [], [], $this->outputHeaders));
        
            return $resultDataWarehouse_CreateSegment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.GetReportData
     * Meta information extracted from the WSDL
     * - documentation: Obtain content for the given request
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $request_Id
     * @param string $rsid
     * @param string $start_row
     * @return \StructType\ApiData_warehouse_report|bool
     */
    public function DataWarehouse_GetReportData($request_Id, $rsid, $start_row)
    {
        try {
            $this->setResult($resultDataWarehouse_GetReportData = $this->getSoapClient()->__soapCall('DataWarehouse.GetReportData', [
                $request_Id,
                $rsid,
                $start_row,
            ], [], [], $this->outputHeaders));
        
            return $resultDataWarehouse_GetReportData;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.GetSegment
     * Meta information extracted from the WSDL
     * - documentation: Obtain a description of an existing data warehouse segment
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @param string $segment
     * @return \StructType\ApiData_warehouse_segment|bool
     */
    public function DataWarehouse_GetSegment($rsid, $segment)
    {
        try {
            $this->setResult($resultDataWarehouse_GetSegment = $this->getSoapClient()->__soapCall('DataWarehouse.GetSegment', [
                $rsid,
                $segment,
            ], [], [], $this->outputHeaders));
        
            return $resultDataWarehouse_GetSegment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.GetSegments
     * Meta information extracted from the WSDL
     * - documentation: Gets available segments.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @return \StructType\ApiDwsegment[]|bool
     */
    public function DataWarehouse_GetSegments($rsid)
    {
        try {
            $this->setResult($resultDataWarehouse_GetSegments = $this->getSoapClient()->__soapCall('DataWarehouse.GetSegments', [
                $rsid,
            ], [], [], $this->outputHeaders));
        
            return $resultDataWarehouse_GetSegments;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.ReplaceSegment
     * Meta information extracted from the WSDL
     * - documentation: Replace a data warehouse segment of the given id with the given segment.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $id
     * @param string $rsid
     * @param \StructType\ApiData_warehouse_segment $segment
     * @return int|bool
     */
    public function DataWarehouse_ReplaceSegment($id, $rsid, \StructType\ApiData_warehouse_segment $segment)
    {
        try {
            $this->setResult($resultDataWarehouse_ReplaceSegment = $this->getSoapClient()->__soapCall('DataWarehouse.ReplaceSegment', [
                $id,
                $rsid,
                $segment,
            ], [], [], $this->outputHeaders));
        
            return $resultDataWarehouse_ReplaceSegment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.Request
     * Meta information extracted from the WSDL
     * - documentation: Creates a Data Warehouse Request.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $breakdown_List
     * @param string $contact_Name
     * @param string $contact_Phone
     * @param string $date_From
     * @param string $date_Granularity
     * @param string $date_Preset
     * @param string $date_To
     * @param string $date_Type
     * @param string $email_Subject
     * @param string $email_To
     * @param string $fTP_Dir
     * @param string $fTP_Host
     * @param string $fTP_Password
     * @param string $fTP_Port
     * @param string $fTP_UserName
     * @param string $file_Name
     * @param string[] $metric_List
     * @param string $report_Description
     * @param string $report_Name
     * @param string $segment_Id
     * @param string $rsid
     * @return int|bool
     */
    public function DataWarehouse_Request(array $breakdown_List, $contact_Name, $contact_Phone, $date_From, $date_Granularity, $date_Preset, $date_To, $date_Type, $email_Subject, $email_To, $fTP_Dir, $fTP_Host, $fTP_Password, $fTP_Port, $fTP_UserName, $file_Name, array $metric_List, $report_Description, $report_Name, $segment_Id, $rsid)
    {
        try {
            $this->setResult($resultDataWarehouse_Request = $this->getSoapClient()->__soapCall('DataWarehouse.Request', [
                $breakdown_List,
                $contact_Name,
                $contact_Phone,
                $date_From,
                $date_Granularity,
                $date_Preset,
                $date_To,
                $date_Type,
                $email_Subject,
                $email_To,
                $fTP_Dir,
                $fTP_Host,
                $fTP_Password,
                $fTP_Port,
                $fTP_UserName,
                $file_Name,
                $metric_List,
                $report_Description,
                $report_Name,
                $segment_Id,
                $rsid,
            ], [], [], $this->outputHeaders));
        
            return $resultDataWarehouse_Request;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.VerifySegment
     * Meta information extracted from the WSDL
     * - documentation: Verify the correctness of the given data warehouse segment
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiData_warehouse_segment $segment
     * @return boolean|bool
     */
    public function DataWarehouse_VerifySegment(\StructType\ApiData_warehouse_segment $segment)
    {
        try {
            $this->setResult($resultDataWarehouse_VerifySegment = $this->getSoapClient()->__soapCall('DataWarehouse.VerifySegment', [
                $segment,
            ], [], [], $this->outputHeaders));
        
            return $resultDataWarehouse_VerifySegment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DeliveryList.Delete
     * Meta information extracted from the WSDL
     * - documentation: Delete a distribution list.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dist_list_id
     * @return int|bool
     */
    public function DeliveryList_Delete($dist_list_id)
    {
        try {
            $this->setResult($resultDeliveryList_Delete = $this->getSoapClient()->__soapCall('DeliveryList.Delete', [
                $dist_list_id,
            ], [], [], $this->outputHeaders));
        
            return $resultDeliveryList_Delete;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DeliveryList.Get
     * Meta information extracted from the WSDL
     * - documentation: Gets Publishing list.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $search_name
     * @return \StructType\ApiPublishingList[]|bool
     */
    public function DeliveryList_Get($search_name)
    {
        try {
            $this->setResult($resultDeliveryList_Get = $this->getSoapClient()->__soapCall('DeliveryList.Get', [
                $search_name,
            ], [], [], $this->outputHeaders));
        
            return $resultDeliveryList_Get;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named DeliveryList.Save
     * Meta information extracted from the WSDL
     * - documentation: Save delivery list.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $delivery_list_name
     * @param string $dist_list_id
     * @return int|bool
     */
    public function DeliveryList_Save($delivery_list_name, $dist_list_id)
    {
        try {
            $this->setResult($resultDeliveryList_Save = $this->getSoapClient()->__soapCall('DeliveryList.Save', [
                $delivery_list_name,
                $dist_list_id,
            ], [], [], $this->outputHeaders));
        
            return $resultDeliveryList_Save;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Discover.GetSegments
     * Meta information extracted from the WSDL
     * - documentation: Retrieve a list of Discover segments for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $end_date
     * @param string $rsid
     * @param string $start_date
     * @return \StructType\ApiSegment_folder[]|bool
     */
    public function Discover_GetSegments($end_date, $rsid, $start_date)
    {
        try {
            $this->setResult($resultDiscover_GetSegments = $this->getSoapClient()->__soapCall('Discover.GetSegments', [
                $end_date,
                $rsid,
                $start_date,
            ], [], [], $this->outputHeaders));
        
            return $resultDiscover_GetSegments;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Discover.QueueDiscoverOvertime
     * Meta information extracted from the WSDL
     * - documentation: Queue a Discover overtime report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReportQueueResponse|bool
     */
    public function Discover_QueueDiscoverOvertime(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultDiscover_QueueDiscoverOvertime = $this->getSoapClient()->__soapCall('Discover.QueueDiscoverOvertime', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultDiscover_QueueDiscoverOvertime;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Discover.QueueDiscoverRanked
     * Meta information extracted from the WSDL
     * - documentation: Queue a Discover ranked report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReportQueueResponse|bool
     */
    public function Discover_QueueDiscoverRanked(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultDiscover_QueueDiscoverRanked = $this->getSoapClient()->__soapCall('Discover.QueueDiscoverRanked', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultDiscover_QueueDiscoverRanked;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Discover.QueueDiscoverTrended
     * Meta information extracted from the WSDL
     * - documentation: Queue a Discover trended report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReportQueueResponse|bool
     */
    public function Discover_QueueDiscoverTrended(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultDiscover_QueueDiscoverTrended = $this->getSoapClient()->__soapCall('Discover.QueueDiscoverTrended', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultDiscover_QueueDiscoverTrended;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Logs.GetAdminConsoleCompanyLog
     * Meta information extracted from the WSDL
     * - documentation: Get console logs.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $company
     * @param string $end_date
     * @param string $filter_rule
     * @param \StructType\ApiLog_filter[] $filters
     * @param string[] $rsid_list
     * @param string $start_date
     * @return \StructType\ApiLog_entry[]|bool
     */
    public function Logs_GetAdminConsoleCompanyLog($company, $end_date, $filter_rule, array $filters, array $rsid_list, $start_date)
    {
        try {
            $this->setResult($resultLogs_GetAdminConsoleCompanyLog = $this->getSoapClient()->__soapCall('Logs.GetAdminConsoleCompanyLog', [
                $company,
                $end_date,
                $filter_rule,
                $filters,
                $rsid_list,
                $start_date,
            ], [], [], $this->outputHeaders));
        
            return $resultLogs_GetAdminConsoleCompanyLog;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Logs.GetAdminConsoleLog
     * Meta information extracted from the WSDL
     * - documentation: Get console logs.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $company
     * @param string $end_date
     * @param string $filter_rule
     * @param \StructType\ApiLog_filter[] $filters
     * @param string[] $rsid_list
     * @param string $start_date
     * @return \StructType\ApiLog_entry[]|bool
     */
    public function Logs_GetAdminConsoleLog($company, $end_date, $filter_rule, array $filters, array $rsid_list, $start_date)
    {
        try {
            $this->setResult($resultLogs_GetAdminConsoleLog = $this->getSoapClient()->__soapCall('Logs.GetAdminConsoleLog', [
                $company,
                $end_date,
                $filter_rule,
                $filters,
                $rsid_list,
                $start_date,
            ], [], [], $this->outputHeaders));
        
            return $resultLogs_GetAdminConsoleLog;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Logs.GetUsageLog
     * Meta information extracted from the WSDL
     * - documentation: Retrieve usage log information for the given company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $date_from
     * @param string $date_to
     * @param string $event_details
     * @param string $event_type
     * @param string $ip
     * @param string $login
     * @param string $report_suite
     * @return \StructType\ApiUsage_log_entry[]|bool
     */
    public function Logs_GetUsageLog($date_from, $date_to, $event_details, $event_type, $ip, $login, $report_suite)
    {
        try {
            $this->setResult($resultLogs_GetUsageLog = $this->getSoapClient()->__soapCall('Logs.GetUsageLog', [
                $date_from,
                $date_to,
                $event_details,
                $event_type,
                $ip,
                $login,
                $report_suite,
            ], [], [], $this->outputHeaders));
        
            return $resultLogs_GetUsageLog;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.AddLogin
     * Meta information extracted from the WSDL
     * - documentation: Creates a new login for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $admin
     * @param string $change_password
     * @param string $create_dashboards
     * @param string $dashboard_rsid
     * @param string $email
     * @param string $first_name
     * @param string $last_name
     * @param string $login
     * @param string $password
     * @param string $phone_number
     * @param \StructType\ApiPermission_group[] $selected_group_list
     * @param string $temp_login
     * @param string $temp_login_end
     * @param string $temp_login_start
     * @param string $title
     * @return int|bool
     */
    public function Permissions_AddLogin($admin, $change_password, $create_dashboards, $dashboard_rsid, $email, $first_name, $last_name, $login, $password, $phone_number, array $selected_group_list, $temp_login, $temp_login_end, $temp_login_start, $title)
    {
        try {
            $this->setResult($resultPermissions_AddLogin = $this->getSoapClient()->__soapCall('Permissions.AddLogin', [
                $admin,
                $change_password,
                $create_dashboards,
                $dashboard_rsid,
                $email,
                $first_name,
                $last_name,
                $login,
                $password,
                $phone_number,
                $selected_group_list,
                $temp_login,
                $temp_login_end,
                $temp_login_start,
                $title,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_AddLogin;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.Authenticate
     * Meta information extracted from the WSDL
     * - documentation: Indicates whether or not the login is valid for this company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $login
     * @param string $password
     * @return boolean|bool
     */
    public function Permissions_Authenticate($login, $password)
    {
        try {
            $this->setResult($resultPermissions_Authenticate = $this->getSoapClient()->__soapCall('Permissions.Authenticate', [
                $login,
                $password,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_Authenticate;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.DeleteGroup
     * Meta information extracted from the WSDL
     * - documentation: Removes the requested group from the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $groupid
     * @return int|bool
     */
    public function Permissions_DeleteGroup($groupid)
    {
        try {
            $this->setResult($resultPermissions_DeleteGroup = $this->getSoapClient()->__soapCall('Permissions.DeleteGroup', [
                $groupid,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_DeleteGroup;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.DeleteLogin
     * Meta information extracted from the WSDL
     * - documentation: Removes a user login from the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $login
     * @return int|bool
     */
    public function Permissions_DeleteLogin($login)
    {
        try {
            $this->setResult($resultPermissions_DeleteLogin = $this->getSoapClient()->__soapCall('Permissions.DeleteLogin', [
                $login,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_DeleteLogin;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetCRMInfo
     * Meta information extracted from the WSDL
     * - documentation: Retrieves CRM login information for a specific user.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $company
     * @param string $login
     * @return \StructType\ApiCrm_info|bool
     */
    public function Permissions_GetCRMInfo($company, $login)
    {
        try {
            $this->setResult($resultPermissions_GetCRMInfo = $this->getSoapClient()->__soapCall('Permissions.GetCRMInfo', [
                $company,
                $login,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_GetCRMInfo;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetCategories
     * Meta information extracted from the WSDL
     * - documentation: Retrieves subgroups for a category.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $categoryid
     * @param string $groupid
     * @return \StructType\ApiParent_category[]|bool
     */
    public function Permissions_GetCategories($categoryid, $groupid)
    {
        try {
            $this->setResult($resultPermissions_GetCategories = $this->getSoapClient()->__soapCall('Permissions.GetCategories', [
                $categoryid,
                $groupid,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_GetCategories;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetGroup
     * Meta information extracted from the WSDL
     * - documentation: Retrieves information about a particular group.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $group_type
     * @param string $groupid
     * @return \StructType\ApiGroup_data|bool
     */
    public function Permissions_GetGroup($group_type, $groupid)
    {
        try {
            $this->setResult($resultPermissions_GetGroup = $this->getSoapClient()->__soapCall('Permissions.GetGroup', [
                $group_type,
                $groupid,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_GetGroup;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetGroups
     * Meta information extracted from the WSDL
     * - documentation: Retrieves all available groups for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $field
     * @param string $search
     * @return \StructType\ApiPermission_group[]|bool
     */
    public function Permissions_GetGroups($field, $search)
    {
        try {
            $this->setResult($resultPermissions_GetGroups = $this->getSoapClient()->__soapCall('Permissions.GetGroups', [
                $field,
                $search,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_GetGroups;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetLogin
     * Meta information extracted from the WSDL
     * - documentation: Retrieves a user login for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $login
     * @return \StructType\ApiLogin|bool
     */
    public function Permissions_GetLogin($login)
    {
        try {
            $this->setResult($resultPermissions_GetLogin = $this->getSoapClient()->__soapCall('Permissions.GetLogin', [
                $login,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_GetLogin;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetLogins
     * Meta information extracted from the WSDL
     * - documentation: Retrieves user logins for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $login_search_field
     * @param string $login_search_value
     * @return \StructType\ApiPerm_login[]|bool
     */
    public function Permissions_GetLogins($login_search_field, $login_search_value)
    {
        try {
            $this->setResult($resultPermissions_GetLogins = $this->getSoapClient()->__soapCall('Permissions.GetLogins', [
                $login_search_field,
                $login_search_value,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_GetLogins;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetReportBuilderLogin
     * Meta information extracted from the WSDL
     * - documentation: ReportBuilder login (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $locale
     * @return \StructType\ApiReportBuilderLogin|bool
     */
    public function Permissions_GetReportBuilderLogin($locale)
    {
        try {
            $this->setResult($resultPermissions_GetReportBuilderLogin = $this->getSoapClient()->__soapCall('Permissions.GetReportBuilderLogin', [
                $locale,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_GetReportBuilderLogin;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * Permissions.GetReportSuiteGroupCount
     * Meta information extracted from the WSDL
     * - documentation: Retrieves all available accounts for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $search_field
     * @param string $search_val
     * @return \StructType\ApiPermissions_account[]|bool
     */
    public function Permissions_GetReportSuiteGroupCount($search_field, $search_val)
    {
        try {
            $this->setResult($resultPermissions_GetReportSuiteGroupCount = $this->getSoapClient()->__soapCall('Permissions.GetReportSuiteGroupCount', [
                $search_field,
                $search_val,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_GetReportSuiteGroupCount;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetReportSuiteGroups
     * Meta information extracted from the WSDL
     * - documentation: Returns the groups that this report suite is a part of.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @return \StructType\ApiPermissions_account_groups|bool
     */
    public function Permissions_GetReportSuiteGroups($rsid)
    {
        try {
            $this->setResult($resultPermissions_GetReportSuiteGroups = $this->getSoapClient()->__soapCall('Permissions.GetReportSuiteGroups', [
                $rsid,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_GetReportSuiteGroups;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.HasPrivilege
     * Meta information extracted from the WSDL
     * - documentation: Determines if the current user has the given privilegeToken
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $privilegeToken
     * @return string|bool
     */
    public function Permissions_HasPrivilege($privilegeToken)
    {
        try {
            $this->setResult($resultPermissions_HasPrivilege = $this->getSoapClient()->__soapCall('Permissions.HasPrivilege', [
                $privilegeToken,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_HasPrivilege;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.SaveGroup
     * Meta information extracted from the WSDL
     * - documentation: Saves group setting - if the group does not exist it creates a new one.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $group_description
     * @param string $group_name
     * @param string $group_type
     * @param string $groupid
     * @param \StructType\ApiPerm_data[] $perm_info
     * @param \StructType\ApiReport_categories $report_access_list
     * @param int[] $report_id_list
     * @param string[] $rsid_list
     * @param string[] $user_list
     * @return int|bool
     */
    public function Permissions_SaveGroup($group_description, $group_name, $group_type, $groupid, array $perm_info, \StructType\ApiReport_categories $report_access_list, array $report_id_list, array $rsid_list, array $user_list)
    {
        try {
            $this->setResult($resultPermissions_SaveGroup = $this->getSoapClient()->__soapCall('Permissions.SaveGroup', [
                $group_description,
                $group_name,
                $group_type,
                $groupid,
                $perm_info,
                $report_access_list,
                $report_id_list,
                $rsid_list,
                $user_list,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_SaveGroup;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.SaveLogin
     * Meta information extracted from the WSDL
     * - documentation: Saves the login for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $admin
     * @param string $change_password
     * @param string $email
     * @param string $first_name
     * @param string $last_name
     * @param string $login
     * @param string $password
     * @param string $phone_number
     * @param \StructType\ApiPermission_group[] $selected_group_list
     * @param string $send_welcome_email
     * @param string $temp_end_date
     * @param string $temp_login
     * @param string $temp_start_date
     * @param string $title
     * @return int|bool
     */
    public function Permissions_SaveLogin($admin, $change_password, $email, $first_name, $last_name, $login, $password, $phone_number, array $selected_group_list, $send_welcome_email, $temp_end_date, $temp_login, $temp_start_date, $title)
    {
        try {
            $this->setResult($resultPermissions_SaveLogin = $this->getSoapClient()->__soapCall('Permissions.SaveLogin', [
                $admin,
                $change_password,
                $email,
                $first_name,
                $last_name,
                $login,
                $password,
                $phone_number,
                $selected_group_list,
                $send_welcome_email,
                $temp_end_date,
                $temp_login,
                $temp_start_date,
                $title,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_SaveLogin;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.SaveReportSuiteGroups
     * Meta information extracted from the WSDL
     * - documentation: Assigns the provided groups to the indicated report suite ID.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @param int[] $selected_groups
     * @return int|bool
     */
    public function Permissions_SaveReportSuiteGroups($rsid, array $selected_groups)
    {
        try {
            $this->setResult($resultPermissions_SaveReportSuiteGroups = $this->getSoapClient()->__soapCall('Permissions.SaveReportSuiteGroups', [
                $rsid,
                $selected_groups,
            ], [], [], $this->outputHeaders));
        
            return $resultPermissions_SaveReportSuiteGroups;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.CancelReport
     * Meta information extracted from the WSDL
     * - documentation: Cancel a report request.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportID
     * @return int|bool
     */
    public function Report_CancelReport($reportID)
    {
        try {
            $this->setResult($resultReport_CancelReport = $this->getSoapClient()->__soapCall('Report.CancelReport', [
                $reportID,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_CancelReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetElementNames
     * Meta information extracted from the WSDL
     * - documentation: Retrieve element names
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReport_element_mapping[]|bool
     */
    public function Report_GetElementNames(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultReport_GetElementNames = $this->getSoapClient()->__soapCall('Report.GetElementNames', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_GetElementNames;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetOvertimeReport
     * Meta information extracted from the WSDL
     * - documentation: Runs an overtime report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReportResponse|bool
     */
    public function Report_GetOvertimeReport(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultReport_GetOvertimeReport = $this->getSoapClient()->__soapCall('Report.GetOvertimeReport', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_GetOvertimeReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetRankedReport
     * Meta information extracted from the WSDL
     * - documentation: Runs a ranked report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReportResponse|bool
     */
    public function Report_GetRankedReport(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultReport_GetRankedReport = $this->getSoapClient()->__soapCall('Report.GetRankedReport', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_GetRankedReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetReport
     * Meta information extracted from the WSDL
     * - documentation: Get status and data for a queued report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportID
     * @return \StructType\ApiReportResponse|bool
     */
    public function Report_GetReport($reportID)
    {
        try {
            $this->setResult($resultReport_GetReport = $this->getSoapClient()->__soapCall('Report.GetReport', [
                $reportID,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_GetReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetReportQueue
     * Meta information extracted from the WSDL
     * - documentation: Retrieve the report queue for a given company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \StructType\ApiReport_queue_item[]|bool
     */
    public function Report_GetReportQueue()
    {
        try {
            $this->setResult($resultReport_GetReportQueue = $this->getSoapClient()->__soapCall('Report.GetReportQueue', [], [], [], $this->outputHeaders));
        
            return $resultReport_GetReportQueue;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetStatus
     * Meta information extracted from the WSDL
     * - documentation: Get status for a queued report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportID
     * @return \StructType\ApiReport_status|bool
     */
    public function Report_GetStatus($reportID)
    {
        try {
            $this->setResult($resultReport_GetStatus = $this->getSoapClient()->__soapCall('Report.GetStatus', [
                $reportID,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_GetStatus;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetTrendedReport
     * Meta information extracted from the WSDL
     * - documentation: Runs a trended report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReportResponse|bool
     */
    public function Report_GetTrendedReport(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultReport_GetTrendedReport = $this->getSoapClient()->__soapCall('Report.GetTrendedReport', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_GetTrendedReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.QueueOvertime
     * Meta information extracted from the WSDL
     * - documentation: Queue an overtime report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReportQueueResponse|bool
     */
    public function Report_QueueOvertime(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultReport_QueueOvertime = $this->getSoapClient()->__soapCall('Report.QueueOvertime', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_QueueOvertime;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.QueueRanked
     * Meta information extracted from the WSDL
     * - documentation: Queue an ranked report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReportQueueResponse|bool
     */
    public function Report_QueueRanked(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultReport_QueueRanked = $this->getSoapClient()->__soapCall('Report.QueueRanked', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_QueueRanked;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.QueueSCMRanked
     * Meta information extracted from the WSDL
     * - documentation: Queue a ranked report that is optimized for SearchCenter classifications.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSCM_reportDescription $reportDescription
     * @return \StructType\ApiReportQueueResponse|bool
     */
    public function Report_QueueSCMRanked(\StructType\ApiSCM_reportDescription $reportDescription)
    {
        try {
            $this->setResult($resultReport_QueueSCMRanked = $this->getSoapClient()->__soapCall('Report.QueueSCMRanked', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_QueueSCMRanked;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.QueueTrended
     * Meta information extracted from the WSDL
     * - documentation: Queue an trended report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiReportDescription $reportDescription
     * @return \StructType\ApiReportQueueResponse|bool
     */
    public function Report_QueueTrended(\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult($resultReport_QueueTrended = $this->getSoapClient()->__soapCall('Report.QueueTrended', [
                $reportDescription,
            ], [], [], $this->outputHeaders));
        
            return $resultReport_QueueTrended;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.AddCorrelations
     * Meta information extracted from the WSDL
     * - documentation: Saves the given correlation for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param int[] $rel_ids
     * @param string[] $rsid_list
     * @param string $size
     * @return int|bool
     */
    public function ReportSuite_AddCorrelations(array $rel_ids, array $rsid_list, $size)
    {
        try {
            $this->setResult($resultReportSuite_AddCorrelations = $this->getSoapClient()->__soapCall('ReportSuite.AddCorrelations', [
                $rel_ids,
                $rsid_list,
                $size,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_AddCorrelations;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.AddInternalURLFilters
     * Meta information extracted from the WSDL
     * - documentation: Adds the internal URL filters for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $filters
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_AddInternalURLFilters(array $filters, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_AddInternalURLFilters = $this->getSoapClient()->__soapCall('ReportSuite.AddInternalURLFilters', [
                $filters,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_AddInternalURLFilters;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.AddKeyVisitors
     * Meta information extracted from the WSDL
     * - documentation: Adds a key visitors for the selected report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $key_visitors
     * @param string[] $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_AddKeyVisitors(array $key_visitors, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_AddKeyVisitors = $this->getSoapClient()->__soapCall('ReportSuite.AddKeyVisitors', [
                $key_visitors,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_AddKeyVisitors;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.AddSavedFilters
     * Meta information extracted from the WSDL
     * - documentation: Saves filter. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSaved_filter[] $savedFilters
     * @return \StructType\ApiSaved_filter[]|bool
     */
    public function ReportSuite_AddSavedFilters(array $savedFilters)
    {
        try {
            $this->setResult($resultReportSuite_AddSavedFilters = $this->getSoapClient()->__soapCall('ReportSuite.AddSavedFilters', [
                $savedFilters,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_AddSavedFilters;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.Create
     * Meta information extracted from the WSDL
     * - documentation: Creates a new report suite with the values specified
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $base_currency
     * @param string $base_url
     * @param string $default_page
     * @param string $duplicate_rsid
     * @param string $go_live_date
     * @param string $hits_per_day
     * @param string $latin1
     * @param string $rsid
     * @param string $site_title
     * @param string $time_zone
     * @return boolean|bool
     */
    public function ReportSuite_Create($base_currency, $base_url, $default_page, $duplicate_rsid, $go_live_date, $hits_per_day, $latin1, $rsid, $site_title, $time_zone)
    {
        try {
            $this->setResult($resultReportSuite_Create = $this->getSoapClient()->__soapCall('ReportSuite.Create', [
                $base_currency,
                $base_url,
                $default_page,
                $duplicate_rsid,
                $go_live_date,
                $hits_per_day,
                $latin1,
                $rsid,
                $site_title,
                $time_zone,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_Create;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteBaseURL
     * Meta information extracted from the WSDL
     * - documentation: Deletes the base URL for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteBaseURL(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeleteBaseURL = $this->getSoapClient()->__soapCall('ReportSuite.DeleteBaseURL', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteBaseURL;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteCalculatedMetrics
     * Meta information extracted from the WSDL
     * - documentation: Deletes a calculated metric for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCalculated_metric[] $calculated_metrics
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteCalculatedMetrics(array $calculated_metrics, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeleteCalculatedMetrics = $this->getSoapClient()->__soapCall('ReportSuite.DeleteCalculatedMetrics', [
                $calculated_metrics,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteCalculatedMetrics;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteClassifications
     * Meta information extracted from the WSDL
     * - documentation: Deletes a classification for one report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $c_view
     * @param string $div_num
     * @param string $parent_div_num
     * @param string[] $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_DeleteClassifications($c_view, $div_num, $parent_div_num, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeleteClassifications = $this->getSoapClient()->__soapCall('ReportSuite.DeleteClassifications', [
                $c_view,
                $div_num,
                $parent_div_num,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteClassifications;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteCorrelations
     * Meta information extracted from the WSDL
     * - documentation: Deletes the specified data correlations
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param int[] $rel_ids
     * @param string[] $rsid_list
     * @param string $size
     * @return boolean|bool
     */
    public function ReportSuite_DeleteCorrelations(array $rel_ids, array $rsid_list, $size)
    {
        try {
            $this->setResult($resultReportSuite_DeleteCorrelations = $this->getSoapClient()->__soapCall('ReportSuite.DeleteCorrelations', [
                $rel_ids,
                $rsid_list,
                $size,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteCorrelations;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteDefaultPage
     * Meta information extracted from the WSDL
     * - documentation: Deletes the default page for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteDefaultPage(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeleteDefaultPage = $this->getSoapClient()->__soapCall('ReportSuite.DeleteDefaultPage', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteDefaultPage;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteIPAddressExclusions
     * Meta information extracted from the WSDL
     * - documentation: Delete an IP exclusion entry for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $ip_list
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteIPAddressExclusions(array $ip_list, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeleteIPAddressExclusions = $this->getSoapClient()->__soapCall('ReportSuite.DeleteIPAddressExclusions', [
                $ip_list,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteIPAddressExclusions;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteInternalURLFilters
     * Meta information extracted from the WSDL
     * - documentation: Deletes the specified internal URL filters
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $filters
     * @param string[] $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_DeleteInternalURLFilters(array $filters, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeleteInternalURLFilters = $this->getSoapClient()->__soapCall('ReportSuite.DeleteInternalURLFilters', [
                $filters,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteInternalURLFilters;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteKeyVisitors
     * Meta information extracted from the WSDL
     * - documentation: deletes a list of key visitors for the selected report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $key_visitors
     * @param string[] $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_DeleteKeyVisitors(array $key_visitors, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeleteKeyVisitors = $this->getSoapClient()->__soapCall('ReportSuite.DeleteKeyVisitors', [
                $key_visitors,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteKeyVisitors;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteMarketingChannelCost
     * Meta information extracted from the WSDL
     * - documentation: Deletes a cost item for the selected report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $channel_type
     * @param string $cost_group
     * @param string $id
     * @param string[] $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_DeleteMarketingChannelCost($channel_type, $cost_group, $id, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeleteMarketingChannelCost = $this->getSoapClient()->__soapCall('ReportSuite.DeleteMarketingChannelCost', [
                $channel_type,
                $cost_group,
                $id,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteMarketingChannelCost;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteMarketingChannels
     * Meta information extracted from the WSDL
     * - documentation: Delete marketing channels.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param int[] $channel_ids
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteMarketingChannels(array $channel_ids, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeleteMarketingChannels = $this->getSoapClient()->__soapCall('ReportSuite.DeleteMarketingChannels', [
                $channel_ids,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteMarketingChannels;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeletePages
     * Meta information extracted from the WSDL
     * - documentation: Deletes the given pages from the requested report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param int[] $page_id_list
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeletePages(array $page_id_list, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_DeletePages = $this->getSoapClient()->__soapCall('ReportSuite.DeletePages', [
                $page_id_list,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeletePages;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeletePaidSearch
     * Meta information extracted from the WSDL
     * - documentation: Removes the specified paid search rule.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $filter
     * @param string[] $rsid_list
     * @param string $rule
     * @param string $search_engine
     * @return int|bool
     */
    public function ReportSuite_DeletePaidSearch($filter, array $rsid_list, $rule, $search_engine)
    {
        try {
            $this->setResult($resultReportSuite_DeletePaidSearch = $this->getSoapClient()->__soapCall('ReportSuite.DeletePaidSearch', [
                $filter,
                $rsid_list,
                $rule,
                $search_engine,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeletePaidSearch;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteSavedFilter
     * Meta information extracted from the WSDL
     * - documentation: Deletes a saved filter. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param int[] $savedFilterIds
     * @return boolean|bool
     */
    public function ReportSuite_DeleteSavedFilter(array $savedFilterIds)
    {
        try {
            $this->setResult($resultReportSuite_DeleteSavedFilter = $this->getSoapClient()->__soapCall('ReportSuite.DeleteSavedFilter', [
                $savedFilterIds,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_DeleteSavedFilter;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetActivation
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the activated status for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_activation[]|bool
     */
    public function ReportSuite_GetActivation(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetActivation = $this->getSoapClient()->__soapCall('ReportSuite.GetActivation', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetActivation;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetAvailableElements
     * Meta information extracted from the WSDL
     * - documentation: Returns available elements for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $return_datawarehouse_elements
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_elements[]|bool
     */
    public function ReportSuite_GetAvailableElements($return_datawarehouse_elements, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetAvailableElements = $this->getSoapClient()->__soapCall('ReportSuite.GetAvailableElements', [
                $return_datawarehouse_elements,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetAvailableElements;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetAvailableMetrics
     * Meta information extracted from the WSDL
     * - documentation: Returns available metrics for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $return_datawarehouse_metrics
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_metrics[]|bool
     */
    public function ReportSuite_GetAvailableMetrics($return_datawarehouse_metrics, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetAvailableMetrics = $this->getSoapClient()->__soapCall('ReportSuite.GetAvailableMetrics', [
                $return_datawarehouse_metrics,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetAvailableMetrics;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetAxleStartDate
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the axle start date for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiRs_axle_start_date[]|bool
     */
    public function ReportSuite_GetAxleStartDate(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetAxleStartDate = $this->getSoapClient()->__soapCall('ReportSuite.GetAxleStartDate', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetAxleStartDate;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetBaseCurrency
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the base URL for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_base_currency[]|bool
     */
    public function ReportSuite_GetBaseCurrency(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetBaseCurrency = $this->getSoapClient()->__soapCall('ReportSuite.GetBaseCurrency', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetBaseCurrency;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetBaseURL
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the base URL for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_base_url[]|bool
     */
    public function ReportSuite_GetBaseURL(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetBaseURL = $this->getSoapClient()->__soapCall('ReportSuite.GetBaseURL', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetBaseURL;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetCalculatedMetrics
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the calculated metrics for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_calculated_metric[]|bool
     */
    public function ReportSuite_GetCalculatedMetrics(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetCalculatedMetrics = $this->getSoapClient()->__soapCall('ReportSuite.GetCalculatedMetrics', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetCalculatedMetrics;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetClassificationHierarchies
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the requested classifications from the requested report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $c_view
     * @param string[] $rel_id
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_hierarchies[]|bool
     */
    public function ReportSuite_GetClassificationHierarchies($c_view, array $rel_id, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetClassificationHierarchies = $this->getSoapClient()->__soapCall('ReportSuite.GetClassificationHierarchies', [
                $c_view,
                $rel_id,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetClassificationHierarchies;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetClassifications
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the requested classifications from the requested report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $c_view
     * @param string[] $rel_id
     * @param string[] $rsid_list
     * @param string $type
     * @return \StructType\ApiReport_suite_classification[]|bool
     */
    public function ReportSuite_GetClassifications($c_view, array $rel_id, array $rsid_list, $type)
    {
        try {
            $this->setResult($resultReportSuite_GetClassifications = $this->getSoapClient()->__soapCall('ReportSuite.GetClassifications', [
                $c_view,
                $rel_id,
                $rsid_list,
                $type,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetClassifications;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetCorrelations
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the correlations for the specified report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_correlation[]|bool
     */
    public function ReportSuite_GetCorrelations(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetCorrelations = $this->getSoapClient()->__soapCall('ReportSuite.GetCorrelations', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetCorrelations;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetCustomCalendar
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the custom calendar for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_custom_calendar[]|bool
     */
    public function ReportSuite_GetCustomCalendar(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetCustomCalendar = $this->getSoapClient()->__soapCall('ReportSuite.GetCustomCalendar', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetCustomCalendar;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetDefaultPage
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the default page for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_default_page[]|bool
     */
    public function ReportSuite_GetDefaultPage(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetDefaultPage = $this->getSoapClient()->__soapCall('ReportSuite.GetDefaultPage', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetDefaultPage;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetEVars
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the conversion variables for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_evar[]|bool
     */
    public function ReportSuite_GetEVars(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetEVars = $this->getSoapClient()->__soapCall('ReportSuite.GetEVars', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetEVars;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetEcommerce
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the Conversion level for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_ecommerce[]|bool
     */
    public function ReportSuite_GetEcommerce(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetEcommerce = $this->getSoapClient()->__soapCall('ReportSuite.GetEcommerce', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetEcommerce;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetFindingMethods
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the finding methods for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_finding_method[]|bool
     */
    public function ReportSuite_GetFindingMethods(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetFindingMethods = $this->getSoapClient()->__soapCall('ReportSuite.GetFindingMethods', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetFindingMethods;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetIPAddressExclusions
     * Meta information extracted from the WSDL
     * - documentation: Returns the IP address exclusions for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_ip_exclusions[]|bool
     */
    public function ReportSuite_GetIPAddressExclusions(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetIPAddressExclusions = $this->getSoapClient()->__soapCall('ReportSuite.GetIPAddressExclusions', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetIPAddressExclusions;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetIPObfuscation
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the IP Address Obfuscation setting.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_ip_obfuscation[]|bool
     */
    public function ReportSuite_GetIPObfuscation(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetIPObfuscation = $this->getSoapClient()->__soapCall('ReportSuite.GetIPObfuscation', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetIPObfuscation;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetInternalURLFilters
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the internal URL filters for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_internal_url_filter[]|bool
     */
    public function ReportSuite_GetInternalURLFilters(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetInternalURLFilters = $this->getSoapClient()->__soapCall('ReportSuite.GetInternalURLFilters', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetInternalURLFilters;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetKeyVisitors
     * Meta information extracted from the WSDL
     * - documentation: Retrieves a list of Key visitors for the specified report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_key_visitor[]|bool
     */
    public function ReportSuite_GetKeyVisitors(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetKeyVisitors = $this->getSoapClient()->__soapCall('ReportSuite.GetKeyVisitors', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetKeyVisitors;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetLocalization
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the status of the multibyte character setting for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_localization[]|bool
     */
    public function ReportSuite_GetLocalization(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetLocalization = $this->getSoapClient()->__soapCall('ReportSuite.GetLocalization', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetLocalization;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetMarketingChannelCost
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the marketing channel cost metrics for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_costs[]|bool
     */
    public function ReportSuite_GetMarketingChannelCost(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetMarketingChannelCost = $this->getSoapClient()->__soapCall('ReportSuite.GetMarketingChannelCost', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetMarketingChannelCost;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetMarketingChannelExpiration
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the marketing channel engagement period expiration information for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiExpiration_event[]|bool
     */
    public function ReportSuite_GetMarketingChannelExpiration(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetMarketingChannelExpiration = $this->getSoapClient()->__soapCall('ReportSuite.GetMarketingChannelExpiration', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetMarketingChannelExpiration;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetMarketingChannelRules
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the marketing channel rules for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiRs_mchannel_rulesets[]|bool
     */
    public function ReportSuite_GetMarketingChannelRules(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetMarketingChannelRules = $this->getSoapClient()->__soapCall('ReportSuite.GetMarketingChannelRules', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetMarketingChannelRules;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetMarketingChannels
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the marketing channels for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiMchannels[]|bool
     */
    public function ReportSuite_GetMarketingChannels(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetMarketingChannels = $this->getSoapClient()->__soapCall('ReportSuite.GetMarketingChannels', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetMarketingChannels;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetMarketingChannelsCustomSubRelations
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the available custom subrelations for the marketing channels in the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rel_id
     * @param string $rsid
     * @return \StructType\ApiChannel_sub_relations_element|bool
     */
    public function ReportSuite_GetMarketingChannelsCustomSubRelations($rel_id, $rsid)
    {
        try {
            $this->setResult($resultReportSuite_GetMarketingChannelsCustomSubRelations = $this->getSoapClient()->__soapCall('ReportSuite.GetMarketingChannelsCustomSubRelations', [
                $rel_id,
                $rsid,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetMarketingChannelsCustomSubRelations;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetMobileAppReporting
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the Mobile Application Tracking settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return string|bool
     */
    public function ReportSuite_GetMobileAppReporting(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetMobileAppReporting = $this->getSoapClient()->__soapCall('ReportSuite.GetMobileAppReporting', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetMobileAppReporting;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetPages
     * Meta information extracted from the WSDL
     * - documentation: Retrieves a list of pages for the specified report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $limit
     * @param string $page_search
     * @param string[] $rsid_list
     * @param string $sc_period
     * @param string $start_point
     * @return \StructType\ApiReport_suite_pages[]|bool
     */
    public function ReportSuite_GetPages($limit, $page_search, array $rsid_list, $sc_period, $start_point)
    {
        try {
            $this->setResult($resultReportSuite_GetPages = $this->getSoapClient()->__soapCall('ReportSuite.GetPages', [
                $limit,
                $page_search,
                $rsid_list,
                $sc_period,
                $start_point,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetPages;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetPaidSearch
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the paid search settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_paid_search[]|bool
     */
    public function ReportSuite_GetPaidSearch(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetPaidSearch = $this->getSoapClient()->__soapCall('ReportSuite.GetPaidSearch', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetPaidSearch;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetPermanentTraffic
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the permanent traffic settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiPermanent_traffic[]|bool
     */
    public function ReportSuite_GetPermanentTraffic(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetPermanentTraffic = $this->getSoapClient()->__soapCall('ReportSuite.GetPermanentTraffic', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetPermanentTraffic;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetProcessingStatus
     * Meta information extracted from the WSDL
     * - documentation: Returns processing status for the given report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_processing_status[]|bool
     */
    public function ReportSuite_GetProcessingStatus(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetProcessingStatus = $this->getSoapClient()->__soapCall('ReportSuite.GetProcessingStatus', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetProcessingStatus;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetRollupDates
     * Meta information extracted from the WSDL
     * - documentation: Returns rollup dates for the given rollup report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_rollup_dates[]|bool
     */
    public function ReportSuite_GetRollupDates(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetRollupDates = $this->getSoapClient()->__soapCall('ReportSuite.GetRollupDates', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetRollupDates;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetRollups
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the rollups for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \StructType\ApiRollup[]|bool
     */
    public function ReportSuite_GetRollups()
    {
        try {
            $this->setResult($resultReportSuite_GetRollups = $this->getSoapClient()->__soapCall('ReportSuite.GetRollups', [], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetRollups;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSavedFilters
     * Meta information extracted from the WSDL
     * - documentation: Gets the saved filters for a report suite. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \StructType\ApiSaved_filter[]|bool
     */
    public function ReportSuite_GetSavedFilters()
    {
        try {
            $this->setResult($resultReportSuite_GetSavedFilters = $this->getSoapClient()->__soapCall('ReportSuite.GetSavedFilters', [], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetSavedFilters;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetScheduledSpike
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the scheduled traffic changes for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiSchedule_spike[]|bool
     */
    public function ReportSuite_GetScheduledSpike(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetScheduledSpike = $this->getSoapClient()->__soapCall('ReportSuite.GetScheduledSpike', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetScheduledSpike;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSegments
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the requested classifications from the requested report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiRs_sc_segments[]|bool
     */
    public function ReportSuite_GetSegments(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetSegments = $this->getSoapClient()->__soapCall('ReportSuite.GetSegments', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetSegments;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSettings
     * Meta information extracted from the WSDL
     * - documentation: Returns report suite settings.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $locale
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_settings[]|bool
     */
    public function ReportSuite_GetSettings($locale, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetSettings = $this->getSoapClient()->__soapCall('ReportSuite.GetSettings', [
                $locale,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetSettings;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSiteTitle
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the Site Title for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_site_title[]|bool
     */
    public function ReportSuite_GetSiteTitle(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetSiteTitle = $this->getSoapClient()->__soapCall('ReportSuite.GetSiteTitle', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetSiteTitle;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSuccessEvents
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the success events for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_event[]|bool
     */
    public function ReportSuite_GetSuccessEvents(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetSuccessEvents = $this->getSoapClient()->__soapCall('ReportSuite.GetSuccessEvents', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetSuccessEvents;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetTemplate
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the templates for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_template[]|bool
     */
    public function ReportSuite_GetTemplate(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetTemplate = $this->getSoapClient()->__soapCall('ReportSuite.GetTemplate', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetTemplate;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetTimeZone
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the Time Zone for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_time_zone[]|bool
     */
    public function ReportSuite_GetTimeZone(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetTimeZone = $this->getSoapClient()->__soapCall('ReportSuite.GetTimeZone', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetTimeZone;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetTrafficVars
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the Traffic Vars for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_traffic_var[]|bool
     */
    public function ReportSuite_GetTrafficVars(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetTrafficVars = $this->getSoapClient()->__soapCall('ReportSuite.GetTrafficVars', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetTrafficVars;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetUIVisibility
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the visibility states for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_ui_element[]|bool
     */
    public function ReportSuite_GetUIVisibility(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetUIVisibility = $this->getSoapClient()->__soapCall('ReportSuite.GetUIVisibility', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetUIVisibility;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetUniqueVisitorVariable
     * Meta information extracted from the WSDL
     * - documentation: Retrieves a list of unique visitor variables
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_unique_visitor_variable[]|bool
     */
    public function ReportSuite_GetUniqueVisitorVariable(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetUniqueVisitorVariable = $this->getSoapClient()->__soapCall('ReportSuite.GetUniqueVisitorVariable', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetUniqueVisitorVariable;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetVideoReporting
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the Video Tracking settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return string|bool
     */
    public function ReportSuite_GetVideoReporting(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetVideoReporting = $this->getSoapClient()->__soapCall('ReportSuite.GetVideoReporting', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetVideoReporting;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetVideoTracking
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the Video Tracking settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return \StructType\ApiReport_suite_video_tracking[]|bool
     */
    public function ReportSuite_GetVideoTracking(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_GetVideoTracking = $this->getSoapClient()->__soapCall('ReportSuite.GetVideoTracking', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_GetVideoTracking;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveBaseCurrency
     * Meta information extracted from the WSDL
     * - documentation: Saves the Base Currency setting.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $base_currency
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveBaseCurrency($base_currency, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveBaseCurrency = $this->getSoapClient()->__soapCall('ReportSuite.SaveBaseCurrency', [
                $base_currency,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveBaseCurrency;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveBaseURL
     * Meta information extracted from the WSDL
     * - documentation: Saves the base URL for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $base_url
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveBaseURL($base_url, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveBaseURL = $this->getSoapClient()->__soapCall('ReportSuite.SaveBaseURL', [
                $base_url,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveBaseURL;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveCalculatedMetrics
     * Meta information extracted from the WSDL
     * - documentation: Saves a calculated metric for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCalculated_metric[] $calculated_metrics
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveCalculatedMetrics(array $calculated_metrics, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveCalculatedMetrics = $this->getSoapClient()->__soapCall('ReportSuite.SaveCalculatedMetrics', [
                $calculated_metrics,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveCalculatedMetrics;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveClassificationHierarchies
     * Meta information extracted from the WSDL
     * - documentation: Modifies a classification hierarchy for one or more report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $c_options
     * @param string $c_view
     * @param string $camp_view
     * @param string $div_num
     * @param string $name
     * @param string $parent_div_num
     * @param string[] $rsid_list
     * @param string $type
     * @param string $update
     * @return int|bool
     */
    public function ReportSuite_SaveClassificationHierarchies(array $c_options, $c_view, $camp_view, $div_num, $name, $parent_div_num, array $rsid_list, $type, $update)
    {
        try {
            $this->setResult($resultReportSuite_SaveClassificationHierarchies = $this->getSoapClient()->__soapCall('ReportSuite.SaveClassificationHierarchies', [
                $c_options,
                $c_view,
                $camp_view,
                $div_num,
                $name,
                $parent_div_num,
                $rsid_list,
                $type,
                $update,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveClassificationHierarchies;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveClassifications
     * Meta information extracted from the WSDL
     * - documentation: Saves a classification for one or more report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $c_options
     * @param string $c_view
     * @param string $camp_view
     * @param string $div_num
     * @param string $name
     * @param string $parent_div_num
     * @param string[] $rsid_list
     * @param string $type
     * @param string $update
     * @return int|bool
     */
    public function ReportSuite_SaveClassifications(array $c_options, $c_view, $camp_view, $div_num, $name, $parent_div_num, array $rsid_list, $type, $update)
    {
        try {
            $this->setResult($resultReportSuite_SaveClassifications = $this->getSoapClient()->__soapCall('ReportSuite.SaveClassifications', [
                $c_options,
                $c_view,
                $camp_view,
                $div_num,
                $name,
                $parent_div_num,
                $rsid_list,
                $type,
                $update,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveClassifications;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveCustomCalendar
     * Meta information extracted from the WSDL
     * - documentation: Enables custom calendars for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $anchor_date
     * @param string $cal_type
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveCustomCalendar($anchor_date, $cal_type, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveCustomCalendar = $this->getSoapClient()->__soapCall('ReportSuite.SaveCustomCalendar', [
                $anchor_date,
                $cal_type,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveCustomCalendar;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveDefaultPage
     * Meta information extracted from the WSDL
     * - documentation: Saves the default page for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $default_page
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveDefaultPage($default_page, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveDefaultPage = $this->getSoapClient()->__soapCall('ReportSuite.SaveDefaultPage', [
                $default_page,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveDefaultPage;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveEVars
     * Meta information extracted from the WSDL
     * - documentation: Saves the conversion variables for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiEvar[] $evars
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveEVars(array $evars, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveEVars = $this->getSoapClient()->__soapCall('ReportSuite.SaveEVars', [
                $evars,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveEVars;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveEcommerce
     * Meta information extracted from the WSDL
     * - documentation: Saves the conversion level for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $ecommerce
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveEcommerce($ecommerce, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveEcommerce = $this->getSoapClient()->__soapCall('ReportSuite.SaveEcommerce', [
                $ecommerce,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveEcommerce;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveFindingMethods
     * Meta information extracted from the WSDL
     * - documentation: Saves finding method settings.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiFinding_method[] $reports
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveFindingMethods(array $reports, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveFindingMethods = $this->getSoapClient()->__soapCall('ReportSuite.SaveFindingMethods', [
                $reports,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveFindingMethods;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveIPAddressExclusions
     * Meta information extracted from the WSDL
     * - documentation: Add an IP exclusion entry for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSave_ip_exclusion[] $ip_list
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveIPAddressExclusions(array $ip_list, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveIPAddressExclusions = $this->getSoapClient()->__soapCall('ReportSuite.SaveIPAddressExclusions', [
                $ip_list,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveIPAddressExclusions;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveIPObfuscation
     * Meta information extracted from the WSDL
     * - documentation: Saves the IP Address Obfuscation setting.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $ip_obfuscation
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveIPObfuscation($ip_obfuscation, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveIPObfuscation = $this->getSoapClient()->__soapCall('ReportSuite.SaveIPObfuscation', [
                $ip_obfuscation,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveIPObfuscation;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveMarketingChannelCost
     * Meta information extracted from the WSDL
     * - documentation: Saves the marketing channel costs for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCost_item $cost_item
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveMarketingChannelCost(\StructType\ApiCost_item $cost_item, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveMarketingChannelCost = $this->getSoapClient()->__soapCall('ReportSuite.SaveMarketingChannelCost', [
                $cost_item,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveMarketingChannelCost;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveMarketingChannelExpiration
     * Meta information extracted from the WSDL
     * - documentation: Saves the visitor expiration period. Set the number of days required before the visit expires, or 0 for never expires
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $days
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveMarketingChannelExpiration($days, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveMarketingChannelExpiration = $this->getSoapClient()->__soapCall('ReportSuite.SaveMarketingChannelExpiration', [
                $days,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveMarketingChannelExpiration;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveMarketingChannelRules
     * Meta information extracted from the WSDL
     * - documentation: Saves the marketing channel rules for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiMchannel_ruleset[] $mchannel_rules
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveMarketingChannelRules(array $mchannel_rules, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveMarketingChannelRules = $this->getSoapClient()->__soapCall('ReportSuite.SaveMarketingChannelRules', [
                $mchannel_rules,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveMarketingChannelRules;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveMarketingChannels
     * Meta information extracted from the WSDL
     * - documentation: Saves a set of marketing channels.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiMchannel[] $channels
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveMarketingChannels(array $channels, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveMarketingChannels = $this->getSoapClient()->__soapCall('ReportSuite.SaveMarketingChannels', [
                $channels,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveMarketingChannels;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveMobileAppReporting
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return void|bool
     */
    public function ReportSuite_SaveMobileAppReporting(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveMobileAppReporting = $this->getSoapClient()->__soapCall('ReportSuite.SaveMobileAppReporting', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveMobileAppReporting;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SavePaidSearch
     * Meta information extracted from the WSDL
     * - documentation: Saves the paid search settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $filter
     * @param string[] $rsid_list
     * @param string $rule
     * @param string $search_engine
     * @return int|bool
     */
    public function ReportSuite_SavePaidSearch($filter, array $rsid_list, $rule, $search_engine)
    {
        try {
            $this->setResult($resultReportSuite_SavePaidSearch = $this->getSoapClient()->__soapCall('ReportSuite.SavePaidSearch', [
                $filter,
                $rsid_list,
                $rule,
                $search_engine,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SavePaidSearch;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SavePermanentTraffic
     * Meta information extracted from the WSDL
     * - documentation: Saves the permanent traffic settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $new_hits_per_day
     * @param string[] $rsid_list
     * @param string $start_date
     * @return int|bool
     */
    public function ReportSuite_SavePermanentTraffic($new_hits_per_day, array $rsid_list, $start_date)
    {
        try {
            $this->setResult($resultReportSuite_SavePermanentTraffic = $this->getSoapClient()->__soapCall('ReportSuite.SavePermanentTraffic', [
                $new_hits_per_day,
                $rsid_list,
                $start_date,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SavePermanentTraffic;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveRollup
     * Meta information extracted from the WSDL
     * - documentation: Saves a rollup for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $go_live_date
     * @param string[] $rollup_rsids
     * @param string $rsid
     * @param string $time_zone
     * @return int|bool
     */
    public function ReportSuite_SaveRollup($go_live_date, array $rollup_rsids, $rsid, $time_zone)
    {
        try {
            $this->setResult($resultReportSuite_SaveRollup = $this->getSoapClient()->__soapCall('ReportSuite.SaveRollup', [
                $go_live_date,
                $rollup_rsids,
                $rsid,
                $time_zone,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveRollup;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveSavedFilters
     * Meta information extracted from the WSDL
     * - documentation: Saves filter. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiSaved_filter[] $savedFilters
     * @return \StructType\ApiSaved_filter[]|bool
     */
    public function ReportSuite_SaveSavedFilters(array $savedFilters)
    {
        try {
            $this->setResult($resultReportSuite_SaveSavedFilters = $this->getSoapClient()->__soapCall('ReportSuite.SaveSavedFilters', [
                $savedFilters,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveSavedFilters;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveScheduledSpike
     * Meta information extracted from the WSDL
     * - documentation: Saves scheduled traffic spikes for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $end_date
     * @param string[] $rsid_list
     * @param string $spike_hits_per_day
     * @param string $start_date
     * @return int|bool
     */
    public function ReportSuite_SaveScheduledSpike($end_date, array $rsid_list, $spike_hits_per_day, $start_date)
    {
        try {
            $this->setResult($resultReportSuite_SaveScheduledSpike = $this->getSoapClient()->__soapCall('ReportSuite.SaveScheduledSpike', [
                $end_date,
                $rsid_list,
                $spike_hits_per_day,
                $start_date,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveScheduledSpike;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveSiteTitle
     * Meta information extracted from the WSDL
     * - documentation: Changes the Site Title of the report suites specified (it is not recommended to update multiple report suites with the same site title)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @param string $site_title
     * @return int|bool
     */
    public function ReportSuite_SaveSiteTitle(array $rsid_list, $site_title)
    {
        try {
            $this->setResult($resultReportSuite_SaveSiteTitle = $this->getSoapClient()->__soapCall('ReportSuite.SaveSiteTitle', [
                $rsid_list,
                $site_title,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveSiteTitle;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveSuccessEvents
     * Meta information extracted from the WSDL
     * - documentation: Saves the success events to rsid_list
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiEvent[] $events
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveSuccessEvents(array $events, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveSuccessEvents = $this->getSoapClient()->__soapCall('ReportSuite.SaveSuccessEvents', [
                $events,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveSuccessEvents;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveSurveySettings
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @param string $survey_display_event_num
     * @param string $survey_evar_num
     * @param string $survey_submit_event_num
     * @return void|bool
     */
    public function ReportSuite_SaveSurveySettings(array $rsid_list, $survey_display_event_num, $survey_evar_num, $survey_submit_event_num)
    {
        try {
            $this->setResult($resultReportSuite_SaveSurveySettings = $this->getSoapClient()->__soapCall('ReportSuite.SaveSurveySettings', [
                $rsid_list,
                $survey_display_event_num,
                $survey_evar_num,
                $survey_submit_event_num,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveSurveySettings;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveTimeZone
     * Meta information extracted from the WSDL
     * - documentation: Changes the timezone (lookup ID) of the report suites specified
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @param string $time_zone
     * @return int|bool
     */
    public function ReportSuite_SaveTimeZone(array $rsid_list, $time_zone)
    {
        try {
            $this->setResult($resultReportSuite_SaveTimeZone = $this->getSoapClient()->__soapCall('ReportSuite.SaveTimeZone', [
                $rsid_list,
                $time_zone,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveTimeZone;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveTrafficVars
     * Meta information extracted from the WSDL
     * - documentation: Saves the Traffic Vars for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiTraffic_var[] $property
     * @param string[] $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveTrafficVars(array $property, array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveTrafficVars = $this->getSoapClient()->__soapCall('ReportSuite.SaveTrafficVars', [
                $property,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveTrafficVars;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveUIVisibility
     * Meta information extracted from the WSDL
     * - documentation: Changes the visibility state of the UI element given for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @param string $state
     * @param string $ui_element
     * @return boolean|bool
     */
    public function ReportSuite_SaveUIVisibility(array $rsid_list, $state, $ui_element)
    {
        try {
            $this->setResult($resultReportSuite_SaveUIVisibility = $this->getSoapClient()->__soapCall('ReportSuite.SaveUIVisibility', [
                $rsid_list,
                $state,
                $ui_element,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveUIVisibility;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveUniqueVisitorVariable
     * Meta information extracted from the WSDL
     * - documentation: Sets the unique visitor variable specified
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @param string $unique_visitor_variable
     * @return int|bool
     */
    public function ReportSuite_SaveUniqueVisitorVariable(array $rsid_list, $unique_visitor_variable)
    {
        try {
            $this->setResult($resultReportSuite_SaveUniqueVisitorVariable = $this->getSoapClient()->__soapCall('ReportSuite.SaveUniqueVisitorVariable', [
                $rsid_list,
                $unique_visitor_variable,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveUniqueVisitorVariable;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveVideoReporting
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $rsid_list
     * @return void|bool
     */
    public function ReportSuite_SaveVideoReporting(array $rsid_list)
    {
        try {
            $this->setResult($resultReportSuite_SaveVideoReporting = $this->getSoapClient()->__soapCall('ReportSuite.SaveVideoReporting', [
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultReportSuite_SaveVideoReporting;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.CheckJobStatus
     * Meta information extracted from the WSDL
     * - documentation: Return the current status of a Saint API Job.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $job_id
     * @return \StructType\ApiSaintresult[]|bool
     */
    public function Saint_CheckJobStatus($job_id)
    {
        try {
            $this->setResult($resultSaint_CheckJobStatus = $this->getSoapClient()->__soapCall('Saint.CheckJobStatus', [
                $job_id,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_CheckJobStatus;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.CreateFTP
     * Meta information extracted from the WSDL
     * - documentation: Creates an ftp account for the given parameters and returns the ftp account info
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $description
     * @param string $email
     * @param string $export
     * @param string $overwrite
     * @param string $relation_id
     * @param string[] $rsid_list
     * @return \StructType\ApiSaint_ftp_info|bool
     */
    public function Saint_CreateFTP($description, $email, $export, $overwrite, $relation_id, array $rsid_list)
    {
        try {
            $this->setResult($resultSaint_CreateFTP = $this->getSoapClient()->__soapCall('Saint.CreateFTP', [
                $description,
                $email,
                $export,
                $overwrite,
                $relation_id,
                $rsid_list,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_CreateFTP;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ExportCreateJob
     * Meta information extracted from the WSDL
     * - documentation: Creates Saint Export Job.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $campaign_filter_begin_range
     * @param string $campaign_filter_end_range
     * @param string $campaign_filter_option
     * @param string $date_filter_row_end_date
     * @param string $date_filter_row_start_date
     * @param string $email_address
     * @param string $encoding
     * @param string $relation_id
     * @param string[] $report_suite_array
     * @param string $row_match_filter_empty_column_name
     * @param string $row_match_filter_match_column_name
     * @param string $row_match_filter_match_column_value
     * @param string $select_all_rows
     * @param string $select_number_of_rows
     * @return string|bool
     */
    public function Saint_ExportCreateJob($campaign_filter_begin_range, $campaign_filter_end_range, $campaign_filter_option, $date_filter_row_end_date, $date_filter_row_start_date, $email_address, $encoding, $relation_id, array $report_suite_array, $row_match_filter_empty_column_name, $row_match_filter_match_column_name, $row_match_filter_match_column_value, $select_all_rows, $select_number_of_rows)
    {
        try {
            $this->setResult($resultSaint_ExportCreateJob = $this->getSoapClient()->__soapCall('Saint.ExportCreateJob', [
                $campaign_filter_begin_range,
                $campaign_filter_end_range,
                $campaign_filter_option,
                $date_filter_row_end_date,
                $date_filter_row_start_date,
                $email_address,
                $encoding,
                $relation_id,
                $report_suite_array,
                $row_match_filter_empty_column_name,
                $row_match_filter_match_column_name,
                $row_match_filter_match_column_value,
                $select_all_rows,
                $select_number_of_rows,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_ExportCreateJob;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ExportGetFileSegment
     * Meta information extracted from the WSDL
     * - documentation: Returns the page details of a given file_id
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $file_id
     * @param string $segment_id
     * @return \StructType\ApiPagedetail[]|bool
     */
    public function Saint_ExportGetFileSegment($file_id, $segment_id)
    {
        try {
            $this->setResult($resultSaint_ExportGetFileSegment = $this->getSoapClient()->__soapCall('Saint.ExportGetFileSegment', [
                $file_id,
                $segment_id,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_ExportGetFileSegment;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.GetCompatabiltyMetrics
     * Meta information extracted from the WSDL
     * - documentation: Returns Array of compatability information for a report suite(s),
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string[] $report_suite_array
     * @return \StructType\ApiCompatability[]|bool
     */
    public function Saint_GetCompatabiltyMetrics(array $report_suite_array)
    {
        try {
            $this->setResult($resultSaint_GetCompatabiltyMetrics = $this->getSoapClient()->__soapCall('Saint.GetCompatabiltyMetrics', [
                $report_suite_array,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_GetCompatabiltyMetrics;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.GetFilters
     * Meta information extracted from the WSDL
     * - documentation: Get SAINT export filters.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $relation_id
     * @param string[] $report_suite_array
     * @return \StructType\ApiExport_filter[]|bool
     */
    public function Saint_GetFilters($relation_id, array $report_suite_array)
    {
        try {
            $this->setResult($resultSaint_GetFilters = $this->getSoapClient()->__soapCall('Saint.GetFilters', [
                $relation_id,
                $report_suite_array,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_GetFilters;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.GetTemplate
     * Meta information extracted from the WSDL
     * - documentation: Returns the template to be used in the SAINT browser or FTP download
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $encoding
     * @param int[] $numeric_div_nums
     * @param string $relation_id
     * @param string $report_suite
     * @param int[] $text_div_nums
     * @return string|bool
     */
    public function Saint_GetTemplate($encoding, array $numeric_div_nums, $relation_id, $report_suite, array $text_div_nums)
    {
        try {
            $this->setResult($resultSaint_GetTemplate = $this->getSoapClient()->__soapCall('Saint.GetTemplate', [
                $encoding,
                $numeric_div_nums,
                $relation_id,
                $report_suite,
                $text_div_nums,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_GetTemplate;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ImportCommitJob
     * Meta information extracted from the WSDL
     * - documentation: Commits a specified Saint Import job for processing.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $job_id
     * @return string|bool
     */
    public function Saint_ImportCommitJob($job_id)
    {
        try {
            $this->setResult($resultSaint_ImportCommitJob = $this->getSoapClient()->__soapCall('Saint.ImportCommitJob', [
                $job_id,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_ImportCommitJob;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ImportCreateJob
     * Meta information extracted from the WSDL
     * - documentation: Creates a Saint Import Job
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $check_divisions
     * @param string $description
     * @param string $email_address
     * @param string $export_results
     * @param string[] $header
     * @param string $overwrite_conflicts
     * @param string $relation_id
     * @param string[] $report_suite_array
     * @return int|bool
     */
    public function Saint_ImportCreateJob($check_divisions, $description, $email_address, $export_results, array $header, $overwrite_conflicts, $relation_id, array $report_suite_array)
    {
        try {
            $this->setResult($resultSaint_ImportCreateJob = $this->getSoapClient()->__soapCall('Saint.ImportCreateJob', [
                $check_divisions,
                $description,
                $email_address,
                $export_results,
                $header,
                $overwrite_conflicts,
                $relation_id,
                $report_suite_array,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_ImportCreateJob;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ImportPopulateJob
     * Meta information extracted from the WSDL
     * - documentation: Attaches Import data to a given Saint Import job.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $job_id
     * @param string $page
     * @param \StructType\ApiRow[] $rows
     * @return string|bool
     */
    public function Saint_ImportPopulateJob($job_id, $page, array $rows)
    {
        try {
            $this->setResult($resultSaint_ImportPopulateJob = $this->getSoapClient()->__soapCall('Saint.ImportPopulateJob', [
                $job_id,
                $page,
                $rows,
            ], [], [], $this->outputHeaders));
        
            return $resultSaint_ImportPopulateJob;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ListFTP
     * Meta information extracted from the WSDL
     * - documentation: Returns a list of the ftp accounts configured for this company
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \StructType\ApiSaint_ftp[]|bool
     */
    public function Saint_ListFTP()
    {
        try {
            $this->setResult($resultSaint_ListFTP = $this->getSoapClient()->__soapCall('Saint.ListFTP', [], [], [], $this->outputHeaders));
        
            return $resultSaint_ListFTP;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.CreatePublishedReport
     * Meta information extracted from the WSDL
     * - documentation: Creates a new published report. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $location
     * @param string $product
     * @param \StructType\ApiScheduledReport $scheduledReport
     * @param string $workbook
     * @return \StructType\ApiScheduledReport|bool
     */
    public function Scheduling_CreatePublishedReport($location, $product, \StructType\ApiScheduledReport $scheduledReport, $workbook)
    {
        try {
            $this->setResult($resultScheduling_CreatePublishedReport = $this->getSoapClient()->__soapCall('Scheduling.CreatePublishedReport', [
                $location,
                $product,
                $scheduledReport,
                $workbook,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_CreatePublishedReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.DeletePublishedReport
     * Meta information extracted from the WSDL
     * - documentation: Deletes published reports. (Internal use only)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $product
     * @param int[] $scheduledReportIds
     * @return boolean|bool
     */
    public function Scheduling_DeletePublishedReport($product, array $scheduledReportIds)
    {
        try {
            $this->setResult($resultScheduling_DeletePublishedReport = $this->getSoapClient()->__soapCall('Scheduling.DeletePublishedReport', [
                $product,
                $scheduledReportIds,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_DeletePublishedReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.DeleteWorkbook
     * Meta information extracted from the WSDL
     * - documentation: Deletes workbooks from the library. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $location
     * @param string $product
     * @param string $username
     * @param string[] $workbookNames
     * @return boolean|bool
     */
    public function Scheduling_DeleteWorkbook($location, $product, $username, array $workbookNames)
    {
        try {
            $this->setResult($resultScheduling_DeleteWorkbook = $this->getSoapClient()->__soapCall('Scheduling.DeleteWorkbook', [
                $location,
                $product,
                $username,
                $workbookNames,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_DeleteWorkbook;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.DownloadWorkbook
     * Meta information extracted from the WSDL
     * - documentation: Download a workbook. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $location
     * @param string $productType
     * @param string $username
     * @param string $workbookName
     * @return base64Binary|bool
     */
    public function Scheduling_DownloadWorkbook($location, $productType, $username, $workbookName)
    {
        try {
            $this->setResult($resultScheduling_DownloadWorkbook = $this->getSoapClient()->__soapCall('Scheduling.DownloadWorkbook', [
                $location,
                $productType,
                $username,
                $workbookName,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_DownloadWorkbook;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.GetPublishedReports
     * Meta information extracted from the WSDL
     * - documentation: Get published reports for a user. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $product
     * @param string $username
     * @return \StructType\ApiScheduledReport[]|bool
     */
    public function Scheduling_GetPublishedReports($product, $username)
    {
        try {
            $this->setResult($resultScheduling_GetPublishedReports = $this->getSoapClient()->__soapCall('Scheduling.GetPublishedReports', [
                $product,
                $username,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_GetPublishedReports;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.GetReportsRunHistory
     * Meta information extracted from the WSDL
     * - documentation: Gets a history of reports published by a user.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $limit
     * @param string $offset
     * @param string $product
     * @param string $username
     * @return \StructType\ApiScheduleLog[]|bool
     */
    public function Scheduling_GetReportsRunHistory($limit, $offset, $product, $username)
    {
        try {
            $this->setResult($resultScheduling_GetReportsRunHistory = $this->getSoapClient()->__soapCall('Scheduling.GetReportsRunHistory', [
                $limit,
                $offset,
                $product,
                $username,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_GetReportsRunHistory;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.GetWorkbookList
     * Meta information extracted from the WSDL
     * - documentation: Gets a list of workbooks for a user. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $location
     * @param string $product
     * @return \StructType\ApiExcelWorkbook[]|bool
     */
    public function Scheduling_GetWorkbookList($location, $product)
    {
        try {
            $this->setResult($resultScheduling_GetWorkbookList = $this->getSoapClient()->__soapCall('Scheduling.GetWorkbookList', [
                $location,
                $product,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_GetWorkbookList;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.ReRunReport
     * Meta information extracted from the WSDL
     * - documentation: Re-enables a failed report. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $id
     * @return boolean|bool
     */
    public function Scheduling_ReRunReport($id)
    {
        try {
            $this->setResult($resultScheduling_ReRunReport = $this->getSoapClient()->__soapCall('Scheduling.ReRunReport', [
                $id,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_ReRunReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.UpdatePublishedReport
     * Meta information extracted from the WSDL
     * - documentation: Edits a published report. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $product
     * @param \StructType\ApiScheduledReport $scheduledReport
     * @param string $workbook
     * @return \StructType\ApiScheduledReport|bool
     */
    public function Scheduling_UpdatePublishedReport($product, \StructType\ApiScheduledReport $scheduledReport, $workbook)
    {
        try {
            $this->setResult($resultScheduling_UpdatePublishedReport = $this->getSoapClient()->__soapCall('Scheduling.UpdatePublishedReport', [
                $product,
                $scheduledReport,
                $workbook,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_UpdatePublishedReport;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.UploadWorkbook
     * Meta information extracted from the WSDL
     * - documentation: Uploads a Workbook. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $description
     * @param string $filename
     * @param string $location
     * @param string $product
     * @param string $workbook
     * @return boolean|bool
     */
    public function Scheduling_UploadWorkbook($description, $filename, $location, $product, $workbook)
    {
        try {
            $this->setResult($resultScheduling_UploadWorkbook = $this->getSoapClient()->__soapCall('Scheduling.UploadWorkbook', [
                $description,
                $filename,
                $location,
                $product,
                $workbook,
            ], [], [], $this->outputHeaders));
        
            return $resultScheduling_UploadWorkbook;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named Survey.GetSummaryList
     * Meta information extracted from the WSDL
     * - documentation: Returns the list of current surveys created for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @param string $status_filter
     * @return \StructType\ApiSurvey_summary[]|bool
     */
    public function Survey_GetSummaryList($rsid, $status_filter)
    {
        try {
            $this->setResult($resultSurvey_GetSummaryList = $this->getSoapClient()->__soapCall('Survey.GetSummaryList', [
                $rsid,
                $status_filter,
            ], [], [], $this->outputHeaders));
        
            return $resultSurvey_GetSummaryList;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named User.GetBookmarkFolders
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the folders the user has on their menu.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $limit
     * @return \StructType\ApiFormatted_folder[]|bool
     */
    public function User_GetBookmarkFolders($limit)
    {
        try {
            $this->setResult($resultUser_GetBookmarkFolders = $this->getSoapClient()->__soapCall('User.GetBookmarkFolders', [
                $limit,
            ], [], [], $this->outputHeaders));
        
            return $resultUser_GetBookmarkFolders;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named User.GetDashboardsAPI
     * Meta information extracted from the WSDL
     * - documentation: Retrieves a list of dashboards accessible by the user.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $limit
     * @return \StructType\ApiDashboard_element[]|bool
     */
    public function User_GetDashboardsAPI($limit)
    {
        try {
            $this->setResult($resultUser_GetDashboardsAPI = $this->getSoapClient()->__soapCall('User.GetDashboardsAPI', [
                $limit,
            ], [], [], $this->outputHeaders));
        
            return $resultUser_GetDashboardsAPI;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named User.GetLastUsedReportSuite
     * Meta information extracted from the WSDL
     * - documentation: Retrieves the last used report suite by the user.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \StructType\ApiReport_suite_id|bool
     */
    public function User_GetLastUsedReportSuite()
    {
        try {
            $this->setResult($resultUser_GetLastUsedReportSuite = $this->getSoapClient()->__soapCall('User.GetLastUsedReportSuite', [], [], [], $this->outputHeaders));
        
            return $resultUser_GetLastUsedReportSuite;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Method to call the operation originally named User.LoginEmailExists
     * Meta information extracted from the WSDL
     * - documentation: Determines if the supplied email address exists is tied to a Suite login.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $emailAddress
     * @return boolean|bool
     */
    public function User_LoginEmailExists($emailAddress)
    {
        try {
            $this->setResult($resultUser_LoginEmailExists = $this->getSoapClient()->__soapCall('User.LoginEmailExists', [
                $emailAddress,
            ], [], [], $this->outputHeaders));
        
            return $resultUser_LoginEmailExists;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return array|base64Binary|boolean|int|string|string[]|void|\StructType\ApiChannel_sub_relations_element|\StructType\ApiCode_archive[]|\StructType\ApiCode_item[]|\StructType\ApiCompatability[]|\StructType\ApiCrm_info|\StructType\ApiDashboard_element|\StructType\ApiDashboard_element[]|\StructType\ApiDataSourceInfo[]|\StructType\ApiData_warehouse_report|\StructType\ApiData_warehouse_request|\StructType\ApiData_warehouse_segment|\StructType\ApiDsFileStruct[]|\StructType\ApiDs_setup_result|\StructType\ApiDwsegment[]|\StructType\ApiExcelWorkbook[]|\StructType\ApiExpiration_event[]|\StructType\ApiExport_filter[]|\StructType\ApiFileIDResult|\StructType\ApiFileStatusResult|\StructType\ApiFormatted_folder[]|\StructType\ApiGroup_data|\StructType\ApiLogin|\StructType\ApiLog_entry[]|\StructType\ApiMchannels[]|\StructType\ApiPagedetail[]|\StructType\ApiParent_category[]|\StructType\ApiPermanent_traffic[]|\StructType\ApiPermissions_account[]|\StructType\ApiPermissions_account_groups|\StructType\ApiPermission_group[]|\StructType\ApiPerm_login[]|\StructType\ApiPublishingList[]|\StructType\ApiQueue_item[]|\StructType\ApiReportBuilderLogin|\StructType\ApiReportlet|\StructType\ApiReportQueueResponse|\StructType\ApiReportResponse|\StructType\ApiReport_element_mapping[]|\StructType\ApiReport_queue_item[]|\StructType\ApiReport_status|\StructType\ApiReport_suite_activation[]|\StructType\ApiReport_suite_base_currency[]|\StructType\ApiReport_suite_base_url[]|\StructType\ApiReport_suite_calculated_metric[]|\StructType\ApiReport_suite_classification[]|\StructType\ApiReport_suite_correlation[]|\StructType\ApiReport_suite_costs[]|\StructType\ApiReport_suite_custom_calendar[]|\StructType\ApiReport_suite_default_page[]|\StructType\ApiReport_suite_ecommerce[]|\StructType\ApiReport_suite_elements[]|\StructType\ApiReport_suite_evar[]|\StructType\ApiReport_suite_event[]|\StructType\ApiReport_suite_finding_method[]|\StructType\ApiReport_suite_hierarchies[]|\StructType\ApiReport_suite_id|\StructType\ApiReport_suite_internal_url_filter[]|\StructType\ApiReport_suite_ip_exclusions[]|\StructType\ApiReport_suite_ip_obfuscation[]|\StructType\ApiReport_suite_key_visitor[]|\StructType\ApiReport_suite_localization[]|\StructType\ApiReport_suite_metrics[]|\StructType\ApiReport_suite_pages[]|\StructType\ApiReport_suite_paid_search[]|\StructType\ApiReport_suite_processing_status[]|\StructType\ApiReport_suite_rollup_dates[]|\StructType\ApiReport_suite_settings[]|\StructType\ApiReport_suite_site_title[]|\StructType\ApiReport_suite_template[]|\StructType\ApiReport_suite_time_zone[]|\StructType\ApiReport_suite_traffic_var[]|\StructType\ApiReport_suite_ui_element[]|\StructType\ApiReport_suite_unique_visitor_variable[]|\StructType\ApiReport_suite_video_tracking[]|\StructType\ApiRollup[]|\StructType\ApiRs_axle_start_date[]|\StructType\ApiRs_mchannel_rulesets[]|\StructType\ApiRs_sc_segments[]|\StructType\ApiSaintresult[]|\StructType\ApiSaint_ftp[]|\StructType\ApiSaint_ftp_info|\StructType\ApiSaved_filter[]|\StructType\ApiScheduledReport|\StructType\ApiScheduledReport[]|\StructType\ApiScheduleLog[]|\StructType\ApiSchedule_spike[]|\StructType\ApiSegment_folder[]|\StructType\ApiSimpleDataSource[]|\StructType\ApiSimple_report_suites_rval|\StructType\ApiStatus|\StructType\ApiSurvey_summary[]|\StructType\ApiToken_usage_container|\StructType\ApiTracking_server_data|\StructType\ApiUsage_log_entry[]
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
