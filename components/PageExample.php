<?php

namespace main\components;

class PageExample{
    protected $header;
    protected $footer;
    protected $title = "СлонЫк - магазин детских товаров | Харьков Киев Ужгород Ивановка Житомир Польща";
    protected $description = "slonyk.ua - интернет магазин. Недостпуные цены при качественном подборе товаров.";
    protected $keyWords = "детские игрушки, детские товары, слонык для детей";

    public function __construct()
    {
        $this->header = VIEWS.'/header.php';
        $this->footer = VIEWS.'/footer.php';
    }

    public function getMeta(){

    }
}