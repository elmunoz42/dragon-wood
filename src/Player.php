<?php

    class Player {

        private $player_name;
        private $hand = array();
        private $attack_cards = array();
        private $attack_type;
        private $captured_cards = array();

        function __construct($i_player_name, $i_hand, $i_attack_cards, $i_attack_type, $i_captured_cards)
        {
            $this->player_name = $i_player_name;
            $this->hand = $i_hand;
            $this->attack_cards = $i_attack_cards;
            $this->attack_type = $i_attack_type;
            $this->captured_cards = $i_captured_cards;

        }

        function getName()
        {
            return $this->player_name;
        }
        function getHand()
        {
            return $this->hand;
        }
        function getAttackCards()
        {
            return $this->attack_cards;
        }
        function getAttackType()
        {
            return $this->attack_type;
        }
        function getCapturedCards()
        {
            return $this->captured_cards;
        }

    }
?>
