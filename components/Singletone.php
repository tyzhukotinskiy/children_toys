<?php

namespace main\components;

class Singletone
{
    public static $instance;
    public static $settings =[];

    public static function instance()
    {
        self::$settings = include_once ROOT.'/config/db_settings.php';
        if (self::$instance === null) {
            self::$instance = new \main\components\DataBase(self::$settings);
        }
        return self::$instance;
    }

    public static function query($query){
        $db = self::instance();
        return $db->query($query);
    }

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
}
/*class Storage{
    private $data_base = null;
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
        if($this->data_base == null)$this->connectDB();
        return $this->data_base->query($query);
    }

    public function close(){
        $this->data_base->closeConnection();
    }
}*/