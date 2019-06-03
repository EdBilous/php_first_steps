<?php require_once 'header.php';?>
<?php require_once 'nav.php';?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
               <h2>Custom Blog</h2>
               <span class="subheading">
               ResultSearch
               </span>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- Main Content -->
<?php 
   if (isset($_POST) && !empty($_POST['query'])) { 
       $search_result = search ($_POST['query']); 
       // var_dump($_POST['query']);
   }else if($_POST['query'] == null){
     header('Location: /index.php');
      exit;
   }
   ?>
<div class="container">
   <div class="table">
      <div>
         <table border="2" width="100%" cellpadding="5">
            <tr>
               <th>№</th>
               <th>Название</th>
               <th>Краткое описание</th>
               <?php $i=1; ?>
               <?php foreach ($search_result as $article): ?>
               <?php $author = getAuthor($article['id']); ?>
            </tr>
            <tr>
               <td><?= $i++; ?></td>
               <td><a href="singlearticle.php?title=<?= $article['title']; ?>&content=<?= $article['content']; ?>&sub_title=<?= $article['sub_title']; ?>&author=<?= $author['login']; ?>&date=<?= $article['created_at']; ?>""><?=$article['title']; ?></a></td>
               <td><?=$article['sub_title']; ?></td>
               </a>
               <?php endforeach; ?>
               <hr>
         </table>
      </div>
   </div>
</div>

<?php require_once 'footer.php';?>