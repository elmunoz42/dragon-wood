<?php
require_once "src/GameManeger.php";
class GameManegerTest extends PHPUnit_Framework_TestCase
{
    // Check string for 1 letter words.
    // ex. String = "hall", anagram = "a"
    function test_checkGameManeger1()
    {
        //Arrange
        $testWord = "a";
        $anagramList = ['a'];
        $test_GameManeger = new GameManeger($testWord, $anagramList);
        //Act
        $result = $test_GameManeger->createGameManegers();
        //Assert
        $this->assertEquals(["a"], $result);
    }
