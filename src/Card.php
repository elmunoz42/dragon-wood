<?php

    class Card {

        private $number;
        private $color;

        function __construct($input_number, $input_color) {
            $this->number = $input_number;
            $this->color = $input_color;
        }

        function getNumber()
        {
            return $this->number;
        }
        function getColor()
        {
            return $this->color;
        }

    }
    
?>
