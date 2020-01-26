<?php

namespace main\controllers;

use \main\components\Controller;

class UserController extends Controller{
    public function actionRegistration(){
        $registration = new \main\models\User();
        $result_reg = $registration->registration($_REQUEST);
        $content_file = VIEWS.'/registration.php';
        $page  = new \main\components\Page();
        $page->Registration($content_file, $result_reg);
    }

    public function actionAuth(){
        $registration = new \main\models\User();
        $result_reg = $registration->auth($_REQUEST);
        if(is_array($result_reg)){
            if(isset($result_reg[0]['id'], $result_reg[0]['login'])){
                echo "Авторизация пользователя прошла успешно!";
                $this->session->set("user_id", $result_reg[0]['id']);
                $this->session->set("user_login", $result_reg[0]['login']);
            }
            else echo "Неправильный логин или пароль пользователя";
        }
        else echo $result_reg;
    }

    public function actionCabinet(){
        if($this->session->contains('user_id')) {
            $user_model = new \main\models\User();
            $user = $user_model->getUserById($this->session->get('user_id'));
            $user_data = [];
            foreach ($user as $user_property => $user_value) {
                $user_data[$user_property] = ($user_value === null) ? "Не указано" : $user_value;
                if ($user_property == 'role') {
                    switch ($user_value) {
                        case 0:
                            $user_data[$user_property] = "Пользователь";
                            break;
                        case 1:
                            $user_data[$user_property] = "Модератор";
                            break;
                        case 2:
                            $user_data[$user_property] = "Редактор";
                            break;
                        case 3:
                            $user_data[$user_property] = "Администратор";
                            break;
                    }
                }
            }
            $content_file = VIEWS . '/cabinet.php';
            $page = new \main\components\Page();
            $page->Cabinet($content_file, $user_data);
        }
        else{echo "ПОПЫТКА ПОЛУЧЕНИЯ НЕСАНКЦИОНИРОВАННОГО ДОСТУПА!!!!!!!! ХАКЕРСКАЯ АТАКА, ВАШ IP ЗАРЕГИСТРИРОВАН!!!!!";}
    }

    public function actionSettings(){
        $user_model = new \main\models\User();
        $user = $user_model->getUserById($this->session->get('user_id'));
        $countries = $user_model->getCountries();
        $content_file = VIEWS . '/user_settings.php';
        $page = new \main\components\Page();
        $page->User_Settings($content_file, $user, $countries);
    }

    public function actionAddorder(){
        $order_model = new \main\models\Order();
        if($this->session->contains('user_id')) {
            $add_order = $order_model->addOrder($_REQUEST, $this->session->get('user_id'));
            if($add_order) echo "Заказ успешно оформлен!";
            else echo "Проблемы с заказом";
        }
        else echo "Для начала авторизуйтесь в системе!";
    }

    public function actionPaidorder(){
        $order = new \main\models\Order();
        $check = $order->paidOrder($_REQUEST['order_id']);
        if($check) echo "Оплата произошла успешно! Ждите подтверждения админа!";
        else echo "Что то вы обманываете, как Бендер будку самоубийств!";
    }

    public function actionMyorders(){
        $order_model = new \main\models\Order();
        $orders = $order_model->getUserOrders($this->session->get('user_id'));
        $product_model = new \main\models\Product();
        $products = $product_model->getProductsInOrder($orders);
        $content_file = VIEWS . '/orders.php';
        $page = new \main\components\Page();
        $page->User_Orders($content_file, $orders, $products);
    }

    public function actionSettingssave(){
        $user_model = new \main\models\User();
        $user_model->saveUser($_REQUEST, $this->session->get('user_id'));
    }

    public function actionExit(){
        $exit = $this->session->destroy('user_id');
        $result = ($exit === true) ? "Вы успешно вышли из учетной записи! Обязательно возвращайтесь обратно!" : "Несанкционированный доступ к странице";
        $content_file = VIEWS.'/exit.php';
        $page  = new \main\components\Page();
        $page->User_Exit($content_file, $result);
    }
}