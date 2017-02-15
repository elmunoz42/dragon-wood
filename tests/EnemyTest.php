<?php
require_once "src/Enemy.php";
class EnemyTest extends PHPUnit_Framework_TestCase
{
    // Check string for 1 letter words.
    // ex. String = "hall", anagram = "a"
    function test_checkEnemy1()
    {
        //Arrange
        $testWord = "a";
        $anagramList = ['a'];
        $test_Enemy = new Enemy($testWord, $anagramList);
        //Act
        $result = $test_Enemy->createEnemys();
        //Assert
        $this->assertEquals(["a"], $result);
    }
