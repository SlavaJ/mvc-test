<?php
use models\User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Войти</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/main.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="shop-menu pull-right">
                <?php if (User::isGuest()): ?>
                    <a href="/user/registration/"><i class="fa fa-lock"></i> Регистрация</a>
                <?php else: header('Location: /profile/') ?>
                <?php endif; ?>
            </div>
            <div class="signup-form">
                <h2>Вход на сайт</h2>
                <form action="" method="post" id="login">
                    <input type="email" maxlength="50" minlength="2" name="email" placeholder="E-mail" value=""/>
                    <input type="password" minlength="6" name="password" placeholder="Пароль" value=""/>
                    <input type="button" id="btn" name="submit" class="btn btn-default enter" value="Вход" />
                </form>
            </div>
            <div id="result_form"><div>
                <br/>
                <br/>
            </div>
        </div>
    </div>

<script
    src="/template/js/jquery.js"
>
</script>
<script src="/template/js/ajax.js"></script>

</body>
</html>