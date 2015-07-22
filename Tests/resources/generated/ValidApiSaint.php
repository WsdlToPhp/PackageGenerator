<?php

namespace Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Saint ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiSaint extends AbstractSoapClientBase
{
    /**
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
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return compatabilitys|export_filters|int|pagedetails|saintresults|saint_ftp_list|string|\Api\StructType\ApiSaint_ftp_info
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
