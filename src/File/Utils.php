<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Utils as GeneratorUtils;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;

final class Utils
{
    public static function defineModelAnnotationsFromWsdl(PhpAnnotationBlock $block, AbstractModel $model, array $ignoreMeta = []): void
    {
        $validMeta = self::getValidMetaValues($model, $ignoreMeta);
        if (!empty($validMeta)) {
            // First line is the "The {propertyName}"
            if (1 === count($block->getChildren())) {
                $block->addChild('Meta information extracted from the WSDL');
            }

            foreach ($validMeta as $meta) {
                $block->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, $meta, AbstractModelFile::ANNOTATION_META_LENGTH));
            }
        }
    }

    public static function getValidMetaValues(AbstractModel $model, array $ignoreMeta = []): array
    {
        $meta = $model->getMeta();
        $validMeta = [];
        foreach ($meta as $metaName => $metaValue) {
            if (in_array($metaName, $ignoreMeta, true)) {
                continue;
            }

            $finalMeta = self::getMetaValueAnnotation($metaName, $metaValue);
            if (is_scalar($finalMeta)) {
                $validMeta[] = $finalMeta;
            }
        }

        return $validMeta;
    }

    public static function getMetaValueAnnotation(string $metaName, $metaValue): ?string
    {
        $meta = null;
        if (is_array($metaValue)) {
            $metaValue = implode(' | ', array_unique($metaValue));
        }

        $metaValue = GeneratorUtils::cleanComment($metaValue, ', ', false === mb_stripos($metaName, 'SOAPHeader'));
        if (is_scalar($metaValue)) {
            $meta = sprintf("\t- %s: %s", $metaName, $metaValue);
        }

        return $meta;
    }
}
