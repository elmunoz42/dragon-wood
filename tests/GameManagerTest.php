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
        $test_game->addToPlayedCards(new Card(1,"blue"));

        // Act
        $result = $test_game;
        // Assert
        $this->assertEquals("Steve", $result->getPlayerOne()->getName());
        $this->assertEquals("Steve", $result->getPlayerTwo()->getName());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getLandscape());
        $this->assertEquals(array(new Card(1,"blue")), $result->getDeckOfCards());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getDeckOfOpponents());
        $this->assertEquals(array(new Card(1,"blue")), $result->getPlayedCards());

    }
    function test_shuffle()
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
        for ($x=0; $x<5; $x++) {
            $test_game->addToDeckOfCards(new Card($x,"blue"));
        }
        $test_game->shuffleDeckOfCards();
        $test_game->shuffleDeckOfOpponents();
        $test_game->setDeckOfOpponents();
        $test_game->addToPlayedCards(new Card(1,"blue"));

        // Act
        $result = $test_game;
        // Assert
        $this->assertEquals("Steve", $result->getPlayerOne()->getName());
        $this->assertEquals("Steve", $result->getPlayerTwo()->getName());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getLandscape());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getDeckOfOpponents());
        $this->assertEquals(array(new Card(1,"blue")), $result->getPlayedCards());
        var_dump($result->getDeckOfCards());

    }
    function test_removeCard()
    {
        // Arrange
        $test_game = new GameManager();
        $i_player_name ="Steve";
        $i_hand = array(new Card(3,"red"));
        $i_hand2 = new Card(3,"red");
        $i_attack_cards = array(new Card(2,"red"));
        $i_attack_type = "strike";
        $i_captured_cards = array(new Enemy("Goblin",1,2,3,4));
        $test_player = new Player($i_player_name, $i_hand, $i_attack_cards, $i_attack_type, $i_captured_cards);
        $test_game->setPlayerOne($test_player);
        $test_game->setPlayerTwo($test_player);
        for ($x=0; $x<5; $x++) {
            $test_game->addToLandscape(new Enemy("Goblin",1,2,3,4));
        }
        for ($x=0; $x<5; $x++) {
            $test_game->addToDeckOfCards(new Card($x,"blue"));
        }
        $test_game->addToDeckOfCards($i_hand2);
        $test_game->setDeckOfOpponents();
        $test_game->addToPlayedCards($i_hand2);
        $test_game->removeCardFromDeck($i_hand2);

        // Act
        $result = $test_game;
        // Assert
        $this->assertEquals("Steve", $result->getPlayerOne()->getName());
        $this->assertEquals("Steve", $result->getPlayerTwo()->getName());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getLandscape());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getDeckOfOpponents());
        $this->assertEquals(array(new Card(3,"red")), $result->getPlayedCards());
        $this->assertEquals(array(new Card(0,"blue"), new Card(1,"blue"),new Card(2,"blue"),new Card(3,"blue"),new Card(4,"blue")), $result->getDeckOfCards());

    }
    function test_tallyScore()
    {
        // Arrange
        $test_game = new GameManager();
        $i_player_name ="Steve";
        $i_hand = array(new Card(3,"red"));
        $i_hand2 = new Card(3,"red");
        $i_attack_cards = array(new Card(2,"red"));
        $i_attack_type = "strike";
        $i_captured_cards = array(new Enemy("Goblin",1,2,3,4));
        $test_player = new Player($i_player_name, $i_hand, $i_attack_cards, $i_attack_type, $i_captured_cards);
        $test_game->setPlayerOne($test_player);
        $test_game->setPlayerTwo($test_player);
        for ($x=0; $x<4; $x++) {
            $test_game->addToLandscape(new Enemy("Goblin",1,2,3,4));
        }
        for ($x=0; $x<5; $x++) {
            $test_game->addToDeckOfCards(new Card($x,"blue"));
        }
        $new_enemy=new Enemy("Orch",1,2,3,4);
        $test_game->addToLandscape($new_enemy);
        $test_game->addToDeckOfCards($i_hand2);
        $test_game->setDeckOfOpponents();
        $test_game->addToPlayedCards($i_hand2);
        $test_game->removeCardFromDeck($i_hand2);
        $test_game->tallyScore();
        $test_game->removeCardFromLandscape($new_enemy);
        $test_game->refreshLandscape();
        // Act
        $result = $test_game;
        // Assert
        $this->assertEquals("Steve", $result->getPlayerOne()->getName());
        $this->assertEquals("Steve", $result->getPlayerTwo()->getName());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getLandscape());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4), new Enemy("Goblin",1,2,3,4)), $result->getDeckOfOpponents());
        $this->assertEquals(array(new Card(3,"red")), $result->getPlayedCards());
        $this->assertEquals(array(new Card(0,"blue"), new Card(1,"blue"),new Card(2,"blue"),new Card(3,"blue"),new Card(4,"blue")), $result->getDeckOfCards());
        $this->assertEquals(1, $result->getPlayerOneScore());
        $this->assertEquals(1, $result->getPlayerTwoScore());
        $this->assertEquals(true, $result->attack($result->getPlayerOne(), $result->getLandscape()[0]));
        $this->assertEquals("Goblin", $result->getLandscape()[4]->getName());
    }

  }
  ?>
