<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PhpGenerator\Element\PhpAnnotation;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Generator\Utils as GeneratorUtils;
use WsdlToPhp\PhpGenerator\Element\PhpAnnotationBlock;

class Utils
{
    /**
     * @param PhpAnnotationBlock $block
     * @param AbstractModel $model
     * @param array $ignoreMeta
     */
    public static function defineModelAnnotationsFromWsdl(PhpAnnotationBlock $block, AbstractModel $model, array $ignoreMeta = [])
    {
        $validMeta = self::getValidMetaValues($model, $ignoreMeta);
        if (!empty($validMeta)) {
            /**
             * First line is the "The {propertyName}"
             */
            if (count($block->getChildren()) === 1) {
                $block->addChild('Meta information extracted from the WSDL');
            }
            foreach ($validMeta as $meta) {
                $block->addChild(new PhpAnnotation(PhpAnnotation::NO_NAME, $meta, AbstractModelFile::ANNOTATION_META_LENGTH));
            }
        }
    }
    /**
     * @param AbstractModel $model
     * @param array $ignoreMeta
     * @return string[]
     */
    public static function getValidMetaValues(AbstractModel $model, array $ignoreMeta = [])
    {
        $meta = $model->getMeta();
        $validMeta = [];
        foreach ($meta as $metaName => $metaValue) {
            if (!in_array($metaName, $ignoreMeta, true)) {
                $finalMeta = self::getMetaValueAnnotation($metaName, $metaValue);
                if (is_scalar($finalMeta)) {
                    $validMeta[] = $finalMeta;
                }
            }
        }
        return $validMeta;
    }
    /**
     * @param string $metaName
     * @param mixed $metaValue
     * @return string|null
     */
    public static function getMetaValueAnnotation($metaName, $metaValue)
    {
        $meta = null;
        if (is_array($metaValue)) {
            $metaValue = implode(' | ', array_unique($metaValue));
        }
        $metaValue = GeneratorUtils::cleanComment($metaValue, ', ', mb_stripos($metaName, 'SOAPHeader') === false);
        if (is_scalar($metaValue)) {
            $meta = sprintf("\t- %s: %s", $metaName, $metaValue);
        }
        return $meta;
    }
}
