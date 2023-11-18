<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/bin/php-scoper',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    $rectorConfig->autoloadPaths([
        __DIR__ . '/vendor/autoload.php',
        __DIR__ . '/vendor-bin/rector/vendor/autoload.php',
    ]);

    $rectorConfig->importNames();

    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_81,
        LevelSetList::UP_TO_PHP_82,
    ]);

    $rectorConfig->skip([
        __DIR__.'/src/PhpParser/TraverserFactory.php',
        __DIR__.'/tests/PhpParser/UseStmtNameTest.php',
        __DIR__.'/src/PhpParser/NodeVisitor/AttributeAppender/ParentNodeAppender.php',

        \Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector::class,
        \Rector\Php73\Rector\String_\SensitiveHereNowDocRector::class,
        \Rector\Php81\Rector\ClassMethod\NewInInitializerRector::class => [
            __DIR__.'/src/Configuration/Configuration.php',
        ],
        \Rector\Php81\Rector\Property\ReadOnlyPropertyRector::class => [
            __DIR__.'/src/Configuration/Configuration.php',
        ],
        \Rector\Php55\Rector\String_\StringClassNameToClassConstantRector::class => [
            __DIR__.'/tests/Symbol/NamespaceRegistryTest.php',
            __DIR__.'/tests/Symbol/Reflector/UserSymbolsReflectorTest.php',
            __DIR__.'/tests/Symbol/SymbolRegistryTest.php',
            __DIR__.'/tests/Symbol/SymbolsRegistryTest.php',
        ],
    ]);
};
