<?php
        if ($user) {
            $login_msg = $user->getFirstName() . ", вы авторизованы!";
        } else {
            $login_msg = "Вы не авторизованы! Введите логин и пароль";
        }
?>
<h3><?=$auth->message?></h3>
<form action="" enctype="multipart/form-data" method = "get">
  Логин: <input name="login" type="text"/><br>
  Пароль: <input name="pass" type="password"/><br>
  <input value="Войти" type="submit"/><br>
  <input name="c" value="auth" type="hidden"/>
  <input name="a" value="login" type="hidden"/>
  <a href="/auth/logout">
        <button class="btn-cart_invert" type="button">logout</button>
    </a>
</form>
