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
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Title;
    /**
     * The Url
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Url;
    /**
     * The Source
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Source;
    /**
     * The Snippet
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Snippet;
    /**
     * The Date
     * Meta information extracted from the WSDL
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
        // validation for constraint: string
        if (!is_null($title) && !is_string($title)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($title, true), gettype($title)), __LINE__);
        }
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
        // validation for constraint: string
        if (!is_null($url) && !is_string($url)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($url, true), gettype($url)), __LINE__);
        }
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
        // validation for constraint: string
        if (!is_null($source) && !is_string($source)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($source, true), gettype($source)), __LINE__);
        }
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
        // validation for constraint: string
        if (!is_null($snippet) && !is_string($snippet)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($snippet, true), gettype($snippet)), __LINE__);
        }
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
        // validation for constraint: string
        if (!is_null($date) && !is_string($date)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($date, true), gettype($date)), __LINE__);
        }
        $this->Date = $date;
        return $this;
    }
}
