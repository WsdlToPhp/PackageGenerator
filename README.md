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

Package Generator generates a PHP SDK from any WSDL so you can easily consume any SOAP Web Service without wondering how SOAP is used under the hood.

Package Generator provides many options to generate your package even if a few are required. This project has been tested with many WSDL and is currently used on the platform [Providr.IO](https://providr.io).

## Installation

#### In a project:

```bash
composer require wsdltophp/packagegenerator
```

#### With command line:

##### For PHP5

```bash
$ wget https://phar.wsdltophp.com/wsdltophp-php5.phar
$ chmod +x wsdltophp-php5.phar
$ mv wsdltophp-php5.phar /usr/local/bin/wsdltophp
```

##### For PHP7

```bash
$ wget https://phar.wsdltophp.com/wsdltophp-php7.phar
$ chmod +x wsdltophp-php7.phar
$ mv wsdltophp-php7.phar /usr/local/bin/wsdltophp
```

## Usage

There is two ways to generate your package (apart from being in a project and generating it through the command line):

- **standalone** (*default behaviour*): this means the package is generated as an independent project with its own `composer.json` file. At the end of the generation, the root directory where the package has been generated will contain the `composer.json`, the `composer.lock` file and the `vendor` directory.
- **not standalone**: this means the package is generated as part of an existing project using its own `composer.json` file.

The `standalone` option is fully detailed in the [Standalone section](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#standalone).

All the options are fully detailed in the [Options page](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options).

#### In a project:

```php
// Options definition: the configuration file parameter is optional
$options = GeneratorOptions::instance(/* '/path/file.yml' */);
$options
    ->setOrigin('http://developer.ebay.com/webservices/latest/ebaySvc.wsdl')
    ->setDestination('./MySdk')
    ->setComposerName('myproject/mysdk');
// Generator instanciation
$generator = new Generator($options);
// Package generation
$generator->generatePackage();
```

#### With command line:

The command line is:
```bash
$ wsdltophp generate:package \
    --urlorpath="http://developer.ebay.com/webservices/latest/ebaySvc.wsdl" \
    --destination="./MySdk" \
    --composer-name="myproject/mysdk" \
    --force
```

_In order to see all the used options, just remove the `--force` argument._

## Testing

```bash
# launch all tests
$ phpunit

# launch a testsuite: command, configuration, utils, wsdlhandler, model, container, parser, file, packagegenerator
$ phpunit --testsuite=model
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details. In addition, code documentation is at [doc.wsdltophp.com](http://doc.wsdltophp.com).

## Credits

Developers who helped on this project are listed in the [composer.json](composer.json#L8) file as `Contributor` and are:
- [Gemorroj](https://github.com/Gemorroj)
- [ceeram](https://github.com/ceeram)
- [Georgiy Oganisyan](https://github.com/GroxExMachine)
- [Jan Zaeske](https://github.com/jzaeske)
- [Tom Mottram](https://github.com/tomp4l)

## FAQ

If you have any question, please read the [Options page](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options) about the available options to generate the package.

There is also a [FAQ](https://github.com/WsdlToPhp/PackageGenerator/wiki/FAQ) that contains miscellaneous questions about the package generation and its usage.

Then if you still have a question, feel free to [create an issue](https://github.com/WsdlToPhp/PackageGenerator/issues/new).

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
