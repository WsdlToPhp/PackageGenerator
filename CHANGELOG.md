# CHANGELOG

# 1.1.3
- issue #35 - __Construct set methods call and enum value conflict

# 1.1.2
- issue #34 - Name "0001CreateRequest" is invalid, please provide a valid name
- issue #33 - Name "" is invalid, please provide a valid name (operation named 0001CreateRequest)

## 1.1.1
- Improve readme file, Wiki has been created and filled up with useful additional informations into the FAQ page.

## 1.1.0
- issue #30 - Possibility to load our own options file when using the command line
- **bin/wsdltophp.phar** has been removed as it always be tagged with an anterior version than the actual published version. **wsdltophp.phar** is always available at https://phar.wsdltophp.com/wsdltophp.phar

## 1.0.0
First major release:
- issue #32 - Wrong Header Namespace ?
- issue #31 - Unable to create function parameter for method "mapIpndDetailsToNumber" with type "NULL"
- **BC**:
	- \Generator\Generator::_generateClasses_() has been renamed to _generatePackage_

## 1.0.0RC04
- issue #29 - Throw an exception instead of returning false
	- add getValidValues to EnumType generated class
- issue #28 - Define the destination folder name for each type
- issue #26 - Global sanity checks for more flexibility
	- add composer_name option
	- **BC**:
		- ClassMap::**classMap** method has been renamed to **get** as prefix and suffix are not required from now otherwise it generates a Fatal error such as _PHP Fatal error:  Constructor ClassMap::classMap() cannot be static_
		- **composer name** for the generated package is **new** and **required**
- issue #25 - Generate package under src folder
- issue #24 - ErrorException: Use of undefined constant JSON_PRETTY_PRINT
- issue #13 - classmap and namespaces are wrong when not using a prefix
- issue #21 - Inherited class generates wrong object in php

## 1.0.0RC03
- Fix URL to download phar file

## 1.0.0RC02
- Add wsdltophp.phar file using Box project to create it, ```wsdltophp.phar``` should be used from now instead of ```console```
- Move classes under src folder, rename Tests to tests, rename Resources to resources, update composer.json and phpunit accordingly
- **BC**:
    - Usage of GeneratorSoapClient as SoapClient handler that uses AbstractSoapClientBase as base SoapClient handler
    - Generator class does not inherit from \SoapClient class anymore
- Improve Utils::getContentFromUrl() and Generator::getUrlContent() methods
- Suffix is now an option as Prefix, read the readme to learn more about it
- Use GeneratorAware layer to share Generator object among created objects
- Use configuration file/reader for Xsd types
- Improve SoapClient\Structs parser
- Fix ArrayType methods (item, first, last, current, offetGet) return annotation
- export composer.json file generation into a new File\Composer class
- improve unit tests
- **BC**:
    - From now, Wsdl origin, package destination, basic authentication credentials, proxy and SoapClient options are contained by the GeneratorOptions instance
    - Generator instanciation and usage reviewed, now it only accept one parameter, a GeneratorOptions object
    - Removal of WsdlContainer class
- Generator simplification by handling only one Wsdl at a time as it was only possible to do so, code refactored in this way
- Adding the possibility to set the parent class for StructType, ArrayType and ServiceType generated classes (options: wsdl-struct, wsdl-structarray, wsdl-soapclient)
- File\Tutorial class alows to name the generated file as we want
- Reserved keywords only come from configuration file
- Define \InvalidArgumentException's code as the current file line
- Remove no more used methods/constants from Model\AbstractModel
- Add editor config file

## 1.0.0RC01
- First major release candidate version
    - Deep refactoring of all old original classes
    - Performance optimizations
    - Usage of [PhpGenerator](https://github.com/WsdlToPhp/PhpGenerator) package for any generated PHP file
    - Namespace support
    - Composer usage for generated package dependencies
    - Externalization of main classes from which any Struct/Array/Service generated class
    - auto-generation sample.php file renamed to tutorial.php
    - Usage of [PackageBase](https://github.com/WsdlToPhp/PackageBase) package
    - Enhancements and consolidations on generated Struct classes:
        - Fluidity
        - Less annotations
        - Properties are all well retrieved
    - Options removal for simplifications:
        - SendArrayAsParameter,
        - SendParametersAsArray,
        - GenerateAutoload,
        - GenerateWsdlClass,
        - SubCategory,
        - InheritsClassIdentifier

## 0.0.5
- Fix unit tests according to previous changes

## 0.0.4
- issue #9 - Leading zero not taken into account in enumeration classes
- 10 - --wsdl-genautoload=false also controls creation of sample.php file (console mode)

## 0.0.3
- 7 - PHP warning on str_repeat()

## 0.0.2
- Create tag with correct composer.json file

## 0.0.1
- Initial version created from original project WsdlToPhp.
