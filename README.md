# WsdlToPhp Package Generator
[![Latest Stable Version](https://poser.pugx.org/wsdltophp/packagegenerator/version.png)](https://packagist.org/packages/wsdltophp/packagegenerator)
[![Build Status](https://api.travis-ci.org/WsdlToPhp/PackageGenerator.svg)](https://travis-ci.org/WsdlToPhp/PackageGenerator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/badges/quality-score.png)](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/)
[![Code Coverage](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/badges/coverage.png)](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/)
[![Dependency Status](https://www.versioneye.com/user/projects/5571b3136634650018000001/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5571b3136634650018000001)

Package Generator eases the creation of a PHP package in order to call any SOAP oriented Web Service.

Its purpose is to provide a full OOP approach to send SOAP requests using:
- PHP classes for parameters that match the Web Service parameter names
- PHP Service classes that match the operation names provided by the Web Service

The generated package does not need PEAR nor NuSOAP, at least :
- PHP 5.3.3,
- SoapClient : natively installed with PHP,
- DOM : natively installed with PHP,
- [PackageBase](https://packagist.org/packages/wsdltophp/packagebase): automatically installed on standalone mode (default mode), it contains utility classes used by the generated classes. Full documentation about the classes is available at the project [homepage](https://github.com/WsdlToPhp/PackageBase). **If you're not using the standalone mode, you must add ```wsdltophp/packagebase: dev-master``` in your main composer.json file.**

## Generated package hierarchy
```
/Api
    /ArrayType/: classes that contain one property which is an array of items
    /EnumType/: classes that only contain constants, enumerations defined by the WSDL
    /ServiceType/: classes that give access to the operations
    /StructType/: any type that represents a request/response and their sub elements
    /vendor/: automatically created by composer on standalone mode (default: true)
    /composer.json: automatically created by composer on standalone mode (default: true)
    /composer.lock: automatically created by composer on standalone mode (default: true)
    /tutorial.php: generated as soon the GenerateTutorial option is enabled (default: true)
```

## Options
The generator comes with several options:
- **Required** package configuration:
    - **\-\-wsdl-urlorpath**: path or url to get the WSDL
    - **\-\-wsdl-prefix**: the classes prefix, used as the main namespace
    - **\-\-wsdl-suffix**: the classes suffix, used as the main namespace if no prefix is defined
    - **\-\-wsdl-destination**: absolute path where the classes must be generated
    - **\-\-force**: must be present to generate the package, otherwise you'll get the debug informations
- _**Optional**_ basic Authentication credentials, if the WSDL is protected by a Basic Authentication, then specify:
    - **\-\-wsdl-login**: the basic authentication login
    - **\-\-wsdl-password**: the basic authentication login
- _**Optional**_ Proxy configuration, if you're behind a proxy:
    - **\-\-wsdl-proxy-host**: the proxy host
    - **\-\-wsdl-proxy-port**: the proxy port
    - **\-\-wsdl-proxy-login**: your proxy login
    - **\-\-wsdl-proxy-password**: your proxy password
- _**Optional**_ directories structure:
    - **\-\-wsdl-category**:
        - **cat** _(default)_, each class is put in a directory that matches its type such as:
            - **ArrayType**: any array type class
            - **EnumType**: any class that only contains constants _(enumerations)_
            - **ServiceType**: classes that contains the methods matching the _operations_
            - **StructType**: any class that is a _simpleType_ or _complexType_ or an _abstract_ element
        - **none**: all the classes are generated directly in the root directory defined by the destination
- _**Optional**_ operation gathering method, if you have **getList**, **getUsers** and **getData** as operations:
    - **\-\-wsdl-gathermethods**:
        - **start** _(default)_: you'll have one **Get** class that contains the **getList**, **getUsers** and **getData** methods
        - **end**, you'll have 3 classes :
            - **List** that contains the getList method,
            - **Users** that contains the getUsers method,
            - **Data** that contains the getData method
- _**Optional**_ generated classes namespace and inheritance:
    - **\-\-wsdl-namespace**: prefix classes' main namespace with your namespace
    - **\-\-wsdl-standalone** _(default: ```true```)_: enables/disables the installation of the [PackageBase](https://packagist.org/packages/wsdltophp/packagebase) package that contains the base class from which StructType, ArrayType and ServiceType classes inherit
    - **\-\-wsdl-struct** _(default: \WsdlToPhp\PackageBase\AbstractStructBase)_: sets the class from which StructType classes inherit, see [StructInterface](https://github.com/WsdlToPhp/PackageBase#structinterface)
    - **\-\-wsdl-structarray** _(default: \WsdlToPhp\PackageBase\AbstractStructArrayBase)_: sets the class from which StructArrayType classes inherit, see [StructArrayInterface](https://github.com/WsdlToPhp/PackageBase#structarrayinterface)
    - **\-\-wsdl-soapclient** _(default: \WsdlToPhp\PackageBase\AbstractSoapClientBase)_: sets the class from which ServiceType classes inherit, see [SoapClientInterface](https://github.com/WsdlToPhp/PackageBase#soapclientinterface)
- _**Optional**_ various other options:
    - **\-\-wsdl-gentutorial** _(default: ```true```)_: enables/disables the tutorial file generation
    - **\-\-wsdl-genericconstants** _(default: ```false```)_: enables/disables the naming of the constants (_enumerations_) with the constant value or as a generic name:
        - **true**: ```const VALUE_DEFAULT = 'Default'```
        - **false**: ```const ENUM_VALUE_0 = 'Default'```
    - **\-\-wsdl-addcomments**: alow to add PHP comments to classes' PHP DocBlock _(mulitple values allowed)_

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
$ vi tutorial.php :smile:
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
    --wsdl-suffix="Project" \
    --wsdl-category="cat" \
    --wsdl-gathermethods="start" \
    --wsdl-genericconstants=false \
    --wsdl-gentutorial=true \
    --wsdl-namespace="My\Project" \
    --wsdl-standalone=true \
    --wsdl-addcomments="date:2015-04-22" \
    --wsdl-addcomments="author:Me" \
    --wsdl-addcomments="release:1.1.0" \
    --wsdl-addcomments="team:Dream" \
    --wsdl-namespace="My\Project" \
    --wsdl-struct="\Std\Opt\StructClass" \
    --wsdl-structarray="\Std\Opt\StructArrayClass" \
    --wsdl-soapclient="\Std\Opt\SoapClientClass" \
    --force
$ cd /var/www/Api/
$ ls -la => enjoy!
```
#### Debug options before actually generating the package
Remove ```--force``` option from the previous command line to get this result:
```
 Start at 2015-08-06 23:09:44
  Generation not launched, use "--force" option to force generation
  Used generator's options:
    category: cat
    gather_methods: start
    generic_constants_names:
    generate_tutorial_file: 1
    add_comments: 2015-04-22, Me, 1.1.0, Dream
    namespace_prefix: My\Project
    standalone: 1
    struct_class: \Std\Opt\StructClass
    struct_array_class: \Std\Opt\StructArrayClass
    soap_client_class: \Std\Opt\SoapClientClass
    origin: http://developer.ebay.com/webservices/latest/ebaySvc.wsdl
    destination: /var/www/Api/
    prefix: Api
    suffix: Project
    basic_login:
    basic_password:
    proxy_host: ****************************
    proxy_port: *******
    proxy_login: *******
    proxy_password: *******
    soap_options:
 End at 2015-08-06 23:09:44, duration: 00:00:00
```
### Programmatic usage
```
$ cd /path/to/src/WsdlToPhp/PackageGenerator/
$ composer install
```
#### The most basic way
```php
<?php
require_once __DIR__ . '/vendor/autoload.php'
use \WsdlToPhp\PackageGenerator\Generator\Generator;
use \WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions

// Options definition
$options = GenerationOptions::instance();
$options
    ->setOrigin('http://www.mydomain.com/?wsdl')
    ->setDestination('/path/to/where/the/package/must/be/generated/')
    ->setPrefix('MyPackage');

$generator = new Generator($options);
$generator->generateClasses();
```
Then:
```php
<?php
require_once '/path/to/where/the/package/must/be/generated/vendor/autoload.php';
$options = array(
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'http://developer.ebay.com/webservices/latest/ebaySvc.wsdl',
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => \MyPackage\MyPackageClassMap::classMap(),
);
// if getList operation is provided by the Web service
$serviceGet = new \MyPackage\ServiceType\MyPackageServiceGet($options);
$result = $serviceGet->getList();
// if addRole operation is provided by the Web service
$serviceAdd = new \MyPackage\ServiceType\MyPackageServiceAdd($options);
$result = $serviceAdd->addRole();
// ...
```
#### Playing with options
```php
<?php
require_once __DIR__ . '/vendor/autoload.php'
use \WsdlToPhp\PackageGenerator\Generator\Generator;
use \WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions

// Options definition
$options = GenerationOptions::instance();
$options
    ->setCategory(GeneratorOptions::VALUE_CAT)
    ->setMethods(GeneratorOptions::VALUE_START)
    ->setGenericConstantsNames(GeneratorOptions::VALUE_FALSE)
    ->setGenerateTutorialFile(GeneratorOptions::VALUE_TRUE)
    ->setStandalone(GeneratorOptions::VALUE_TRUE)
    ->setNamespacePrefix('My\Project')
    ->setAddComments(array(
        'date'    => date('Y-m-d'),
        'team'    => 'Dream',
        'author'  => 'Me',
        'release' => 1.1.0,
    ))
    ->setNamespacePrefix('My\Project')
    ->setStructClass('\Std\Opt\StructClass')
    ->setStructArrayClass('\Std\Opt\StructArrayClass')
    ->setSoapClientClass('\Std\Opt\SoapClientClass')
    ->setOrigin('http://www.mydomain.com/?wsdl')
    ->setDestination('/path/to/where/the/package/must/be/generated/')
    ->setPrefix('Api')
    ->setSuffix('Project')
    ->setBasicLogin($login)
    ->setBasicPassword($password)
    ->setProxyHost($proxyHost)
    ->setProxyPort($proxyPort)
    ->setProxyLogin($proxyLogin)
    ->setProxyPassword($proxyPassword);

// Generator instanciation and package generation
$generator = new Generator($options);
$generator->generateClasses();
```
## Unit tests
You can run the unit tests with the following command:
```
$ cd /path/to/src/WsdlToPhp/PackageGenerator/
$ composer install
$ phpunit
```
You have several ```testsuite```s available which run test in the proper order:

- **configuration**: tests configuration readers
- **utils**: tests utils class
- **domhandler**: tests dom handlers (Basic and Wsdl + Tag)
- **model**: tests models
- **container**: tests containers (Model and PhpElement)
- **parser**: tests parsers (SoapClient and Wsdl)
- **file**: tests files generation
- **packagegenerator**: tests generator methods

```
$ cd /path/to/src/WsdlToPhp/PackageGenerator/
$ composer install
$ phpunit --testsuite=model
```