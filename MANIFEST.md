# Manifest

This file intends to explain the way the files are generated and why. Moreover, it gives tips on how the generated classes should be used. 

## PHP files and classes
- Files and classes are generated using our own [PhpGenerator](https://github.com/WsdlToPhp/PhpGenerator) library. The [PhpGenerator](https://github.com/WsdlToPhp/PhpGenerator) is independent and not tweaked specifically for this project, it can be used freely and for any purpose.
- Classes are generated under the `src` folder within the `destination` folder based on their `category`.
  - Read the [src folder option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#src-dirname) for more information
  - Read the [destination option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#destination) for more information
  - Read the [category option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#category) for more information
- Classes are not namespaced by default.
  - Read the [namespace option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#namespace) for more information
- Classes are **named after the element name** all with respecting the **PHP class naming constraints**. Generated names can be prefixed and suffixed if needed.
  - Read the [prefix option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#prefix) for more information
  - Read the [suffix option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#suffix) for more information
- Classes are generated with predefined comments and annotations. You can add your proper Annotations.
  - Read the [classes comments option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#classes-comments) for more information
- Classes require **PHP >= 7.4** as of **PackageGenerator >= 4.0**.

### Struct classes
- Classes represent any parameter that can be sent to the Soap server within the Soap request as soon as the parameter is not a scalar value.
- Classes are generated under the `src/StructType` folder by default.
  - Read the [structs folder option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#structs-folder) for more information
- Classes extend the [AbstractStructBase](https://github.com/WsdlToPhp/PackageBase#abstractstructbase) class from the [PackageBase](https://github.com/WsdlToPhp/PackageBase) dependency in order to benefit from [generic methods](https://github.com/WsdlToPhp/PackageBase#abstractstructbase).
  - Read the [struct option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#struct) for more information
- Struct properties are:
  - **Named after the element name** all with respecting the **PHP class property naming constraints**.
  - **Typed** based on their definition
  - **null** by default
  - With their proper **setter and getter**. You are **strongly** encouraged to **always** use the setter for the following reasons:
    - **Chained calls**: The setters are **fluent** (return the current object instance), so you can chain the calls such as `$object->setFirstname('Bob')->setLastname('Barfield')`
    - **Parameter type**: The setter parameter is **typed based on the element type** declaration. This way you know that matching the element type the XML request will be well generated.
      - Read the [xsd types option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#xsd-types-mapping) for more information
    - **Validation rules**: The setter contains **validation rules** based on the element declaration avoiding you from making a mistake that would lead to a wrong XML request. An [InvalidArgumentException](https://www.php.net/manual/en/class.invalidargumentexception.php) exception is thrown with an explicit message if you made a mistake.
      - Read the [validation option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#validation) for more information
    - **Removable property**: The setter **removes the property** from the object if it is marked as declared as removable from the request (`nillable=true` + `minOccurs=0`). Passing `null` to the setter removes the property from the object thus the XML request does not contain the element, which is often required by the Soap Server which handles the request.
  - **Enhanced** with methods:
    - **Array property**: If the property is detected as an array, you end up with a fluent-typed `addTo{PropertyName}(?{propertyType} $item)` method
    - **XML Any** (`<xs:any/>`): If the property is detected as an XML string:
      - The setter allows you to pass a [DOMDocument](https://www.php.net/manual/en/class.domdocument.php) object that is converted to string for the XML request.
      - The getter is adapted (`get{PropertyName}(bool $asDomDocument = false)`) and allows you to get a [DOMDocument](https://www.php.net/manual/en/class.domdocument.php) object from the XML string of the property returned by the XML response.

### StructArray classes
- Classes are an **extension of Classes** and are generated with the same benefits.
- Classes represent an element that contains only one array-type property  
- Classes are generated under the `src/ArrayType` folder by default.
  - Read the [arrays folder option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#arrays-folder) for more information
- Classes extend the [AbstractStructArrayBase](https://github.com/WsdlToPhp/PackageBase#abstractstructarraybase) class from the [PackageBase](https://github.com/WsdlToPhp/PackageBase) dependency in order to benefit from [generic methods](https://github.com/WsdlToPhp/PackageBase#abstractstructarraybase).
  - Read the [struct array option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#structarray) for more information
- Classes are **empowered** thanks to [AbstractStructArrayBase](https://github.com/WsdlToPhp/PackageBase#abstractstructarraybase) class:
  - They are [Traversable](https://www.php.net/manual/en/class.traversable.php), [Countable](https://www.php.net/manual/en/class.countable.php) and they also implement the [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) interface
  - They always contain the `getAttributeName(): string` method that returns the property name that is an array
- Classes contain return-typed methods to ease the manipulation of the array property (in addition to the [AbstractStructArrayBase](https://github.com/WsdlToPhp/PackageBase#abstractstructarraybase) methods):
  - **current(): ?{childElementType}**: returns the [current](https://www.php.net/manual/en/iterator.current.php) iteration element
  - **item(index): ?{childElementType}**: returns the item at the given position (alis of [offsetGet](https://www.php.net/manual/en/arrayaccess.offsetget.php))
  - **first(): ?{childElementType}**: returns the first element
  - **last(): ?{childElementType}**: returns the last element
  - **offsetGet($offset): ?{childElementType}**: returns the last element
  - **add(?{childElementType} $item): self**: adds the item to the current array property

### StructEnum classes
- Classes represent any enumeration declared by the WSDL. They contain constants that **should** be used to define the value of a Struct property marked as an enumeration value.
  - Read the [constants naming option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#constants-naming) for more information
- Classes are generated under the `src/StructEnumType` folder by default.
  - Read the [enums folder option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#enums-folder) for more information
- Classes extend the [AbstractStructEnumBase](https://github.com/WsdlToPhp/PackageBase#abstractstructenumbase) class from the [PackageBase](https://github.com/WsdlToPhp/PackageBase) dependency in order to benefit from [generic methods](https://github.com/WsdlToPhp/PackageBase#abstractstructenumbase).
  - Read the [struct enum option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#structenum) for more information
- Classes are **empowered** thanks to [AbstractStructEnumBase](https://github.com/WsdlToPhp/PackageBase#abstractstructenumbase) class:
  - They always contain the `getValidValues(): array` method that returns the constants value contained by the class
  - The `valueIsValid($value): bool` method allows checking if the value is a valid value declared by the enumeration (used by a validation rule within a Struct's setter)

### Service classes
- Classes are generated in order to gather Soap operations named similarly in one or many classes based on your choice
  - Read the [gather operations option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#gather-operations-methods) for more information
- Classes are generated under the `src/ServiceType` folder by default.
  - Read the [services folder option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#services-folder) for more information
- Classes extend the [AbstractSoapClientBase](https://github.com/WsdlToPhp/PackageBase#abstractsoapclientbase) class from the [PackageBase](https://github.com/WsdlToPhp/PackageBase) dependency in order to benefit from [generic methods](https://github.com/WsdlToPhp/PackageBase#abstractsoapclientbase).
  - Read the [soapclient option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#soapclient) for more information
- Classes contain custom method(s) in order to define the Soap Header(s) based on what is defined in the WSDL.
  - Methods are named `setSoapHeader{SoapHeaderName}({SoapHeaderType} ${SoapHeaderName}, string $nameSpace = '{soapHeadernamespace}'}, bool $mustUnderstand = false, ?string $actor = null)`
- Classes contain one method per Soap operation **named after the operation name** all with respecting the **PHP method naming constraints**. The method returns:
  - `false`:
    - This means there is an error with the request or the Soap Server that has triggered a SoapFault (be sure that `WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_TRACE`=`true`)
    - Use `getLastError(string $methodName): ?SoapFault` to get the [SoapFault](https://www.php.net/manual/en/class.soapfault.php) thrown when the method cas called.
    - `$methodName` has the form `{fully qualified classname}::{__FUNCION__}`
  - A `{returnType}` object result:
    - The `getResult` method is annotated with the `@return` annotation listing all the possible return types
    - Be sure to check the result type before using the result methods if it's supposed to be an object

### ClassMap class
- `ClassMap` class is generated under the `src` folder.
- `ClassMap` class has a unique-final-static method named `get` which returns the array to be used as the [`classmap`](https://www.php.net/manual/en/soapclient.construct.php#refsect1-soapclient.construct-parameters) option for the SoapClient class.

## composer.json
- composer.json file is generated when `standalone` option is enabled under the `destination` folder.
  - Read the [standalone option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#standalone) for more information
- composer.json `name` can be set.
  - Read the [composer name option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#composer-name) for more information
- composer.json settings can be customized.
  - Read the [composer settings option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#composer-settings) for more information

## tutorial.php
- tutorial.php file is generated under the `destination` folder if it is enabled.
  - Read the [tutorial option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#generate-tutorial) for more information
- tutorial.php file is a boilerplate demonstrating how to instantiate each generated ServiceType class.
- tutorial.php demonstrates how to call each `setSoapHeader{SoapHeaderName}` method.
- tutorial.php demonstrates how to call each operation generated per ServiceType class.
