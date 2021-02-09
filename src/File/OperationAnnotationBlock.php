<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\File\Utils as FileUtils;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;

final class OperationAnnotationBlock extends AbstractOperation
{
    public function addAnnotationBlockForOperationMethod(PhpAnnotationBlock $annotationBlock): self
    {
        $this
            ->addOperationMethodDeclaration($annotationBlock)
            ->addOperationMethodMetaInformation($annotationBlock)
            ->addOperationMethodUses($annotationBlock)
            ->addOperationMethodParam($annotationBlock)
            ->addOperationMethodReturn($annotationBlock)
        ;

        return $this;
    }

    protected function addOperationMethodDeclaration(PhpAnnotationBlock $annotationBlock): self
    {
        $annotationBlock->addChild(sprintf('Method to call the operation originally named %s', $this->getMethod()->getName()));
        if (!$this->getMethod()->isUnique()) {
            $annotationBlock->addChild('This method has been renamed because it is defined several times but with different signature');
        }

        return $this;
    }

    protected function addOperationMethodMetaInformation(PhpAnnotationBlock $annotationBlock): self
    {
        $soapHeaderNames = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES, []);
        $soapHeaderTypes = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADER_TYPES, []);
        $soapHeaderNamespaces = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADER_NAMESPACES, []);
        $soapHeaders = $this->getMethod()->getMetaValue(TagHeader::META_SOAP_HEADERS, []);
        if (!empty($soapHeaderNames) && !empty($soapHeaderTypes) && !empty($soapHeaderNamespaces)) {
            $annotationBlock
                ->addChild('Meta information extracted from the WSDL')
                ->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('- SOAPHeaderNames: %s', implode(', ', $soapHeaderNames)), AbstractModelFile::ANNOTATION_LONG_LENGTH))
                ->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('- SOAPHeaderNamespaces: %s', implode(', ', $soapHeaderNamespaces)), AbstractModelFile::ANNOTATION_LONG_LENGTH))
                ->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('- SOAPHeaderTypes: %s', implode(', ', $this->getSoapHeaderTypesTypes($soapHeaderTypes))), AbstractModelFile::ANNOTATION_LONG_LENGTH))
                ->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, sprintf('- SOAPHeaders: %s', implode(', ', $soapHeaders)), AbstractModelFile::ANNOTATION_LONG_LENGTH))
            ;
        }
        FileUtils::defineModelAnnotationsFromWsdl($annotationBlock, $this->getMethod(), [
            TagHeader::META_SOAP_HEADER_NAMES,
            TagHeader::META_SOAP_HEADER_NAMESPACES,
            TagHeader::META_SOAP_HEADER_TYPES,
            TagHeader::META_SOAP_HEADERS,
        ]);

        return $this;
    }

    protected function getSoapHeaderTypesTypes(array $soapHeaderTypes): array
    {
        $soapHeaderTypesTypes = [];
        foreach ($soapHeaderTypes as $soapHeaderType) {
            $soapHeaderTypesTypes[] = $this->getSoapHeaderTypeType($soapHeaderType, true);
        }

        return $soapHeaderTypesTypes;
    }

    protected function getSoapHeaderTypeType(string $soapHeaderType, bool $namespaced = false): string
    {
        $type = $soapHeaderType;
        $model = $this->getModelByName($soapHeaderType);
        if ($model instanceof AbstractModel) {
            $type = $model->getPackagedName($namespaced);
        }

        return $type;
    }

    protected function addOperationMethodUses(PhpAnnotationBlock $annotationBlock): self
    {
        $annotationBlock
            ->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::getSoapClient()', $this->getMethod()->getOwner()->getExtends(true))))
            ->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::setResult()', $this->getMethod()->getOwner()->getExtends(true))))
            ->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_USES, sprintf('%s::saveLastError()', $this->getMethod()->getOwner()->getExtends(true))))
        ;

        return $this;
    }

    protected function addOperationMethodParam(PhpAnnotationBlock $annotationBlock): self
    {
        $this->addOperationMethodParamFromArray($annotationBlock)->addOperationMethodParamFromModel($annotationBlock)->addOperationMethodParamFromString($annotationBlock);

        return $this;
    }

    protected function addOperationMethodParamFromArray(PhpAnnotationBlock $annotationBlock): self
    {
        if ($this->isParameterTypeAnArray()) {
            foreach ($this->getParameterTypeArrayTypes() as $parameterName => $parameterType) {
                $annotationBlock->addChild($this->getOperationMethodParam($parameterType, $this->getParameterName($parameterName)));
            }
        }

        return $this;
    }

    protected function addOperationMethodParamFromModel(PhpAnnotationBlock $annotationBlock): self
    {
        if ($this->isParameterTypeAModel()) {
            $annotationBlock->addChild($this->getOperationMethodParam($this->getParameterTypeModel()->getPackagedName(true), $this->getParameterName($this->getParameterTypeModel()->getPackagedName())));
        }

        return $this;
    }

    protected function getOperationMethodParam(string $type, string $name): PhpAnnotation
    {
        return new PhpAnnotation(AbstractModelFile::ANNOTATION_PARAM, sprintf('%s $%s', $type, $name));
    }

    protected function addOperationMethodParamFromString(PhpAnnotationBlock $annotationBlock): self
    {
        if ($this->isParameterTypeAString() && !$this->isParameterTypeAModel()) {
            $annotationBlock->addChild($this->getOperationMethodParam($this->getMethod()->getParameterType(), lcfirst($this->getMethod()->getParameterType())));
        }

        return $this;
    }

    protected function addOperationMethodReturn(PhpAnnotationBlock $annotationBlock): self
    {
        $annotationBlock->addChild(new PhpAnnotation(AbstractModelFile::ANNOTATION_RETURN, sprintf('%s|bool', $this->getOperationMethodReturnType($this->getMethod()))));

        return $this;
    }

    protected function getOperationMethodReturnType(MethodModel $method): string
    {
        return Service::getOperationMethodReturnType($method, $this->getGenerator());
    }
}
