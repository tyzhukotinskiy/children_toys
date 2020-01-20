<?php
namespace main\components;

class Product
{
    private $id;
    private $subcategory_id;
    private $title;
    private $description;
    private $price;
    private $price_markup;
    private $vendor_code;
    private $dicsount;
    private $images;
    private $brand_id;
    private $rating;
    private $storage;

    public function __construct()
    {
        $this->storage = new \main\components\Storage();
    }

    public function map($data){
        $this->id = $data['id'];
        $this->subcategory_id = $data['subcategory_id'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->price_markup = $data['price_markup'];
        $this->vendor_code = $data['vendor_code'];
        $this->dicsount = $data['discount'];
        $this->images = $data['images'];
        $this->brand_id = $data['brand_id'];
        $this->rating = $data['rating'];
    }


    public function getAllProducts($subcategory = null){
        $query = "";
        if($subcategory)$query =  "select p.id, p.subcategory_id, p.title, p.description, p.price, p.price_markup, p.vendor_code, p.discount, p.images, p.brand_id, p.rating from products p, subcategories sc where p.subcategory_id = sc.id and sc.url = '$subcategory'";
        else $query = "select p.id, p.subcategory_id, p.title, p.description, p.price, p.price_markup, p.vendor_code, p.discount, p.images, p.brand_id, p.rating from products p";
        $this->storage->connectDB();
        $products_query = $this->storage->query($query);
        $products = [];
        for($i = 0; $i < count($products_query); $i++){
            $product = new \main\components\Product();
            $product->map($products_query[$i]);
            $products[] = $product;
        }
        return $products;
    }

    public function getId(){
        return $this->id;
    }

    public function getSubcategory_id(){
        return $this->subcategory_id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getPrice_markup(){
        return $this->price_markup;
    }

    public function getVendor_code(){
        return $this->vendor_code;
    }

    public function getDicsount(){
        return $this->dicsount;
    }

    public function getImages(){
        return $this->images;
    }

    public function getBrand_id(){
        return $this->brand_id;
    }

    public function getRating(){
        return $this->rating;
    }
}
