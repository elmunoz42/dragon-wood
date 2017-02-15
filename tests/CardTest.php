<?php
require_once "src/Card.php";
class CardTest extends PHPUnit_Framework_TestCase
{

    function test_checkCard1()
    {
        // Arrange
        $input_number = 1;
        $input_color = "blue";
        $test_card = new Card($input_number, $input_color);

        // Act
        $result = $test_card;

        // Assert
        $this->assertEquals(1, $result->getNumber());
        $this->assertEquals("blue", $result->getColor());
    }
}
?>
