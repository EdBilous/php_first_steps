<?php require_once 'header.php' ?>
    <div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/main.php">Панель</a>
            </li>
            <li class="breadcrumb-item active">Добавить новую</li>
        </ol>
<?php 

  if (isset($_GET) && !empty($_GET)) {
   $idarticle= $_GET['art'];
   $getSingArt= getSingleArticle($idarticle);
  }

if (isset($_POST) && !empty($_POST)) {
   updateArticle($_POST, $idarticle);
   header('Location: admin_articles.php');
  }
  ?>

        <!-- Example DataTables Card-->
<form action="" method="post">
            <div class="form-group">
                <label>Заголовок</label>
                <textarea class="form-control" rows="" name="edit_title"><?= $getSingArt['title']; ?></textarea>            </div>
            <div class="form-group">
                <label>Подзаголовок</label>
                <textarea class="form-control" rows="2" name="edit_subtitle"><?= $getSingArt['sub_title']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Текст</label>
                <textarea class="form-control" rows="10" placeholder="Content" name="edit_text"><?= $getSingArt['content']; ?></textarea>
            </div>
            <button type="submit" name="send" class="btn btn">Cохранить</button>
        </form>
    </div>
</div>
    <!-- /.container-fluid-->

<?php require_once 'footer.php' ?>