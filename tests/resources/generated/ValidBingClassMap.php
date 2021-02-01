<?php

declare(strict_types=1);

namespace Api;

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
            'SearchRequest' => '\\Api\\StructType\\ApiSearchRequest',
            'ArrayOfSearchOption' => '\\Api\\ArrayType\\ApiArrayOfSearchOption',
            'ArrayOfSourceType' => '\\Api\\ArrayType\\ApiArrayOfSourceType',
            'WebRequest' => '\\Api\\StructType\\ApiWebRequest',
            'ArrayOfWebSearchOption' => '\\Api\\ArrayType\\ApiArrayOfWebSearchOption',
            'ArrayOfString' => '\\Api\\ArrayType\\ApiArrayOfString',
            'ImageRequest' => '\\Api\\StructType\\ApiImageRequest',
            'PhonebookRequest' => '\\Api\\StructType\\ApiPhonebookRequest',
            'VideoRequest' => '\\Api\\StructType\\ApiVideoRequest',
            'NewsRequest' => '\\Api\\StructType\\ApiNewsRequest',
            'MobileWebRequest' => '\\Api\\StructType\\ApiMobileWebRequest',
            'ArrayOfMobileWebSearchOption' => '\\Api\\ArrayType\\ApiArrayOfMobileWebSearchOption',
            'TranslationRequest' => '\\Api\\StructType\\ApiTranslationRequest',
            'SearchResponse' => '\\Api\\StructType\\ApiSearchResponse',
            'Query' => '\\Api\\StructType\\ApiQuery',
            'SpellResponse' => '\\Api\\StructType\\ApiSpellResponse',
            'ArrayOfSpellResult' => '\\Api\\ArrayType\\ApiArrayOfSpellResult',
            'SpellResult' => '\\Api\\StructType\\ApiSpellResult',
            'WebResponse' => '\\Api\\StructType\\ApiWebResponse',
            'ArrayOfWebResult' => '\\Api\\ArrayType\\ApiArrayOfWebResult',
            'WebResult' => '\\Api\\StructType\\ApiWebResult',
            'ArrayOfWebSearchTag' => '\\Api\\ArrayType\\ApiArrayOfWebSearchTag',
            'WebSearchTag' => '\\Api\\StructType\\ApiWebSearchTag',
            'ArrayOfDeepLink' => '\\Api\\ArrayType\\ApiArrayOfDeepLink',
            'DeepLink' => '\\Api\\StructType\\ApiDeepLink',
            'ImageResponse' => '\\Api\\StructType\\ApiImageResponse',
            'ArrayOfImageResult' => '\\Api\\ArrayType\\ApiArrayOfImageResult',
            'ImageResult' => '\\Api\\StructType\\ApiImageResult',
            'Thumbnail' => '\\Api\\StructType\\ApiThumbnail',
            'RelatedSearchResponse' => '\\Api\\StructType\\ApiRelatedSearchResponse',
            'ArrayOfRelatedSearchResult' => '\\Api\\ArrayType\\ApiArrayOfRelatedSearchResult',
            'RelatedSearchResult' => '\\Api\\StructType\\ApiRelatedSearchResult',
            'VideoResponse' => '\\Api\\StructType\\ApiVideoResponse',
            'ArrayOfVideoResult' => '\\Api\\ArrayType\\ApiArrayOfVideoResult',
            'VideoResult' => '\\Api\\StructType\\ApiVideoResult',
            'InstantAnswerResponse' => '\\Api\\StructType\\ApiInstantAnswerResponse',
            'ArrayOfInstantAnswerResult' => '\\Api\\ArrayType\\ApiArrayOfInstantAnswerResult',
            'InstantAnswerResult' => '\\Api\\StructType\\ApiInstantAnswerResult',
            'NewsResponse' => '\\Api\\StructType\\ApiNewsResponse',
            'ArrayOfNewsRelatedSearch' => '\\Api\\ArrayType\\ApiArrayOfNewsRelatedSearch',
            'NewsRelatedSearch' => '\\Api\\StructType\\ApiNewsRelatedSearch',
            'ArrayOfNewsResult' => '\\Api\\ArrayType\\ApiArrayOfNewsResult',
            'NewsResult' => '\\Api\\StructType\\ApiNewsResult',
            'ArrayOfNewsCollection' => '\\Api\\ArrayType\\ApiArrayOfNewsCollection',
            'NewsCollection' => '\\Api\\StructType\\ApiNewsCollection',
            'ArrayOfNewsArticle' => '\\Api\\ArrayType\\ApiArrayOfNewsArticle',
            'NewsArticle' => '\\Api\\StructType\\ApiNewsArticle',
            'MobileWebResponse' => '\\Api\\StructType\\ApiMobileWebResponse',
            'ArrayOfMobileWebResult' => '\\Api\\ArrayType\\ApiArrayOfMobileWebResult',
            'MobileWebResult' => '\\Api\\StructType\\ApiMobileWebResult',
            'ArrayOfError' => '\\Api\\ArrayType\\ApiArrayOfError',
            'Error' => '\\Api\\StructType\\ApiError',
        ];
    }
}
