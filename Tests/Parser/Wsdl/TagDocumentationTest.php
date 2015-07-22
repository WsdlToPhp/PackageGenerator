<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\Service;

class TagDocumentationTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function imageViewInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlImageViewServicePath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function whlInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlWhlPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function actonInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlActonPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function queueInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlQueuePath()));
    }
    /**
     *
     */
    public function testParseImageViewService()
    {
        $tagDocumentationParser = self::imageViewInstance();

        $tagDocumentationParser->parse();

        $ok = false;
        foreach ($tagDocumentationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsRestriction() === false) {
                if ($struct->getName() === 'imgRequest') {
                    $this->assertEquals(array(
                        'PRO is deprecated; provided for backward compatibility',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'ProType') {
                    $this->assertEquals(array(
                        'PRO is 10 digits or 11 digits with dash.',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'SearchCriteriaType') {
                    $this->assertEquals(array(
                        'Generic search criteria for image search',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'SearchItemType') {
                    $this->assertEquals(array(
                        'Image search item',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'DocumentType') {
                    $this->assertEquals(array(
                        'Document type code',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'ImagesType') {
                    $this->assertEquals(array(
                        'Image file name and Base64 encoded binary source data',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'availRequest') {
                    $this->assertEquals(array(
                        'PRO is deprecated; provided for backward compatibility',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
    /**
     *
     */
    public function testParseWhl()
    {
        $tagDocumentationParser = self::whlInstance();

        $tagEnumerationParser = new TagEnumeration($tagDocumentationParser->getGenerator());
        $tagEnumerationParser->parse();

        $tagDocumentationParser->parse();

        $ok = false;
        foreach ($tagDocumentationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsRestriction() === true) {
                if ($struct->getName() === 'PaymentCardCodeType') {
                    $this->assertSame(array(
                        'American Express',
                    ), $struct->getValue('AX')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Bank Card',
                    ), $struct->getValue('BC')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Carte Bleu',
                    ), $struct->getValue('BL')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Carte Blanche',
                    ), $struct->getValue('CB')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Diners Club',
                    ), $struct->getValue('DN')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Discover Card',
                    ), $struct->getValue('DS')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Eurocard',
                    ), $struct->getValue('EC')->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
    /**
     *
     */
    public function testParseActon()
    {
        $tagDocumentationParser = self::actonInstance();

        $tagEnumerationParser = new TagEnumeration($tagDocumentationParser->getGenerator());
        $tagEnumerationParser->parse();

        $tagDocumentationParser->parse();

        $ok = false;
        foreach ($tagDocumentationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsStruct() === false) {
                if ($struct->getName() === 'ID') {
                    $this->assertSame(array(
                        'ID for an object',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
    /**
     *
     */
    public function testParseQueue()
    {
        $tagDocumentationParser = self::queueInstance();

        $tagEnumerationParser = new TagEnumeration($tagDocumentationParser->getGenerator());
        $tagEnumerationParser->parse();

        $tagDocumentationParser->parse();

        $count = 0;
        foreach ($tagDocumentationParser->getGenerator()->getServices() as $service) {
            if ($service instanceof Service) {
                foreach ($service->getMethods() as $method) {
                    switch ($method->getName()) {
                        case 'CreateQueue':
                            $this->assertSame('The CreateQueue action creates a new queue, or returns the URL of an existing one. When you request CreateQueue, you provide a name for the queue. To successfully create a new queue, you must provide a name that is unique within the scope of your own queues. If you provide the name of an existing queue, a new queue isn\'t created and an error isn\'t returned. Instead, the request succeeds and the queue URL for the existing queue is returned. A CreateQueue call may include attributes to set on a newly created queue. The effect is the same as the CreateQueue call followed by a SetQueueAttributes call (with the same attributes). However, when the queue already exists CreateQueue will not update any attributes. It simply compares the attribute values provided with the current settings on the existing queue, and returns the queue URL if the values match. Otherwise, it responds with an error otherwise. SetQueueAttributes should be used to change the values of attributes for an existing queue.', $method->getDocumentation());
                            $count++;
                            break;
                        case 'GetQueueUrl':
                            $this->assertSame('The GetQueueUrl action takes the name of a queue and returns its URL.', $method->getDocumentation());
                            $count++;
                            break;
                        case 'ReceiveMessage':
                            $this->assertSame('Retrieves one or more messages from the specified queue, including the message body, message ID, and message attributes of each message. Messages returned by this action stay in the queue until you delete them. However, once a message is returned to a ReceiveMessage request, it is not returned on subsequent ReceiveMessage requests for the duration of the VisibilityTimeout. If you do not specify a VisibilityTimeout in the request, the overall visibility timeout for the queue is used for the returned messages. If a message is available in the queue, the call will return immediately. Otherwise, it will wait up to WaitTimeSeconds for a message to arrive. If you do not specify WaitTimeSeconds in the request, the queue attribute ReceiveMessageWaitTimeSeconds is used to determine how long to wait. You could ask for additional system information about the message through through the attributes, which are seperate from message attributes. Possible attributes that can be requested with messages include [SenderId, ApproximateFirstReceiveTimestamp, ApproximateReceiveCount, SentTimestamp].', $method->getDocumentation());
                            $count++;
                            break;
                    }
                }
            }
        }
        $this->assertSame(3, $count);
    }
}
