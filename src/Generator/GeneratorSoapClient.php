<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Generator;

use WsdlToPhp\PackageBase\SoapClientInterface;

class GeneratorSoapClient extends AbstractGeneratorAware
{
    protected SoapClient $soapClient;

    public function __construct(Generator $generator)
    {
        parent::__construct($generator);
        $this->initSoapClient();
    }

    public function initSoapClient(): self
    {
        try {
            $soapClient = new SoapClient($this->getSoapClientOptions(\SOAP_1_1));
        } catch (\SoapFault $fault) {
            try {
                $soapClient = new SoapClient($this->getSoapClientOptions(\SOAP_1_2));
            } catch (\SoapFault $fault) {
                throw new \InvalidArgumentException(sprintf('Unable to load WSDL at "%s"!', $this->getGenerator()->getOptionOrigin()), __LINE__, $fault);
            }
        }

        return $this->setSoapClient($soapClient);
    }

    public function getSoapClientOptions(int $soapVersion): array
    {
        return array_merge([
            SoapClientInterface::WSDL_SOAP_VERSION => $soapVersion,
            SoapClientInterface::WSDL_URL => $this->getGenerator()->getOptionOrigin(),
            SoapClientInterface::WSDL_LOGIN => $this->getGenerator()->getOptionBasicLogin(),
            SoapClientInterface::WSDL_PROXY_HOST => $this->getGenerator()->getOptionProxyHost(),
            SoapClientInterface::WSDL_PROXY_PORT => $this->getGenerator()->getOptionProxyPort(),
            SoapClientInterface::WSDL_PASSWORD => $this->getGenerator()->getOptionBasicPassword(),
            SoapClientInterface::WSDL_PROXY_LOGIN => $this->getGenerator()->getOptionProxyLogin(),
            SoapClientInterface::WSDL_PROXY_PASSWORD => $this->getGenerator()->getOptionProxyPassword(),
        ], $this->getGenerator()->getOptionSoapOptions());
    }

    public function setSoapClient(SoapClient $soapClient): self
    {
        $this->soapClient = $soapClient;

        return $this;
    }

    public function getSoapClient(): SoapClient
    {
        return $this->soapClient;
    }

    public function getSoapClientStreamContextOptions(): array
    {
        return $this->getSoapClient()->getStreamContextOptions();
    }
}
