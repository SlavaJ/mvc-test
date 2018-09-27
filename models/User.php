<?php
class User
{

    public static function register(string $name, string $login, string $email, string $phone, string $password)
    {

        $pass = password_hash($password, PASSWORD_DEFAULT);
        $db = Db::getConnection();

        $sql = 'INSERT INTO users (name, login, email, phone, password) '
            . 'VALUES (:name, :login, :email, :phone, :password)';


        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':password', $pass, PDO::PARAM_STR);

        return $result->execute();
    }


    public static function checkPhone(string $phone)
    {

        if(!preg_match("/^[0-9]{10,11}+$/", $phone)) {
            return false;
        }

        return true;
    }

    public static function checkName(string $name)
    {
        $normalName = trim(strip_tags($name));
        if (strlen($normalName) >= 2) {
            return true;
        }

        return false;
    }


    public static function checkPassword(string $password)
    {
        $normalPass = trim(strip_tags($password));
        if (strlen($normalPass) >= 6) {
            return true;
        }

        return false;
    }


    public static function checkEmail(string $email)
    {
        $normalMail = trim(strip_tags($email));
        if (filter_var($normalMail, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    public static function checkLoginExists(string $login)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE login = :login';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }

        return false;
    }

    public static function checkEmailExists(string $email, int $id = 0)
    {

        $db = Db::getConnection();

        if ($id > 0) {
            $sql = 'SELECT COUNT(*) FROM users WHERE email = :email AND id <> :id';
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
        }

        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }

        return false;
    }

    public static function checkPhoneExists(string $phone, int $id = 0)
    {

        $db = Db::getConnection();

        if ($id > 0) {
            $sql = 'SELECT COUNT(*) FROM users WHERE phone = :phone AND id <> :id';
            $result = $db->prepare($sql);
            $result->bindParam(':phone', $phone, PDO::PARAM_STR);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $sql = 'SELECT COUNT(*) FROM users WHERE phone = :phone';
            $result = $db->prepare($sql);
            $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        }

        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }

        return false;
    }

    public static function getUserById(int $id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function getUserByEmail(string $email)
    {
        if ($email) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE email = :email';

            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function edit(int $id, string $name, string $email, string $phone)
    {
        $db = Db::getConnection();

        $sql = "UPDATE users
            SET name = :name, email = :email, phone = :phone
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);

        return $result->execute();
    }


    public static function checkUserData(string $email, string $password)
    {
        $error = '';

        if ($user = static::getUserByEmail($email)) {

        if (password_verify($password, $user['password'])) {
            $db = Db::getConnection();

            $sql = 'SELECT * FROM users WHERE email = :email';

            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->execute();

            $user = $result->fetch();

            if ($user) {
                return (int)$user['id'];
            }
        } else {
            return $error = 'Неверный пароль.';
        }

        } else {
            return $error = 'Неверный email.';
        }

        return false;
    }

    public static function auth(int $userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {

        if (isset($_SESSION['user'])) {
            return false;
        }

        return true;
    }

}