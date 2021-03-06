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
        // diceRoll.
        private $dice_roll;
        // playerOneScore
        private $player_one_score = 0;
        // playerTwoScore
        private $player_two_score = 0;


        function __construct()
        {

        }
        // methods
        function shuffleDeckOfCards() {
            shuffle($this->deck_of_cards);
        }
        function shuffleDeckOfOpponents() {
            shuffle($this->deck_of_opponents);
        }

        function removeCardFromDeck($card) {
            $card_position = array_search ( $card , $this->deck_of_cards );
            array_splice ( $this->deck_of_cards , $card_position, 1 );
        }
        function removeCardFromOpponentDeck($card) {
            $card_position = array_search ( $card , $this->deck_of_opponents );
            array_splice ( $this->deck_of_opponents , $card_position, 1 );
        }

        function tallyScore()
        {
            $p_one_captured = $this->player_one->getCapturedCards();
            $p_one_sum = 0;
            foreach ($p_one_captured as $card) {
                $p_one_sum+= $card->getValue();
            }
            $this->setPlayerOneScore($p_one_sum);
            $p_two_captured = $this->player_two->getCapturedCards();
            $p_two_sum = 0;
            foreach ($p_two_captured as $card) {
                $p_two_sum+= $card->getValue();
            }
            $this->setPlayerTwoScore($p_two_sum);
        }
        function attack($player, $card)
        {

            $attack_total = 0;
            $total_number_of_rolls = count($player->getAttackCards());
            for ($x=0; $x<$total_number_of_rolls; $x++){
                $attack_total += rand(1,6);
            }
            $attack_type = $player->getAttackType();
            echo $attack_total;
            echo $attack_type;
            switch ($attack_type) {
                case ("strike"):
                    if ($attack_total >= $card->getStrikeReq()){
                        return true;
                    }
                    else {
                        return false;
                    }
                case ("stomp"):
                    if ($attack_total >= $card->getStompReq()){
                        return true;
                    }
                    else {
                        return false;
                    }
                case ("shout"):
                    if ($attack_total >= $card->getShoutReq()){
                        return true;
                    }
                    else {
                        return false;
                    }
                default:
                    return false;
            }
        }
        // Setters and Getters
        function setPlayerOneScore($score)
        {
            $this->player_one_score = $score;
        }
        function getPlayerOneScore()
        {
            return $this->player_one_score;
        }
        function setPlayerTwoScore($score)
        {
            $this->player_two_score = $score;
        }
        function getPlayerTwoScore()
        {
            return $this->player_two_score;
        }
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
        // Landscape
        function getLandscape()
        {
            return $this->landscape;
        }
        function addToLandscape($enemy_object)
        {
            array_push($this->landscape, $enemy_object);
        }
        function removeCardFromLandscape($card) {
            $card_position = array_search ( $card , $this->landscape );
            array_splice ( $this->landscape , $card_position, 1 );
        }
        function refreshLandscape()
        {
            $landscape_size = count($this->getLandscape());
            for ($x=0; $x<(5-$landscape_size); $x++){
                $cards_to_pop = $this->getDeckOfOpponents();
                $cards_poped = array_pop($cards_to_pop);
                $this->addToLandscape($cards_poped);
            }
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
