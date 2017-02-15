<?php
require_once "src/Player.php";
class PlayerTest extends PHPUnit_Framework_TestCase
{

    function test_checkPlayer()
    {
        // Arrange
        $i_player_name ="Steve";
        $i_hand = array(new Card(1,"blue"));
        $i_attack_cards = array(new Card(2,"red"));
        $i_attack_type = "strike";
        $i_captured_cards = array(new Enemy("Goblin",1,2,3,4));
        $test_player = new Player($i_player_name, $i_hand, $i_attack_cards, $i_attack_type, $i_captured_cards);
        // Act
        $result=$test_player;
        // Assert
        $this->assertEquals("Steve", $result->getName());
        $this->assertEquals(array(new Card(1,"blue")), $result->getHand());
        $this->assertEquals(array(new Card(2,"red")), $result->getAttackCards());
        $this->assertEquals("strike", $result->getAttackType());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4)), $result->getCapturedCards());
    }
    function test_playerAddHand()
    {
        // Arrange
        $i_player_name ="Steve";
        $i_hand = array();
        $i_attack_cards = array((new Card(2,"red")), (new Card(3,"purple")));
        $i_attack_type = "strike";
        $i_captured_cards = array(new Enemy("Goblin",1,2,3,4));
        $test_player = new Player($i_player_name, $i_hand, $i_attack_cards, $i_attack_type, $i_captured_cards);
        $test_player->addToHand(new Card(1,"blue"));
        // Act
        $result=$test_player;
        // Assert
        $this->assertEquals("Steve", $result->getName());
        $this->assertEquals(array(new Card(1,"blue")), $result->getHand());
        $this->assertEquals(array(new Card(2,"red"), new Card(3,"purple")), $result->getAttackCards());
        $this->assertEquals("strike", $result->getAttackType());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4)), $result->getCapturedCards());
    }
    function test_playerRemoveHand()
    {
        // Arrange
        $i_player_name = "Steve";
        $i_card_1 = new Card(1,"blue");
        $i_card_2 = new Card(2,"burgundy");
        $i_hand = array($i_card_1, $i_card_2);
        $i_attack_cards = array((new Card(2,"red")), (new Card(3,"purple")));
        $i_attack_type = "strike";
        $i_captured_cards = array(new Enemy("Goblin",1,2,3,4));
        $test_player = new Player($i_player_name, $i_hand, $i_attack_cards, $i_attack_type, $i_captured_cards);
        $test_player->removeFromHand($i_card_1);
        // Act
        $result=$test_player;
        // Assert
        $this->assertEquals("Steve", $result->getName());
        $this->assertEquals(array(new Card(2,"burgundy")), $result->getHand());
        $this->assertEquals(array(new Card(2,"red"), new Card(3,"purple")), $result->getAttackCards());
        $this->assertEquals("strike", $result->getAttackType());
        $this->assertEquals(array(new Enemy("Goblin",1,2,3,4)), $result->getCapturedCards());
    }
}
?>
