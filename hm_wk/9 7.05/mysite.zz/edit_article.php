<?php require_once 'header.php';?>
<?php 
   if (!$_SESSION['access']) {
    header('Location: /enter.php');
    exit;
   }
   if (isset($_GET) && !empty($_GET)) {
    $idarticle= $_GET['art'];
    $result= getSingleArticle($idarticle);
   }
   
   if (isset($_POST) && !empty($_POST)) {
    updateArticle($_POST, $idarticle);
   }
   ?>
<?php require_once 'nav.php';?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/add_article-bg.jpg')">
   <div class="overlay"></div>
   <div class="row">
      <div class="col-lg-auto col-md-auto mx-auto">
         <div class="page-heading">
            <span class="subheading">Новая статья</span>
            автор: <?= $_SESSION['login']; ?>
            <form action="" method="post">
               <table border="" align="">
                  <tr>
                     <td>Заголовок страницы</td>
                     <td>Текст</td>
                     <td>Описание</td>
                  </tr>
                  <tr>
                     <td valign="top"><textarea name="edit_title" cols="25" rows="10" type="text" /><?= $result['title']; ?></textarea></td>
                     <td valign="top"><textarea name="edit_text" cols="65"
                        rows="20" type="text" /><?= $result['content']; ?></textarea></td>
                     <td valign="top"><textarea name="edit_subtitle" cols="25" rows="10" type="text" /><?= $result['sub_title']; ?></textarea></td>
                  </tr>
               </table>
               <div align="center">
                  <input name="save" type="submit" value="Сохранить" />
               </div>
            </form>
         </div>
      </div>
   </div>
   </div>
</header>
<?php require_once 'footer.php';?>