<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageBase\AbstractSoapClientBase;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Service as ServiceModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;

final class Tutorial extends AbstractFile
{
    public function writeFile(): void
    {
        $this
            ->addMainAnnotationBlock()
            ->addAutoload()
            ->addOptionsAnnotationBlock()
            ->addOptions()
            ->addContent()
        ;
        parent::writeFile();
    }

    public function addMainAnnotationBlock(): self
    {
        $this->getFile()->addAnnotationBlockElement($this->getAnnotationBlock());

        return $this;
    }

    public function addChild(PhpAnnotationBlock $block, string $content): self
    {
        $block->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, $content, AbstractModelFile::ANNOTATION_LONG_LENGTH));

        return $this;
    }

    public function addAutoload(): self
    {
        if ($this->getGenerator()->getOptionStandalone()) {
            $this->getFile()->getMainElement()->addChild(sprintf('require_once __DIR__ . \'/vendor/autoload.php\';'));
        }

        return $this;
    }

    public function addContent(): self
    {
        foreach ($this->getGenerator()->getServices(true) as $service) {
            $serviceVariableName = lcfirst($service->getName());
            $this->addAnnotationBlockFromService($service)->addServiceDeclaration($serviceVariableName, $service)->addServiceSoapHeadersDefinitions($serviceVariableName, $service)->addContentFromService($serviceVariableName, $service);
        }

        return $this;
    }

    protected function getAnnotationBlock(): PhpAnnotationBlock
    {
        $block = new PhpAnnotationBlock();
        $this
            ->addChild($block, 'This file aims to show you how to use this generated package.')
            ->addChild($block, 'In addition, the goal is to show which methods are available and the first needed parameter(s)')
            ->addChild($block, 'You have to use an associative array such as:')
            ->addChild($block, '- the key must be a constant beginning with WSDL_ from AbstractSoapClientBase class (each generated ServiceType class extends this class)')
            ->addChild($block, '- the value must be the corresponding key value (each option matches a {@link http://www.php.net/manual/en/soapclient.soapclient.php} option)')
            ->addChild($block, '$options = [')
            ->addChild($block, sprintf('%s::WSDL_URL => \'%s\',', AbstractSoapClientBase::class, $this->getGenerator()->getWsdl()->getName()))
            ->addChild($block, sprintf('%s::WSDL_TRACE => true,', AbstractSoapClientBase::class))
            ->addChild($block, sprintf('%s::WSDL_LOGIN => \'you_secret_login\',', AbstractSoapClientBase::class))
            ->addChild($block, sprintf('%s::WSDL_PASSWORD => \'you_secret_password\',', AbstractSoapClientBase::class))
            ->addChild($block, '];')
            ->addChild($block, 'etc...')
        ;

        if (!$this->getGenerator()->getOptionStandalone()) {
            $this
                ->addChild($block, '################################################################################')
                ->addChild($block, 'Don\'t forget to add wsdltophp/packagebase:~5.0 to your main composer.json.')
                ->addChild($block, '################################################################################')
            ;
        }

        return $block;
    }

    protected function addOptionsAnnotationBlock(): self
    {
        $this->addAnnotationBlock([
            'Minimal options',
        ]);

        return $this;
    }

    protected function addOptions(): self
    {
        $this
            ->getFile()
            ->getMainElement()
            ->addChild('$options = [')
            ->addChild($this->getFile()->getMainElement()->getIndentedString(sprintf('WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => \'%s\',', $this->getGenerator()->getWsdl()->getName()), 1))
            ->addChild($this->getFile()->getMainElement()->getIndentedString(sprintf('WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => %s::%s(),', $this->getGenerator()->getFiles()->getClassmapFile()->getModel()->getPackagedName(true), ClassMap::METHOD_NAME), 1))
            ->addChild('];')
        ;

        return $this;
    }

    protected function addAnnotationBlockFromService(ServiceModel $service): self
    {
        return $this->addAnnotationBlock([
            sprintf('Samples for %s ServiceType', $service->getName()),
        ]);
    }

    protected function addContentFromService(string $serviceVariableName, ServiceModel $service): self
    {
        foreach ($service->getMethods() as $method) {
            $this->addAnnotationBlockFromMethod($method)->addContentFromMethod($serviceVariableName, $method);
        }

        return $this;
    }

    protected function addServiceDeclaration(string $serviceVariableName, ServiceModel $service): self
    {
        $this->getFile()->getMainElement()->addChild(sprintf('$%s = new %s($options);', $serviceVariableName, $service->getPackagedName(true)));

        return $this;
    }

    protected function addServiceSoapHeadersDefinitions(string $serviceVariableName, ServiceModel $service): self
    {
        $added = [];
        foreach ($service->getMethods() as $method) {
            $added = array_merge($added, $this->addServiceSoapHeadersDefinition($serviceVariableName, $method, $added));
        }

        return $this;
    }

    protected function addServiceSoapHeadersDefinition(string $serviceVariableName, MethodModel $method, array $added): array
    {
        $addedNames = [];
        $soapHeaderNames = $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES, []);
        foreach ($soapHeaderNames as $soapHeaderName) {
            if (in_array($soapHeaderName, $added, true)) {
                continue;
            }

            $addedNames[] = $soapHeaderName;
            $this->getFile()->getMainElement()->addChild(sprintf('$%s->%s%s(%s);', $serviceVariableName, Service::METHOD_SET_HEADER_PREFIX, ucfirst($soapHeaderName), $this->getMethodParameter($soapHeaderName)));
        }

        return $addedNames;
    }

    protected function addAnnotationBlockFromMethod(MethodModel $method): self
    {
        return $this->addAnnotationBlock([
            sprintf('Sample call for %s operation/method', $method->getMethodName()),
        ]);
    }

    protected function addContentFromMethod(string $serviceVariableName, MethodModel $method): self
    {
        $this
            ->getFile()
            ->getMainElement()
            ->addChild(sprintf('if ($%s->%s(%s) !== false) {', $serviceVariableName, $method->getMethodName(), $this->getMethodParameters($method)))
            ->addChild($this->getFile()->getMainElement()->getIndentedString(sprintf('print_r($%s->getResult());', $serviceVariableName), 1))
            ->addChild('} else {')
            ->addChild($this->getFile()->getMainElement()->getIndentedString(sprintf('print_r($%s->getLastError());', $serviceVariableName), 1))
            ->addChild('}')
        ;

        return $this;
    }

    protected function getMethodParameters(MethodModel $method): string
    {
        $parameters = [];
        if (is_array($method->getParameterType())) {
            foreach ($method->getParameterType() as $parameterName => $parameterType) {
                $parameters[] = $this->getMethodParameter($parameterType, $parameterName);
            }
        } else {
            $parameters[] = $this->getMethodParameter($method->getParameterType());
        }

        return implode(', ', $parameters);
    }

    protected function getMethodParameter(?string $parameterType, ?string $parameterName = null): string
    {
        $parameter = sprintf('%1$s%2$s', (empty($parameterType) && empty($parameterName)) ? '' : '$', empty($parameterName) ? $parameterType : $parameterName);
        $model = null !== $parameterType ? $this->getGenerator()->getStructByName($parameterType) : null;
        if ($model instanceof StructModel && $model->isStruct() && !$model->isRestriction()) {
            $parameter = sprintf('new %s()', $model->getPackagedName(true));
        }

        return $parameter;
    }

    protected function addAnnotationBlock($content): self
    {
        $this->getFile()->getMainElement()->addChild(new PhpAnnotationBlock($content));

        return $this;
    }
}
