<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
   <a class="navbar-brand" href="index.php">Сustom Blog</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
            <a class="nav-link" href="index.php">Главная <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="about.php">О Блоге</a>
         </li>
         <li class="nav-item">
            <a class="nav-link disabled" href="contact.php">Обратная связь</a>
         </li>
      </ul>
      <?php viewSearchForm(); ?>
      <ul class="navbar-nav">
       <li class="nav-item" data-placement="right">
         <a class="nav-link" href="/admin/main.php">
         <i class="fa fa-fw fa-user"></i>Админ</a>
      </li>
      <?php if (isset($_SESSION['access']) && $_SESSION['access']): ?>
      <li class="nav-item" data-placement="right">
         <a class="nav-link" href="/enter.php?logout">
         <i class="fa fa-fw fa-sign-out"></i>Выход</a>
      </li>
      <?php else: ?>
       <li class="nav-item" data-placement="right">
         <a class="nav-link" href="/registration.php">
         <i class="fas fa fa-user-plus"></i>Регистрация</a>
      </li>
      <?php endif; ?>
       </ul>
   </div>
</nav>
