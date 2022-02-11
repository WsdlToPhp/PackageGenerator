# CHANGELOG

## 3.4.2 - 2022-02-11
issue #256 - subdirectory not converted in namespaces

## 3.4.1 - 2021-07-14
- issue #257 - choice tag is not fully handled properly
    - Improvement for choice tag handling

## 3.4.0 - 2021-07-13
- issue #257 - choice tag is not fully handled properly
- issue #258 - Add missing XML built-in dataTypes

## 3.3.7 - 2021-05-18
- issue #251 - Use targetNamespace from another location

## 3.3.6 - 2021-04-06
- issue #246 - Composer::getComposerFilePath() must be of the type string, bool returned

## 3.3.5 - 2021-03-29
- issue #243 - Prefix/Suffix option used in namespace should not be used in namespace

## 3.3.4 - 2021-01-25
- issue #230 - Avoid repeated meta value within generated meta documentation
- issue #217 - Inherited struct methods should not be overwritten
- issue #214 - element with maxOccurs unbounded inside a sequence gets translated into a string instead of an array

## 3.3.3 - 2020-11-16
- issue #229 - Docker image issues

## 3.3.2 - 2020-11-15
- issue #227 - Give additional information and skip error and continue stub generation on PHP Fatal error: Uncaught InvalidArgumentException: Value "NULL" can't be used to get an object from ...

## 3.3.1 - 2020-11-12
- issue #226 - Signatures for .phar releases?

## 3.3.0 - 2020-11-07
- issue #219 - How do you get the response <soap:Header> details
- issue #221 - Feature: Actual versions docker images on docker hub
- issue #223 - PHP 7.4 or PHP 8?

## 3.2.7 - 2020-05-22
- issue #170 - Enhance generated classes based on PackageBase updates
- Minor typo
- Update contributors list

## 3.2.6 - 2020-03-23
- issue #210 - Validation for constraint: fractionDigits fails for integer numbers (0 fraction digits)

## 3.2.5 - 2020-03-12
- issue #209 - Name "0" is invalid when instantiating PhpFunctionParameter object

## 3.2.4 - 2020-03-12
- issue #208 - not able to use with symfony/console v5+

## 3.2.3 - 2019-08-19
- issue #200 - Array structures are missing from generated package
- issue #201 - Do not generate empty constructor

## 3.2.2 - 2019-08-01
- issue #199 - Inheritance from outer namespace

## 3.2.1 - 2019-03-09
- issue #177 - Structure & Enumeration has same name will produce weird result
- issue #181 - PHP Fatal error in AbstractModelFile.php
- issue #183 - Wrong variable name in StructType
- issue #185 - undefined StructType class

## 3.2.0 - 2019-02-04
- issue #168 - Invalid rules generation for non numeric value
- issue #171 - Improve AttributeGroup > Attribute parsing
- issue #172 - is_numeric is too permissive when checking for int's
- issue #173 - Add maxOccurs validation rule
- issue #174 - Documentation missing for enumeration value
- issue #176 - Use mb_* functions when possible
- issue #178 - Int setter throws exception when setting null
- Miscellaneous improvements and refactorings:
    - Validation rules: code generation and unit tests
    - Remove unused use statements
    - Use better Docker image base in order to be able to test and run the generator with any PHP version
    - Improve meta merging and order

## 3.1.0 - 2019-01-26
- issue #128 - Using the DOMDocument $any value
- issue #133 - Choice type
- issue #153 - Choice type
- issue #158 - Support of xs:list
- issue #165 - Improve/Fix validation rules for unions
- issue #167 - Infinite loop while figuring out the inheritance

## 3.0.4 - 2019-01-15
- issue #149 - FractionDigitsRule does not allow less digits than the specified maximum
- issue #151 - Provide Docker settings
- issue #154 - PHP reserved keywords list is incomplete for PHP > 7.0
- issue #157 - Missing entry from ClassMap
- pull request #142 - Fix: No need to update composer itself twice
- pull request #143 - Enhancement: Cache dependencies between builds
- pull request #144 - Fix typo in PHPDoc
- pull request #145 - Remove duplicate PHPDoc argument
- pull request #147 - Enhancement: Improve output from running php-cs-fixer
- pull request #146 - Enhancement: Keep packages sorted in composer.json
- pull request #150 - Change FractionDigitsRule to accept less fraction digits than the defined maximum

## 3.0.3 - 2018-07-26
- issue #139 / Pull request #140 - How to use another xsd_types.yml

## 3.0.2 - 2018-05-18
- issue #134 - Default value of boolean type is a string

## 3.0.1 - 2018-05-09
- issue #135 - Impact of pull request #20 on PackageBase

## 3.0.0 - 2018-05-04
- issue #132 - Impact of "AbstractSoapClientBase should not define static SoapClient instance"

## 2.9.1
- issue #125 - Under PHP 7.2: count(): Parameter must be an array or an object that implements Countable
- pull request #127 - Moved tests directory to the dev autoloader
- pull request #126 - Allow Symfony 4

## 2.9.0
- issue #120 - Add option to save wsdl locally
- issue #123 - Class with same attributes in different registers, breaks constructor and setters

## 2.8.5
- issue #112 - Gather method "none" generates only a single service file with one single method

## 2.8.4
- issue #111 - '/' not escaped in pattern rule

## 2.8.3
- issue #109 - Single quotes and backslashes not escaped in pattern rule

## 2.8.2
- update unit test resources :)

## 2.8.1
- invalid values assigned to an array should be stored and not displayed when they are detected

## 2.8.0
- issue #95 - Dependency composer
- issue #96 - Improve the Readme
- issue #98 - Setter/Getter wrongly named
- issue #99 - Export/Import generator options and parsed data
- issue #101 - setSoapHeader parameter incorrect
- issue #102 - Gather methods option should only be taken into account on class generation
- issue #103 - Invalid typehint

## 2.7.3
- issue #93 - Improve ArrayType::set* method annotations

## 2.7.2
- Improve unit tests for file validation rules, add SensioLabs Insight badge, improve generated validation rule exception message

## 2.7.1
- issue #92 - FractionDigitsRule counts . to the fraction digits

## 2.7.0
From now on there is only one release as the composer.json has been updated in order to match multiple versions that makes the project working either on 5.3.3 >= PHP >= 5.5.9. Two Phar files will be created using PHP 5 and PHP 7.

Issues fixed:

- issue #91 - Add option to customize final destination src
- issue #89 - Use wsdltophp/domhandler project as dependency
- issue #86 - Review restrictions
- issue #85 - Bool validation rule
- issue #84 - Improve/Fix typehint determination for unions
- issue #83 - better debug support
- issue #82 - Annotations from an attributeGroup
- issue #81 - SoapHeader definitions per operation/method should not contain a space before the colon punctuation
- issue #80 - Invalid typehint

## 1.11.0/2.6.0
- issue #76 - "UNKNOWN" type hint is invalid
- issue #77 - Properties without type
- issue #79 - Inheritance between a Struct and an Enumeration

## 1.10.1/2.5.1
- issue #57 - Unable to determine SoapHeader name and type

## 1.10.0/2.5.0
- pull request #73 - Fixed issue with HTTPS urls
    - **BC**: the `WsdlToPhp\PackageGenerator\Generator\Utils::getContentFromUrlContextOptions` has been renamed to `getStreamContextOptions`, in addition the first parameter named `url` has been removed due to its uselessness

## 1.9.1/2.4.1
- pull request #70 - phpdoc & composer fixes

## 1.9.0/2.4.0
- issue #67 - Windows not able to run composer due to missing CA Certificate File

## 1.8.1/2.3.1
- pull request #69 - use stable versions

## 1.8.0/2.3.0
- issue #63 - base64Binary in Generated Classes
- issue #64 - Integer type generated for XSD duration types

## 1.7.0/2.2.0
- issue #60 - Incorrect validation rule: is_string() on int[] values

## 1.6.0/2.1.0
- issue #56 - Problem with generated request XML

## 1.5.1/2.0.1
- issue #55 - xsd:long is "int" in validation rules - error with values that not fit

## 1.5.0
- issue #50 - Support for Cyrillic alphabet
    - From now, any unicode character should be handled and generated as it is as a PHP variable/parameter/method/class
    - Read more at [regular expression for unicode](http://www.regular-expressions.info/unicode.html)
- issue #48 - minOccurs=0 not works
    - From now, any not required property that can be removed from request (minOccurs=0 and nillable=true) is unset on object instantiation
- issue #49 - Use schema attribute's attributes to apply validation rule on generated properties
    - From now, validation rules are automatically added to every setter so you're informed of an invalid value before sending the request which throws an [\InvalidArgumentException](http://php.net/manual/en/class.invalidargumentexception.php)
    - If you do not want the validation rules to be added to the setters, set the option `validation` to `false` before generating the package
- issue #52 - No autocomplete because of return type on a new line after @return in annotation
    - Fixed thanks to [PhpGenerator issue 5](https://github.com/WsdlToPhp/PhpGenerator/issues/5)
- issue #53 - Incorrect variable type
    - This issue only affects struct properties that match "virtual" structs which are array
    - **BC**: the array type attribute detection is now better (hopefully perfect) and can change attributes from simple type hiny to array type hint. This means that you now have to pass an array as parameter otherwise it will break
- issue #54 - Naming. Class _Add and method _add_1/2/3... names. Need to minify reserved_keywords.yml
	- **BC**: generated classes/methods may change after a new generation
		- Classes are now not renamed if they don't use PHP reserved keywords (before, methods were used too to rename the class)
		- Struct methods are now renamed only if they use Struct methods (one of [AbstractStructBase](https://github.com/WsdlToPhp/PackageBase/blob/develop/src/AbstractStructBase.php) methods)
		- StructArray methods are now renamed only if they use Struct and StructArray methods (one of [AbstractStructArrayBase](https://github.com/WsdlToPhp/PackageBase/blob/develop/src/AbstractStructArrayBase.php) methods)
		- Service methods are now renamed only if they use Service methods (one of [AbstractSoapClientBase](https://github.com/WsdlToPhp/PackageBase/blob/develop/src/AbstractSoapClientBase.php) methods)

## 1.4.3.1
- issue #51 - Error while passing array parameter
    - The main issue was not an issue, the detected issue was an error on the SoapHeader type hint defined in the setSoapHeader* method's signature

## 1.4.3
- issue #45 - Reserved PHP-Keywords in Class Names

## 1.4.2
- issue #47 - XSD types are not well inherited by elements
    - Improve, once again, XSD to PHP type by ensuring usage of strict PHP types
    - Improve struct attribute type determination based on recursive inheritance
- issue #41 - Support for arrays
    - Ensure non conflicting variable name in setter when paramter is an array and named `item` (as previous item iteration variable was named item)

## 1.4.1
- Add `time` XSD type matching `string`PHP type

## 1.4.0
- issue #44 - Constant naming separate with underscore
    - **BC**:
        - enumeration constants are renamed such `myConstantValue` is now `MY_CONSTANT_VALUE` instead of previously being `MYCONSTANTVALUE`. Be sure to update your code that use enumeration's constants
- issue #47 - XSD types are not well inherited by elements
    - Improvements on recursive schema loading
    - Improvements on meta gathering in generated classes
    - Handle anonymous types

## 1.3.1
- Improve/fix readme

## 1.3.0
- issue #40 - Support for SSL Context Options
- issue #41 - Support for arrays
    - The addTo{property name} method has been added and accept an item to be added to the property. If the item is not of the correct type depending on the item's type, it throws an [\InvalidArgumentException](http://php.net/manual/en/class.invalidargumentexception.php).
    - The set{property name} has been reviewed in order to throw an [\InvalidArgumentException](http://php.net/manual/en/class.invalidargumentexception.php) if the array passed as parameter contains an invalid item. In the case of an array of values which are defined using an enumeration, it throws only one exception indicating which values are incorrect.
- issue #43 - "composer-name" required even if "standalone=false"

## 1.2.0
- issue #36 - All tags defined by a Type outs empty in soap requests
- **BC**:
    - classmap returned by ClassMap::get() method is now correct for namespaced struct classes, so it's more of a break changes fixation. Before that, your XML request may be incomplete due to this issue

## 1.1.3
- issue #35 - __Construct set methods call and enum value conflict

## 1.1.2
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
    - Generator instantiation and usage reviewed, now it only accept one parameter, a GeneratorOptions object
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
