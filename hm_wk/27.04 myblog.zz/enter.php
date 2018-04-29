<?php require_once 'functions.php';?>
<?php require_once 'data.php';?>
<?php
   if (isset($_GET) && key_exists('logout', $_GET)) {
       session_destroy();
       header('Location: /enter.php');
       exit;
   }
   
   if (isset($_POST) && !empty($_POST)) {
   login($_POST);
   }
   
   if (isset($_SESSION['access']) && $_SESSION['access']) {
    header('Location: /index.php');
    exit;
   }
   ?>
     <!DOCTYPE HTML>
<html>
   <head>
       <meta charset="utf-8">
      <link rel="stylesheet" href="style/style.css" type="text/css" />
      <?php require_once 'header.html';?>
   </head>
   <body>
      <div id="content">
         <h2>Добро пожаловать в наш интернет магазин!</h2>
         <p>Пожалуйста, введите ниже свои данные для входа:</p>
            <form action="" method="POST">
            <div>Имя Пользователя:</div>
            <input type="text" name="login" value=""><Br></p>
            <div>Пароль:</div>
            <input type="password" name="password" value=""></Br></p>
            <p><input type="submit"  value="Вход"></p>
         </form>
      </div>
   </body>
</html>