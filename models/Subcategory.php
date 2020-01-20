<?php
namespace main\models;

use main\components\Storage;

class Subcategory{
    private $id;
    private $title;
    private $category_id;
    private $url;
    private $storage;

    public function __construct()
    {
        $this->storage = new \main\components\Storage();
    }

    public function map($data)
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->category_id = $data['category_id'];
        $this->url = $data['url'];
    }


    public function getSubcategory($category)
    {
        $this->storage;
    }

    public function getAllSubcategories($category)
    {
        $query = "select sc.id, sc.title, sc.category_id, sc.url from subcategories sc, categories c where sc.category_id = c.id and c.url = '$category'";
        $this->storage->connectDB();
        $subcategories_query = $this->storage->query($query);
        $subcategories = [];
        for($i = 0; $i < count($subcategories_query); $i++){
            $sub = new \main\models\Subcategory();
            $sub->map($subcategories_query[$i]);
            $subcategories[] = $sub;
        }
        return $subcategories;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function getUrl()
    {
        return $this->url;
    }


}