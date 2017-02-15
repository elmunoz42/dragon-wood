<?php
require_once "src/Card.php";
class CardTest extends PHPUnit_Framework_TestCase
{
    // Check string for 1 letter words.
    // ex. String = "hall", anagram = "a"
    function test_checkCard1()
    {
        //Arrange
        $testWord = "a";
        $anagramList = ['a'];
        $test_Card = new Card($testWord, $anagramList);
        //Act
        $result = $test_Card->createCards();
        //Assert
        $this->assertEquals(["a"], $result);
    }
