# WsdlToPhp Package Generator
[![Build Status](https://api.travis-ci.org/WsdlToPhp/PackageGenerator.svg)](https://travis-ci.org/WsdlToPhp/PackageGenerator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/badges/quality-score.png)](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/)
[![Code Coverage](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/badges/coverage.png)](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/)
[![Dependency Status](https://www.versioneye.com/user/projects/5571b3136634650018000001/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5571b3136634650018000001)

Package Generator eases the creation of a PHP package in order to call any SOAP oriented Web Service.

Its purpose is to provide a full OOP approach to send SOAP requests without needing any third party library.

The generated package is a standalone wihtout any dependencies. It's only based on native PHP SoapClient class. After its generation, you can move it anywhere you want and use it right away.

The generated package does not need PEAR nor NuSOAP nor anything else, at least PHP 5.3.3, SoapClient and DOM (which are natively installed from this PHP version)! 

## Usages
### Command line
#### The most basic way
To generate a package, nothing as simple as this:
```
    $ cd /path/to/src/WsdlToPhp/PackageGenerator/
    $ composer install
    $ php console wsdltophp:generate:package -h => display help
    $ php console wsdltophp:generate:package \
        --wsdl-urlorpath="http://www.mydomain.com/wsdl.xml" \
        --wsdl-destination="/path/to/where/the/package/must/be/generated/" \
        --wsdl-prefix="MyPackage" \
        --force
    $ cd /path/to/where/the/package/must/be/generated/
    $ ls -la => enjoy!
```
#### With full options
To generate a package, nothing as simple as this:
```
    $ cd /path/to/src/WsdlToPhp/PackageGenerator/
    $ composer install
    $ php console wsdltophp:generate:package -h => display help
    $ php console wsdltophp:generate:package \
        --wsdl-urlorpath="http://developer.ebay.com/webservices/latest/ebaySvc.wsdl" \
        --wsdl-proxy-host="****************************" \
        --wsdl-proxy-port=*******  \
        --wsdl-proxy-login="*******" \
        --wsdl-proxy-password="*******" \
        --wsdl-destination='/var/www/Api/' \
        --wsdl-prefix="Api" \
        --wsdl-category="cat" \
        --wsdl-subcategory="" \
        --wsdl-gathermethods="start" \
        --wsdl-reponseasobj=false \
        --wsdl-sendarrayparam=false \
        --wsdl-genautoload=true \
        --wsdl-genwsdlclass=true \
        --wsdl-paramsasarray=false \
        --wsdl-inherits="" \
        --wsdl-genericconstants=false \
        --wsdl-gentutorial=true \
        --wsdl-addcomments="date:2015-04-22" \
        --wsdl-addcomments="author:Me" \
        --wsdl-addcomments="release:1.1.0" \
        --wsdl-addcomments="team:Dream" \
        --force
    $ cd /var/www/Api/
    $ ls -la => enjoy!
```
### Programmatic usage
```
    $ cd /path/to/src/WsdlToPhp/PackageGenerator/
    $ composer install
```
#### The most basic way
```php
    <?php
    require_once 'autoload.php'
    use WsdlToPhp\PackageGenerator\Generator\Generator;
    $generator = Generator::instance("http://www.mydomain.com/wsdl.xml");
    $generator->generateClasses("MyPackage", "/path/to/where/the/package/must/be/generated/");
```
Then:
```php
    <?php
    require_once "/path/to/where/the/package/must/be/generated/MyPackageAutoload.php";
    // if getList operation is provided by the Web service
    $serviceGet = new MyPackageServiceGet();
    $result = $serviceGet->getList();
    // if addRole operation is provided by the Web service
    $serviceAdd = new MyPackageServiceAdd();
    $result = $serviceAdd->addRole();
    // ...
```
#### Playing with options
```php
    <?php
    require_once 'autoload.php'
    use WsdlToPhp\PackageGenerator\Generator\Generator;
    use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions
    // required authentification informations to access the WSDL
    $login = 'MyLogin';
    $password = '********';
    // any option accepted by the [SoapClient](http://php.net/manual/fr/soapclient.soapclient.php) class
    $options = array(
        'proxy_host'     => '',
        'proxy_port'     => '',
        'proxy_login'    => '',
        'proxy_password' => '',
    );
    $generator = Generator::instance("http://www.mydomain.com/?wsdl", $login, $password, $options);
    $generator->setOptionCategory(GeneratorOptions::VALUE_CAT);
    $generator->setOptionSubCategory('');
    $generator->setGatherMethods(GeneratorOptions::VALUE_START);
    $generator->setOptionGetResponseAsWsdlObject(GeneratorOptions::VALUE_FALSE);
    $generator->setOptionGetResponseAsWsdlObject(GeneratorOptions::VALUE_FALSE);
    $generator->setOptionSendArrayAsParameter(GeneratorOptions::VALUE_FALSE);
    $generator->setOptionGenerateAutoloadFile(GeneratorOptions::VALUE_TRUE);
    $generator->setOptionGenerateWsdlClassFile(GeneratorOptions::VALUE_TRUE);
    $generator->setOptionSendParametersAsArray(GeneratorOptions::VALUE_FALSE);
    $generator->setOptionInheritsClassIdentifier('');
    $generator->setOptionGenericConstantsNames(VALUE_FALSE);
    $generator->setOptionGenerateTutorialFile(VALUE_TRUE);
    $generator->setOptionAddComments(array(
        'date'    => date('Y-m-d'),
        'team'    => 'Dream',
        'author'  => 'Me',
        'release' => 1.1.0,
    ));
    $generator->generateClasses("MyPackage", "/path/to/where/the/package/must/be/generated/");
```
## Unit tests
You can run the unit tests with the following command:
```
    $ cd /path/to/src/WsdlToPhp/PackageGenerator/
    $ composer install
    $ phpunit
```
You have several ```testsuite```s available which run test in the proper order:

- configuration: tests configuration readers
- utils: tests utils class
- domhandler: tests dom handlers
- model: tests models
- container : tests containers
- parser: tests parsers
- file: tests files

```
    $ cd /path/to/src/WsdlToPhp/PackageGenerator/
    $ composer install
    $ phpunit --testsuite=model
```