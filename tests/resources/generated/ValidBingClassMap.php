<?php

declare(strict_types=1);
/**
 * Class which returns the class map definition
 * @package Api
 */
class ApiClassMap
{
    /**
     * Returns the mapping between the WSDL Structs and generated Structs' classes
     * This array is sent to the \SoapClient when calling the WS
     * @return string[]
     */
    final public static function get(): array
    {
        return [
            'SearchRequest' => '\\StructType\\ApiSearchRequest',
            'ArrayOfSearchOption' => '\\ArrayType\\ApiArrayOfSearchOption',
            'ArrayOfSourceType' => '\\ArrayType\\ApiArrayOfSourceType',
            'WebRequest' => '\\StructType\\ApiWebRequest',
            'ArrayOfWebSearchOption' => '\\ArrayType\\ApiArrayOfWebSearchOption',
            'ArrayOfGuid' => '\\ArrayType\\ApiArrayOfGuid',
            'ControlsType' => '\\StructType\\ApiControlsType',
            'ArrayOfString' => '\\ArrayType\\ApiArrayOfString',
            'ImageRequest' => '\\StructType\\ApiImageRequest',
            'PhonebookRequest' => '\\StructType\\ApiPhonebookRequest',
            'VideoRequest' => '\\StructType\\ApiVideoRequest',
            'NewsRequest' => '\\StructType\\ApiNewsRequest',
            'MobileWebRequest' => '\\StructType\\ApiMobileWebRequest',
            'ArrayOfMobileWebSearchOption' => '\\ArrayType\\ApiArrayOfMobileWebSearchOption',
            'TranslationRequest' => '\\StructType\\ApiTranslationRequest',
            'SearchResponse' => '\\StructType\\ApiSearchResponse',
            'Query' => '\\StructType\\ApiQuery',
            'SpellResponse' => '\\StructType\\ApiSpellResponse',
            'ArrayOfSpellResult' => '\\ArrayType\\ApiArrayOfSpellResult',
            'SpellResult' => '\\StructType\\ApiSpellResult',
            'WebResponse' => '\\StructType\\ApiWebResponse',
            'ArrayOfWebResult' => '\\ArrayType\\ApiArrayOfWebResult',
            'WebResult' => '\\StructType\\ApiWebResult',
            'ArrayOfWebSearchTag' => '\\ArrayType\\ApiArrayOfWebSearchTag',
            'WebSearchTag' => '\\StructType\\ApiWebSearchTag',
            'ArrayOfDeepLink' => '\\ArrayType\\ApiArrayOfDeepLink',
            'DeepLink' => '\\StructType\\ApiDeepLink',
            'ImageResponse' => '\\StructType\\ApiImageResponse',
            'ArrayOfImageResult' => '\\ArrayType\\ApiArrayOfImageResult',
            'ImageResult' => '\\StructType\\ApiImageResult',
            'Thumbnail' => '\\StructType\\ApiThumbnail',
            'RelatedSearchResponse' => '\\StructType\\ApiRelatedSearchResponse',
            'ArrayOfRelatedSearchResult' => '\\ArrayType\\ApiArrayOfRelatedSearchResult',
            'RelatedSearchResult' => '\\StructType\\ApiRelatedSearchResult',
            'VideoResponse' => '\\StructType\\ApiVideoResponse',
            'ArrayOfVideoResult' => '\\ArrayType\\ApiArrayOfVideoResult',
            'VideoResult' => '\\StructType\\ApiVideoResult',
            'InstantAnswerResponse' => '\\StructType\\ApiInstantAnswerResponse',
            'ArrayOfInstantAnswerResult' => '\\ArrayType\\ApiArrayOfInstantAnswerResult',
            'InstantAnswerResult' => '\\StructType\\ApiInstantAnswerResult',
            'NewsResponse' => '\\StructType\\ApiNewsResponse',
            'ArrayOfNewsRelatedSearch' => '\\ArrayType\\ApiArrayOfNewsRelatedSearch',
            'NewsRelatedSearch' => '\\StructType\\ApiNewsRelatedSearch',
            'ArrayOfNewsResult' => '\\ArrayType\\ApiArrayOfNewsResult',
            'NewsResult' => '\\StructType\\ApiNewsResult',
            'ArrayOfNewsCollection' => '\\ArrayType\\ApiArrayOfNewsCollection',
            'NewsCollection' => '\\StructType\\ApiNewsCollection',
            'ArrayOfNewsArticle' => '\\ArrayType\\ApiArrayOfNewsArticle',
            'NewsArticle' => '\\StructType\\ApiNewsArticle',
            'MobileWebResponse' => '\\StructType\\ApiMobileWebResponse',
            'ArrayOfMobileWebResult' => '\\ArrayType\\ApiArrayOfMobileWebResult',
            'MobileWebResult' => '\\StructType\\ApiMobileWebResult',
            'ArrayOfError' => '\\ArrayType\\ApiArrayOfError',
            'Error' => '\\StructType\\ApiError',
        ];
    }
}
