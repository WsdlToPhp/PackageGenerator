# UPGRADE FROM 3.* to 4.*

1. **PHP >= 7.4**:
   - **Required** to run the generator library
   - **Required** to run the generated package
2. **Generated classes**:
   - **Properties are now all typed**
   - Properties are now **protected** if validation rules are enabled (default `true`), you MUST use the setters and getters. Even if validation rules are disabled, **you're strongly encouraged to use the setters and getters**, please read the [MANIFEST](MANIFEST.md#struct-classes) for more information.
     - If you want to keep the arrow notation to set and get, you must disable the validation rules ([validation option](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#validation)) before generating the package.
   - A **[TypeError](https://www.php.net/manual/en/class.typeerror.php)** is thrown if you try to set to `null` a non-nullable property (`required` by the WSDL). An **[InvalidArgumentException](https://www.php.net/manual/en/class.invalidargumentexception.php)** was previously thrown for an invalid value type when validation rules were enabled.
   - **The directive** `declare(strict_types=1)` is placed at top of each file ensuring that the class is well-defined and behaves as declared.
   - **Method** `get{PropertyName}(bool $asString = true)` becomes `get{PropertyName}(bool $asDomDocument = false)` when the property is supposed to be an XML string (`any`). Be sure to pass `true` instead of `false` if you still need to get the **[DOMDocument](https://www.php.net/manual/en/class.domdocument.php)** as returned value.
   - Classes **directory** is now based on the defined namespace. If the namespace was `SoapApi`:
     - **Before**:
       - the `Request` Struct class was located at `src/StructType/Request.php`
     - **Now**:
       - the `Request` Struct class is located at `src/SoapApi/StructType/Request.php`. So on for the `EnumType`, `ArrayType`, `ServiceType` and the `ClassMap` classes.
     - **If this new behaviour is problematic for your current usage, the command line option [`namespace-directories`](https://github.com/WsdlToPhp/PackageGenerator/wiki/Options#namespace-directories) can be set to `false` to keep the previous behaviour**.
3. **WsdlHandler** classes: they have been exported to an independent project at **[WsdlTophp/Wsdlhandler](https://github.com/WsdlToPhp/Wsdlhandler)**. It's now loaded as a composer dependency.
4. The [PackageBase](https://github.com/WsdlToPhp/PackageBase) version is now >= 5.0.
