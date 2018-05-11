<?php require_once 'header.php';?>
<?php 
  if (!$_SESSION['access']) {
   header('Location: /enter.php');
   exit;
  }

  if (isset($_POST) && !empty($_POST)) {
   insertAdminArticle($_POST);
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
              <form action="/add_article.php" method="post">
              <table border="" align="">
                <tr>
                  <td>Введите заголовок страницы</td>
                  <td>Введите текст</td>
                  <td>Введите краткое описание</td>
                </tr>
                <tr>
                  <td valign="top"><textarea name="title" cols="25" rows="10" type="text" /></textarea></td>
                  <td valign="top"><textarea name="content" cols="65"
                      rows="20" type="text" /></textarea></td>
                  <td valign="top"><textarea name="sub_title" cols="25" rows="10" type="text" /></textarea></td>
                </tr>
              </table>
              <div align="center">
              <input name="send" type="submit" value="Добавить" />
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </header>
        <?php require_once 'footer.php';?>