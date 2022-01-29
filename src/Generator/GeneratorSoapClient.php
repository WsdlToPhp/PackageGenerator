<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Generator;

use InvalidArgumentException;
use SoapFault;

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
            $soapClient = new SoapClient($this->getSoapClientOptions(SOAP_1_1));
        } catch (SoapFault $fault) {
            try {
                $soapClient = new SoapClient($this->getSoapClientOptions(SOAP_1_2));
            } catch (SoapFault $fault) {
                throw new InvalidArgumentException(sprintf('Unable to load WSDL at "%s"!', $this->getGenerator()->getOptionOrigin()), __LINE__, $fault);
            }
        }

        return $this->setSoapClient($soapClient);
    }

    public function getSoapClientOptions(int $soapVersion): array
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
