<?php

namespace Classes;

use PDO;

class User // extends TablesDb
{
    /**
     * @var \PDO $connect
     */
    private $connect;
    
    // private $name;
    // private $last_name;
    // private $login;
    // private $email;
    // private $password;
    
    /**
     * Users constructor.
     *
     * @param $connect
     */
    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    
    public function getAllAuthor()
    {
        if ($this->connect) {
            $sql = "SELECT *
                    FROM users
                    WHERE role != 'admin'
                    ";
            return $this->connect->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }
    
    /**
     * User
     * @param string
     */
    public function getAuthor($id)
    {
        if ($this->connect) {
            $sql = "SELECT name, last_name, login, email
                FROM users
                WHERE id='$id'
                ";
            
            return $this->connect->query($sql)->fetch(PDO::FETCH_OBJ);
        }
        
        return false;
    }
    
    /**
     *Вход в админку
     *вызов функции enter.php
     * @param array
     */
    public function Login($post)
    {
        if (!isset($post['login']) || empty($post['login'])) {
            $_SESSION['error_message'] = 'Поле *Login не может быть пустым';
            return;
        }
        if (!isset($post['password']) || empty($post['password'])) {
            $_SESSION['error_message'] = 'Поле *Password не может быть пустым';
            return;
        }
        
        $login    = htmlspecialchars($post['login']);
        $login    = trim($login);
        $password = htmlspecialchars($post['password']);
        $password = md5($password);
        
        $check = null;
        if ($this->connect) {
            $sql    = "SELECT id
                    FROM users
                    WHERE login='$login' and password='$password'";
            $rezult = $this->connect->query($sql)->fetch(PDO::FETCH_ASSOC);
            var_dump($rezult);
            if (!$rezult) {
                $check = false;
            } else {
                $check = true;
            }
        }
        if ($check) {
            $_SESSION['id']    = $rezult['id'];
            $_SESSION['login'] = $login;
            
            $_SESSION['access'] = true;
            header('Location: /admin/main.php');
            exit;
        } else {
            $_SESSION['access']        = false;
            $_SESSION['error_message'] = 'Ошибка! Повторите попытку!';
            header('Location: /enter.php');
            exit;
        }
    }
    
    /**
     *Регистрация нового пользователя
     *вызов функции registration.php
     * @param array
     */
    public function registerUser($userData)
    {
        if ($userData['password'] !== $userData['passconf']) {
            $_SESSION['error_message'] = 'Пароли не совпадают!';
            return;
        }
        if (!isset($userData['login']) || empty($userData['login'])) {
            $_SESSION['error_message'] = 'Введите логин!';
            return;
        }
        if (!isset($userData['email']) || empty($userData['email'])) {
            $_SESSION['error_message'] = 'Введите почту!';
            return;
        }
        if ($this->insertUser($userData)) {
            $_SESSION['error_message'] = false;
        } else {
            $_SESSION['error_message'] = 'Ошибка регистрации!';
        }
    }
    
    /**
     * PRIVATE METOD for registerUser().
     * @param array
     */
    private function insertUser($userData)
    {
        $userData['name']      = htmlspecialchars($userData['name']);
        $userData['name']      = trim($userData['name']);
        $userData['last_name'] = htmlspecialchars($userData['last_name']);
        $userData['last_name'] = trim($userData['last_name']);
        $userData['login']     = htmlspecialchars($userData['login']);
        $userData['login']     = trim($userData['login']);
        $userData['email']     = htmlspecialchars($userData['email']);
        $userData['email']     = trim($userData['email']);
        $userData['password']  = htmlspecialchars($userData['password']);
        $userData['password']  = trim($userData['password']);
        
        $password = md5($userData['password']);
        
        if ($this->connect) {
            $sql  = "INSERT INTO users(name, last_name, login, email, password)
                    VALUES ( :name,  :last_name,  :login,  :email,  :password)";
            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(':name', $userData['name'], PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $userData['last_name'], PDO::PARAM_STR);
            $stmt->bindParam(':login', $userData['login'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $userData['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            
            return $stmt->execute();
        }
    }
}