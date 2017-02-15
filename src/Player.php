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
        function addToHand($new_card)
        {
            array_push($this->hand, $new_card);
        }
        function removeFromHand($new_card)
        {
            $card_position = array_search ( $new_card , $this->hand );
            array_splice ( $this->hand , $card_position, 1 );
        }
        function addAttackCards($new_card)
        {
            array_push($this->attack_cards, $new_card);
        }
        function removeSingleAttackCard($new_card)
        {
            $card_position = array_search ( $new_card , $this->attack_cards );
            array_splice ( $this->attack_cards , $card_position, 1 );
        }
        function removeAttackCards()
        {
            foreach ( $this->attack_cards as $card ) {
                $this->removeFromHand($card);
            }
        }
        function clearAttackCards()
        {
            $this->attack_cards = array();
        }
        function setAttackType()
        {

        }

        // Getters
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
