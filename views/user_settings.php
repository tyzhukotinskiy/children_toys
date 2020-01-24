<section id="main_content">
    <div class="container">
        <div class="crumbs">
            <p><a href="/children_toys/main">Главная страница</a> / <a href="/children_toys/user/cabinet/">Личный кабинет</a> / Редактирование профиля
        </div>
        <h3>Редактирование профиля</h3>
        <h4><?=$user->login?>, тут ты можешь отредактировать профиль</h4>
        <div class="message message_user_save_changes">Kflfkfl</div>
        <table class="user_settings">
                <tr>
                    <td>Логин:</td>
                    <td><input type="text" id="user_login" value="<?=$user->login?>"></td>
                </tr>
                <tr>
                    <td>Имя:</td>
                    <td><input type="text" id="user_first_name" value="<?=$user->first_name?>"></td>
                </tr>
                <tr>
                    <td>Фамилия:</td>
                    <td><input type="text" id="user_last_name" value="<?=$user->last_name?>"></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input type="text" id="user_email" value="<?=$user->email?>"></td>
                </tr>
                <tr>
                    <td>Телефон:</td>
                    <td><input type="text" id="user_telephone" value="<?=$user->telephone?>"></td>
                </tr>
                <tr>
                    <td>Дата рождения:</td>
                    <td><input type="date" id="user_date_of_birth" value="<?=$user->date_of_birth?>" min="1900-01-01" max="2010-01-01"></td>
                </tr>
                <tr>
                    <td>Страна:</td>
                    <td>
                        <select name="country" id="user_country">
                            <? for($i = 0; $i < count($countries); $i++){?>
                                <option value="<?=$countries[$i]['id']?>"><?=$countries[$i]['title']?></option>
                            <?}?>
                        </select>
                    </td>
                </tr>
            </table>
        <button onclick="UserSaveChanges()">
            Сохранить изменения
        </button>
        </div>
    </div>
    <div class="background_dark">

    </div>
</section>