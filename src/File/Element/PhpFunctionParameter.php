<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Element;

use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter as PhpFunctionParameterBase;

final class PhpFunctionParameter extends PhpFunctionParameterBase
{
    protected ?AbstractModel $model;

    public function __construct(string $name, $value = null, $type = null, AbstractModel $model = null)
    {
        parent::__construct($name, $value, $type);
        $this->model = $model;
    }

    public function setModel(AbstractModel $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getModel(): ?AbstractModel
    {
        return $this->model;
    }
}
