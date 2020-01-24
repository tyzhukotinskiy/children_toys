<footer id="footer">
    <div class="container">
        <p>&copy; 2020. Все права защищены. Магазин СЛонЫк</p>
    </div>
</footer>

<div class="modal_login">
    <div class="modal_main_form">
        <h2>Авторизация в системе:</h2>
        <div>
            <form action="/children_toys/user/auth/" method="post">
                <h3>Войти в учетную запись:</h3>
                <input id="auth_login" type="text" name="login" placeholder="Ваш логин:">
                <input id="auth_password" type="password" name="password" placeholder="Ваш пароль:">
                <input type="button" value="Авторизоваться" name="auth" onclick="authUser()">
            </form>
            <form action="/children_toys/user/registration/" method="post">
                <h3>Создать новую учетную запись:</h3>
                <input type="text" name="login" placeholder="Придумайте логин">
                <input type="email" name="email" placeholder="Введите свой e-mail адрес">
                <input type="password" name="password" placeholder="Придумайте пароль">
                <input type="submit" name="registration" value="Зарегистрироваться">
            </form>
        </div>
        <div class="auth_message message">
            <p>АЛАЛДЛДАЛЫДВЛ</p>
        </div>
        <p onclick="ModalLogin()">Отмена</p>
    </div>
</div>

<div class="modal_basket">
    <div class="modal_cart">
        <h2>Корзина</h2>
        <div id="cart_body">
            <h4>Перечень выбранных товаров:</h4>
            <p>Пользуйтесь пожалуйста переключателями "+" "-"</p>
            <p onclick="ModalBasket()">Закрыть корзину</p>

        </div>
    </div>
</div>
<script src="/children_toys/js/jquery-3-4-1.min.js"></script>
<script src="/children_toys/js/main.js"></script>
</body>
</html>