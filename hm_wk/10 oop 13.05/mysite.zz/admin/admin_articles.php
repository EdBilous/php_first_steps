<?php require_once 'header.php' ?>
<?php

if (isset($_GET) && !empty($_GET)) {
    $delart =$_GET['del'];
    deleteArticle($delart);
}

if (isset($_POST) && !empty($_POST)) {
    updateArticle($_POST);
}
?>
    <div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/add_articles.php">Добавить новую</a>
            </li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Таблица
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Подзаголовок</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Заголовок</th>
                            <th>Подзаголовок</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php if (getAdminArticle()): ?>
                        <?php $articles = getAdminArticle(); ?>
                        <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= $article['title'] ?></td>
                                <td><?= substr($article['sub_title'], 0, 20); ?></td>
                                <td><?= $article['created_at'] ?></td>
                                <td>
                                    <a href="edit_article.php?art=<?= $article['id']; ?>"">Edit</a><br>
                                    <a href="admin_articles.php?del=<?= $article['id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <p>Статьи не найдены!</p>
                        <?php endif;?>
                                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid-->

<?php require_once 'footer.php' ?>