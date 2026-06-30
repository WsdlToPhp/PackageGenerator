<?php

declare(strict_types=1);

namespace StructType;

use InvalidArgumentException;
use \Std\Opt\StructClass;

/**
 * This class stands for NewsArticle StructType
 * @package Api
 * @subpackage Structs
 * @release 1.1.0
 */
#[\AllowDynamicProperties]
class ApiNewsArticle extends StructClass
{
    /**
     * The Title
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $Title = null;
    /**
     * The Url
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $Url = null;
    /**
     * The Source
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $Source = null;
    /**
     * The Snippet
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $Snippet = null;
    /**
     * The Date
     * Meta information extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string|null
     */
    protected ?string $Date = null;
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
    public function __construct(?string $title = null, ?string $url = null, ?string $source = null, ?string $snippet = null, ?string $date = null)
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
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (minOccurs=0)
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->Title ?? null;
    }
    /**
     * Set Title value
     * This property is removable from request (minOccurs=0), therefore if the value
     * assigned to this property is null, it is removed from this object
     * @param string $title
     * @return \StructType\ApiNewsArticle
     */
    public function setTitle(?string $title = null): self
    {
        // validation for constraint: string
        if (!is_null($title) && !is_string($title)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($title, true), gettype($title)), __LINE__);
        }
        if (is_null($title) || (is_array($title) && empty($title))) {
            unset($this->Title);
        } else {
            $this->Title = $title;
        }
        
        return $this;
    }
    /**
     * Get Url value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (minOccurs=0)
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->Url ?? null;
    }
    /**
     * Set Url value
     * This property is removable from request (minOccurs=0), therefore if the value
     * assigned to this property is null, it is removed from this object
     * @param string $url
     * @return \StructType\ApiNewsArticle
     */
    public function setUrl(?string $url = null): self
    {
        // validation for constraint: string
        if (!is_null($url) && !is_string($url)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($url, true), gettype($url)), __LINE__);
        }
        if (is_null($url) || (is_array($url) && empty($url))) {
            unset($this->Url);
        } else {
            $this->Url = $url;
        }
        
        return $this;
    }
    /**
     * Get Source value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (minOccurs=0)
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->Source ?? null;
    }
    /**
     * Set Source value
     * This property is removable from request (minOccurs=0), therefore if the value
     * assigned to this property is null, it is removed from this object
     * @param string $source
     * @return \StructType\ApiNewsArticle
     */
    public function setSource(?string $source = null): self
    {
        // validation for constraint: string
        if (!is_null($source) && !is_string($source)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($source, true), gettype($source)), __LINE__);
        }
        if (is_null($source) || (is_array($source) && empty($source))) {
            unset($this->Source);
        } else {
            $this->Source = $source;
        }
        
        return $this;
    }
    /**
     * Get Snippet value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (minOccurs=0)
     * @return string|null
     */
    public function getSnippet(): ?string
    {
        return $this->Snippet ?? null;
    }
    /**
     * Set Snippet value
     * This property is removable from request (minOccurs=0), therefore if the value
     * assigned to this property is null, it is removed from this object
     * @param string $snippet
     * @return \StructType\ApiNewsArticle
     */
    public function setSnippet(?string $snippet = null): self
    {
        // validation for constraint: string
        if (!is_null($snippet) && !is_string($snippet)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($snippet, true), gettype($snippet)), __LINE__);
        }
        if (is_null($snippet) || (is_array($snippet) && empty($snippet))) {
            unset($this->Snippet);
        } else {
            $this->Snippet = $snippet;
        }
        
        return $this;
    }
    /**
     * Get Date value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (minOccurs=0)
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->Date ?? null;
    }
    /**
     * Set Date value
     * This property is removable from request (minOccurs=0), therefore if the value
     * assigned to this property is null, it is removed from this object
     * @param string $date
     * @return \StructType\ApiNewsArticle
     */
    public function setDate(?string $date = null): self
    {
        // validation for constraint: string
        if (!is_null($date) && !is_string($date)) {
            throw new InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($date, true), gettype($date)), __LINE__);
        }
        if (is_null($date) || (is_array($date) && empty($date))) {
            unset($this->Date);
        } else {
            $this->Date = $date;
        }
        
        return $this;
    }
}
