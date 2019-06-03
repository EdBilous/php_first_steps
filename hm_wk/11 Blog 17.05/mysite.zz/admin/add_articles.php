<?php require_once 'header.php' ?>
<div class="content-wrapper">
   <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="/admin/main.php">Main</a>
         </li>
         <li class="breadcrumb-item active">Новвая статья</li>
      </ol>
      <?php
         if (isset($_POST) && !empty($_POST)) {
             $articleManager->insertArticle($_POST);
             header('Location: admin_articles.php');
         }
         ?>
      <!-- Example DataTables Card-->
      <form action="add_articles.php" role="form" method="post">
         <div class="form-group">
            <label>Введите заголовок статьи</label>
            <input type="text" class="form-control" name="title">
         </div>
         <div class="form-group">
            <label>Введите подзаголовок статьи</label>
            <input type="text" class="form-control" name="sub_title">
         </div>
         <div class="form-group">
            <label>Введите текст</label>
            <textarea class="form-control" rows="10" name="content"></textarea>
         </div>
         <button type="submit" name="send" class="btn color red">Добавить</button>
      </form>
   </div>
</div>
<!-- /.container-fluid-->
<?php require_once 'footer.php' ?>