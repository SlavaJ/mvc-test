<?php

namespace controllers;

use models\User;

class UserController
{
    public function actionIndex()
    {
        echo 'work';
    }

    public function actionRegistration()
    {
        $name = '';
        $login = '';
        $email = '';
        $phone = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $login = $_POST['login'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if (!User::checkPhone($phone)) {
                $errors[] = 'Неверный номер телефона.';
            }

            if (User::checkPhoneExists($phone)) {
                $errors[] = 'Такой телефон уже есть.';
            }

            if ($errors == false) {
                $result = User::register($name, $login, $email, $phone, $password);
            }

        }

        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        require_once(ROOT . '/views/user/login.php');

        $email = '';
        $password = '';

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!User::checkEmail($email)) {
                $errors['email'] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors['pass'] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors['data'] = 'Неправильные данные для входа на сайт';
                echo json_encode($errors);
            } else {
                User::auth($userId);
                $noerr = ['err', 'noerr'];
                echo json_encode($noerr);
            }

        }

        return true;
    }

    public function actionLogout()
    {

        unset($_SESSION["user"]);
        header("Location: /");
    }

}
