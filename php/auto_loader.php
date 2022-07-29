<?php
require_once __DIR__ . '/ZEGOCLOUD/class-loader-2.0/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

$loader->registerNamespaces([
    //'ZEGO' => array(__DIR__.'/src', __DIR__.'/symfony/src'),
    'ZEGO' => __DIR__ . '/ZEGOCLOUD',
]);

$loader->register();
