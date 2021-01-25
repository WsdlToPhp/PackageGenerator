<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Generator;

use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PackageGenerator\File\ClassMap as ClassMapFile;
use WsdlToPhp\PackageGenerator\File\Composer as ComposerFile;
use WsdlToPhp\PackageGenerator\File\Service as ServiceFile;
use WsdlToPhp\PackageGenerator\File\Struct as StructFile;
use WsdlToPhp\PackageGenerator\File\StructArray as StructArrayFile;
use WsdlToPhp\PackageGenerator\File\StructEnum as StructEnumFile;
use WsdlToPhp\PackageGenerator\File\Tutorial as TutorialFile;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Model\Struct as StructModel;

class GeneratorFiles extends AbstractGeneratorAware
{
    protected ClassMapFile $classmapFile;

    public function getClassmapFile(): ClassMapFile
    {
        if (!isset($this->classmapFile)) {
            $classMapModel = new EmptyModel($this->generator, 'ClassMap');
            $classMap = new ClassMapFile($this->generator, $classMapModel->getPackagedName());
            $classMap->setModel($classMapModel);
            $this->classmapFile = $classMap;
        }

        return $this->classmapFile;
    }

    public function doGenerate(): GeneratorFiles
    {
        return $this
            ->generateStructsClasses()
            ->generateServicesClasses()
            ->generateClassMap()
            ->generateTutorialFile()
            ->generateComposerFile()
        ;
    }

    protected function generateStructsClasses(): GeneratorFiles
    {
        foreach ($this->getGenerator()->getStructs() as $struct) {
            if (!$struct->isStruct()) {
                continue;
            }

            $this
                ->getStructFile($struct)
                ->setModel($struct)
                ->write()
            ;
        }

        return $this;
    }

    protected function getStructFile(StructModel $struct): AbstractModelFile
    {
        if ($struct->isRestriction()) {
            $file = new StructEnumFile($this->generator, $struct->getPackagedName());
        } elseif ($struct->isArray()) {
            $file = new StructArrayFile($this->generator, $struct->getPackagedName());
        } else {
            $file = new StructFile($this->generator, $struct->getPackagedName());
        }

        return $file;
    }

    protected function generateServicesClasses(): self
    {
        foreach ($this->getGenerator()->getServices(true) as $service) {
            $file = new ServiceFile($this->generator, $service->getPackagedName());
            $file->setModel($service)->write();
        }

        return $this;
    }

    protected function generateClassMap(): self
    {
        $this->getClassmapFile()->write();

        return $this;
    }

    protected function generateTutorialFile(): self
    {
        if ($this->generator->getOptionGenerateTutorialFile() && $this->getClassmapFile() instanceof ClassMapFile) {
            $tutorialFile = new TutorialFile($this->generator, 'tutorial');
            $tutorialFile->write();
        }

        return $this;
    }

    protected function generateComposerFile(): self
    {
        if ($this->generator->getOptionStandalone()) {
            $composerFile = new ComposerFile($this->generator, 'composer');
            $composerFile->write();
        }

        return $this;
    }
}
