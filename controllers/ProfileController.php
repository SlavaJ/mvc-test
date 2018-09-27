<?php

class ProfileController
{

    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        $user = User::getUserById($userId);
                
        require_once(ROOT . '/views/profile/index.php');

        return true;
    }  
    
    public function actionEdit()
    {

        $userId = User::checkLogged();
        

        $user = User::getUserById($userId);
        
        $name = $user['name'];
        $email = $user['email'];
        $phone = $user['phone'];
                
        $result = false;     

        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $id = $_SESSION['user'];
            
            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            
            if (!User::checkEmail($email)) {
                $errors[] = 'Неверный email.';
            }

            if (User::checkEmailExists($email, $id)) {
                $errors[] = 'Такой email уже существует.';
            }

            if (!User::checkPhone($phone)) {
                $errors[] = 'Неверный номер телефона.';
            }

            if (User::checkPhoneExists($phone, $id)) {
                $errors[] = 'Такой телефон уже есть.';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $email, $phone);
                header('Location: /profile/');
            }

        }

        require_once(ROOT . '/views/profile/edit.php');

        return true;
    }

}