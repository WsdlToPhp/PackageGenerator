# Package Generator

> Package Generator generates a PHP SDK from any WSDL.

[![License](https://poser.pugx.org/wsdltophp/packagegenerator/license)](https://packagist.org/packages/wsdltophp/packagegenerator)
[![Latest Stable Version](https://poser.pugx.org/wsdltophp/packagegenerator/version.png)](https://packagist.org/packages/wsdltophp/packagegenerator)
[![TeamCity build status](https://teamcity.mikael-delsol.fr/app/rest/builds/buildType:id:PackageGenerator_Build,branch:name:3.x/statusIcon.svg)](https://github.com/WsdlToPhp/PackageGenerator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/badges/quality-score.png)](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/)
[![Code Coverage](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/badges/coverage.png)](https://scrutinizer-ci.com/g/WsdlToPhp/PackageGenerator/)
[![Total Downloads](https://poser.pugx.org/wsdltophp/packagegenerator/downloads)](https://packagist.org/packages/wsdltophp/packagegenerator)
[![StyleCI](https://styleci.io/repos/35660532/shield)](https://styleci.io/repos/35660532)
[![SymfonyInsight](https://insight.symfony.com/projects/73ec7ea6-a771-487a-8ebe-71f6b2e8fd4a/mini.svg)](https://insight.symfony.com/projects/73ec7ea6-a771-487a-8ebe-71f6b2e8fd4a)

Package Generator generates a PHP SDK from any WSDL so you can easily consume any SOAP Web Service without wondering how SOAP is used under the hood.

Package Generator provides many options to generate your package even if a few are required. This project has been tested with many WSDL and is currently used on the platform [Providr.IO](https://providr.io).

## Installation

### In a project:

```bash
composer require wsdltophp/packagegenerator --dev
```

### With command line:

#### For PHP5

```bash
$ wget https://phar.wsdltophp.com/wsdltophp-php5.phar
$ chmod +x wsdltophp-php5.phar
$ mv wsdltophp-php5.phar /usr/local/bin/wsdltophp
```

#### For PHP7

```bash
$ wget https://phar.wsdltophp.com/wsdltophp-php7.phar
$ chmod +x wsdltophp-php7.phar
$ mv wsdltophp-php7.phar /usr/local/bin/wsdltophp
```

### With Docker:

```bash
$ docker run --rm -it mikaelcom/wsdltophp:tagname
```

## Usage

There is two ways to generate your package (apart from being in a project and generating it through the command line):

- **standalone** (*default behaviour*): this means the package is generated as an independent project with its own `composer.json` file. At the end of the generation, the root directory where the package has been generated will contain the `composer.json`, the `composer.lock` file and the `vendor` directory.
- **not standalone**: this means the package is generated as part of an existing project using its own `composer.json` file.

The `standalone` option is fully detailed in the [Standalone section](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#standalone).

All the options are fully detailed in the [Options page](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options).

### In a project:

```php
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Generator;

// Options definition: the configuration file parameter is optional
$options = GeneratorOptions::instance(/* '/path/file.yml' */);
$options
    ->setOrigin('http://developer.ebay.com/webservices/latest/ebaySvc.wsdl')
    ->setDestination('./MySdk')
    ->setComposerName('myproject/mysdk');
// Generator instantiation
$generator = new Generator($options);
// Package generation
$generator->generatePackage();
```

### With command line:

The command line is:
```bash
$ wsdltophp generate:package \
    --urlorpath="http://developer.ebay.com/webservices/latest/ebaySvc.wsdl" \
    --destination="./MySdk" \
    --composer-name="myproject/mysdk" \
    --force
```

_In order to see all the used options, just remove the `--force` argument._

### With Docker:

Such as with the command line above, simply use the `docker run` command line before:
```bash
$ docker run --rm -it --volume $PWD:/var/www mikaelcom/wsdltophp:tagname generate:package \
    --urlorpath="http://developer.ebay.com/webservices/latest/ebaySvc.wsdl" \
    --destination="/var/www/MySdk" \
    --composer-name="myproject/mysdk" \
    --force
```

_In order to see all the used options, just remove the `--force` argument._

## Versions

### 3.0
First released on 04 May 2018, maintained until version 5.0 is released. Please read the [UPGRADE-3.0](UPGRADE-3.0.md) note in order to acknowledge the main changes.

### 2.0
First released on 29 Apr 2016, maintained until version 4.0 is released.

### 1.0
Not maintained anymore

## Testing

```bash
# launch all tests
$ phpunit

# launch a testsuite: command, configuration, utils, wsdlhandler, model, container, parser, file, packagegenerator
$ phpunit --testsuite=model
```

## Testing using [Docker](https://www.docker.com/)
Thanks to the [Docker image](https://hub.docker.com/r/splitbrain/phpfarm) of [phpfarm](https://github.com/fpoirotte/phpfarm), tests can be run locally under *any* PHP version using the cli:
- php-5.4
- php-5.5
- php-5.6
- php-7.0
- php-7.1
- php-7.2
- php-7.3

First of all, you need to create your container which you can do using [docker-compose](https://docs.docker.com/compose/) by running the below command line from the root directory of the project:
```bash
$ docker-compose up -d --build
```

You then have a container named `package_generator` in which you can run `composer` commands and `php cli` commands such as:
```bash
# install deps in container (using update ensure it does use the composer.lock file if there is any)
$ docker exec -it package_generator php-7.2 /usr/bin/composer update
# run tests in container
$ docker exec -it package_generator php-7.2 -dmemory_limit=-1 vendor/bin/phpunit
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
- [Catirau Mihail](https://github.com/ustmaestro)
- [Alexander M. Turek](https://github.com/derrabus)
- [Valérian Girard](https://github.com/waldo2188)
- [hordijk](https://github.com/hordijk)
- [Andreas Möller](https://github.com/localheinz)
- [Andreas Kintzinger](https://github.com/Phobetor)
- [Hendrik Luup](https://github.com/hluup)
- [Jacob Dreesen](https://github.com/jdreesen)

## FAQ

If you have any question, please read the [Options page](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options) about the available options to generate the package.

There is also a [FAQ](https://github.com/WsdlToPhp/PackageGenerator/wiki/FAQ) that contains miscellaneous questions about the package generation and its usage.

Then if you still have a question, feel free to [create an issue](https://github.com/WsdlToPhp/PackageGenerator/issues/new).

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
