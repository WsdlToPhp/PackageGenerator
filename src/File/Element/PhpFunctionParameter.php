<?php

namespace WsdlToPhp\PackageGenerator\File\Element;

use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter as PhpFunctionParameterBase;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;

class PhpFunctionParameter extends PhpFunctionParameterBase
{
    /**
     * @var StructModel
     */
    protected $model;
    /**
     * @param StructModel $model
     * @return PhpFunctionParameter
     */
    public function setModel(StructModel $model)
    {
        $this->model = $model;
        return $this;
    }
    /**
     * @return StructModel
     */
    public function getModel()
    {
        return $this->model;
    }
}
