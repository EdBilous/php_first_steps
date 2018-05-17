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
               Результат поиска
               </span>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- Main Content -->
<?php
   if (isset($_POST) && !empty($_POST['query'])) {
       $search_result = $articleManager->search($_POST['query']);
   
   }else if($_POST['query'] == null){
       header('Location: /index.php');
       exit;
   }
   ?>
<div class="container">
   <p style="color: blue">Результат поиска по запросу "<?php echo $_POST['query'] ?>" :</p>
   <?php if ($search_result != null) : ?>
   <table class="table table-bordered" width="100%" cellspacing="0">
      <tr>
         <th>№</th>
         <th>Название</th>
         <th>Краткое описание</th>
         <th>Автор</th>
         <?php $count='1'; ?>
         <?php foreach ($search_result as $article): ?>
      </tr>
      <tr>
         <td><?= $count++; ?></td>
         <td>
            <a style="color: blue" href="singlearticle.php?title=<?= $article['title']; ?>&content=<?= $article['content']; ?>&sub_title=<?= $article['sub_title']; ?>&author=<?= $article['author']; ?>&date=<?= $article['created_at']; ?>"">
               <?= $article['title']; ?>
         </td>
         <td><?= $article['sub_title']; ?></td>
         <td><?= $userManager->getAuthor($article['author'])->login; ?></td>
         <?php endforeach; ?>
         <hr>
   </table>
   <?php else: ?>
   <p style="color: red">ничего не найдено, попробуйте изменить запрос</p>
   <?php endif; ?>
   <a style="color: brown" href="javascript:history.back()" ><<назад</a>
</div>
<?php require_once 'footer.php';?>