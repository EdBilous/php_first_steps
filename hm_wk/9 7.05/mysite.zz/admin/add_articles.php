<?php require_once 'header.php' ?>
    <div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/main.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add new</li>
        </ol>
        <?php

        if (isset($_POST) && !empty($_POST)) {
            insertAdminArticle($_POST);
            header('Location: admin_articles.php');
        }
        ?>

        <!-- Example DataTables Card-->
        <div class="row">
            <div class="col-12">
                <form action="add_articles.php" method="post">
                    <table border="1" align="">
                        <tr>
                            <td>Введите заголовок статьи</td>
                            <td>Введите подзаголовок статьи</td>
                            <td>Введите текст</td>
                        </tr>
                        <tr>
                            <td valign="top"><textarea name="title" cols="25" rows="10" type="text" /></textarea></td>
                            <td valign="top"><textarea name="sub_title" cols="25" rows="10" type="text" /></textarea></td>
                            <td valign="top"><textarea name="content" cols="65"
                                                       rows="20" type="text" /></textarea></td>
                        </tr>
                    </table>
                    <div align="center">
                        <input name="send" type="submit" value="Добавить" />
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- /.container-fluid-->

<?php require_once 'footer.php' ?>