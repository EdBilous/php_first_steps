<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   <a class="navbar-brand" href="/admin/main.php"><?= $_SESSION['login']; ?></a>
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
         <a class="nav-link text-center" id="sidenavToggler">
         <i class="fa fa-fw fa-angle-left"></i>
         </a>
      </li>
   </ul>
   <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="">
            <a class="nav-link" href="add_articles.php">
            <i class="fa fa-fw fa-newspaper-o"></i>
            <span class="nav-link-text">Новая статья</span>
            </a>
         </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Статьи</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseExamplePages">
               <li>
                  <a href="/admin/admin_articles.php">Мои статьи</a>
               </li>
               <li>
                  <a href="/admin/articles.php">Все статьи</a>
               </li>
            </ul>
         </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="">
            <a class="nav-link" href="users.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Пользователи</span>
            </a>
         </li>
      </ul>
   </div>
   <ul class="navbar-nav">
      <li class="nav-item" data-toggle="tooltip" data-placement="right">
         <a class="nav-link" href="/index.php">
         <i class="fa fa-fw fa-home"></i>Главная</a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right">
         <a class="nav-link" href="/enter.php?logout">
         <i class="fa fa-fw fa-sign-out"></i>Выход</a>
      </li>
   </ul>
   </div>
</nav>