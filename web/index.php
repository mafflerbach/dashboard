<?php
$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->add('ddashboard', __DIR__ . '/../lib/');

$config = \ddashboard\Config::getInstance();
$config->define('path', dirname(dirname(__FILE__)));

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => __DIR__.'/cache/',
));
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
   // 'twig.options'    => array('cache' => __DIR__ . '/cache')
));

$app->mount('/', new \ddashboard\Page\Index());
$app->mount('/list/', new \ddashboard\Page\Todolist());

if ($app['debug']) {
    $app->run();
}
else{
    $app['http_cache']->run();
}

