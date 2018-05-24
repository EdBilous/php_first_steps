<?php require_once 'functions.php'; ?>
<?php
    if (isset($_GET) && key_exists('logout', $_GET)) {
        session_destroy();
        header('Location: /');
        exit;
    }

 if (isset($_POST) && !empty($_POST)) {
    login($_POST);
 }

 if (isset($_SESSION['access']) && $_SESSION['access']) {
     header('Location: /blog.php');
     exit;
 }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Тег FORM</title>        
    </head>

    <body>

        <form action="" method="POST">
                <div>Имя Пользователя:</div>
                <input type="text" name="login" value=""><Br></p>
                <div>Пароль:</div>
                <input type="password" name="password" value=""></Br></p>
            <p><input type="submit"  value="Вход"></p>
        
            <a href="/index.php">Регистрация аккаунта</a><br />
        </form>

    </body>
</html>
