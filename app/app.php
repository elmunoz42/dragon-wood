
<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";

    $app = new Silex\Application();
    $app['debug'] = true;
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../web/views'
    ));
    $app->get("/", function() use ($app) {
    return $app['twig']->render('game-setup.html.twig');
    });

    $app->post("/action", function() use ($app) {
    return $app['twig']->render('game-action.html.twig', array(''));
    });


    return $app;
 ?>
