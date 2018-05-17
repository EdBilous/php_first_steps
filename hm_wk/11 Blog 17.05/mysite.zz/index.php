<?php require_once 'header.php';?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')" xmlns="http://www.w3.org/1999/html">
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
          <?php $articles = $articleManager->getArticles(); ?>
          <?php if ($articles): ?>
              <?php foreach ($articles as $article): ?>
                  <?php $author = $userManager->getAuthor($article->author); ?>
                  <div class="post-preview">
                      <a href="singlearticle.php?title=<?= $article->title; ?>&content=<?= $article->content; ?>&sub_title=<?= $article->sub_title ?>&author=<?= $article->author; ?>&date=<?= $article->created_at; ?>"">
                          <h2 class="post-title">
                              <?= $article->title; ?>
                          </h2>
                          <h3 class="post-subtitle">
                              <?= $article->sub_title; ?>
                          </h3>
                      <p class="post-meta" >Автор:
                          <a href="#"><?= $author->login; ?></a>
                          <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $article->created_at); ?>
                           <?= $date->format('F d, Y'); ?></p>
                  <hr>
              <?php endforeach; ?>
          <?php else: ?>
              <p>Articles not found!</p>
          <?php endif; ?>
                  </div>
          <!-- Pager -->
         <!--           <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
      </div>
   </div>
</div>
<?php require_once 'footer.php';?>