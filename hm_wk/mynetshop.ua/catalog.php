<?php require_once 'functions.php';?>
<?php require_once 'data.php';?>
<?php 
  if (!$_SESSION['access']) {
   header('Location: /access_denied.php');
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
    <div id="centerLayer" class="blog">
      
      <?php if ($goods): ?>
      <?php foreach ($goods as $tov) : ?>
      
      <div>
        <a href="/singleArticle.php?title=<?= $tov['title']; ?>&content=<?= $tov['content']; ?>&price=<?= $tov['price'] ?>&img=<?= $tov['img'] ?>&content2=<?= $tov['content2']; ?>">
          <p><?php echo $tov['img']; ?></p>
          <h1><?php echo $tov['title']; ?></h1>
        </a>
        <p><?php echo $tov['content'];?></p>
        <p><?php $tov['content2'];?></p>
        </a>Цена: <?php echo $tov['price'];?> ₴</p>
      </div>
      
      <?php endforeach; ?>
      
      <?php else: ?>
      
      <p>Articles not found!!!</p>
      <?php endif; ?>
    </div>
  </div>
  </body>
</html>