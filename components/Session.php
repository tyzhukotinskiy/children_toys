<?php
    namespace main\components;

    class Session{
        private $name;
        private $savePath;

        public function sessionExists()
        {
            if (session_status() == PHP_SESSION_NONE) {
                return false;
            } elseif (session_status() == PHP_SESSION_ACTIVE) {
                return true;
            }
        }

        public function start(){
            if(!$this->sessionExists()){
                session_start();
                return true;
            }
        }

        public function setName($name){
            if(!$this->sessionExists()){
                $this->name = $name;
                session_name($this->name);
            }
        }

        public function getName(){
            return $this->name;
        }

        public function get($key){
            if($this->sessionExists()){
                return $_SESSION[$key];
            }
        }

        public function set($key, $value){
            if($this->sessionExists()){
                $_SESSION[$key] = $value;
            }
        }

        public function delete($key){
            if($this->sessionExists()){

            }
        }

        public function contains($key)
        {
            if ($this->sessionExists()) {
                if (array_key_exists($key, $_SESSION)) {
                    return true;
                }
                return false;
            }
            //исключение
        }

        public function destroy($key){
            if($this->contains($key)) {
                session_destroy();
                return true;
            }
            else return false;
        }

    }