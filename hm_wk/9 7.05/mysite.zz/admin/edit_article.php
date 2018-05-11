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
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <table border="1" align="">
                        <tr>
                            <td>Введите заголовок статьи</td>
                            <td>Введите подзаголовок статьи</td>
                            <td>Введите текст</td>
                        </tr>
                        <tr>
                            <td valign="top"><textarea name="edit_title" cols="25" rows="10" type="text" /><?= $getSingArt['title']; ?></textarea></td>
                            <td valign="top"><textarea name="edit_subtitle" cols="25" rows="10" type="text" /><?= $getSingArt['sub_title']; ?></textarea></td>
                            <td valign="top"><textarea name="edit_text" cols="65"
                                                       rows="20" type="text" /><?= $getSingArt['content']; ?></textarea></td>
                        </tr>
                    </table>
                    <div align="center">
                        <input name="send" type="submit" value="Сохранить" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->

<?php require_once 'footer.php' ?>