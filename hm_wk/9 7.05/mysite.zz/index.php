<?php require_once 'header.php';?>
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
<!-- Navigation -->
<?php require_once 'nav.php';?>
<!-- Main Content -->
<div class="container">
   <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <?php if (getArticles()): ?>
         <?php foreach (getArticles() as $article): ?>
         <?php $author = getAuthor($article['author']); ?>
         <div class="post-preview">
            <a href="singlearticle.php?title=<?= $article['title']; ?>&content=<?= $article['content']; ?>&sub_title=<?= $article['sub_title']; ?>&author=<?= $author['login']; ?>&date=<?= $article['created_at']; ?>"">
               <h2 class="post-title">
                  <?= $article['title']; ?>
               </h2>
               <h3 class="post-subtitle">
                  <?= $article['sub_title']; ?>
               </h3>
            </a>
            <p class="post-meta">
               Автор:
               <a href="#"><?= $author['login']; ?></a>
               <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $article['created_at']); ?>
               Дата публикации: <?= $date->format('F d, Y'); ?>
            </p>
         </div>
         <hr>
         <?php endforeach; ?>
         <?php else: ?>
         <p>Articles not found!</p>
         <?php endif; ?>
         <!-- Pager -->
         <!--           <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
      </div>
   </div>
</div>
<?php require_once 'footer.php';?>