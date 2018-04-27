<!DOCTYPE HTML>
<html>
   <head>
      <meta charset="utf-8">
      <title>Тег FORM</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style/style.css" type="text/css" />
      <?php require_once 'header.html';?>
   <body>                
      <form action= "post.php" method= "POST">
      <p>Имя: </p>
      <p> <input type= "text" name= "name"> </p>
      <p>E-mail: </p>
      <p> <input type= "text" name= "email"></p>
      <p>Сообщение: </p>
      <p> <textarea rows= "10" cols= "45" name= "message"></textarea></p>
      <input type= "submit" value= "Отправить"> 
   </body>
</html>