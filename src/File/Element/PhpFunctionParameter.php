<?php

namespace WsdlToPhp\PackageGenerator\File\Element;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter as PhpFunctionParameterBase;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\StructAttribute as StructAttributeModel;

class PhpFunctionParameter extends PhpFunctionParameterBase
{

    /**
     * @var AbstractModel
     */
    protected $model;

    /**
     * PhpFunctionParameter constructor.
     * @param string $name
     * @param mixed $value
     * @param string $type
     * @param AbstractModel $model
     */
    public function __construct($name, $value = null, $type = null, AbstractModel $model = null)
    {
        parent::__construct($name, $value, $type);
        $this->model = $model;
    }

    /**
     * @param AbstractModel $model
     * @return PhpFunctionParameter
     */
    public function setModel(AbstractModel $model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return null|StructModel|StructAttributeModel
     */
    public function getModel()
    {
        return $this->model;
    }
}
