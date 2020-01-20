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

}
?>