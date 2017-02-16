
<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/GameManager.php";
    require_once __DIR__."/../src/Card.php";
    require_once __DIR__."/../src/Player.php";
    require_once __DIR__."/../src/Enemy.php";

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../web/views'
    ));
    $app->get("/", function() use ($app) {
    return $app['twig']->render('game-setup.html.twig');
    });

    $app->post("/action", function() use ($app) {
        $new_player_one = new Player($_POST["player_one_name"], array(), array(),"none", array());
        $new_player_one->addToHand(new Card(7,"blue"));
        $new_player_two = new Player($_POST["player_two_name"], array(), array(),"none", array());
        $new_player_two->addToHand(new Card(3,"red"));
        $game_enter = new GameManager();
        $game_enter->setPlayerOne($new_player_one);
        $game_enter->setPlayerTwo($new_player_two);
        for ($x=0; $x<4; $x++) {
            $game_enter->addToLandscape(new Enemy("Goblin",1,2,3,4));
        }
    return $app['twig']->render('game-action.html.twig', array('gameManager' => $game_enter));
    });


    return $app;
 ?>
