<?php
   $adminemail = "e.v.bilous@gmail.com";  // e-mail
   
   $name = $_POST['name'];
   $email = $_POST['email'];
   $msg = $_POST['message'];
   
   if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", strtolower($email)))
   {
       echo "Вернитесь назад. Вы указали неверные данные!";
   } else { 
       $msg="
       <p>Имя: $name</p> 
       <p>E-mail: $email</p> 
       <p>Сообщение: $msg</p>
       ";
   // Отправляем письмо админу  
   mail("$adminemail", "Сообщение 
   от $name", "$msg");
   
   echo "$msg
   Ваше сообщение отправлено!";}
   
   ?>