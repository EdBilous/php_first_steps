<?php require_once 'header.php';?>
<!-- Navigation -->      
<?php require_once 'nav.php';?>
<?php $value = $_GET; ?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/singlearticle-bg.jpg')">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
               <h1><?php echo $value['title'];?></h1>
               <h2 class="subheading"><?php echo $value['sub_title'];?></h2>
               <span class="meta">Автор:
               <a> <?php echo $value['author'] ?></a>
               </span>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- Post Content -->
<article>
   <div class="container">
   <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <div class="post-preview">
            <p><?php echo $value['content'];?>     
               <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $value['date']); ?>
            <p class="post-meta">Пост опубликован: <?= $date->format('F d, Y'); ?></p>
            <sub><a href="javascript:history.back()" title="...">назад</a></sub>
         </div>
      </div>
   </div>
</article>
<?php require_once 'footer.php';?>