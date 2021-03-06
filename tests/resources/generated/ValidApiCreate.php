<?php

declare(strict_types=1);

namespace ServiceType;

use SoapFault;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Create ServiceType
 * @package Api
 * @subpackage Services
 * @release 1.1.0
 */
class ApiCreate extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named CreateQueue
     * Meta information extracted from the WSDL
     * - documentation: The CreateQueue action creates a new queue, or returns the URL of an existing one. When you request CreateQueue, you provide a name for the queue. To successfully create a new queue, you must provide a name that is unique within the
     * scope of your own queues. If you provide the name of an existing queue, a new queue isn't created and an error isn't returned. Instead, the request succeeds and the queue URL for the existing queue is returned. A CreateQueue call may include
     * attributes to set on a newly created queue. The effect is the same as the CreateQueue call followed by a SetQueueAttributes call (with the same attributes). However, when the queue already exists CreateQueue will not update any attributes. It simply
     * compares the attribute values provided with the current settings on the existing queue, and returns the queue URL if the values match. Otherwise, it responds with an error otherwise. SetQueueAttributes should be used to change the values of
     * attributes for an existing queue.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \StructType\ApiCreateQueue $body
     * @return \StructType\ApiCreateQueueResponse|bool
     */
    public function CreateQueue(\StructType\ApiCreateQueue $body)
    {
        try {
            $this->setResult($resultCreateQueue = $this->getSoapClient()->__soapCall('CreateQueue', [
                $body,
            ], [], [], $this->outputHeaders));
        
            return $resultCreateQueue;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \StructType\ApiCreateQueueResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
}
