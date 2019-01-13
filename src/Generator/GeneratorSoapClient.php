<?php

namespace WsdlToPhp\PackageGenerator\Generator;

class GeneratorSoapClient extends AbstractGeneratorAware
{
    /**
     * @var SoapClient
     */
    protected $soapClient;
    /**
     * GeneratorSoapClient constructor.
     * @param Generator $generator
     * @see \WsdlToPhp\PackageGenerator\Generator\AbstractGeneratorAware::__construct()
     */
    public function __construct(Generator $generator)
    {
        parent::__construct($generator);
        $this->initSoapClient();
    }
    /**
     * @throws \InvalidArgumentException
     * @return GeneratorSoapClient
     */
    public function initSoapClient()
    {
        try {
            $soapClient = new SoapClient($this->getSoapClientOptions(SOAP_1_1));
        } catch (\SoapFault $fault) {
            try {
                $soapClient = new SoapClient($this->getSoapClientOptions(SOAP_1_2));
            } catch (\SoapFault $fault) {
                throw new \InvalidArgumentException(sprintf('Unable to load WSDL at "%s"!', $this->getGenerator()->getOptionOrigin()), __LINE__, $fault);
            }
        }
        return $this->setSoapClient($soapClient);
    }
    /**
     * @param int $soapVersion
     * @return string[]
     */
    public function getSoapClientOptions($soapVersion)
    {
        return array_merge([
            SoapClient::WSDL_SOAP_VERSION => $soapVersion,
            SoapClient::WSDL_URL => $this->getGenerator()->getOptionOrigin(),
            SoapClient::WSDL_LOGIN => $this->getGenerator()->getOptionBasicLogin(),
            SoapClient::WSDL_PROXY_HOST => $this->getGenerator()->getOptionProxyHost(),
            SoapClient::WSDL_PROXY_PORT => $this->getGenerator()->getOptionProxyPort(),
            SoapClient::WSDL_PASSWORD => $this->getGenerator()->getOptionBasicPassword(),
            SoapClient::WSDL_PROXY_LOGIN => $this->getGenerator()->getOptionProxyLogin(),
            SoapClient::WSDL_PROXY_PASSWORD => $this->getGenerator()->getOptionProxyPassword(),
        ], $this->getGenerator()->getOptionSoapOptions());
    }
    /**
     * @param SoapClient $soapClient
     * @return GeneratorSoapClient
     */
    public function setSoapClient(SoapClient $soapClient)
    {
        $this->soapClient = $soapClient;
        return $this;
    }
    /**
     * @return SoapClient
     */
    public function getSoapClient()
    {
        return $this->soapClient;
    }
    /**
     * @return array
     */
    public function getSoapClientStreamContextOptions()
    {
        $options = [];
        $soapClient = $this->getSoapClient();
        if ($soapClient instanceof SoapClient) {
            $options = $soapClient->getStreamContextOptions();
        }
        return $options;
    }
}
