<?php
    namespace main\components;

    class Storage{
        private $data_base;
        private $settings = [];

        public function __construct()
        {
            $this->settings = include_once ROOT.'/config/db_settings.php';
            //$this->data_base = new \main\components\DataBase($this->settings);
        }

        public function connectDB()
        {
            $this->data_base = new \main\components\DataBase($this->settings);
        }

        public function query($query)
        {
            return $this->data_base->query($query);
        }
    }