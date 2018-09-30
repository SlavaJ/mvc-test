<?php

use models\User;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/main.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <div>
        <?php if (User::isGuest()): header('Location: /') ?>
        <?php else: ?>
            <a href="/user/logout/"> Выход</a>
        <?php endif; ?>
    </div>
    <div class="inform">
        <h1>Информация о пользователе.</h1>
        <table border="1" width="100%" cellpadding="5">
            <tr>
                <td>Имя</td>
                <td>Email</td>
                <td>Телефон</td>
            </tr>
            <tr>
                <td><?=$user['name']?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['phone']?></td>
            </tr>
        </table>
        <a href="/profile/edit">Редактировать данные</a>
    </div>
</div>

</body>
</html>