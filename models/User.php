<?php
namespace main\models;

use \main\components\Model;

class User extends Model{
    public $id;
    public $login;
    public $email;
    public $password;
    public $date_of_birth;
    public $country;
    public $first_name;
    public $last_name;
    public $telephone;
    public $role;

    public function map($user_data){
        $this->id = $user_data['id'];
        $this->login = $user_data['login'];
        $this->email = $user_data['email'];
        $this->password = $user_data['password'];
        $this->date_of_birth = $user_data['date_of_birth'];
        $this->country = $user_data['country'];
        $this->first_name = $user_data['first_name'];
        $this->last_name = $user_data['last_name'];
        $this->telephone = $user_data['telephone'];
        $this->role = $user_data['role'];
    }

    public function getUserById($user_id){
        $query = "select * from users u where u.id = ".$user_id;
        $this->storage->connectDB();
        $user_query = $this->storage->query($query);
        if($user_query[0]['country'] !== null) {
            $query = "select * from countries where id = ".$user_query[0]['country'];
            $user_query[0]['country'] = $this->storage->query($query)[0]['title'];
        }
        $user = new \main\models\User();
        $user->map($user_query[0]);
        return $user;
    }

    public function getCountries(){
        $query = "select * from countries order by title";
        $this->storage->connectDB();
        $countries = $this->storage->query($query);
        return $countries;
    }

    public function registration($user_data){
        if(isset($user_data['registration']) && ($user_data['login'] != '' && $user_data['email'] != '' && $user_data['password'] != '')){
            $this->storage->connectDB();
            $login = $this->storage->query("select login from users where users.login = '".$user_data['login']."'");
            $email = $this->storage->query("select email from users where users.email = '".$user_data['email']."'");
            if(count($login)!=0) return "Данное имя уже используется другим пользователем, подберите другой логин!";
            if(count($email)!=0) return "Данный email уже используется другим пользователем, возможно у вас есть учетная запись на сайте, хотите возобновить доступ?";

            $login = $user_data['login'];
            $email = $user_data['email'];
            if(strlen($user_data['login']) > 45 or strlen($user_data['login']) < 4) return "Логин может содержать от 4 до 45 символов";
            if(strlen($user_data['login']) > 120) return "Email не должен превышать 120 символов!";

            $query = "insert into users (login, email, password) values ('".$user_data['login']."', '".$user_data['email']."', '".md5($user_data['password'])."');";
            $add_user = $this->storage->query($query);
            return "Регистрация прошла успешно, можете авторизоваться!";
        }
        else return "Нет информации для регистрации";
    }

    public function auth($user_data){
        if(isset($user_data['auth']) && ($user_data['login'] != '' && $user_data['password'] != '')){
            $query = "select id, login from users u where u.login = '".$user_data['login']."' and u.password = '".md5($user_data['password'])."'";
            $this->storage->connectDB();
            $check = $this->storage->query($query);
            return $check;
        }
        else return "Не все поля заполнены при отправке формы!";
    }

    public function saveUser($user_data, $user_id){
        $query = "Update users SET ";
        foreach($user_data as $user_property => $user_value){
            if($user_value === '') $query .= "$user_property = null, ";
            else $query .= "$user_property = '$user_value', ";
        }
        $query = substr($query, 0, -2);
        $query .= 'where id = '.$user_id;
        $this->storage->connectDB();
        $user_query = $this->storage->query($query);
        if($user_query == 1) echo "Изменения успешно сохранены!";
        else echo "не произошло никаких изменений!";
    }


}