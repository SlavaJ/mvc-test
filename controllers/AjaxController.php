<?php

namespace controllers;

use models\User;

class AjaxController
{

    public function actionLogin()
    {

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if (!is_integer($userId)) {
                $error = $userId;
                echo $error;
            } else {
                User::auth($userId);
                $error = 'no error';
                echo $error;
            }

        }

        return true;
    }

}