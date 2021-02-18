<?php
require __DIR__  . '/vendor/autoload.php';
$router = require __DIR__  . '/router.php';
$resolver = require __DIR__ . '/resolver.php';
$object = $router->handler();
//$controller = new SON\Controller;
//echo $controller->handler();

$resolver->handler($object['class'], $object['action']);
//(new SON\Resolver)->handler($object['class'], $object['action']);
