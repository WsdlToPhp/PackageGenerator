<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;

class OperationAnnotationBlock extends AbstractOperation
{
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    public function addAnnotationBlockForOperationMethod(PhpAnnotationBlock $annotationBlock)
    {
        $this
            ->addOperationMethodDeclaration($annotationBlock)
            ->addOperationMethodMetaInformations($annotationBlock)
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
        if (!$this->getMethod()->getIsUnique()) {
            $annotationBlock->addChild('This method has been renamed because it is defined several times but with different signature');
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodMetaInformations(PhpAnnotationBlock $annotationBlock)
    {
        $soapHeaderNames = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES, array());
        $soapHeaderTypes = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES, array());
        $soapHeaderNamespaces = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES, array());
        $soapHeaders = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADERS, array());
        if (!empty($soapHeaderNames) && !empty($soapHeaderTypes) && !empty($soapHeaderNamespaces)) {
            $annotationBlock
                ->addChild('Meta informations extracted from the WSDL')
                ->addChild(sprintf('- SOAPHeaderNames : %s', implode(', ', $soapHeaderNames)))
                ->addChild(sprintf('- SOAPHeaderNamespaces : %s', implode(', ', $soapHeaderNamespaces)))
                ->addChild(sprintf('- SOAPHeaderTypes : %s', implode(', ', $soapHeaderNames)))
                ->addChild(sprintf('- SOAPHeaders : %s', implode(', ', $soapHeaders)));
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodUses(PhpAnnotationBlock $annotationBlock)
    {
        if ($this->getGenerator()->getOptionGenerateWsdlClassFile()) {
            $annotationBlock
                ->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::getSoapClient()', AbstractModel::getGenericWsdlClassName())))
                ->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::setResult()', AbstractModel::getGenericWsdlClassName())))
                ->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::saveLastError()', AbstractModel::getGenericWsdlClassName())));
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodParam(PhpAnnotationBlock $annotationBlock)
    {
        $this
            ->addOperationMethodParamFromArray($annotationBlock)
            ->addOperationMethodParamFromModel($annotationBlock)
            ->addOperationMethodParamFromString($annotationBlock);
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodParamFromArray(PhpAnnotationBlock $annotationBlock)
    {
        if ($this->isParameterTypeAnArray()) {
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
            $annotationBlock->addChild($this->getOperationMethodParam($this->getParameterTypeModel()->getPackagedName(), $this->getParameterName($this->getParameterTypeModel()->getPackagedName())));
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
        }
        return $this;
    }
    /**
     * @param PhpAnnotationBlock $annotationBlock
     * @return OperationAnnotationBlock
     */
    protected function addOperationMethodReturn(PhpAnnotationBlock $annotationBlock)
    {
        $annotationBlock->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_RETURN, $this->getOperationMethodReturnType($this->getMethod())));
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
