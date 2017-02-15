<?php
require_once "src/GameManager.php";
class GameManegerTest extends PHPUnit_Framework_TestCase
{

    function test_checkGameManager()
    {
        // Arrange
        $test_game = new GameManager();
        $i_player_name ="Steve";
        $i_hand = array(new Card(1,"blue"));
        $i_attack_cards = array(new Card(2,"red"));
        $i_attack_type = "strike";
        $i_captured_cards = array(new Enemy("Goblin",1,2,3,4));
        $test_player = new Player($i_player_name, $i_hand, $i_attack_cards, $i_attack_type, $i_captured_cards);
        $test_game->setPlayerOne($test_player);

        // Act
        $result = $test_game;
        // Assert
        $this->assertEquals("Steve", $test_game->getPlayerOne()->getName());
    }
    function test_settersGameManager()
    {
        // Arrange
        $test_game = new GameManager();
        $i_player_name ="Steve";
        $i_hand = array(new Card(1,"blue"));
        $i_attack_cards = array(new Card(2,"red"));
        $i_attack_type = "strike";
        $i_captured_cards = array(new Enemy("Goblin",1,2,3,4));
        $test_player = new Player($i_player_name, $i_hand, $i_attack_cards, $i_attack_type, $i_captured_cards);
        $test_game->setPlayerOne($test_player);
        $test_game->setPlayerTwo($test_player);
        for ($x=0; $x<5; $x++) {
            $test_game->addToLandscape(new Enemy("Goblin",1,2,3,4));
        }
        $test_game->addToDeckOfCards(new Card(1,"blue"));
        $test_game->setDeckOfOpponents();

        // Act
        $result = $test_game;
        // Assert
        $this->assertEquals("Steve", $result->getPlayerOne()->getName());
        $this->assertEquals("Steve", $result->getPlayerTwo()->getName());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getLandscape());
        $this->assertEquals(array(new Card(1,"blue")), $result->getDeckOfCards());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getDeckOfOpponents());
    }

  }
  ?>
