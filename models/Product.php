<?php
namespace main\models;

use \main\components\Model;

class Product extends Model
{
    public $id;
    public $subcategory_id;
    public $title;
    public $description;
    public $price;
    public $price_markup;
    public $vendor_code;
    public $dicsount;
    public $images;
    public $brand_id;
    public $rating;

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

    public function getProductsInOrder($orders){
        $products = [];
        for($i = 0, $k = 0; $i < count($orders); $i++){
            for($j = 0; $j < count($orders[$i]->products['product_id']); $j++, $k++){
                $products[] = $orders[$i]->products['product_id'][$k];
            }
        }
        $products = array_unique($products);
        $query = "select p.* from products p where id in (";
        for($i = 0; $i < count($products); $i++){
            if($i == count($products)-1) $query .= $products[$i].')';
            else $query .= $products[$i].', ';
        }
        $products_in_order = \main\components\Singletone::query($query);
        $products_objects = [];
        for($i = 0; $i < count($products_in_order); $i++){
            $product = new \main\models\Product();
            $product->map($products_in_order[$i]);
            $products_objects[] = $product;
        }
        return $products_objects;
    }


    public function getProductById($product_id){
        $query = "select * from products p where p.id = $product_id";
        //$this->storage->connectDB();
        $get_product = $this->storage->query($query);
        $product = new \main\models\Product();
        $product->map($get_product[0]);
        return $product;
    }


    public function getAllProducts($subcategory = null){
        $query = "";
        if($subcategory)$query =  "select p.id, p.subcategory_id, p.title, p.description, p.price, p.price_markup, p.vendor_code, p.discount, p.images, p.brand_id, p.rating from products p, subcategories sc where p.subcategory_id = sc.id and sc.url = '$subcategory'";
        else $query = "select p.id, p.subcategory_id, p.title, p.description, p.price, p.price_markup, p.vendor_code, p.discount, p.images, p.brand_id, p.rating from products p";
        $this->storage->connectDB();
        $products_query = $this->storage->query($query);
        $products = [];
        for($i = 0; $i < count($products_query); $i++){
            $product = new \main\models\Product();
            $product->map($products_query[$i]);
            $products[] = $product;
        }
        return $products;
    }

    public function getPath($subcategory){
        $path = $this->storage->query("select sc.title subcategory, sc.url subcategory_url, c.title category, c.url category_url from subcategories sc, categories c where sc.category_id = c.id and sc.url = '$subcategory'");
        return $path[0];
    }

    /**
     *
     */
    public function getAdditionalData($product_id){
        $data = [];
        if(is_numeric($product_id)){
            $data = $this->storage->query("select p.title as product, c.title as category, sc.title as subcategory, co.title as country, b.title as brand, c.url as category_url, sc.url as subcategory_url 
            from products p, categories c, subcategories sc, countries co, brands b 
            where p.subcategory_id = sc.id and sc.category_id = c.id and p.brand_id = b.id and b.country = co.id and p.id = $product_id");
        }
        else if(is_array($product_id)){
            $products_id = [];
            for($i = 0; $i < count($product_id); $i++){
                $products_id[] = $product_id[$i]->getId();
            }
            $query = "select sc.url as subcategory_url, c.url as category_url from products p, subcategories sc, categories c where p.subcategory_id = sc.id and sc.category_id = c.id and p.id in (";
            for($i = 0; $i < count($products_id); $i++){
                if($i == count($products_id)-1) $query .= $products_id[$i].")";
                else $query .= $products_id[$i].", ";
            }
            $data = $this->storage->query($query);
        }
        return $data;
    }

    public function searchProducts($search_query){
        $query = "select distinct p.* from products p, brands b where p.title like '%$search_query%' or description like '%$search_query%' or vendor_code like '%$search_query%' or vendor_code = '$search_query' or b.title like '%$search_query%' or b.title = '$search_query'";
        $this->storage->connectDB();
        $search_products = $this->storage->query($query);
        $products = [];
        for($i = 0; $i < count($search_products); $i++){
            $product = new \main\models\Product();
            $product->map($search_products[$i]);
            $products[] = $product;
        }
        return $products;
    }

    public function filterProducts($filters){
        $query = "select p.* from products p, subcategories s where price_markup > ".($filters['price_min_filter']-1)." and price_markup < ".($filters['price_max_filter']+1)." and p.subcategory_id = s.id and s.category_id = ".$filters['categories_filter'];
        $filters_products = $this->storage->query($query);
        $products = [];
        for($i = 0; $i < count($filters_products); $i++){
            $product = new \main\models\Product();
            $product->map($filters_products[$i]);
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
