<?php

    class Config
    {
        private static $_instance;
        
        public $clientId = "";
        public $clientSecret = "";
        public $organismUrl = "";

        private function __construct()
        { }

        public static function getInstance()
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new Config();
            }

            return self::$_instance;
        }
    }

?>