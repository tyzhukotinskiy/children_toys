<?php

namespace main\models;

use \main\components\Model;

class Order extends Model{
    public $id;
    public $user_id;
    public $date;
    public $paid;
    public $price;
    public $products = [];
    public $single;

    public function __construct()
    {

    }

    public function map($order, $products_in_orders){
        $this->id = $order['id'];
        $this->user_id = $order['user_id'];
        $this->date = $order['date'];
        $this->paid = $order['paid'];
        $this->price = $order['price'];
        for($i = 0; $i < count($products_in_orders); $i++){
            if($products_in_orders[$i]['order_id'] == $this->id){
                $this->products['product_id'][$i] = $products_in_orders[$i]['product_id'];
                $this->products['quantity'][$i] = $products_in_orders[$i]['quantity'];
            }
        }
    }


    public function addOrder($order, $user_id){
        $result = true;
        $price = array_pop($order);
        $query = "insert into orders (user_id, date, price) values ($user_id, current_date, $price)";
        \main\components\Singletone::query($query);
        $order_id = \main\components\Singletone::query("select id from orders order by id desc limit 1")[0]["id"];
        for($i = 0; $i < count($order); $i++){
            $query = "insert into products_in_order (product_id, order_id, quantity) values (".$order[$i]['product_id'].", $order_id, ".$order[$i]['quantity'].")";
            $a = \main\components\Singletone::query($query);
            if($a != 1){$result = false;}
        }
        return $result;
    }

    public function paidOrder($order_id){
        $query = "update orders set paid = 1 where orders.id = $order_id";
        $a = \main\components\Singletone::query($query);
        if($a != 1){return false;}
        return true;
    }

    public function getUserOrders($user_id){
        $query = "select * from orders o where o.user_id = $user_id";
        $order_query = \main\components\Singletone::query($query);
        $products_in_orders = \main\components\Singletone::query("select pio.product_id as product_id, o.id as order_id, pio.quantity from users u, products_in_order pio, orders o where pio.order_id = o.id and u.id = o.user_id  and u.id = $user_id order by o.id");
        $orders = [];
        for($i = 0; $i < count($order_query); $i++){
            $orders[] = new \main\models\Order();
            $orders[$i]->map($order_query[$i], $products_in_orders);
        }
        return $orders;
    }
}