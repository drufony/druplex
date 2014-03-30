<?php

use Silex\Application;

$app = new Application(array(
    'web_dir' => realpath(__DIR__ .'/../web/'),
));

$app->register(new \Bangpound\Silex\LegacyPhpHttpKernelProvider());
$app->register(new \Bangpound\Silex\DrupalServiceProvider());
$app['legacy.request_matcher'] = $app->share(function ($c) {
    return $c['drupal.request_matcher'];
});

return $app;
