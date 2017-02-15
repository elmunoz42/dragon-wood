<?php
require_once "src/Anagram.php";
class AnagramTest extends PHPUnit_Framework_TestCase
{
    // Check string for 1 letter words.
    // ex. String = "hall", anagram = "a"
    function test_checkAnagram1()
    {
        //Arrange
        $testWord = "a";
        $anagramList = ['a'];
        $test_Anagram = new Anagram($testWord, $anagramList);
        //Act
        $result = $test_Anagram->createAnagrams();
        //Assert
        $this->assertEquals(["a"], $result);
    }
