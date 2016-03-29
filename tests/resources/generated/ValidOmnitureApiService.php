<?php

namespace Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

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
     * Meta informations extracted from the WSDL
     * - documentation: Delete page code.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $archive_id
     * @return int|bool
     */
    public function CodeManager_DeleteCodeArchive($archive_id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('CodeManager.DeleteCodeArchive', array(
                $archive_id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named CodeManager.GenerateCode
     * Meta informations extracted from the WSDL
     * - documentation: Generates page code.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $char_set
     * @param string $code_type
     * @param string $cookie_domain_periods
     * @param string $currency_code
     * @param string $rsid
     * @param string $secure
     * @return code_items|bool
     */
    public function CodeManager_GenerateCode($char_set, $code_type, $cookie_domain_periods, $currency_code, $rsid, $secure)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('CodeManager.GenerateCode', array(
                $char_set,
                $code_type,
                $cookie_domain_periods,
                $currency_code,
                $rsid,
                $secure,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named CodeManager.GetCodeArchives
     * Meta informations extracted from the WSDL
     * - documentation: Returns a list of existing code archives.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $archive_id_list
     * @param string $binary_encoding
     * @param string $populate_code_items
     * @return code_archives|bool
     */
    public function CodeManager_GetCodeArchives($archive_id_list, $binary_encoding, $populate_code_items)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('CodeManager.GetCodeArchives', array(
                $archive_id_list,
                $binary_encoding,
                $populate_code_items,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named CodeManager.SaveCodeArchive
     * Meta informations extracted from the WSDL
     * - documentation: Saves a page code archive.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $archive_description
     * @param string $archive_id
     * @param string $archive_name
     * @param string $code
     * @return int|bool
     */
    public function CodeManager_SaveCodeArchive($archive_description, $archive_id, $archive_name, $code)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('CodeManager.SaveCodeArchive', array(
                $archive_description,
                $archive_id,
                $archive_name,
                $code,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.CancelQueueItem
     * Meta informations extracted from the WSDL
     * - documentation: Cancel a pending (queued) action that has yet to be approved.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $qid
     * @return int|bool
     */
    public function Company_CancelQueueItem($qid)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.CancelQueueItem', array(
                $qid,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.DownloadProduct
     * Meta informations extracted from the WSDL
     * - documentation: Downloads a product. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $productType
     * @return base64Binary|bool
     */
    public function Company_DownloadProduct($productType)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.DownloadProduct', array(
                $productType,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetEndpoint
     * Meta informations extracted from the WSDL
     * - documentation: Returns the correct SOAP endpoint to be used for API calls
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $company
     * @return string|bool
     */
    public function Company_GetEndpoint($company)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.GetEndpoint', array(
                $company,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetQueue
     * Meta informations extracted from the WSDL
     * - documentation: Returns queued items that are pending approval for the requesting company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return queue_items|bool
     */
    public function Company_GetQueue()
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.GetQueue'));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetReportSuites
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves all report suites associated with your company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rs_types
     * @param string $sp
     * @return \Api\StructType\ApiSimple_report_suites_rval|bool
     */
    public function Company_GetReportSuites($rs_types, $sp)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.GetReportSuites', array(
                $rs_types,
                $sp,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetTokenCount
     * Meta informations extracted from the WSDL
     * - documentation: Returns remaining tokens for a given auth key (note that this call also consumes a token).
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return int|bool
     */
    public function Company_GetTokenCount()
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.GetTokenCount'));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetTokenUsage
     * Meta informations extracted from the WSDL
     * - documentation: Returns token usage information (note that this call also consumes a token).
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \Api\StructType\ApiToken_usage_container|bool
     */
    public function Company_GetTokenUsage()
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.GetTokenUsage'));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetTrackingServer
     * Meta informations extracted from the WSDL
     * - documentation: Returns the tracking server and namespace for the given report suite
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @return \Api\StructType\ApiTracking_server_data|bool
     */
    public function Company_GetTrackingServer($rsid)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.GetTrackingServer', array(
                $rsid,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.GetVersionAccess
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves version access for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return string[]|bool
     */
    public function Company_GetVersionAccess()
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.GetVersionAccess'));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Company.ResetTokenCount
     * Meta informations extracted from the WSDL
     * - documentation: Resets the token count for the given auth key.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $auth_key
     * @return int|bool
     */
    public function Company_ResetTokenCount($auth_key)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Company.ResetTokenCount', array(
                $auth_key,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Dashboards.GetDashboardAPI
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves a list of reportlets owned by the given dashboard.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dashboard_id
     * @param string $dashboard_type
     * @return \Api\StructType\ApiDashboard_element|bool
     */
    public function Dashboards_GetDashboardAPI($dashboard_id, $dashboard_type)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Dashboards.GetDashboardAPI', array(
                $dashboard_id,
                $dashboard_type,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Dashboards.GetReportletDataAPI
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves data for a given reportlet.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportlet_id
     * @return \Api\StructType\ApiReportlet|bool
     */
    public function Dashboards_GetReportletDataAPI($reportlet_id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Dashboards.GetReportletDataAPI', array(
                $reportlet_id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.AppendDataBlock
     * Meta informations extracted from the WSDL
     * - documentation: Add rows of data to and optionally end a block of data begun by a BeginDataBlock call
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $blockID
     * @param string $dataSourceID
     * @param string $endOfBlock
     * @param string $reportSuiteID
     * @param string $rows
     * @return array|bool
     */
    public function DataSource_AppendDataBlock($blockID, $dataSourceID, $endOfBlock, $reportSuiteID, $rows)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.AppendDataBlock', array(
                $blockID,
                $dataSourceID,
                $endOfBlock,
                $reportSuiteID,
                $rows,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.BeginDataBlock
     * Meta informations extracted from the WSDL
     * - documentation: Begin and optionally end a block of data to be inserted into the Data Sources processing queue
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $blockName
     * @param string $columnNames
     * @param string $dataSourceID
     * @param string $endOfBlock
     * @param string $reportSuiteID
     * @param string $rows
     * @return array|bool
     */
    public function DataSource_BeginDataBlock($blockName, $columnNames, $dataSourceID, $endOfBlock, $reportSuiteID, $rows)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.BeginDataBlock', array(
                $blockName,
                $columnNames,
                $dataSourceID,
                $endOfBlock,
                $reportSuiteID,
                $rows,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.Deactivate
     * Meta informations extracted from the WSDL
     * - documentation: Deactivates a Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiStatus|bool
     */
    public function DataSource_Deactivate($dataSourceID, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.Deactivate', array(
                $dataSourceID,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetFileIDs
     * Meta informations extracted from the WSDL
     * - documentation: Returns array of file ids for a given data source id.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $filter
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiFileIDResult|bool
     */
    public function DataSource_GetFileIDs($dataSourceID, $filter, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.GetFileIDs', array(
                $dataSourceID,
                $filter,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetFileInfo
     * Meta informations extracted from the WSDL
     * - documentation: Returns dataSource file status information.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $filter
     * @param string $reportSuiteID
     * @return fileInfoResult|bool
     */
    public function DataSource_GetFileInfo($dataSourceID, $filter, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.GetFileInfo', array(
                $dataSourceID,
                $filter,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetFileStatus
     * Meta informations extracted from the WSDL
     * - documentation: Returns dataSource file status information.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceFileID
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiFileStatusResult|bool
     */
    public function DataSource_GetFileStatus($dataSourceFileID, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.GetFileStatus', array(
                $dataSourceFileID,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetIDs
     * Meta informations extracted from the WSDL
     * - documentation: Returns a list of data sources that belong to the specified report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiSimpleDataSource[]|bool
     */
    public function DataSource_GetIDs($reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.GetIDs', array(
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.GetInfo
     * Meta informations extracted from the WSDL
     * - documentation: Returns dataSource file status information.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $filter
     * @param string $reportSuiteID
     * @return infoResult|bool
     */
    public function DataSource_GetInfo($filter, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.GetInfo', array(
                $filter,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.ProcessIncompleteVisits
     * Meta informations extracted from the WSDL
     * - documentation: Processes incomplete visits for a DataSource
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiStatus|bool
     */
    public function DataSource_ProcessIncompleteVisits($dataSourceID, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.ProcessIncompleteVisits', array(
                $dataSourceID,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.Restart
     * Meta informations extracted from the WSDL
     * - documentation: Sets DataSource file state to processing.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiStatus|bool
     */
    public function DataSource_Restart($dataSourceID, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.Restart', array(
                $dataSourceID,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.SetupFull
     * Meta informations extracted from the WSDL
     * - documentation: Creates or modifies a Full Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param \Api\StructType\ApiDs_full_settings $dataSourceSettings
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiDs_setup_result|bool
     */
    public function DataSource_SetupFull($dataSourceID, \Api\StructType\ApiDs_full_settings $dataSourceSettings, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.SetupFull', array(
                $dataSourceID,
                $dataSourceSettings,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.SetupGeneric
     * Meta informations extracted from the WSDL
     * - documentation: Creates or modifies a Generic Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param \Api\StructType\ApiDs_generic_settings $dataSourceSettings
     * @param string $dataSourceType
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiDs_setup_result|bool
     */
    public function DataSource_SetupGeneric($dataSourceID, \Api\StructType\ApiDs_generic_settings $dataSourceSettings, $dataSourceType, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.SetupGeneric', array(
                $dataSourceID,
                $dataSourceSettings,
                $dataSourceType,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.SetupTraffic
     * Meta informations extracted from the WSDL
     * - documentation: Creates or modifies a Traffic Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param \Api\StructType\ApiDs_traffic_settings $dataSourceSettings
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiDs_setup_result|bool
     */
    public function DataSource_SetupTraffic($dataSourceID, \Api\StructType\ApiDs_traffic_settings $dataSourceSettings, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.SetupTraffic', array(
                $dataSourceID,
                $dataSourceSettings,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataSource.SetupWebLog
     * Meta informations extracted from the WSDL
     * - documentation: Creates or modifies a Webserver Log Data Source.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dataSourceID
     * @param \Api\StructType\ApiDs_weblog_settings $dataSourceSettings
     * @param string $reportSuiteID
     * @return \Api\StructType\ApiDs_setup_result|bool
     */
    public function DataSource_SetupWebLog($dataSourceID, \Api\StructType\ApiDs_weblog_settings $dataSourceSettings, $reportSuiteID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataSource.SetupWebLog', array(
                $dataSourceID,
                $dataSourceSettings,
                $reportSuiteID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.CancelRequest
     * Meta informations extracted from the WSDL
     * - documentation: Cancels a Data Warehouse Request.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $request_Id
     * @return string|bool
     */
    public function DataWarehouse_CancelRequest($request_Id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataWarehouse.CancelRequest', array(
                $request_Id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.CheckRequest
     * Meta informations extracted from the WSDL
     * - documentation: Checks the status of a Data Warehouse Request.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $request_Id
     * @return \Api\StructType\ApiData_warehouse_request|bool
     */
    public function DataWarehouse_CheckRequest($request_Id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataWarehouse.CheckRequest', array(
                $request_Id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.CreateSegment
     * Meta informations extracted from the WSDL
     * - documentation: Create a new data warehouse segment
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $hidden
     * @param string $rsid
     * @param \Api\StructType\ApiData_warehouse_segment $segment
     * @return int|bool
     */
    public function DataWarehouse_CreateSegment($hidden, $rsid, \Api\StructType\ApiData_warehouse_segment $segment)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataWarehouse.CreateSegment', array(
                $hidden,
                $rsid,
                $segment,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.GetReportData
     * Meta informations extracted from the WSDL
     * - documentation: Obtain content for the given request
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $request_Id
     * @param string $rsid
     * @param string $start_row
     * @return \Api\StructType\ApiData_warehouse_report|bool
     */
    public function DataWarehouse_GetReportData($request_Id, $rsid, $start_row)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataWarehouse.GetReportData', array(
                $request_Id,
                $rsid,
                $start_row,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.GetSegment
     * Meta informations extracted from the WSDL
     * - documentation: Obtain a description of an existing data warehouse segment
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @param string $segment
     * @return \Api\StructType\ApiData_warehouse_segment|bool
     */
    public function DataWarehouse_GetSegment($rsid, $segment)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataWarehouse.GetSegment', array(
                $rsid,
                $segment,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.GetSegments
     * Meta informations extracted from the WSDL
     * - documentation: Gets available segments.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @return dwsegments|bool
     */
    public function DataWarehouse_GetSegments($rsid)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataWarehouse.GetSegments', array(
                $rsid,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.ReplaceSegment
     * Meta informations extracted from the WSDL
     * - documentation: Replace a data warehouse segment of the given id with the given segment.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $id
     * @param string $rsid
     * @param \Api\StructType\ApiData_warehouse_segment $segment
     * @return int|bool
     */
    public function DataWarehouse_ReplaceSegment($id, $rsid, \Api\StructType\ApiData_warehouse_segment $segment)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataWarehouse.ReplaceSegment', array(
                $id,
                $rsid,
                $segment,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.Request
     * Meta informations extracted from the WSDL
     * - documentation: Creates a Data Warehouse Request.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $breakdown_List
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
     * @param string $metric_List
     * @param string $report_Description
     * @param string $report_Name
     * @param string $segment_Id
     * @param string $rsid
     * @return int|bool
     */
    public function DataWarehouse_Request($breakdown_List, $contact_Name, $contact_Phone, $date_From, $date_Granularity, $date_Preset, $date_To, $date_Type, $email_Subject, $email_To, $fTP_Dir, $fTP_Host, $fTP_Password, $fTP_Port, $fTP_UserName, $file_Name, $metric_List, $report_Description, $report_Name, $segment_Id, $rsid)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataWarehouse.Request', array(
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
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DataWarehouse.VerifySegment
     * Meta informations extracted from the WSDL
     * - documentation: Verify the correctness of the given data warehouse segment
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiData_warehouse_segment $segment
     * @return boolean|bool
     */
    public function DataWarehouse_VerifySegment(\Api\StructType\ApiData_warehouse_segment $segment)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DataWarehouse.VerifySegment', array(
                $segment,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DeliveryList.Delete
     * Meta informations extracted from the WSDL
     * - documentation: Delete a distribution list.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $dist_list_id
     * @return int|bool
     */
    public function DeliveryList_Delete($dist_list_id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DeliveryList.Delete', array(
                $dist_list_id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DeliveryList.Get
     * Meta informations extracted from the WSDL
     * - documentation: Gets Publishing list.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $search_name
     * @return \Api\StructType\ApiPublishingList[]|bool
     */
    public function DeliveryList_Get($search_name)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DeliveryList.Get', array(
                $search_name,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named DeliveryList.Save
     * Meta informations extracted from the WSDL
     * - documentation: Save delivery list.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $delivery_list_name
     * @param string $dist_list_id
     * @return int|bool
     */
    public function DeliveryList_Save($delivery_list_name, $dist_list_id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('DeliveryList.Save', array(
                $delivery_list_name,
                $dist_list_id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Discover.GetSegments
     * Meta informations extracted from the WSDL
     * - documentation: Retrieve a list of Discover segments for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $end_date
     * @param string $rsid
     * @param string $start_date
     * @return segment_folders|bool
     */
    public function Discover_GetSegments($end_date, $rsid, $start_date)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Discover.GetSegments', array(
                $end_date,
                $rsid,
                $start_date,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Discover.QueueDiscoverOvertime
     * Meta informations extracted from the WSDL
     * - documentation: Queue a Discover overtime report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return \Api\StructType\ApiReportQueueResponse|bool
     */
    public function Discover_QueueDiscoverOvertime(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Discover.QueueDiscoverOvertime', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Discover.QueueDiscoverRanked
     * Meta informations extracted from the WSDL
     * - documentation: Queue a Discover ranked report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return \Api\StructType\ApiReportQueueResponse|bool
     */
    public function Discover_QueueDiscoverRanked(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Discover.QueueDiscoverRanked', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Discover.QueueDiscoverTrended
     * Meta informations extracted from the WSDL
     * - documentation: Queue a Discover trended report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return \Api\StructType\ApiReportQueueResponse|bool
     */
    public function Discover_QueueDiscoverTrended(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Discover.QueueDiscoverTrended', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Logs.GetAdminConsoleCompanyLog
     * Meta informations extracted from the WSDL
     * - documentation: Get console logs.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $company
     * @param string $end_date
     * @param string $filter_rule
     * @param string $filters
     * @param string $rsid_list
     * @param string $start_date
     * @return log_entries|bool
     */
    public function Logs_GetAdminConsoleCompanyLog($company, $end_date, $filter_rule, $filters, $rsid_list, $start_date)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Logs.GetAdminConsoleCompanyLog', array(
                $company,
                $end_date,
                $filter_rule,
                $filters,
                $rsid_list,
                $start_date,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Logs.GetAdminConsoleLog
     * Meta informations extracted from the WSDL
     * - documentation: Get console logs.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $company
     * @param string $end_date
     * @param string $filter_rule
     * @param string $filters
     * @param string $rsid_list
     * @param string $start_date
     * @return log_entries|bool
     */
    public function Logs_GetAdminConsoleLog($company, $end_date, $filter_rule, $filters, $rsid_list, $start_date)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Logs.GetAdminConsoleLog', array(
                $company,
                $end_date,
                $filter_rule,
                $filters,
                $rsid_list,
                $start_date,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Logs.GetUsageLog
     * Meta informations extracted from the WSDL
     * - documentation: Retrieve usage log information for the given company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $date_from
     * @param string $date_to
     * @param string $event_details
     * @param string $event_type
     * @param string $ip
     * @param string $login
     * @param string $report_suite
     * @return usage_log_entries|bool
     */
    public function Logs_GetUsageLog($date_from, $date_to, $event_details, $event_type, $ip, $login, $report_suite)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Logs.GetUsageLog', array(
                $date_from,
                $date_to,
                $event_details,
                $event_type,
                $ip,
                $login,
                $report_suite,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.AddLogin
     * Meta informations extracted from the WSDL
     * - documentation: Creates a new login for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
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
     * @param string $selected_group_list
     * @param string $temp_login
     * @param string $temp_login_end
     * @param string $temp_login_start
     * @param string $title
     * @return int|bool
     */
    public function Permissions_AddLogin($admin, $change_password, $create_dashboards, $dashboard_rsid, $email, $first_name, $last_name, $login, $password, $phone_number, $selected_group_list, $temp_login, $temp_login_end, $temp_login_start, $title)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.AddLogin', array(
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
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.Authenticate
     * Meta informations extracted from the WSDL
     * - documentation: Indicates whether or not the login is valid for this company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $login
     * @param string $password
     * @return boolean|bool
     */
    public function Permissions_Authenticate($login, $password)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.Authenticate', array(
                $login,
                $password,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.DeleteGroup
     * Meta informations extracted from the WSDL
     * - documentation: Removes the requested group from the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $groupid
     * @return int|bool
     */
    public function Permissions_DeleteGroup($groupid)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.DeleteGroup', array(
                $groupid,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.DeleteLogin
     * Meta informations extracted from the WSDL
     * - documentation: Removes a user login from the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $login
     * @return int|bool
     */
    public function Permissions_DeleteLogin($login)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.DeleteLogin', array(
                $login,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetCRMInfo
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves CRM login information for a specific user.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $company
     * @param string $login
     * @return \Api\StructType\ApiCrm_info|bool
     */
    public function Permissions_GetCRMInfo($company, $login)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.GetCRMInfo', array(
                $company,
                $login,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetCategories
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves subgroups for a category.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $categoryid
     * @param string $groupid
     * @return perm_categories|bool
     */
    public function Permissions_GetCategories($categoryid, $groupid)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.GetCategories', array(
                $categoryid,
                $groupid,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetGroup
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves information about a particular group.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $group_type
     * @param string $groupid
     * @return \Api\StructType\ApiGroup_data|bool
     */
    public function Permissions_GetGroup($group_type, $groupid)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.GetGroup', array(
                $group_type,
                $groupid,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetGroups
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves all available groups for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $field
     * @param string $search
     * @return \Api\StructType\ApiPermission_group[]|bool
     */
    public function Permissions_GetGroups($field, $search)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.GetGroups', array(
                $field,
                $search,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetLogin
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves a user login for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $login
     * @return \Api\StructType\ApiLogin|bool
     */
    public function Permissions_GetLogin($login)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.GetLogin', array(
                $login,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetLogins
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves user logins for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $login_search_field
     * @param string $login_search_value
     * @return \Api\StructType\ApiPerm_login[]|bool
     */
    public function Permissions_GetLogins($login_search_field, $login_search_value)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.GetLogins', array(
                $login_search_field,
                $login_search_value,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetReportBuilderLogin
     * Meta informations extracted from the WSDL
     * - documentation: ReportBuilder login (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $locale
     * @return \Api\StructType\ApiReportBuilderLogin|bool
     */
    public function Permissions_GetReportBuilderLogin($locale)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.GetReportBuilderLogin', array(
                $locale,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * Permissions.GetReportSuiteGroupCount
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves all available accounts for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $search_field
     * @param string $search_val
     * @return \Api\StructType\ApiPermissions_account[]|bool
     */
    public function Permissions_GetReportSuiteGroupCount($search_field, $search_val)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.GetReportSuiteGroupCount', array(
                $search_field,
                $search_val,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.GetReportSuiteGroups
     * Meta informations extracted from the WSDL
     * - documentation: Returns the groups that this report suite is a part of.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @return \Api\StructType\ApiPermissions_account_groups|bool
     */
    public function Permissions_GetReportSuiteGroups($rsid)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.GetReportSuiteGroups', array(
                $rsid,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.HasPrivilege
     * Meta informations extracted from the WSDL
     * - documentation: Determines if the current user has the given privilegeToken
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $privilegeToken
     * @return string|bool
     */
    public function Permissions_HasPrivilege($privilegeToken)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.HasPrivilege', array(
                $privilegeToken,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.SaveGroup
     * Meta informations extracted from the WSDL
     * - documentation: Saves group setting - if the group does not exist it creates a new one.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $group_description
     * @param string $group_name
     * @param string $group_type
     * @param string $groupid
     * @param string $perm_info
     * @param \Api\StructType\ApiReport_categories $report_access_list
     * @param string $report_id_list
     * @param string $rsid_list
     * @param string $user_list
     * @return int|bool
     */
    public function Permissions_SaveGroup($group_description, $group_name, $group_type, $groupid, $perm_info, \Api\StructType\ApiReport_categories $report_access_list, $report_id_list, $rsid_list, $user_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.SaveGroup', array(
                $group_description,
                $group_name,
                $group_type,
                $groupid,
                $perm_info,
                $report_access_list,
                $report_id_list,
                $rsid_list,
                $user_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.SaveLogin
     * Meta informations extracted from the WSDL
     * - documentation: Saves the login for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $admin
     * @param string $change_password
     * @param string $email
     * @param string $first_name
     * @param string $last_name
     * @param string $login
     * @param string $password
     * @param string $phone_number
     * @param string $selected_group_list
     * @param string $send_welcome_email
     * @param string $temp_end_date
     * @param string $temp_login
     * @param string $temp_start_date
     * @param string $title
     * @return int|bool
     */
    public function Permissions_SaveLogin($admin, $change_password, $email, $first_name, $last_name, $login, $password, $phone_number, $selected_group_list, $send_welcome_email, $temp_end_date, $temp_login, $temp_start_date, $title)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.SaveLogin', array(
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
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Permissions.SaveReportSuiteGroups
     * Meta informations extracted from the WSDL
     * - documentation: Assigns the provided groups to the indicated report suite ID.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @param string $selected_groups
     * @return int|bool
     */
    public function Permissions_SaveReportSuiteGroups($rsid, $selected_groups)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Permissions.SaveReportSuiteGroups', array(
                $rsid,
                $selected_groups,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.CancelReport
     * Meta informations extracted from the WSDL
     * - documentation: Cancel a report request.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportID
     * @return int|bool
     */
    public function Report_CancelReport($reportID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.CancelReport', array(
                $reportID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetElementNames
     * Meta informations extracted from the WSDL
     * - documentation: Retrieve element names
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return report_element_mappings|bool
     */
    public function Report_GetElementNames(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.GetElementNames', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetOvertimeReport
     * Meta informations extracted from the WSDL
     * - documentation: Runs an overtime report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return \Api\StructType\ApiReportResponse|bool
     */
    public function Report_GetOvertimeReport(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.GetOvertimeReport', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetRankedReport
     * Meta informations extracted from the WSDL
     * - documentation: Runs a ranked report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return \Api\StructType\ApiReportResponse|bool
     */
    public function Report_GetRankedReport(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.GetRankedReport', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetReport
     * Meta informations extracted from the WSDL
     * - documentation: Get status and data for a queued report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportID
     * @return \Api\StructType\ApiReportResponse|bool
     */
    public function Report_GetReport($reportID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.GetReport', array(
                $reportID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetReportQueue
     * Meta informations extracted from the WSDL
     * - documentation: Retrieve the report queue for a given company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return report_queue|bool
     */
    public function Report_GetReportQueue()
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.GetReportQueue'));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetStatus
     * Meta informations extracted from the WSDL
     * - documentation: Get status for a queued report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reportID
     * @return \Api\StructType\ApiReport_status|bool
     */
    public function Report_GetStatus($reportID)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.GetStatus', array(
                $reportID,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.GetTrendedReport
     * Meta informations extracted from the WSDL
     * - documentation: Runs a trended report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return \Api\StructType\ApiReportResponse|bool
     */
    public function Report_GetTrendedReport(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.GetTrendedReport', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.QueueOvertime
     * Meta informations extracted from the WSDL
     * - documentation: Queue an overtime report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return \Api\StructType\ApiReportQueueResponse|bool
     */
    public function Report_QueueOvertime(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.QueueOvertime', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.QueueRanked
     * Meta informations extracted from the WSDL
     * - documentation: Queue an ranked report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return \Api\StructType\ApiReportQueueResponse|bool
     */
    public function Report_QueueRanked(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.QueueRanked', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.QueueSCMRanked
     * Meta informations extracted from the WSDL
     * - documentation: Queue a ranked report that is optimized for SearchCenter classifications.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiSCM_reportDescription $reportDescription
     * @return \Api\StructType\ApiReportQueueResponse|bool
     */
    public function Report_QueueSCMRanked(\Api\StructType\ApiSCM_reportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.QueueSCMRanked', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Report.QueueTrended
     * Meta informations extracted from the WSDL
     * - documentation: Queue an trended report.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiReportDescription $reportDescription
     * @return \Api\StructType\ApiReportQueueResponse|bool
     */
    public function Report_QueueTrended(\Api\StructType\ApiReportDescription $reportDescription)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Report.QueueTrended', array(
                $reportDescription,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.AddCorrelations
     * Meta informations extracted from the WSDL
     * - documentation: Saves the given correlation for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rel_ids
     * @param string $rsid_list
     * @param string $size
     * @return int|bool
     */
    public function ReportSuite_AddCorrelations($rel_ids, $rsid_list, $size)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.AddCorrelations', array(
                $rel_ids,
                $rsid_list,
                $size,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.AddInternalURLFilters
     * Meta informations extracted from the WSDL
     * - documentation: Adds the internal URL filters for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $filters
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_AddInternalURLFilters($filters, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.AddInternalURLFilters', array(
                $filters,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.AddKeyVisitors
     * Meta informations extracted from the WSDL
     * - documentation: Adds a key visitors for the selected report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $key_visitors
     * @param string $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_AddKeyVisitors($key_visitors, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.AddKeyVisitors', array(
                $key_visitors,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.AddSavedFilters
     * Meta informations extracted from the WSDL
     * - documentation: Saves filter. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $savedFilters
     * @return \Api\StructType\ApiSaved_filter[]|bool
     */
    public function ReportSuite_AddSavedFilters($savedFilters)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.AddSavedFilters', array(
                $savedFilters,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.Create
     * Meta informations extracted from the WSDL
     * - documentation: Creates a new report suite with the values specified
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
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
            $this->setResult(self::getSoapClient()->__call('ReportSuite.Create', array(
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
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteBaseURL
     * Meta informations extracted from the WSDL
     * - documentation: Deletes the base URL for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteBaseURL($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteBaseURL', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteCalculatedMetrics
     * Meta informations extracted from the WSDL
     * - documentation: Deletes a calculated metric for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $calculated_metrics
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteCalculatedMetrics($calculated_metrics, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteCalculatedMetrics', array(
                $calculated_metrics,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteClassifications
     * Meta informations extracted from the WSDL
     * - documentation: Deletes a classification for one report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $c_view
     * @param string $div_num
     * @param string $parent_div_num
     * @param string $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_DeleteClassifications($c_view, $div_num, $parent_div_num, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteClassifications', array(
                $c_view,
                $div_num,
                $parent_div_num,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteCorrelations
     * Meta informations extracted from the WSDL
     * - documentation: Deletes the specified data correlations
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rel_ids
     * @param string $rsid_list
     * @param string $size
     * @return boolean|bool
     */
    public function ReportSuite_DeleteCorrelations($rel_ids, $rsid_list, $size)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteCorrelations', array(
                $rel_ids,
                $rsid_list,
                $size,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteDefaultPage
     * Meta informations extracted from the WSDL
     * - documentation: Deletes the default page for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteDefaultPage($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteDefaultPage', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteIPAddressExclusions
     * Meta informations extracted from the WSDL
     * - documentation: Delete an IP exclusion entry for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $ip_list
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteIPAddressExclusions($ip_list, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteIPAddressExclusions', array(
                $ip_list,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteInternalURLFilters
     * Meta informations extracted from the WSDL
     * - documentation: Deletes the specified internal URL filters
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $filters
     * @param string $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_DeleteInternalURLFilters($filters, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteInternalURLFilters', array(
                $filters,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteKeyVisitors
     * Meta informations extracted from the WSDL
     * - documentation: deletes a list of key visitors for the selected report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $key_visitors
     * @param string $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_DeleteKeyVisitors($key_visitors, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteKeyVisitors', array(
                $key_visitors,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteMarketingChannelCost
     * Meta informations extracted from the WSDL
     * - documentation: Deletes a cost item for the selected report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $channel_type
     * @param string $cost_group
     * @param string $id
     * @param string $rsid_list
     * @return boolean|bool
     */
    public function ReportSuite_DeleteMarketingChannelCost($channel_type, $cost_group, $id, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteMarketingChannelCost', array(
                $channel_type,
                $cost_group,
                $id,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.DeleteMarketingChannels
     * Meta informations extracted from the WSDL
     * - documentation: Delete marketing channels.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $channel_ids
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeleteMarketingChannels($channel_ids, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteMarketingChannels', array(
                $channel_ids,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeletePages
     * Meta informations extracted from the WSDL
     * - documentation: Deletes the given pages from the requested report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $page_id_list
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_DeletePages($page_id_list, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeletePages', array(
                $page_id_list,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeletePaidSearch
     * Meta informations extracted from the WSDL
     * - documentation: Removes the specified paid search rule.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $filter
     * @param string $rsid_list
     * @param string $rule
     * @param string $search_engine
     * @return int|bool
     */
    public function ReportSuite_DeletePaidSearch($filter, $rsid_list, $rule, $search_engine)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeletePaidSearch', array(
                $filter,
                $rsid_list,
                $rule,
                $search_engine,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.DeleteSavedFilter
     * Meta informations extracted from the WSDL
     * - documentation: Deletes a saved filter. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $savedFilterIds
     * @return boolean|bool
     */
    public function ReportSuite_DeleteSavedFilter($savedFilterIds)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.DeleteSavedFilter', array(
                $savedFilterIds,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetActivation
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the activated status for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_activation|bool
     */
    public function ReportSuite_GetActivation($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetActivation', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetAvailableElements
     * Meta informations extracted from the WSDL
     * - documentation: Returns available elements for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $return_datawarehouse_elements
     * @param string $rsid_list
     * @return rscollection_elements|bool
     */
    public function ReportSuite_GetAvailableElements($return_datawarehouse_elements, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetAvailableElements', array(
                $return_datawarehouse_elements,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetAvailableMetrics
     * Meta informations extracted from the WSDL
     * - documentation: Returns available metrics for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $return_datawarehouse_metrics
     * @param string $rsid_list
     * @return rscollection_metrics|bool
     */
    public function ReportSuite_GetAvailableMetrics($return_datawarehouse_metrics, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetAvailableMetrics', array(
                $return_datawarehouse_metrics,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetAxleStartDate
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the axle start date for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_axle_start_date|bool
     */
    public function ReportSuite_GetAxleStartDate($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetAxleStartDate', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetBaseCurrency
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the base URL for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_base_currency|bool
     */
    public function ReportSuite_GetBaseCurrency($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetBaseCurrency', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetBaseURL
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the base URL for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_base_url|bool
     */
    public function ReportSuite_GetBaseURL($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetBaseURL', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetCalculatedMetrics
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the calculated metrics for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_calculated_metric|bool
     */
    public function ReportSuite_GetCalculatedMetrics($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetCalculatedMetrics', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetClassificationHierarchies
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the requested classifications from the requested report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $c_view
     * @param string $rel_id
     * @param string $rsid_list
     * @return rscollection_hierarchy|bool
     */
    public function ReportSuite_GetClassificationHierarchies($c_view, $rel_id, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetClassificationHierarchies', array(
                $c_view,
                $rel_id,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetClassifications
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the requested classifications from the requested report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $c_view
     * @param string $rel_id
     * @param string $rsid_list
     * @param string $type
     * @return rscollection_classification|bool
     */
    public function ReportSuite_GetClassifications($c_view, $rel_id, $rsid_list, $type)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetClassifications', array(
                $c_view,
                $rel_id,
                $rsid_list,
                $type,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetCorrelations
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the correlations for the specified report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_correlation|bool
     */
    public function ReportSuite_GetCorrelations($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetCorrelations', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetCustomCalendar
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the custom calendar for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_custom_calendar|bool
     */
    public function ReportSuite_GetCustomCalendar($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetCustomCalendar', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetDefaultPage
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the default page for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_default_page|bool
     */
    public function ReportSuite_GetDefaultPage($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetDefaultPage', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetEVars
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the conversion variables for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_evar|bool
     */
    public function ReportSuite_GetEVars($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetEVars', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetEcommerce
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the Conversion level for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_ecommerce|bool
     */
    public function ReportSuite_GetEcommerce($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetEcommerce', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetFindingMethods
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the finding methods for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_finding_method|bool
     */
    public function ReportSuite_GetFindingMethods($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetFindingMethods', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetIPAddressExclusions
     * Meta informations extracted from the WSDL
     * - documentation: Returns the IP address exclusions for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_ip_exclusions|bool
     */
    public function ReportSuite_GetIPAddressExclusions($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetIPAddressExclusions', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetIPObfuscation
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the IP Address Obfuscation setting.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_ip_obfuscation|bool
     */
    public function ReportSuite_GetIPObfuscation($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetIPObfuscation', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetInternalURLFilters
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the internal URL filters for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_internal_url_filter|bool
     */
    public function ReportSuite_GetInternalURLFilters($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetInternalURLFilters', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetKeyVisitors
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves a list of Key visitors for the specified report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_key_visitor|bool
     */
    public function ReportSuite_GetKeyVisitors($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetKeyVisitors', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetLocalization
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the status of the multibyte character setting for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_localization|bool
     */
    public function ReportSuite_GetLocalization($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetLocalization', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetMarketingChannelCost
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the marketing channel cost metrics for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_costs|bool
     */
    public function ReportSuite_GetMarketingChannelCost($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetMarketingChannelCost', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetMarketingChannelExpiration
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the marketing channel engagement period expiration information for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return expiration_event_list|bool
     */
    public function ReportSuite_GetMarketingChannelExpiration($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetMarketingChannelExpiration', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetMarketingChannelRules
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the marketing channel rules for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return multi_rs_mchannel_rulesets|bool
     */
    public function ReportSuite_GetMarketingChannelRules($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetMarketingChannelRules', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetMarketingChannels
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the marketing channels for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return mchannels_list|bool
     */
    public function ReportSuite_GetMarketingChannels($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetMarketingChannels', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetMarketingChannelsCustomSubRelations
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the available custom subrelations for the marketing channels in the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rel_id
     * @param string $rsid
     * @return \Api\StructType\ApiChannel_sub_relations_element|bool
     */
    public function ReportSuite_GetMarketingChannelsCustomSubRelations($rel_id, $rsid)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetMarketingChannelsCustomSubRelations', array(
                $rel_id,
                $rsid,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetMobileAppReporting
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the Mobile Application Tracking settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return string|bool
     */
    public function ReportSuite_GetMobileAppReporting($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetMobileAppReporting', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetPages
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves a list of pages for the specified report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $limit
     * @param string $page_search
     * @param string $rsid_list
     * @param string $sc_period
     * @param string $start_point
     * @return \Api\StructType\ApiReport_suite_pages[]|bool
     */
    public function ReportSuite_GetPages($limit, $page_search, $rsid_list, $sc_period, $start_point)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetPages', array(
                $limit,
                $page_search,
                $rsid_list,
                $sc_period,
                $start_point,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetPaidSearch
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the paid search settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_paid_search|bool
     */
    public function ReportSuite_GetPaidSearch($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetPaidSearch', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetPermanentTraffic
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the permanent traffic settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return \Api\StructType\ApiPermanent_traffic[]|bool
     */
    public function ReportSuite_GetPermanentTraffic($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetPermanentTraffic', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetProcessingStatus
     * Meta informations extracted from the WSDL
     * - documentation: Returns processing status for the given report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_processing_status|bool
     */
    public function ReportSuite_GetProcessingStatus($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetProcessingStatus', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetRollupDates
     * Meta informations extracted from the WSDL
     * - documentation: Returns rollup dates for the given rollup report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_rollup_dates|bool
     */
    public function ReportSuite_GetRollupDates($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetRollupDates', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetRollups
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the rollups for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \Api\StructType\ApiRollup[]|bool
     */
    public function ReportSuite_GetRollups()
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetRollups'));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSavedFilters
     * Meta informations extracted from the WSDL
     * - documentation: Gets the saved filters for a report suite. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \Api\StructType\ApiSaved_filter[]|bool
     */
    public function ReportSuite_GetSavedFilters()
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetSavedFilters'));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetScheduledSpike
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the scheduled traffic changes for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return \Api\StructType\ApiSchedule_spike[]|bool
     */
    public function ReportSuite_GetScheduledSpike($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetScheduledSpike', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSegments
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the requested classifications from the requested report suites
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_sc_segments|bool
     */
    public function ReportSuite_GetSegments($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetSegments', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSettings
     * Meta informations extracted from the WSDL
     * - documentation: Returns report suite settings.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $locale
     * @param string $rsid_list
     * @return rscollection_settings|bool
     */
    public function ReportSuite_GetSettings($locale, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetSettings', array(
                $locale,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSiteTitle
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the Site Title for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_site_title|bool
     */
    public function ReportSuite_GetSiteTitle($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetSiteTitle', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetSuccessEvents
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the success events for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_event|bool
     */
    public function ReportSuite_GetSuccessEvents($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetSuccessEvents', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetTemplate
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the templates for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_template|bool
     */
    public function ReportSuite_GetTemplate($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetTemplate', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetTimeZone
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the Time Zone for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_time_zone|bool
     */
    public function ReportSuite_GetTimeZone($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetTimeZone', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetTrafficVars
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the Traffic Vars for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_traffic_var|bool
     */
    public function ReportSuite_GetTrafficVars($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetTrafficVars', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetUIVisibility
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the visibility states for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_ui_element|bool
     */
    public function ReportSuite_GetUIVisibility($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetUIVisibility', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.GetUniqueVisitorVariable
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves a list of unique visitor variables
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_unique_visitor_variable|bool
     */
    public function ReportSuite_GetUniqueVisitorVariable($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetUniqueVisitorVariable', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetVideoReporting
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the Video Tracking settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return string|bool
     */
    public function ReportSuite_GetVideoReporting($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetVideoReporting', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.GetVideoTracking
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the Video Tracking settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return rscollection_video_tracking|bool
     */
    public function ReportSuite_GetVideoTracking($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.GetVideoTracking', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveBaseCurrency
     * Meta informations extracted from the WSDL
     * - documentation: Saves the Base Currency setting.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $base_currency
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveBaseCurrency($base_currency, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveBaseCurrency', array(
                $base_currency,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveBaseURL
     * Meta informations extracted from the WSDL
     * - documentation: Saves the base URL for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $base_url
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveBaseURL($base_url, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveBaseURL', array(
                $base_url,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveCalculatedMetrics
     * Meta informations extracted from the WSDL
     * - documentation: Saves a calculated metric for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $calculated_metrics
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveCalculatedMetrics($calculated_metrics, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveCalculatedMetrics', array(
                $calculated_metrics,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveClassificationHierarchies
     * Meta informations extracted from the WSDL
     * - documentation: Modifies a classification hierarchy for one or more report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $c_options
     * @param string $c_view
     * @param string $camp_view
     * @param string $div_num
     * @param string $name
     * @param string $parent_div_num
     * @param string $rsid_list
     * @param string $type
     * @param string $update
     * @return int|bool
     */
    public function ReportSuite_SaveClassificationHierarchies($c_options, $c_view, $camp_view, $div_num, $name, $parent_div_num, $rsid_list, $type, $update)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveClassificationHierarchies', array(
                $c_options,
                $c_view,
                $camp_view,
                $div_num,
                $name,
                $parent_div_num,
                $rsid_list,
                $type,
                $update,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveClassifications
     * Meta informations extracted from the WSDL
     * - documentation: Saves a classification for one or more report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $c_options
     * @param string $c_view
     * @param string $camp_view
     * @param string $div_num
     * @param string $name
     * @param string $parent_div_num
     * @param string $rsid_list
     * @param string $type
     * @param string $update
     * @return int|bool
     */
    public function ReportSuite_SaveClassifications($c_options, $c_view, $camp_view, $div_num, $name, $parent_div_num, $rsid_list, $type, $update)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveClassifications', array(
                $c_options,
                $c_view,
                $camp_view,
                $div_num,
                $name,
                $parent_div_num,
                $rsid_list,
                $type,
                $update,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveCustomCalendar
     * Meta informations extracted from the WSDL
     * - documentation: Enables custom calendars for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $anchor_date
     * @param string $cal_type
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveCustomCalendar($anchor_date, $cal_type, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveCustomCalendar', array(
                $anchor_date,
                $cal_type,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveDefaultPage
     * Meta informations extracted from the WSDL
     * - documentation: Saves the default page for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $default_page
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveDefaultPage($default_page, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveDefaultPage', array(
                $default_page,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveEVars
     * Meta informations extracted from the WSDL
     * - documentation: Saves the conversion variables for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $evars
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveEVars($evars, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveEVars', array(
                $evars,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveEcommerce
     * Meta informations extracted from the WSDL
     * - documentation: Saves the conversion level for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $ecommerce
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveEcommerce($ecommerce, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveEcommerce', array(
                $ecommerce,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveFindingMethods
     * Meta informations extracted from the WSDL
     * - documentation: Saves finding method settings.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $reports
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveFindingMethods($reports, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveFindingMethods', array(
                $reports,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveIPAddressExclusions
     * Meta informations extracted from the WSDL
     * - documentation: Add an IP exclusion entry for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $ip_list
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveIPAddressExclusions($ip_list, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveIPAddressExclusions', array(
                $ip_list,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveIPObfuscation
     * Meta informations extracted from the WSDL
     * - documentation: Saves the IP Address Obfuscation setting.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $ip_obfuscation
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveIPObfuscation($ip_obfuscation, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveIPObfuscation', array(
                $ip_obfuscation,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveMarketingChannelCost
     * Meta informations extracted from the WSDL
     * - documentation: Saves the marketing channel costs for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Api\StructType\ApiCost_item $cost_item
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveMarketingChannelCost(\Api\StructType\ApiCost_item $cost_item, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveMarketingChannelCost', array(
                $cost_item,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveMarketingChannelExpiration
     * Meta informations extracted from the WSDL
     * - documentation: Saves the visitor expiration period. Set the number of days required before the visit expires, or 0 for never expires
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $days
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveMarketingChannelExpiration($days, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveMarketingChannelExpiration', array(
                $days,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveMarketingChannelRules
     * Meta informations extracted from the WSDL
     * - documentation: Saves the marketing channel rules for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $mchannel_rules
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveMarketingChannelRules($mchannel_rules, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveMarketingChannelRules', array(
                $mchannel_rules,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveMarketingChannels
     * Meta informations extracted from the WSDL
     * - documentation: Saves a set of marketing channels.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $channels
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveMarketingChannels($channels, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveMarketingChannels', array(
                $channels,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveMobileAppReporting
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return void|bool
     */
    public function ReportSuite_SaveMobileAppReporting($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveMobileAppReporting', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SavePaidSearch
     * Meta informations extracted from the WSDL
     * - documentation: Saves the paid search settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $filter
     * @param string $rsid_list
     * @param string $rule
     * @param string $search_engine
     * @return int|bool
     */
    public function ReportSuite_SavePaidSearch($filter, $rsid_list, $rule, $search_engine)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SavePaidSearch', array(
                $filter,
                $rsid_list,
                $rule,
                $search_engine,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SavePermanentTraffic
     * Meta informations extracted from the WSDL
     * - documentation: Saves the permanent traffic settings for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $new_hits_per_day
     * @param string $rsid_list
     * @param string $start_date
     * @return int|bool
     */
    public function ReportSuite_SavePermanentTraffic($new_hits_per_day, $rsid_list, $start_date)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SavePermanentTraffic', array(
                $new_hits_per_day,
                $rsid_list,
                $start_date,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveRollup
     * Meta informations extracted from the WSDL
     * - documentation: Saves a rollup for the company.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $go_live_date
     * @param string $rollup_rsids
     * @param string $rsid
     * @param string $time_zone
     * @return int|bool
     */
    public function ReportSuite_SaveRollup($go_live_date, $rollup_rsids, $rsid, $time_zone)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveRollup', array(
                $go_live_date,
                $rollup_rsids,
                $rsid,
                $time_zone,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveSavedFilters
     * Meta informations extracted from the WSDL
     * - documentation: Saves filter. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $savedFilters
     * @return \Api\StructType\ApiSaved_filter[]|bool
     */
    public function ReportSuite_SaveSavedFilters($savedFilters)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveSavedFilters', array(
                $savedFilters,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveScheduledSpike
     * Meta informations extracted from the WSDL
     * - documentation: Saves scheduled traffic spikes for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $end_date
     * @param string $rsid_list
     * @param string $spike_hits_per_day
     * @param string $start_date
     * @return int|bool
     */
    public function ReportSuite_SaveScheduledSpike($end_date, $rsid_list, $spike_hits_per_day, $start_date)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveScheduledSpike', array(
                $end_date,
                $rsid_list,
                $spike_hits_per_day,
                $start_date,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveSiteTitle
     * Meta informations extracted from the WSDL
     * - documentation: Changes the Site Title of the report suites specified (it is not recommended to update multiple report suites with the same site title)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @param string $site_title
     * @return int|bool
     */
    public function ReportSuite_SaveSiteTitle($rsid_list, $site_title)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveSiteTitle', array(
                $rsid_list,
                $site_title,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveSuccessEvents
     * Meta informations extracted from the WSDL
     * - documentation: Saves the success events to rsid_list
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $events
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveSuccessEvents($events, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveSuccessEvents', array(
                $events,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveSurveySettings
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @param string $survey_display_event_num
     * @param string $survey_evar_num
     * @param string $survey_submit_event_num
     * @return void|bool
     */
    public function ReportSuite_SaveSurveySettings($rsid_list, $survey_display_event_num, $survey_evar_num, $survey_submit_event_num)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveSurveySettings', array(
                $rsid_list,
                $survey_display_event_num,
                $survey_evar_num,
                $survey_submit_event_num,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveTimeZone
     * Meta informations extracted from the WSDL
     * - documentation: Changes the timezone (lookup ID) of the report suites specified
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @param string $time_zone
     * @return int|bool
     */
    public function ReportSuite_SaveTimeZone($rsid_list, $time_zone)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveTimeZone', array(
                $rsid_list,
                $time_zone,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveTrafficVars
     * Meta informations extracted from the WSDL
     * - documentation: Saves the Traffic Vars for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $property
     * @param string $rsid_list
     * @return int|bool
     */
    public function ReportSuite_SaveTrafficVars($property, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveTrafficVars', array(
                $property,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveUIVisibility
     * Meta informations extracted from the WSDL
     * - documentation: Changes the visibility state of the UI element given for the requested report suites.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @param string $state
     * @param string $ui_element
     * @return boolean|bool
     */
    public function ReportSuite_SaveUIVisibility($rsid_list, $state, $ui_element)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveUIVisibility', array(
                $rsid_list,
                $state,
                $ui_element,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named
     * ReportSuite.SaveUniqueVisitorVariable
     * Meta informations extracted from the WSDL
     * - documentation: Sets the unique visitor variable specified
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @param string $unique_visitor_variable
     * @return int|bool
     */
    public function ReportSuite_SaveUniqueVisitorVariable($rsid_list, $unique_visitor_variable)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveUniqueVisitorVariable', array(
                $rsid_list,
                $unique_visitor_variable,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named ReportSuite.SaveVideoReporting
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid_list
     * @return void|bool
     */
    public function ReportSuite_SaveVideoReporting($rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('ReportSuite.SaveVideoReporting', array(
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.CheckJobStatus
     * Meta informations extracted from the WSDL
     * - documentation: Return the current status of a Saint API Job.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $job_id
     * @return saintresults|bool
     */
    public function Saint_CheckJobStatus($job_id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.CheckJobStatus', array(
                $job_id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.CreateFTP
     * Meta informations extracted from the WSDL
     * - documentation: Creates an ftp account for the given parameters and returns the ftp account info
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $description
     * @param string $email
     * @param string $export
     * @param string $overwrite
     * @param string $relation_id
     * @param string $rsid_list
     * @return \Api\StructType\ApiSaint_ftp_info|bool
     */
    public function Saint_CreateFTP($description, $email, $export, $overwrite, $relation_id, $rsid_list)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.CreateFTP', array(
                $description,
                $email,
                $export,
                $overwrite,
                $relation_id,
                $rsid_list,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ExportCreateJob
     * Meta informations extracted from the WSDL
     * - documentation: Creates Saint Export Job.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $campaign_filter_begin_range
     * @param string $campaign_filter_end_range
     * @param string $campaign_filter_option
     * @param string $date_filter_row_end_date
     * @param string $date_filter_row_start_date
     * @param string $email_address
     * @param string $encoding
     * @param string $relation_id
     * @param string $report_suite_array
     * @param string $row_match_filter_empty_column_name
     * @param string $row_match_filter_match_column_name
     * @param string $row_match_filter_match_column_value
     * @param string $select_all_rows
     * @param string $select_number_of_rows
     * @return string|bool
     */
    public function Saint_ExportCreateJob($campaign_filter_begin_range, $campaign_filter_end_range, $campaign_filter_option, $date_filter_row_end_date, $date_filter_row_start_date, $email_address, $encoding, $relation_id, $report_suite_array, $row_match_filter_empty_column_name, $row_match_filter_match_column_name, $row_match_filter_match_column_value, $select_all_rows, $select_number_of_rows)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.ExportCreateJob', array(
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
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ExportGetFileSegment
     * Meta informations extracted from the WSDL
     * - documentation: Returns the page details of a given file_id
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $file_id
     * @param string $segment_id
     * @return pagedetails|bool
     */
    public function Saint_ExportGetFileSegment($file_id, $segment_id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.ExportGetFileSegment', array(
                $file_id,
                $segment_id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.GetCompatabiltyMetrics
     * Meta informations extracted from the WSDL
     * - documentation: Returns Array of compatability information for a report suite(s),
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $report_suite_array
     * @return compatabilitys|bool
     */
    public function Saint_GetCompatabiltyMetrics($report_suite_array)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.GetCompatabiltyMetrics', array(
                $report_suite_array,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.GetFilters
     * Meta informations extracted from the WSDL
     * - documentation: Get SAINT export filters.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $relation_id
     * @param string $report_suite_array
     * @return export_filters|bool
     */
    public function Saint_GetFilters($relation_id, $report_suite_array)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.GetFilters', array(
                $relation_id,
                $report_suite_array,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.GetTemplate
     * Meta informations extracted from the WSDL
     * - documentation: Returns the template to be used in the SAINT browser or FTP download
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $encoding
     * @param string $numeric_div_nums
     * @param string $relation_id
     * @param string $report_suite
     * @param string $text_div_nums
     * @return string|bool
     */
    public function Saint_GetTemplate($encoding, $numeric_div_nums, $relation_id, $report_suite, $text_div_nums)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.GetTemplate', array(
                $encoding,
                $numeric_div_nums,
                $relation_id,
                $report_suite,
                $text_div_nums,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ImportCommitJob
     * Meta informations extracted from the WSDL
     * - documentation: Commits a specified Saint Import job for processing.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $job_id
     * @return string|bool
     */
    public function Saint_ImportCommitJob($job_id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.ImportCommitJob', array(
                $job_id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ImportCreateJob
     * Meta informations extracted from the WSDL
     * - documentation: Creates a Saint Import Job
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $check_divisions
     * @param string $description
     * @param string $email_address
     * @param string $export_results
     * @param string $header
     * @param string $overwrite_conflicts
     * @param string $relation_id
     * @param string $report_suite_array
     * @return int|bool
     */
    public function Saint_ImportCreateJob($check_divisions, $description, $email_address, $export_results, $header, $overwrite_conflicts, $relation_id, $report_suite_array)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.ImportCreateJob', array(
                $check_divisions,
                $description,
                $email_address,
                $export_results,
                $header,
                $overwrite_conflicts,
                $relation_id,
                $report_suite_array,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ImportPopulateJob
     * Meta informations extracted from the WSDL
     * - documentation: Attaches Import data to a given Saint Import job.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $job_id
     * @param string $page
     * @param string $rows
     * @return string|bool
     */
    public function Saint_ImportPopulateJob($job_id, $page, $rows)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.ImportPopulateJob', array(
                $job_id,
                $page,
                $rows,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Saint.ListFTP
     * Meta informations extracted from the WSDL
     * - documentation: Returns a list of the ftp accounts configured for this company
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return saint_ftp_list|bool
     */
    public function Saint_ListFTP()
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Saint.ListFTP'));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.CreatePublishedReport
     * Meta informations extracted from the WSDL
     * - documentation: Creates a new published report. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $location
     * @param string $product
     * @param \Api\StructType\ApiScheduledReport $scheduledReport
     * @param string $workbook
     * @return \Api\StructType\ApiScheduledReport|bool
     */
    public function Scheduling_CreatePublishedReport($location, $product, \Api\StructType\ApiScheduledReport $scheduledReport, $workbook)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Scheduling.CreatePublishedReport', array(
                $location,
                $product,
                $scheduledReport,
                $workbook,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.DeletePublishedReport
     * Meta informations extracted from the WSDL
     * - documentation: Deletes published reports. (Internal use only)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $product
     * @param string $scheduledReportIds
     * @return boolean|bool
     */
    public function Scheduling_DeletePublishedReport($product, $scheduledReportIds)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Scheduling.DeletePublishedReport', array(
                $product,
                $scheduledReportIds,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.DeleteWorkbook
     * Meta informations extracted from the WSDL
     * - documentation: Deletes workbooks from the library. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $location
     * @param string $product
     * @param string $username
     * @param string $workbookNames
     * @return boolean|bool
     */
    public function Scheduling_DeleteWorkbook($location, $product, $username, $workbookNames)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Scheduling.DeleteWorkbook', array(
                $location,
                $product,
                $username,
                $workbookNames,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.DownloadWorkbook
     * Meta informations extracted from the WSDL
     * - documentation: Download a workbook. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
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
            $this->setResult(self::getSoapClient()->__call('Scheduling.DownloadWorkbook', array(
                $location,
                $productType,
                $username,
                $workbookName,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.GetPublishedReports
     * Meta informations extracted from the WSDL
     * - documentation: Get published reports for a user. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $product
     * @param string $username
     * @return \Api\StructType\ApiScheduledReport[]|bool
     */
    public function Scheduling_GetPublishedReports($product, $username)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Scheduling.GetPublishedReports', array(
                $product,
                $username,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.GetReportsRunHistory
     * Meta informations extracted from the WSDL
     * - documentation: Gets a history of reports published by a user.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $limit
     * @param string $offset
     * @param string $product
     * @param string $username
     * @return \Api\StructType\ApiScheduleLog[]|bool
     */
    public function Scheduling_GetReportsRunHistory($limit, $offset, $product, $username)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Scheduling.GetReportsRunHistory', array(
                $limit,
                $offset,
                $product,
                $username,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.GetWorkbookList
     * Meta informations extracted from the WSDL
     * - documentation: Gets a list of workbooks for a user. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $location
     * @param string $product
     * @return \Api\StructType\ApiExcelWorkbook[]|bool
     */
    public function Scheduling_GetWorkbookList($location, $product)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Scheduling.GetWorkbookList', array(
                $location,
                $product,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.ReRunReport
     * Meta informations extracted from the WSDL
     * - documentation: Re-enables a failed report. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $id
     * @return boolean|bool
     */
    public function Scheduling_ReRunReport($id)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Scheduling.ReRunReport', array(
                $id,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.UpdatePublishedReport
     * Meta informations extracted from the WSDL
     * - documentation: Edits a published report. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $product
     * @param \Api\StructType\ApiScheduledReport $scheduledReport
     * @param string $workbook
     * @return \Api\StructType\ApiScheduledReport|bool
     */
    public function Scheduling_UpdatePublishedReport($product, \Api\StructType\ApiScheduledReport $scheduledReport, $workbook)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Scheduling.UpdatePublishedReport', array(
                $product,
                $scheduledReport,
                $workbook,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Scheduling.UploadWorkbook
     * Meta informations extracted from the WSDL
     * - documentation: Uploads a Workbook. (Internal use only.)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
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
            $this->setResult(self::getSoapClient()->__call('Scheduling.UploadWorkbook', array(
                $description,
                $filename,
                $location,
                $product,
                $workbook,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named Survey.GetSummaryList
     * Meta informations extracted from the WSDL
     * - documentation: Returns the list of current surveys created for a given report suite.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $rsid
     * @param string $status_filter
     * @return survey_summary_list|bool
     */
    public function Survey_GetSummaryList($rsid, $status_filter)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('Survey.GetSummaryList', array(
                $rsid,
                $status_filter,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named User.GetBookmarkFolders
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the folders the user has on their menu.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $limit
     * @return folder_list|bool
     */
    public function User_GetBookmarkFolders($limit)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('User.GetBookmarkFolders', array(
                $limit,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named User.GetDashboardsAPI
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves a list of dashboards accessible by the user.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $limit
     * @return dashboard_list|bool
     */
    public function User_GetDashboardsAPI($limit)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('User.GetDashboardsAPI', array(
                $limit,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named User.GetLastUsedReportSuite
     * Meta informations extracted from the WSDL
     * - documentation: Retrieves the last used report suite by the user.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @return \Api\StructType\ApiReport_suite_id|bool
     */
    public function User_GetLastUsedReportSuite()
    {
        try {
            $this->setResult(self::getSoapClient()->__call('User.GetLastUsedReportSuite'));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named User.LoginEmailExists
     * Meta informations extracted from the WSDL
     * - documentation: Determines if the supplied email address exists is tied to a Suite login.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $emailAddress
     * @return boolean|bool
     */
    public function User_LoginEmailExists($emailAddress)
    {
        try {
            $this->setResult(self::getSoapClient()->__call('User.LoginEmailExists', array(
                $emailAddress,
            )));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return array|base64Binary|boolean|code_archives|code_items|compatabilitys|dashboard_list|dwsegments|expiration_event_list|export_filters|fileInfoResult|folder_list|infoResult|int|log_entries|mchannels_list|multi_rs_mchannel_rulesets|pagedetails|perm_categories|queue_items|report_element_mappings|report_queue|rscollection_activation|rscollection_axle_start_date|rscollection_base_currency|rscollection_base_url|rscollection_calculated_metric|rscollection_classification|rscollection_correlation|rscollection_costs|rscollection_custom_calendar|rscollection_default_page|rscollection_ecommerce|rscollection_elements|rscollection_evar|rscollection_event|rscollection_finding_method|rscollection_hierarchy|rscollection_internal_url_filter|rscollection_ip_exclusions|rscollection_ip_obfuscation|rscollection_key_visitor|rscollection_localization|rscollection_metrics|rscollection_paid_search|rscollection_processing_status|rscollection_rollup_dates|rscollection_sc_segments|rscollection_settings|rscollection_site_title|rscollection_template|rscollection_time_zone|rscollection_traffic_var|rscollection_ui_element|rscollection_unique_visitor_variable|rscollection_video_tracking|saintresults|saint_ftp_list|segment_folders|string|string[]|survey_summary_list|usage_log_entries|void|\Api\StructType\ApiChannel_sub_relations_element|\Api\StructType\ApiCrm_info|\Api\StructType\ApiDashboard_element|\Api\StructType\ApiData_warehouse_report|\Api\StructType\ApiData_warehouse_request|\Api\StructType\ApiData_warehouse_segment|\Api\StructType\ApiDs_setup_result|\Api\StructType\ApiExcelWorkbook[]|\Api\StructType\ApiFileIDResult|\Api\StructType\ApiFileStatusResult|\Api\StructType\ApiGroup_data|\Api\StructType\ApiLogin|\Api\StructType\ApiPermanent_traffic[]|\Api\StructType\ApiPermissions_account[]|\Api\StructType\ApiPermissions_account_groups|\Api\StructType\ApiPermission_group[]|\Api\StructType\ApiPerm_login[]|\Api\StructType\ApiPublishingList[]|\Api\StructType\ApiReportBuilderLogin|\Api\StructType\ApiReportlet|\Api\StructType\ApiReportQueueResponse|\Api\StructType\ApiReportResponse|\Api\StructType\ApiReport_status|\Api\StructType\ApiReport_suite_id|\Api\StructType\ApiReport_suite_pages[]|\Api\StructType\ApiRollup[]|\Api\StructType\ApiSaint_ftp_info|\Api\StructType\ApiSaved_filter[]|\Api\StructType\ApiScheduledReport|\Api\StructType\ApiScheduledReport[]|\Api\StructType\ApiScheduleLog[]|\Api\StructType\ApiSchedule_spike[]|\Api\StructType\ApiSimpleDataSource[]|\Api\StructType\ApiSimple_report_suites_rval|\Api\StructType\ApiStatus|\Api\StructType\ApiToken_usage_container|\Api\StructType\ApiTracking_server_data
     */
    public function getResult()
    {
        return parent::getResult();
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
