<?php

use models\User;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/main.css" rel="stylesheet">
</head>

<body>
<div class="col-sm-4 col-sm-offset-4 padding-right">
    <?php if ($result): header('Location: login/')?>
    <?php else: ?>
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="signup-form">
        <a href="/user/login">Войти</a>
        <h2>Регистрация на сайте</h2>
        <form id="register" action="/user/registration" method="post">
            <input type="text" maxlength="40" minlength="2" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
            <input type="text" maxlength="40" minlength="5" name="login" placeholder="Логин" value="<?php echo $name; ?>"/>
            <input type="email" maxlength="50" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
            <input type="text" maxlength="11" name="phone" placeholder="Номер телефона" value="<?php echo $email; ?>"/>
            <input type="password" minlength="6" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
            <input type="submit" name="submit" class="btn btn-default reg" value="Регистрация" />
        </form>
    </div>
    <div id="result_form">
            <?php endif; ?>
        </div>

<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>

</body>
</html>