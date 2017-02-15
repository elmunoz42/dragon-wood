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
        // Setters and Getters
        function setPlayerOne($player_object)
        {
            $this->player_one = $player_object;
        }
        function getPlayerOne()
        {
            return $this->player_one;
        }
        function getPlayerTwo()
        {
            return $this->player_two;
        }
        function setPlayerTwo($player_object)
        {
            $this->player_two = $player_object;
        }

        function getLandscape()
        {
            return $this->landscape;
        }
        function addToLandscape($enemy_object)
        {
            array_push($this->landscape, $enemy_object);
        }
        function addToDeckOfCards($card)
        {
            array_push($this->deck_of_cards, $card);
        }
        function getDeckOfCards()
        {
            return $this->deck_of_cards;
        }
        //
        function getDeckOfOpponents()
        {
            return $this->deck_of_opponents;
        }
        function setDeckOfOpponents()
        {
            // $enemy_type = array("Orch",
            for ($x=0; $x<2; $x++) {
                array_push($this->deck_of_opponents, new Enemy("Goblin",1,2,3,4));
            }
        }
        function getPlayedCards()
        {
            return $this->played_cards;
        }
        function addToPlayedCards($card)
        {
            array_push($this->played_cards, $card);
        }
    }

?>
