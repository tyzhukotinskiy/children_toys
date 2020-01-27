<?php

namespace main\components;

class Controller{
    protected $session;

    public function __construct()
    {
        $this->session = new \main\components\Session();
        $this->session->start();
    }
}