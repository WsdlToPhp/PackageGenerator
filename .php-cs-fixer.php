<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('tests/resources/generated')
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setUsingCache(false)
    ->setRules(array(
        '@PhpCsFixer' => true,
        'phpdoc_separation' => false,
    ))
    ->setFinder($finder);
