<?php
namespace main\components;

class Page{
    private $header;
    private $footer;

    public function __construct()
    {
        $this->header = VIEWS.'/header.php';
        $this->footer = VIEWS.'/footer.php';
    }

    public function MainPage($content_file, $products, $paths){
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Subcategories($content_file, $category, $subcategories, $data = [])
    {
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Products($content_file, $category, $subcategories, $products, $data = [])
    {
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Product($content_file, $product = null, $data = []){
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Registration($content_file, $result){
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Cabinet($content_file, $user_data){
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function User_Exit($content_file, $result){
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function User_Settings($content_file, $user, $countries){
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

}
?>