# Package Generator

> Package Generator generates a PHP SDK from any WSDL.

[![License](https://poser.pugx.org/wsdltophp/packagegenerator/license)](https://packagist.org/packages/wsdltophp/packagegenerator)
[![Latest Stable Version](https://poser.pugx.org/wsdltophp/packagegenerator/version.png)](https://packagist.org/packages/wsdltophp/packagegenerator)
[![Build Status](https://api.travis-ci.org/WsdlToPhp/PackageGenerator.svg)](https://travis-ci.org/WsdlToPhp/PackageGenerator)
[![PHP 7 ready](http://php7ready.timesplinter.ch/WsdlToPhp/PackageGenerator/badge.svg)](https://travis-ci.org/WsdlToPhp/PackageGenerator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/badges/quality-score.png)](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/)
[![Code Coverage](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/badges/coverage.png)](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/)
[![Total Downloads](https://poser.pugx.org/wsdltophp/packagegenerator/downloads)](https://packagist.org/packages/wsdltophp/packagegenerator)
[![Dependency Status](https://www.versioneye.com/user/projects/5571b3136634650018000001/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5571b3136634650018000001)
[![StyleCI](https://styleci.io/repos/35660532/shield)](https://styleci.io/repos/35660532)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/661a53c4-3f4a-4a17-a4b2-051282019c87/mini.png)](https://insight.sensiolabs.com/projects/661a53c4-3f4a-4a17-a4b2-051282019c87)

Package Generator generates a PHP SDK from any WSDL so you can easily consume any SOAP Web Service wihtout wondering that SOAP is used under the hood.

Package Generator provides many options even if a few are required to generate your package. This project has been tested with many WSDL and is currently used on the platform [Providr.IO](https://providr.io).

# Installation

In a project:
```bash
composer require wsdltophp/packagegenerator
```

With command line:

__For PHP5__
```bash
$ wget https://phar.wsdltophp.com/wsdltophp-php5.phar
$ chmod +x wsdltophp-php5.phar
$ mv wsdltophp-php5.phar /usr/local/bin/wsdltophp
```

__For PHP7__
```bash
$ wget https://phar.wsdltophp.com/wsdltophp-php7.phar
$ chmod +x wsdltophp-php7.phar
$ mv wsdltophp-php7.phar /usr/local/bin/wsdltophp
```

# Usage
The command line is:
```bash
$ wsdltophp generate:package \
    --urlorpath="http://developer.ebay.com/webservices/latest/ebaySvc.wsdl" \
    --destination="./MySdk" \
    --composer-name="myproject/mysdk" \
    --force
```

_In order to see all the used options, just remove the `--force` argument._

# Testing
```bash
# launch all tests
$ phpunit

# launch a testsuite: command, configuration, utils, wsdlhandler, model, container, parser, file, packagegenerator
$ phpunit --testsuite=model
```

# Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Warning about the generated classes and their property usage
Every generated classes which represent a Struct element that has to be sent or received have their property defined as public. Nevertheless you **SHOULD** always use the generated setters and getters in order to ensure the good behavior of the objects you create.
Following the fixed issue [#48](https://github.com/WsdlToPhp/PackageGenerator/issues/48), it has been decided to unset `nillable` and non required (`minOccurs`=0) properties from the object as soon as the value assigned to the property is null. To handle this particularities:
- the setter takes care of unsetting the property if the value passed as parameter to this method is `null`,
- the getter ensure that no PHP notice (`Undefined property`) is fired when we try to access the property, `null` is then returned.
