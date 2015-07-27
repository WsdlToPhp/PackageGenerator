CHANGELOG
=========

WIP
---
- File\Tutorial class alows to name the generated file as we want
- Reserved keywords only come from configuration file
- Define \InvalidArgumentException's code as the current file line
- Remove no more used methods/constants from Model\AbstractModel
- Add editor config file

1.0.0RC01
---------
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

0.0.5
-----
- Fix unit tests according to previous changes

0.0.4
-----
- issue #9 - Leading zero not taken into account in enumeration classes
- 10 - --wsdl-genautoload=false also controls creation of sample.php file (console mode)

0.0.3
-----
- 7 - PHP warning on str_repeat()

0.0.2
-----
- Create tag with correct composer.json file

0.0.1
-----
- Initial version created from original project WsdlToPhp.
