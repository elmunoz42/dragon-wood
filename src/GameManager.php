<?php
    class GameManager
    {
        // array of 5 opponent cards which are eligible for attack.
        private $landscape = array();
        // player one Player object.
        private $player_one;
        // player two Player object.
        private $player_two;
        // deck of cards for player attacks to be drawn from.
        private $deck_of_cards = array();
        // cards to populate the landscape.
        private $deck_of_opponents = array();
        // cards that players have played.
        private $played_cards = array();

        function __construct()
        {

        }

        function setPlayerOne($player_object)
        {
            $this->player_one = $player_object;
        }
        function getPlayerOne()
        {
            return $this->player_one;
        }
    }

?>
