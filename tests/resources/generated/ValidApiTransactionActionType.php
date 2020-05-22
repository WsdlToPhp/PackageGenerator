<?php

namespace Api\EnumType;

use \WsdlToPhp\PackageBase\AbstractStructEnumBase;

/**
 * This class stands for TransactionActionType EnumType
 * Meta information extracted from the WSDL
 * - documentation: To specify the type of action requested when more than one function could be handled by the message.
 * @package Api
 * @subpackage Enumerations
 * @release 1.1.0
 */
class ApiTransactionActionType extends AbstractStructEnumBase
{
    /**
     * Constant for value 'Book'
     * @return string 'Book'
     */
    const VALUE_BOOK = 'Book';
    /**
     * Constant for value 'Quote'
     * @return string 'Quote'
     */
    const VALUE_QUOTE = 'Quote';
    /**
     * Constant for value 'Hold'
     * @return string 'Hold'
     */
    const VALUE_HOLD = 'Hold';
    /**
     * Constant for value 'Initiate'
     * @return string 'Initiate'
     */
    const VALUE_INITIATE = 'Initiate';
    /**
     * Constant for value 'Ignore'
     * @return string 'Ignore'
     */
    const VALUE_IGNORE = 'Ignore';
    /**
     * Constant for value 'Modify'
     * @return string 'Modify'
     */
    const VALUE_MODIFY = 'Modify';
    /**
     * Constant for value 'Commit'
     * @return string 'Commit'
     */
    const VALUE_COMMIT = 'Commit';
    /**
     * Constant for value 'Cancel'
     * @return string 'Cancel'
     */
    const VALUE_CANCEL = 'Cancel';
    /**
     * Constant for value 'CommitOverrideEdits'
     * Meta information extracted from the WSDL
     * - documentation: Commit the transaction and override the end transaction edits.
     * @return string 'CommitOverrideEdits'
     */
    const VALUE_COMMIT_OVERRIDE_EDITS = 'CommitOverrideEdits';
    /**
     * Constant for value 'VerifyPrice'
     * Meta information extracted from the WSDL
     * - documentation: Perform a price verification.
     * @return string 'VerifyPrice'
     */
    const VALUE_VERIFY_PRICE = 'VerifyPrice';
    /**
     * Constant for value 'Ticket'
     * Meta information extracted from the WSDL
     * - documentation: A ticket for an event, such as a show or theme park.
     * @return string 'Ticket'
     */
    const VALUE_TICKET = 'Ticket';
    /**
     * Return allowed values
     * @uses self::VALUE_BOOK
     * @uses self::VALUE_QUOTE
     * @uses self::VALUE_HOLD
     * @uses self::VALUE_INITIATE
     * @uses self::VALUE_IGNORE
     * @uses self::VALUE_MODIFY
     * @uses self::VALUE_COMMIT
     * @uses self::VALUE_CANCEL
     * @uses self::VALUE_COMMIT_OVERRIDE_EDITS
     * @uses self::VALUE_VERIFY_PRICE
     * @uses self::VALUE_TICKET
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_BOOK,
            self::VALUE_QUOTE,
            self::VALUE_HOLD,
            self::VALUE_INITIATE,
            self::VALUE_IGNORE,
            self::VALUE_MODIFY,
            self::VALUE_COMMIT,
            self::VALUE_CANCEL,
            self::VALUE_COMMIT_OVERRIDE_EDITS,
            self::VALUE_VERIFY_PRICE,
            self::VALUE_TICKET,
        );
    }
}
