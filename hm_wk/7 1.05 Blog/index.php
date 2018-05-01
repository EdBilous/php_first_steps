<?php require_once 'header.php';?>
<?php 
   if (!$_SESSION['access']) {
    header('Location: /enter.php');
    exit;
   }
   ?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
               <h2>Custom Blog</h2>
               <span class="subheading">
               Custom Blog
               </span>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- Main Content -->
<div class="container">
   <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <?php if ($articles): ?>
         <?php foreach ($articles as $value) : ?>
         <div class="post-preview">
            <a href="singlearticle.php?title=<?= $value['title']; ?>&content=<?= $value['content']; ?>&img=<?= $value['img'] ?>&author=<?= $value['author'] ?>&date=<?= $value['date']; ?>"">
               <h2 class="post-title">
                  <?php echo $value['title']; ?>
               </h2>
               <h3 class="post-subtitle">
                <?php echo $value['subtitle']; ?>
              </h3>
            </a>
            <p class="post-meta">Автор:
               <a> <?php echo $value['author']; ?></a>
               </br> Дата: <?php echo $value['date']; ?>
            </p>
         </div>
         <?php endforeach; ?>
         <?php else: ?>
         <p>Статья не найдена!</p>
         <?php endif; ?>
         <hr>
         <!-- Pager -->
         <!--           <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
      </div>
   </div>
</div>
</div>
<?php require_once 'footer.php';?>