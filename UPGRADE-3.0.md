# UPGRADE FROM 2.* to 3.*

The main change is that the property `$soapClient` in the abstract class `AbstractSoapClientBase` is no more static.

**Previously**:
```php
class MyService extends AbstractSoapClientBase
{
    public function CreateQueue(\Api\StructType\ApiCreateQueue $body)
    {
        try {
            $this->setResult(self::getSoapClient()->CreateQueue($body));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
}
```

`self::getSoapClient()` was used to access the SoapClient instance.

**Now**:
```php
class MyService extends AbstractSoapClientBase
{
    public function CreateQueue(\Api\StructType\ApiCreateQueue $body)
    {
        try {
            $this->setResult($this->getSoapClient()->CreateQueue($body));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
}
```

`$this->getSoapClient()` is now used to access the SoapClient instance.

The [PackageBase](https://github.com/WsdlToPhp/PackageBase) version is now >= 2.0.
