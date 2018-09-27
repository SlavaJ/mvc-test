<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактор</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/main.css" rel="stylesheet">
</head>

<body>
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form">
                        <h2>Редактирование данных</h2>
                        <form action="" method="post">
                            <p>Имя:</p>
                            <input type="text" name="name" minlength="2" placeholder="Имя" value="<?php echo $name; ?>"/>
                            <p>Email:</p>
                            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"/>
                            <br/>
                            <p>Телефон:</p>
                            <input type="text" maxlength="11" name="phone" placeholder="Телефон" value="<?php echo $phone; ?>"/>
                            <br/>
                            <input type="submit" name="submit" class="btn btn-default save" value="Сохранить" />
                            <a href="/profile"><input type="button"  class="btn btn-default cancel" value="Отменить" /></a>
                        </form>
                    </div>
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script src="/template/js/ajax.js"></script>

</body>
</html>