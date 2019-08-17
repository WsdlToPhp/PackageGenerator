<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;
use WsdlToPhp\PackageGenerator\File\Utils as FileUtils;

class OperationAnnotationBlock extends AbstractOperation
{
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    public function addAnnotationBlockForOperationMethod(PhpAnnotationBlock $annotationBlock)
    {
        $this->addOperationMethodDeclaration($annotationBlock)
            ->addOperationMethodMetaInformation($annotationBlock)
            ->addOperationMethodUses($annotationBlock)
            ->addOperationMethodParam($annotationBlock)
            ->addOperationMethodReturn($annotationBlock);
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodDeclaration(PhpAnnotationBlock $annotationBlock)
    {
        $annotationBlock->addChild(sprintf('Method to call the operation originally named %s', $this->getMethod()->getName()));
        if (!$this->getMethod()->isUnique()) {
            $annotationBlock->addChild('This method has been renamed because it is defined several times but with different signature');
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodMetaInformation(PhpAnnotationBlock $annotationBlock)
    {
        $soapHeaderNames = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES, []);
        $soapHeaderTypes = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES, []);
        $soapHeaderNamespaces = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES, []);
        $soapHeaders = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADERS, []);
        if (!empty($soapHeaderNames) && !empty($soapHeaderTypes) && !empty($soapHeaderNamespaces)) {
            $annotationBlock->addChild('Meta information extracted from the WSDL')
                ->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('- SOAPHeaderNames: %s', implode(', ', $soapHeaderNames)), AbstractModelFile::ANNOTATION_LONG_LENGTH))
                ->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('- SOAPHeaderNamespaces: %s', implode(', ', $soapHeaderNamespaces)), AbstractModelFile::ANNOTATION_LONG_LENGTH))
                ->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('- SOAPHeaderTypes: %s', implode(', ', $this->getSoapHeaderTypesTypes($soapHeaderTypes))), AbstractModelFile::ANNOTATION_LONG_LENGTH))
                ->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('- SOAPHeaders: %s', implode(', ', $soapHeaders)), AbstractModelFile::ANNOTATION_LONG_LENGTH));
        }
        FileUtils::defineModelAnnotationsFromWsdl($annotationBlock, $this->getMethod(), [
            TagHeader::META_SOAP_HEADER_NAMES,
            TagHeader::META_SOAP_HEADER_NAMESPACES,
            TagHeader::META_SOAP_HEADER_TYPES,
            TagHeader::META_SOAP_HEADERS,
        ]);
        return $this;
    }
    /**
     * @param array $soapHeaderTypes
     * @return string[]
     */
    protected function getSoapHeaderTypesTypes(array $soapHeaderTypes)
    {
        $soapHeaderTypesTypes = [];
        foreach ($soapHeaderTypes as $soapHeaderType) {
            $soapHeaderTypesTypes[] = $this->getSoapHeaderTypeType($soapHeaderType, true);
        }
        return $soapHeaderTypesTypes;
    }
    /**
     * @param string $soapHeaderType
     * @param bool $namespaced
     * @return string
     */
    protected function getSoapHeaderTypeType($soapHeaderType, $namespaced = false)
    {
        $type = $soapHeaderType;
        $model = $this->getModelByName($soapHeaderType);
        if ($model instanceof AbstractModel) {
            $type = $model->getPackagedName($namespaced);
        }
        return $type;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodUses(PhpAnnotationBlock $annotationBlock)
    {
        $annotationBlock->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::getSoapClient()', $this->getMethod()->getOwner()->getExtends(true))))
            ->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::setResult()', $this->getMethod()->getOwner()->getExtends(true))))
            ->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::getResult()', $this->getMethod()->getOwner()->getExtends(true))))
            ->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::saveLastError()', $this->getMethod()->getOwner()->getExtends(true))));
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodParam(PhpAnnotationBlock $annotationBlock)
    {
        $this->addOperationMethodParamFromArray($annotationBlock)->addOperationMethodParamFromModel($annotationBlock)->addOperationMethodParamFromString($annotationBlock);
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodParamFromArray(PhpAnnotationBlock $annotationBlock)
    {
        if ($this->isParameterTypeAnArray()) {
            foreach ($this->getParameterTypeArrayTypes() as $parameterName => $parameterType) {
                $annotationBlock->addChild($this->getOperationMethodParam($parameterType, $this->getParameterName($parameterName)));
            }
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodParamFromModel(PhpAnnotationBlock $annotationBlock)
    {
        if ($this->isParameterTypeAModel()) {
            $annotationBlock->addChild($this->getOperationMethodParam($this->getParameterTypeModel()->getPackagedName(true), $this->getParameterName($this->getParameterTypeModel()->getPackagedName())));
        }
        return $this;
    }
    /**
     * @param string $type
     * @param string $name
     * @return PhpAnnotation
     */
    protected function getOperationMethodParam($type, $name)
    {
        return new PhpAnnotation(AbstractModelFile::ANNOTATION_PARAM, sprintf('%s $%s', $type, $name));
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodParamFromString(PhpAnnotationBlock $annotationBlock)
    {
        if ($this->isParameterTypeAString() && !$this->isParameterTypeAModel()) {
            $annotationBlock->addChild($this->getOperationMethodParam($this->getMethod()->getParameterType(), lcfirst($this->getMethod()->getParameterType())));
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodReturn(PhpAnnotationBlock $annotationBlock)
    {
        $annotationBlock->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_RETURN, sprintf('%s|bool', $this->getOperationMethodReturnType($this->getMethod()))));
        return $this;
    }
    /**
     * @param MethodModel $method
     * @return string
     */
    protected function getOperationMethodReturnType(MethodModel $method)
    {
        return Service::getOperationMethodReturnType($method, $this->getGenerator());
    }
}
