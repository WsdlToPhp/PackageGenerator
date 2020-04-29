<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;
use WsdlToPhp\PackageGenerator\Model\Method as MethodModel;
use WsdlToPhp\PackageGenerator\Model\Service as ServiceModel;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;

class Tutorial extends AbstractFile
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractFile::writeFile()
     * @return void
     */
    public function writeFile()
    {
        $this->addMainAnnotationBlock()
            ->addAutoload()
            ->addOptionsAnnotationBlock()
            ->addOptions()
            ->addContent();
        parent::writeFile();
    }
    /**
     * @return Tutorial
     */
    public function addMainAnnotationBlock()
    {
        $this->getFile()->addAnnotationBlockElement($this->getAnnotationBlock());
        return $this;
    }
    /**
     * @return PhpAnnotationBlock
     */
    protected function getAnnotationBlock()
    {
        $block = new PhpAnnotationBlock();
        $this->addChild($block, 'This file aims to show you how to use this generated package.')
            ->addChild($block, 'In addition, the goal is to show which methods are available and the first needed parameter(s)')
            ->addChild($block, 'You have to use an associative array such as:')
            ->addChild($block, '- the key must be a constant beginning with WSDL_ from AbstractSoapClientBase class (each generated ServiceType class extends this class)')
            ->addChild($block, '- the value must be the corresponding key value (each option matches a {@link http://www.php.net/manual/en/soapclient.soapclient.php} option)')
            ->addChild($block, '$options = array(')
            ->addChild($block, sprintf('\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => \'%s\',', $this->getGenerator()->getWsdl()->getName()))
            ->addChild($block, '\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_TRACE => true,')
            ->addChild($block, '\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_LOGIN => \'you_secret_login\',')
            ->addChild($block, '\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_PASSWORD => \'you_secret_password\',')
            ->addChild($block, ');')
            ->addChild($block, 'etc...');
        if ($this->getGenerator()->getOptionStandalone() === false) {
            $this->addChild($block, '################################################################################')->addChild($block, 'Don\'t forget to add wsdltophp/packagebase:dev-master to your main composer.json.')->addChild($block, '################################################################################');
        }
        return $block;
    }
    /**
     * @param PhpAnnotationBlock $block
     * @param string $content
     * @return Tutorial
     */
    public function addChild(PhpAnnotationBlock $block, $content)
    {
        $block->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, $content, AbstractModelFile::ANNOTATION_LONG_LENGTH));
        return $this;
    }
    /**
     * @return Tutorial
     */
    public function addAutoload()
    {
        if ($this->getGenerator()->getOptionStandalone() === true) {
            $this->getFile()->getMainElement()->addChild(sprintf('require_once __DIR__ . \'/vendor/autoload.php\';'));
        }
        return $this;
    }
    /**
     * @return Tutorial
     */
    public function addContent()
    {
        foreach ($this->getGenerator()->getServices(true) as $service) {
            $serviceVariableName = lcfirst($service->getName());
            $this->addAnnotationBlockFromService($service)->addServiceDeclaration($serviceVariableName, $service)->addServiceSoapHeadersDefinitions($serviceVariableName, $service)->addContentFromService($serviceVariableName, $service);
        }
        return $this;
    }
    /**
     * @return Tutorial
     */
    protected function addOptionsAnnotationBlock()
    {
        $this->addAnnotationBlock([
            'Minimal options',
        ]);
        return $this;
    }
    /**
     * @return Tutorial
     */
    protected function addOptions()
    {
        $this->getFile()
            ->getMainElement()
            ->addChild('$options = array(')
            ->addChild($this->getFile()->getMainElement()->getIndentedString(sprintf('\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => \'%s\',', $this->getGenerator()->getWsdl()->getName()), 1))
            ->addChild($this->getFile()->getMainElement()->getIndentedString(sprintf('\WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => %s::%s(),', $this->getGenerator()->getFiles()->getClassmapFile()->getModel()->getPackagedName(true), ClassMap::METHOD_NAME), 1))
            ->addChild(');');
        return $this;
    }
    /**
     * @param ServiceModel $service
     * @return Tutorial
     */
    protected function addAnnotationBlockFromService(ServiceModel $service)
    {
        return $this->addAnnotationBlock([
            sprintf('Samples for %s ServiceType', $service->getName()),
        ]);
    }
    /**
     * @param string $serviceVariableName
     * @param ServiceModel $service
     * @return Tutorial
     */
    protected function addContentFromService($serviceVariableName, ServiceModel $service)
    {
        foreach ($service->getMethods() as $method) {
            $this->addAnnotationBlockFromMethod($method)->addContentFromMethod($serviceVariableName, $method);
        }
        return $this;
    }
    /**
     * @param string $serviceVariableName
     * @param ServiceModel $service
     * @return Tutorial
     */
    protected function addServiceDeclaration($serviceVariableName, ServiceModel $service)
    {
        $this->getFile()->getMainElement()->addChild(sprintf('$%s = new %s($options);', $serviceVariableName, $service->getPackagedName(true)));
        return $this;
    }
    /**
     * @param string $serviceVariableName
     * @param ServiceModel $service
     * @return Tutorial
     */
    protected function addServiceSoapHeadersDefinitions($serviceVariableName, ServiceModel $service)
    {
        $added = [];
        foreach ($service->getMethods() as $method) {
            $added = array_merge($added, $this->addServiceSoapHeadersDefinition($serviceVariableName, $method, $added));
        }
        return $this;
    }
    /**
     * @param string $serviceVariableName
     * @param MethodModel $method
     * @param array $added
     * @return string[]
     */
    protected function addServiceSoapHeadersDefinition($serviceVariableName, MethodModel $method, array $added)
    {
        $addedNames = [];
        $soapHeaderNames = $method->getMetaValue(TagHeader::META_SOAP_HEADER_NAMES, []);
        foreach ($soapHeaderNames as $soapHeaderName) {
            if (!in_array($soapHeaderName, $added, true)) {
                $addedNames[] = $soapHeaderName;
                $this->getFile()->getMainElement()->addChild(sprintf('$%s->%s%s(%s);', $serviceVariableName, Service::METHOD_SET_HEADER_PREFIX, ucfirst($soapHeaderName), $this->getMethodParameter($soapHeaderName)));
            }
        }
        return $addedNames;
    }
    /**
     * @param MethodModel $method
     * @return Tutorial
     */
    protected function addAnnotationBlockFromMethod(MethodModel $method)
    {
        return $this->addAnnotationBlock([
            sprintf('Sample call for %s operation/method', $method->getMethodName()),
        ]);
    }
    /**
     * @param string $serviceVariableName
     * @param MethodModel $method
     * @return Tutorial
     */
    protected function addContentFromMethod($serviceVariableName, MethodModel $method)
    {
        $this->getFile()
            ->getMainElement()
            ->addChild(sprintf('if ($%s->%s(%s) !== false) {', $serviceVariableName, $method->getMethodName(), $this->getMethodParameters($method)))
            ->addChild($this->getFile()->getMainElement()->getIndentedString(sprintf('print_r($%s->getResult());', $serviceVariableName), 1))
            ->addChild('} else {')
            ->addChild($this->getFile()->getMainElement()->getIndentedString(sprintf('print_r($%s->getLastError());', $serviceVariableName), 1))
            ->addChild('}');
        return $this;
    }
    /**
     * @param MethodModel $method
     * @return string
     */
    protected function getMethodParameters(MethodModel $method)
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
    /**
     * @param string $parameterType
     * @param string $parameterName
     * @return string
     */
    protected function getMethodParameter($parameterType, $parameterName = null)
    {
        $parameter = sprintf('%1$s%2$s', (empty($parameterType) && empty($parameterName)) ? '' : '$', empty($parameterName) ? $parameterType : $parameterName);
        $model = $parameterType !== null ? $this->getGenerator()->getStructByName($parameterType) : null;
        if ($model instanceof StructModel && $model->isStruct() && !$model->isRestriction()) {
            $parameter = sprintf('new %s()', $model->getPackagedName(true));
        }
        return $parameter;
    }
    /**
     * @param string[]|PhpAnnotation[] $content
     * @return Tutorial
     */
    protected function addAnnotationBlock($content)
    {
        $this->getFile()->getMainElement()->addChild(new PhpAnnotationBlock($content));
        return $this;
    }
}
