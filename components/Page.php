<?php
namespace main\components;

use \main\components\PageExample;

class Page extends PageExample{

    public function MainPage($content_file, $products, $paths){
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Subcategories($content_file, $category, $subcategories, $category_title)
    {
        $this->title = $category_title.' товары. '.$this->title;
        $this->description = $category_title.' товары в '.$this->description;
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Products($content_file, $category, $subcategories, $products, $data = [])
    {
        $this->title = $data[0]['subcategory'].' товары. '.$this->title;
        $this->description = $data[0]['subcategory'].' товары в '.$this->description;
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Product($content_file, $product = null, $data = []){
        $this->title = $product->title.'. '.$this->title;
        $this->description = $product->title.' покупайте в '.$this->description;
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Registration($content_file, $result){
        $this->title = 'Регистрация пользователя';
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function Cabinet($content_file, $user_data){
        $this->title = 'Кабинет пользователя';
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function User_Exit($content_file, $result){
        $this->title = 'Выход';
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function User_Settings($content_file, $user, $countries){
        $this->title = 'Пользовательские настройки';
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function User_Orders($content_file, $orders, $products){
        $this->title = 'Заказы пользователя';
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function SearchProducts($content_file, $products, $paths){
        $this->title = 'Поиск товаров';
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

    public function FilterProducts($content_file, $products, $paths){
        $this->title = 'Поиск товаров';
        include_once $this->header;
        include_once($content_file);
        include_once $this->footer;
    }

}
?>