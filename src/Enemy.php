<?php

    class Enemy {

        private $name;
        private $value;
        private $strike_req;
        private $stomp_req;
        private $shout_req;


        function __construct($i_name, $i_value, $i_strike_req, $i_stomp_req, $i_shout_req) {
            $this->name = $i_name;
            $this->value = $i_value;
            $this->strike_req = $i_strike_req;
            $this->stomp_req = $i_stomp_req;
            $this->shout_req = $i_shout_req;
        }

        function getName()
        {
            return $this->name;
        }
        function getValue()
        {
            return $this->value;
        }
        function getStrikeReq()
        {
            return $this->strike_req;
        }
        function getStompReq()
        {
            return $this->stomp_req;
        }
        function getShoutReq()
        {
            return $this->shout_req;
        }


    }

?>
