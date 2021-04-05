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
     * @return void
     */
    protected function writeFile()
    {
        $composer = new Application();
        $composer->setAutoExit(false);
        $composer->run(new ArrayInput([
            'command' => 'init',
            '--verbose' => true,
            '--no-interaction' => true,
            '--name' => $this->getGenerator()->getOptionComposerName(),
            '--description' => sprintf('Package generated from %s using wsdltophp/packagegenerator', $this->getGenerator()->getWsdl()->getName()),
            '--require' => [
                'php:>=5.3.3',
                'ext-soap:*',
                'ext-mbstring:*',
                'wsdltophp/packagebase:~2.0',
            ],
            '--working-dir' => $this->getGenerator()->getOptionDestination(),
        ]));
        $this->completeComposerJson();
        if ($this->getRunComposerUpdate() === true) {
            return $composer->run(new ArrayInput([
                'command' => 'update',
                '--verbose' => true,
                '--optimize-autoloader' => true,
                '--no-dev' => true,
                '--working-dir' => $this->getGenerator()->getOptionDestination(),
            ]));
        }
    }
    /**
     * @return Composer
     */
    protected function completeComposerJson()
    {
        $content = $this->getComposerFileContent();
        if (is_array($content) && !empty($content)) {
            $this->addAutoloadToComposerJson($content)->addComposerSettings($content);
        }
        return $this->setComposerFileContent($content);
    }
    /**
     * @return Composer
     */
    protected function addAutoloadToComposerJson(array &$content)
    {
        $content['autoload'] = [
            'psr-4' => $this->getPsr4Autoload(),
        ];
        return $this;
    }
    /**
     * @return Composer
     */
    protected function addComposerSettings(array &$content)
    {
        $content = array_merge_recursive($content, $this->getGenerator()->getOptionComposerSettings());
        return $this;
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
        $src = rtrim($this->generator->getOptionSrcDirname(), DIRECTORY_SEPARATOR);
        return [
            $namespaceKey => sprintf('./%s', empty($src) ? '' : $src . DIRECTORY_SEPARATOR),
        ];
    }
    /**
     * @return array
     */
    protected function getComposerFileContent()
    {
        $content = [];
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
        return json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    /**
     * @return string
     */
    protected function getComposerFilePath()
    {
        $path = realpath(sprintf('%s/composer.json', $this->getGenerator()->getOptionDestination()));
        return false === $path ? '' : $path;
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
