<?php

use Silex\Application;
use Bangpound\Bridge\Drupal\Controller\ControllerResolver;
use Bangpound\Silex\DrupalServiceProvider;
use Bangpound\Silex\LegacyPhpHttpKernelProvider;
use Silex\Provider\TwigServiceProvider;

$app = new Application(array(
    'web_dir' => realpath(__DIR__ .'/../web/'),
));
$app->register(new TwigServiceProvider());
$app->register(new LegacyPhpHttpKernelProvider());
$app->register(new DrupalServiceProvider());

return $app;
