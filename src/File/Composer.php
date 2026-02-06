<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use Composer\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;

final class Composer extends AbstractFile
{
    public const JSON_FILE_EXTENSION = 'json';

    /**
     * Tests purpose: do not run composer update command.
     */
    protected bool $runComposerUpdate = true;

    public function setRunComposerUpdate(bool $runComposerUpdate): Composer
    {
        $this->runComposerUpdate = $runComposerUpdate;

        return $this;
    }

    public function getRunComposerUpdate(): bool
    {
        return $this->runComposerUpdate;
    }

    public function getFileExtension(): string
    {
        return self::JSON_FILE_EXTENSION;
    }

    protected function writeFile(): void
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
                'php:>=7.4',
                'ext-dom:*',
                'ext-mbstring:*',
                'ext-soap:*',
                'wsdltophp/packagebase:~5.0',
            ],
            '--working-dir' => $this->getGenerator()->getOptionDestination(),
        ]));

        $this->completeComposerJson();

        if ($this->getRunComposerUpdate()) {
            $composer->run(new ArrayInput([
                'command' => 'update',
                '--verbose' => true,
                '--optimize-autoloader' => true,
                '--no-dev' => true,
                '--working-dir' => $this->getGenerator()->getOptionDestination(),
            ]));
        }
    }

    protected function completeComposerJson(): Composer
    {
        $content = $this->getComposerFileContent();
        if (is_array($content) && !empty($content)) {
            $this
                ->addAutoloadToComposerJson($content)
                ->addComposerSettings($content)
            ;
        }

        return $this->setComposerFileContent($content);
    }

    protected function addAutoloadToComposerJson(array &$content): Composer
    {
        $content['autoload'] = [
            'psr-4' => $this->getPsr4Autoload(),
        ];

        return $this;
    }

    protected function addComposerSettings(array &$content): Composer
    {
        $content = array_replace_recursive($content, $this->getGenerator()->getOptionComposerSettings());

        return $this;
    }

    protected function getPsr4Autoload(): array
    {
        $namespace = new EmptyModel($this->getGenerator(), '');
        if (!empty($namespace->getNamespace())) {
            $namespaceKey = sprintf('%s\\', $namespace->getNamespace());
        } else {
            $namespaceKey = '';
        }
        $src = rtrim($this->generator->getOptionSrcDirname(), DIRECTORY_SEPARATOR);

        return [
            $namespaceKey => sprintf(
                './%s%s',
                empty($src) ? '' : $src.DIRECTORY_SEPARATOR,
                str_replace('\\', DIRECTORY_SEPARATOR, $namespace->getNamespace())
            ),
        ];
    }

    protected function getComposerFileContent(): array
    {
        $content = [];
        $composerFilePath = $this->getComposerFilePath();
        if (!empty($composerFilePath)) {
            $content = json_decode(file_get_contents($composerFilePath), true);
        }

        return $content;
    }

    protected function setComposerFileContent(array $content): Composer
    {
        $composerFilePath = $this->getComposerFilePath();
        if (!empty($composerFilePath)) {
            file_put_contents($composerFilePath, self::encodeToJson($content));
        }

        return $this;
    }

    protected static function encodeToJson(array $content): string
    {
        return json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    protected function getComposerFilePath(): string
    {
        $path = realpath(sprintf('%s/composer.json', $this->getGenerator()->getOptionDestination()));

        return false === $path ? '' : $path;
    }
}
