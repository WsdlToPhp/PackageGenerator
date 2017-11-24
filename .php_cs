<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('tests/resources/generated')
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setUsingCache(false)
    ->setRules(array(
        '@PSR2' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'binary_operator_spaces' => true,
        'no_whitespace_in_blank_line' => true,
        'ternary_operator_spaces' => true,
        'cast_spaces' => true,
        'trailing_comma_in_multiline_array' => true
    ))
    ->setFinder($finder);
