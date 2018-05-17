<?php require_once 'header.php';?>
<?php require_once 'functions.php';?>
<?php
   if (isset($_GET) && key_exists('logout', $_GET)) {
       session_destroy();
       header('Location: /enter.php');
       exit;
   }
   var_dump($_POST);
   if (isset($_POST) && !empty($_POST)) {
   $userManager->Login($_POST);
   }
   
   if (isset($_SESSION['access']) && $_SESSION['access']) {
    header('Location: /index.php');
    exit;
   }
   ?>
<?php require_once 'nav.php';?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
               <h1>Custom Blog</h1>
               <span class="subheading">Вход</span>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- Main Content -->
<div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto">
         <?php if(getErrorMessage()): ?>
         <p style="color: red"><?= getErrorMessage(); ?></p>
         <?php endif; ?>
         <form action="/enter.php" class="form-horizontal" method="post">
            <div class="form-group">
               <label class="col-sm-2 control-label">Login</label>
               <div class="col-sm-12">
                  <input type="text" class="form-control" name="login" placeholder="Login">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-2 control-label">Пароль</label>
               <div class="col-sm-12">
                  <input type="password" class="form-control" name="password" placeholder="Password">
               </div>
            </div>
            <div class="form-group">
               <div class="col-sm-offset-2 col-sm-8">
                  <button type="submit" class="btn btn-primary">Вход</button>
               </div>
            </div>
            <div class="form-group">
               <div class="help-block text-danger">
                  <a href="registration.php" class="text">РЕГИСТРАЦИЯ</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Footer -->
<?php require_once 'footer.php'; ?>