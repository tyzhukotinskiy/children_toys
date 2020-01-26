<?php
    namespace main\components;

    class Model{
        public $storage;

        public function __construct()
        {
            $this->storage = new \main\components\Storage();
        }
    }