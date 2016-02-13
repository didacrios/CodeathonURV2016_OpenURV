<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

//Registrar el servei de Twig
$app->register(new Silex\Provider\TwigServiceProvider());

//Registrar el servei de Doctrine
$app->register(new Silex\Provider\DoctrineServiceProvider());

require_once __DIR__.'/../src/config.php';
require_once __DIR__.'/../src/controllers.php';
require_once __DIR__.'/../src/router.php';

$app->run();
