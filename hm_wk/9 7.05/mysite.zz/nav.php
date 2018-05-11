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
      <li class="nav-item">
         <a class="nav-link" href="/admin/main.php">Админ</a>
      </li>
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link" href="/enter.php?logout">Выход</a>
         </li>
         </li>
      </ul>
   </div>
</nav>