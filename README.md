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
	/src
	    /ArrayType/: classes that contain one property which is an array of items
	    /EnumType/: classes that only contain constants, enumerations defined by the WSDL
	    /ServiceType/: classes that give access to the operations
	    /StructType/: any type that represents a request/response and their sub elements
	    /ClassMap.php: the class that defines the mapping between generated classes and declared structs
    /vendor/: automatically created by composer on standalone mode (default: true)
    /composer.json: automatically created by composer on standalone mode (default: true)
    /composer.lock: automatically created by composer on standalone mode (default: true)
    /tutorial.php: generated as soon the GenerateTutorial option is enabled (default: true)
```

## Options
The generator comes with several options:
- **Required** package configuration:
    - **\-\-urlorpath**: path or url to get the WSDL
    - **\-\-destination**: absolute path where the classes must be generated
    - **\-\-composer-name**: must be present to define the composer name in the generated package's composer.json file
    - **\-\-force**: must be present to generate the package, otherwise you'll get the debug informations
- _**Optional**_ generated class naming:
    - **\-\-prefix**: the classes name prefix, used as the main namespace
    - **\-\-suffix**: the classes name suffix, used as the main namespace if no prefix is defined
- _**Optional**_ basic Authentication credentials, if the WSDL is protected by a Basic Authentication, then specify:
    - **\-\-login**: the basic authentication login
    - **\-\-password**: the basic authentication login
- _**Optional**_ proxy configuration, if you're behind a proxy:
    - **\-\-proxy-host**: the proxy host
    - **\-\-proxy-port**: the proxy port
    - **\-\-proxy-login**: your proxy login
    - **\-\-proxy-password**: your proxy password
- _**Optional**_ directories structure:
    - **\-\-category**:
        - **cat** _(default)_, each class is put in a directory that matches its type such as:
            - **ArrayType**: any array type class
            - **EnumType**: any class that only contains constants _(enumerations)_
            - **ServiceType**: classes that contains the methods matching the _operations_
            - **StructType**: any class that is a _simpleType_ or _complexType_ or an _abstract_ element
        - **none**: all the classes are generated directly in the root directory defined by the destination
    - **\-\-structs-folder**: each struct is created in a sub directory of the root **src** folder. By default, the directory is named _StructType_
    - **\-\-arrays-folder**: each array is created in a sub directory of the root **src** folder. By default, the directory is named _ArrayType_
    - **\-\-enums-folder**: each enumeration is created in a sub directory of the root **src** folder. By default, the directory is named _EnumType_
    - **\-\-services-folder**: each service class is created in a sub directory of the root **src** folder. By default, the directory is named _ServiceType_
- _**Optional**_ operation gathering method, if you have **getList**, **getUsers**, **getData** and **setUser** as operations:
    - **\-\-gathermethods**:
        - **start** _(default)_: you'll have one **Get** class that contains the **getList**, **getUsers** and **getData** methods and another class **Set** that contains only the **setUser** method
        - **none**: you'll have only one class that contains all the methods **getList**, **getUsers**, **getData** and **setUser** methods
        - **end**, you'll have 4 classes :
            - **List** that contains the **getList** method,
            - **User** that contains the **setUser** method,
            - **Users** that contains the **getUsers** method,
            - **Data** that contains the **getData** method
- _**Optional**_ generated classes namespace and inheritance:
    - **\-\-namespace**: prefix classes' main namespace with your namespace
    - **\-\-standalone** _(default: ```true```)_: enables/disables the installation of the [PackageBase](https://packagist.org/packages/wsdltophp/packagebase) package that contains the base class from which StructType, ArrayType and ServiceType classes inherit
    - **\-\-struct** _(default: \WsdlToPhp\PackageBase\AbstractStructBase)_: sets the class from which StructType classes inherit, see [StructInterface](https://github.com/WsdlToPhp/PackageBase#structinterface)
    - **\-\-structarray** _(default: \WsdlToPhp\PackageBase\AbstractStructArrayBase)_: sets the class from which StructArrayType classes inherit, see [StructArrayInterface](https://github.com/WsdlToPhp/PackageBase#structarrayinterface)
    - **\-\-soapclient** _(default: \WsdlToPhp\PackageBase\AbstractSoapClientBase)_: sets the class from which ServiceType classes inherit, see [SoapClientInterface](https://github.com/WsdlToPhp/PackageBase#soapclientinterface)
- _**Optional**_ various other options:
    - **\-\-gentutorial** _(default: ```true```)_: enables/disables the tutorial file generation
    - **\-\-genericconstants** _(default: ```false```)_: enables/disables the naming of the constants (_enumerations_) with the constant value or as a generic name:
        - **true**: ```const VALUE_DEFAULT = 'Default'```
        - **false**: ```const ENUM_VALUE_0 = 'Default'```
    - **\-\-addcomments**: alow to add PHP comments to classes' PHP DocBlock _(mulitple values allowed)_

## Usages
### Command line
#### The most basic way
To generate a package:
```
$ wget https://phar.wsdltophp.com/wsdltophp.phar
$ ./wsdltophp.phar generate:package -h => display help
$ ./wsdltophp.phar generate:package --version => display the version
$ ./wsdltophp.phar generate:package \
    --urlorpath="http://www.mydomain.com/wsdl.xml" \
    --destination="/path/to/where/the/package/must/be/generated/" \
    --prefix="MyPackage" \
    --force
$ cd /path/to/where/the/package/must/be/generated/
$ ls -la => enjoy!
$ vi tutorial.php :smile:
```
#### With full options
To generate a package:
```
$ wget https://phar.wsdltophp.com/wsdltophp.phar
$ ./wsdltophp.phar generate:package \
    --urlorpath="http://developer.ebay.com/webservices/latest/ebaySvc.wsdl" \
    --login="*******" \
    --password="*******" \
    --proxy-host="****************************" \
    --proxy-port=*******  \
    --proxy-login="*******" \
    --proxy-password="*******" \
    --destination='/var/www/Api/' \
    --prefix="Api" \
    --suffix="Project" \
    --category="cat" \
    --gathermethods="start" \
    --genericconstants=false \
    --gentutorial=true \
    --standalone=true \
    --addcomments="date:2015-04-22" \
    --addcomments="author:Me" \
    --addcomments="release:1.1.0" \
    --addcomments="team:Dream" \
    --namespace="My\Project" \
    --struct="\Std\Opt\StructClass" \
    --structarray="\Std\Opt\StructArrayClass" \
    --soapclient="\Std\Opt\SoapClientClass" \
    --composer-name="wsdltophp/package" \
    --structs-folder="Structs" \
    --arrays-folder="Arrays" \
    --enums-folder="Enums" \
    --services-folder="Services" \
    --force
$ cd /var/www/Api/
$ ls -la => enjoy!
```
#### Debug options before actually generating the package
Remove ```--force``` option from the previous command line to get this result:
```
 Start at 2015-08-29 07:51:32
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
    basic_login: *******
    basic_password: *******
    proxy_host: ****************************
    proxy_port: *******
    proxy_login: *******
    proxy_password: *******
    soap_options:
    composer_name: wsdltophp/package
    structs_folder: Structs
    arrays_folder: Arrays
    enums_folder: Enums
    services_folder: Services
 End at 2015-08-29 07:51:32, duration: 00:00:00
```
### Programmatic
```
$ cd /path/to/src/WsdlToPhp/PackageGenerator/
$ composer install
```
#### The basic way
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
#### Dealing with the options
```php
<?php
require_once __DIR__ . '/vendor/autoload.php'
use \WsdlToPhp\PackageGenerator\Generator\Generator;
use \WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions

// Options definition
$options = GenerationOptions::instance();
$options
    ->setCategory(GeneratorOptions::VALUE_CAT)
    ->setGatherMethods(GeneratorOptions::VALUE_START)
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
    ->setProxyPassword($proxyPassword)
    ->setComposerName('wsdltophp/package')
    ->setStructsFolder('Structs')
    ->setArraysFolder('Arrays')
    ->setEnumsFolder('Enums')
    ->setServicesFolder('Services');

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