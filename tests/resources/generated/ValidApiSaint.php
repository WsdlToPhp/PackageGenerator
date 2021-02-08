<?php

declare(strict_types=1);

namespace Api\ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Saint ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiSaint extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Saint.CheckJobStatus
     * Meta information extracted from the WSDL
     * - documentation: Return the current status of a Saint API Job.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param string $job_id
     * @return \Api\StructType\ApiSaintresult[]|bool
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
     * @return \Api\StructType\ApiSaint_ftp_info|bool
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
     * @return \Api\StructType\ApiPagedetail[]|bool
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
     * @return \Api\StructType\ApiCompatability[]|bool
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
     * @return \Api\StructType\ApiExport_filter[]|bool
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
     * @param \Api\StructType\ApiRow[] $rows
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
     * @return \Api\StructType\ApiSaint_ftp[]|bool
     */
    public function Saint_ListFTP()
    {
        try {
            $this->setResult($resultSaint_ListFTP = $this->getSoapClient()->__soapCall('Saint.ListFTP', ], [], [], $this->outputHeaders));
        
            return $resultSaint_ListFTP;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return int|string|\Api\StructType\ApiCompatability[]|\Api\StructType\ApiExport_filter[]|\Api\StructType\ApiPagedetail[]|\Api\StructType\ApiSaintresult[]|\Api\StructType\ApiSaint_ftp[]|\Api\StructType\ApiSaint_ftp_info
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
