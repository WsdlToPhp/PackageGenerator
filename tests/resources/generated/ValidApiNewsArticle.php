<?php

namespace Api\StructType;

use \Std\Opt\StructClass;

/**
 * This class stands for NewsArticle StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
class ApiNewsArticle extends StructClass
{
    /**
     * The Title
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Title;
    /**
     * The Url
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Url;
    /**
     * The Source
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Source;
    /**
     * The Snippet
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Snippet;
    /**
     * The Date
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Date;
    /**
     * Constructor method for NewsArticle
     * @uses ApiNewsArticle::setTitle()
     * @uses ApiNewsArticle::setUrl()
     * @uses ApiNewsArticle::setSource()
     * @uses ApiNewsArticle::setSnippet()
     * @uses ApiNewsArticle::setDate()
     * @param string $title
     * @param string $url
     * @param string $source
     * @param string $snippet
     * @param string $date
     */
    public function __construct($title = null, $url = null, $source = null, $snippet = null, $date = null)
    {
        $this
            ->setTitle($title)
            ->setUrl($url)
            ->setSource($source)
            ->setSnippet($snippet)
            ->setDate($date);
    }
    /**
     * Get Title value
     * @return string|null
     */
    public function getTitle()
    {
        return $this->Title;
    }
    /**
     * Set Title value
     * @param string $title
     * @return \Api\StructType\ApiNewsArticle
     */
    public function setTitle($title = null)
    {
        $this->Title = $title;
        return $this;
    }
    /**
     * Get Url value
     * @return string|null
     */
    public function getUrl()
    {
        return $this->Url;
    }
    /**
     * Set Url value
     * @param string $url
     * @return \Api\StructType\ApiNewsArticle
     */
    public function setUrl($url = null)
    {
        $this->Url = $url;
        return $this;
    }
    /**
     * Get Source value
     * @return string|null
     */
    public function getSource()
    {
        return $this->Source;
    }
    /**
     * Set Source value
     * @param string $source
     * @return \Api\StructType\ApiNewsArticle
     */
    public function setSource($source = null)
    {
        $this->Source = $source;
        return $this;
    }
    /**
     * Get Snippet value
     * @return string|null
     */
    public function getSnippet()
    {
        return $this->Snippet;
    }
    /**
     * Set Snippet value
     * @param string $snippet
     * @return \Api\StructType\ApiNewsArticle
     */
    public function setSnippet($snippet = null)
    {
        $this->Snippet = $snippet;
        return $this;
    }
    /**
     * Get Date value
     * @return string|null
     */
    public function getDate()
    {
        return $this->Date;
    }
    /**
     * Set Date value
     * @param string $date
     * @return \Api\StructType\ApiNewsArticle
     */
    public function setDate($date = null)
    {
        $this->Date = $date;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see StructClass::__set_state()
     * @uses StructClass::__set_state()
     * @param array $array the exported values
     * @return \Api\StructType\ApiNewsArticle
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
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
