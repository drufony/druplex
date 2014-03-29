<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;

$app = new Application(array(
    'web_dir' => realpath(__DIR__ .'/../web/'),
));
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider());

$app->register(new \Bangpound\Silex\LegacyPhpHttpKernelProvider());
$app->register(new \Bangpound\Silex\DrupalServiceProvider());
$app['legacy.request_matcher'] = $app->share(function ($c) {
    return $c['drupal.request_matcher'];
});

return $app;
