<?php require_once 'functions.php';?>
<?php require_once 'data.php';?>
<?php 
   if (!$_SESSION['access']) {
       header('/access_denied.php');
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
         <?php $tov = $_GET; ?>
         <div class="blog">
            <a href="javascript:history.back(1)" title="...">назад</a>
            <p><?php echo $tov['img']; ?></p>
            <h1><?php echo $tov['title'];?></h1>
            <p><?php echo $tov['content'];?></p>
            <p><?php echo $tov['content2'];?></p>
            </a>Цена: <?php echo $tov['price'];?> ₴</p>
            <a class="btn btn-success pull-right" href="order.php">Заказать</a>
         </div>
   </body>
</html>