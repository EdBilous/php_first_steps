<?php
// Проверить наличие пустых полей
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   //htmlspecialchars - Преобразует специальные символы в HTML-сущности.
   //strip_tags — Удаляет теги HTML и PHP из строки.
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Создаем письмо и отправляем сообщение
$to = 'e.v.bilous@gmail.com';

$email_subject = "Контактная форма для сайта:  $name";
$email_body = "Вы получили новое сообщение из контактной формы вашего сайта.\n\n"."Вот подробности:\n\nName: $name\n\nEmail: $email_address\n\nТелефон: $phone\n\nСообщение:\n$message";
$headers = "От: $email_address\n";
$headers .= "Ответить: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
