<?php
    require_once __DIR__."/../vendor/autoload.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app['debug'] = true;

    $app->get('/', function () use ($app) {
        return $app['twig']->render('index.html');
    });

    $app->get('/{name}/thing', function ($name) use ($app) {
        return $app['twig']->render('index.html', array('destination' => $name));
    });

    $app->get("/goodbye", function() {
        return "Goodbye friend!";
    });

    return $app;
?>