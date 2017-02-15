<?php
require_once "src/Enemy.php";
class EnemyTest extends PHPUnit_Framework_TestCase
{

    function test_checkEnemy1()
    {
        // Arrange
        $i_name = "Dragon";
        $i_value = 3;
        $i_strike_req = 4;
        $i_stomp_req = 5;
        $i_shout_req = 6;
        $testEnemy = new Enemy($i_name, $i_value, $i_strike_req, $i_stomp_req, $i_shout_req);
        // Act
        $result = $testEnemy;
        // Assert
        $this->assertEquals("Dragon", $result->getName());
        $this->assertEquals(3, $result->getValue());
        $this->assertEquals(4, $result->getStrikeReq());
        $this->assertEquals(5, $result->getStompReq());
        $this->assertEquals(6, $result->getShoutReq());
    }
  }
  ?>
