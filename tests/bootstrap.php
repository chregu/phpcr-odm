<?php

require_once __DIR__ . '/../lib/vendor/doctrine-common/lib/Doctrine/Common/ClassLoader.php';
require_once __DIR__ . '/../lib/vendor/doctrine-common/lib/Doctrine/Common/Annotations/AnnotationRegistry.php';

use Doctrine\Common\ClassLoader;
use Doctrine\Common\Annotations\AnnotationRegistry;

$classLoader = new ClassLoader('Doctrine\Tests', __DIR__ . '/../tests');
$classLoader->register();

$classLoader = new ClassLoader('Doctrine\ODM', __DIR__ . '/../lib');
$classLoader->register();

$classLoader = new ClassLoader('Doctrine', __DIR__ . '/../lib/vendor/doctrine-common/lib');
$classLoader->register();

$classLoader = new ClassLoader('Documents', __DIR__);
$classLoader->register();

$classLoader = new ClassLoader('PHPCR\Util', __DIR__ . '/../lib/vendor/phpcr-utils/src');
$classLoader->register();

$classLoader = new ClassLoader('PHPCR', __DIR__ . '/../lib/vendor/phpcr/src');
$classLoader->register();

$classLoader = new ClassLoader('Symfony\Component\Console', __DIR__ . '/../lib/vendor/jackalope/lib/phpcr-utils/lib/vendor');
$classLoader->register();

$classLoader = new ClassLoader('Symfony', __DIR__ . '/../lib/vendor');
$classLoader->register();

AnnotationRegistry::registerLoader(function($class) use ($classLoader) {
    $classLoader->loadClass($class);
    return class_exists($class, false);
});
AnnotationRegistry::registerFile(__DIR__.'/../lib/Doctrine/ODM/PHPCR/Mapping/Annotations/DoctrineAnnotations.php');
