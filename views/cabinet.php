<section id="main_content">
    <div class="container">
        <div class="crumbs">
            <p><a href="/children_toys/main">Главная страница</a> / Личный кабинет
        </div>
        <h3>Кабинет пользователя</h3>
        <h4>Привет, <?=$user_data['login']?></h4>
        <div class="user_data">
            <div>
                <?if($user_data['role'] == "Администратор") echo "<i class=\"fas fa-crown crown\"></i>"?>
                <i class="fas fa-user-circle"></i>
                <span><?=$user_data['role']?> на сайте</span>
                <a href="#">Обратиться в службу поддержки</a>
                <a href="/children_toys/user/settings/">Редактировать профиль</a>
                <a href="#">Просмотреть собственные заказы</a>
                <a href="/children_toys/user/exit/">Выход</a>
            </div>
            <table>
            <tr>
                <td>Логин:</td>
                <td><?=$user_data['login']?></td>
            </tr>
            <tr>
                <td>Имя:</td>
                <td><?=$user_data['first_name']?></td>
            </tr>
            <tr>
                <td>Фамилия:</td>
                <td><?=$user_data['last_name']?></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><?=$user_data['email']?></td>
            </tr>
            <tr>
                <td>Телефон:</td>
                <td><?=$user_data['telephone']?></td>
            </tr>
            <tr>
                <td>Дата рождения:</td>
                <td><?=$user_data['date_of_birth']?></td>
            </tr>
            <tr>
                <td>Страна:</td>
                <td><?=$user_data['country']?></td>
            </tr>
            <tr>
                <td>Должность:</td>
                <td><?=$user_data['role']?></td>
            </tr>
        </table>
        </div>
    </div>
    <div class="background_dark">

    </div>
</section>