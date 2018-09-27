<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>

<body>
<?php
if (User::isGuest()){
    header('Location: /user/login/');
} else {
    header('Location: /profile/');
}
?>
</body>
</html>