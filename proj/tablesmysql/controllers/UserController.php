<?php

/**
 * Контроллер UserController
 */
class UserController extends DbController
{
    /**
     * Action для страницы "Регистрация"
     */
    public function registerAction($database)
    {
        // Переменные для формы
        $gender = false;
        $surname = false;
        $name = false;
        $email = false;
        $login = false;
        $password = false;
        $result = false;
//var_dump($_POST);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email, $database)) {
                $errors[] = 'Такой email уже используется';
            }
           // var_dump($errors);
            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = User::register($name, $email, $password, $database);
                return new self ('login.html',['result' => $result, 'email' => $email]);
            }
        }

        // Подключаем вид
        return  new self('register.html',['errors' => $errors, 'email' => $email, 'name' => $name]);
    }
    
    /**
     * Action для страницы "Вход на сайт"
     */
    public function loginAction($database)
    {
        // Переменные для формы
        $email = false;
        $password = false;
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password, $database);
            if ($userId['id'] == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId['id']);
                // Перенаправляем пользователя в закрытую часть - кабинет 
                //header("Location: /index.php");
            }
        }

        // Подключаем вид
       //require_once(ROOT . '/templates/register.html');
       return  new self('login.html',[
           'username' => $userId['name'],'errors' => $errors, 'email' => $email,]);
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        // Стартуем сессию
        session_start();
        
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }

}
