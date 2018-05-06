    <?php require_once 'header.php';?>
<?php 
  if (!$_SESSION['access']) {
   header('Location: /enter.php');
   exit;
      }
      if (isset($_GET) && !empty($_GET)) {
  $delart =$_GET['del'];
  deleteArticle($delart);
   }
    ?> 
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/about-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="table">
          <div class="col-lg-10 col-md-10 mx-auto">
            <div class="page-heading">
              <h2></h2>
              <span class="subheading">Список статей</span>
              автор: <?= $_SESSION['login']; ?>
              <form action="/add_article.php">
                  <button type="submit">Добавить новую</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </header>

<div class="container">
      <div class="table">
  <div class="col-lg-auto mx-auto">
  <div>
    <table border="2" width="100%" cellpadding="5">
      <tr>
          <th>id</th>
              <th>Название</th>
                  <th>Краткое описание</th>
                  <th></th>
    <?php if (getAdminArticle()): ?>
            <?php foreach (getAdminArticle() as $article): ?>

   </tr>
   <tr>
              <td><?= $article['id'] ?></td>
              <td><?=$article['title']; ?></td>
              <td><?=$article['sub_title']; ?></td>
             <?php $id_art = $article['id']; ?>
              <td><a href="admin.php?del=<?= $article['id']; ?>"">Удалить</a><br /><a href="edit_article.php?art=<?= $article['id']; ?>"">Редакт</a></</td>
                              <?php endforeach; ?>
        <?php else: ?>
            <p>Статьи не найдены!</p>
        <?php endif; ?>
                  <hr>    
              </table>
  </div>
  </div>
  </div>
     
  </div>
    <?php require_once 'footer.php';?>