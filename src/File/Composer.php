<?php

namespace WsdlToPhp\PackageGenerator\File;

use Composer\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;

class Composer extends AbstractFile
{
    const JSON_FILE_EXTENSION = 'json';
    /**
     * Tests purpose: do not run composer update command
     * @var bool
     */
    protected $runComposerUpdate = true;
    /**
     * @see \WsdlToPhp\PackageGenerator\File\AbstractFile::writeFile()
     * @return int|bool
     */
    protected function writeFile()
    {
        $composer = new Application();
        $composer->setAutoExit(false);

        $composer->run(new ArrayInput(array(
            'command' => 'init',
            '--verbose' => true,
            '--no-interaction' => true,
            '--name' => $this->getGenerator()->getOptionComposerName(),
            '--description' => sprintf('Package generated from %s using wsdltophp/packagegenerator', $this->getGenerator()->getWsdl()->getName()),
            '--require' => array(
                'php:>=5.3.3',
                'ext-soap:*',
                'wsdltophp/packagebase:dev-master',
            ),
            '--working-dir' => $this->getGenerator()->getOptionDestination(),
        )));

        $this->addAutoloadToComposerJson();

        if ($this->getRunComposerUpdate() === true) {
            return $composer->run(new ArrayInput(array(
                'command' => 'update',
                '--verbose' => true,
                '--optimize-autoloader' => true,
                '--no-dev' => true,
                '--working-dir' => $this->getGenerator()->getOptionDestination(),
            )));
        }
        return true;
    }
    /**
     * @return Composer
     */
    protected function addAutoloadToComposerJson()
    {
        $content = $this->getComposerFileContent();
        if (is_array($content) && !empty($content)) {
            $content['autoload'] = array(
                'psr-4' => $this->getPsr4Autoload(),
            );
        }
        return $this->setComposerFileContent($content);
    }
    /**
     * @return array
     */
    protected function getPsr4Autoload()
    {
        $namespace = new EmptyModel($this->getGenerator(), '');
        if ($namespace->getNamespace() !== '') {
            $namespaceKey = sprintf('%s\\', $namespace->getNamespace());
        } else {
            $namespaceKey = '';
        }
        return array(
            $namespaceKey => sprintf('./%s', AbstractModelFile::SRC_FOLDER),
        );
    }
    /**
     * @return array
     */
    protected function getComposerFileContent()
    {
        $content = array();
        $composerFilePath = $this->getComposerFilePath();
        if (!empty($composerFilePath)) {
            $content = json_decode(file_get_contents($composerFilePath), true);
        }
        return $content;
    }
    /**
     * @param array $content
     * @return Composer
     */
    protected function setComposerFileContent(array $content)
    {
        $composerFilePath = $this->getComposerFilePath();
        if (!empty($composerFilePath)) {
            file_put_contents($composerFilePath, self::encodeToJson($content));
        }
        return $this;
    }
    /**
     * @param array $content
     * @return string
     */
    protected static function encodeToJson($content)
    {
        if (version_compare(PHP_VERSION, '5.4.0') === -1) {
            $json = str_replace('\/', '/', json_encode($content));
        } else {
            $json = json_encode($content, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
        }
        return $json;
    }
    /**
     * @return string
     */
    protected function getComposerFilePath()
    {
        return realpath(sprintf('%s/composer.json', $this->getGenerator()->getOptionDestination()));
    }
    /**
     * @param bool $runComposerUpdate
     * @return Composer
     */
    public function setRunComposerUpdate($runComposerUpdate)
    {
        $this->runComposerUpdate = $runComposerUpdate;
        return $this;
    }
    /**
     * @return bool
     */
    public function getRunComposerUpdate()
    {
        return $this->runComposerUpdate;
    }
    /**
     * @return string
     */
    public function getFileExtension()
    {
        return self::JSON_FILE_EXTENSION;
    }
}
