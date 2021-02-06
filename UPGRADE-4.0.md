# UPGRADE FROM 3.* to 4.*

Requires PHP >= 7.4

AbstractTagImport::getLocationAttribute => AbstractTagImport::getLocationAttributeValue

Exported WsdlHandler classes to proper library [WsdlTophp\Wsdlhandler](https://github.com/WsdlToPhp/Wsdlhandler).

Generated PHP files containing a class now have the `declare(strict_types=1)` directive, so be sure to pass the right values. It also ensures you that the generated classes are strongly defined.

Generated Struct and StructArray classes' properties are now type hinted.

TypeError are now thrown instead of InvalidArgumentException when instantiating or calling a generated Struct/StructArray setter if the parameter type does not match the property typehint. Be sure to handle this new error.

`get{PropertyName}(bool $asString = true)` becomes `get{PropertyName}(bool $asDomDocument = false)`

Generated class properties are now **protected** if validation rules are `enabled` which is the default behaviour. You can't not more use the arrow notation on the object you created, you have to call the setter. Otherwise, disable validation rules.
