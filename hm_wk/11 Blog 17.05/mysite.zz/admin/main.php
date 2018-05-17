<?php require_once 'header.php' ?>


<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Main</a>
            </li>
            <li class="breadcrumb-item active">Админ</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-plus"></i>
                        </div>
                        <div class="mr-5">Новая статья</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="/admin/add_articles.php">
                        <span class="float-left">Добавить</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-table"></i>
                        </div>
                        <div class="mr-5">Все статьи</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="/admin/articles.php">
                        <span class="float-left">Показать</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">Мои статьи</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="/admin/admin_articles.php">
                        <span class="float-left">Показать</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-users"></i>
                        </div>
                        <div class="mr-5">Пользователи</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="/admin/users.php">
                        <span class="float-left">Перейти</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Статьи</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Подзаголовок</th>
                            <th>Дата</th>
                            <th>Автор:</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Заголовок</th>
                            <th>Подзаголовок</th>
                            <th>Дата</th>
                            <th>Автор:</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php $articles = $articleManager->getArticles(); ?>
                            <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= substr($article->title, 0, 40); ?></td>
                                <td><?= substr($article->sub_title, 0, 20); ?></td>
                                <td><?= $article->created_at; ?></td>
                                <td><?= $userManager->getAuthor($article->author)->login ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid-->


<?php require_once 'footer.php' ?>
