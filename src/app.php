<?php

use Silex\Application;
use Bangpound\Bridge\Drupal\Controller\ControllerResolver;
use Bangpound\Silex\DrupalServiceProvider;
use Bangpound\Silex\LegacyPhpHttpKernelProvider;

$app = new Application(array(
    'web_dir' => realpath(__DIR__ .'/../web/'),
));
$app['resolver'] = $app->share($app->extend('resolver', function ($resolver, $c) {
    return new ControllerResolver($resolver, $c['legacy.request_matcher']);
}));

$app->register(new LegacyPhpHttpKernelProvider());
$app->register(new DrupalServiceProvider());
$app['legacy.request_matcher'] = $app->share(function ($c) {
    return $c['drupal.request_matcher'];
});

return $app;
