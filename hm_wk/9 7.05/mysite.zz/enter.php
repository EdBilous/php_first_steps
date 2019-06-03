<?php require_once 'header.php';?>
<?php require_once 'functions.php';?>
<?php
   if (isset($_GET) && key_exists('logout', $_GET)) {
       session_destroy();
       header('Location: /enter.php');
       exit;
   }
   
   if (isset($_POST) && !empty($_POST)) {
   Login($_POST);
   }
   
   if (isset($_SESSION['access']) && $_SESSION['access']) {
    header('Location: /index.php');
    exit;
   }
   ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/enter.jpg')">
   <div class="overlay"></div>
   <div class="container">
      <div class="rform-group">
         <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
               <h4></h4>
               <div class="container">
                  <div class="form-group">
                     <div class="col-lg-5 col-md-5 mx-auto">
                        <form action="/enter.php" method="POST">
                           <div class="control-group">
                              <div class="form-group col-xs-2 floating-label-form-group controls">
                                 <label>Login</label>
                                 <input class="form-control" type="text" class="form-control" placeholder="login"  name="login" value="">
                                 <p class="help-block text-danger"></p>
                              </div>
                           </div>
                           <div class="control-group">
                              <div class="form-group col-xs-2 floating-label-form-group controls">
                                 <label>Пароль</label>
                                 <input class="form-control" type="password" class="form-control" name="password" placeholder="Password" value="">
                                 <p class="help-block text-danger"></p>
                              </div>
                           </div>
                           <br>
                           <div id="success">
                              <div class="form-group">
                                 <p><button type="submit" class="btn btn-primary" value="">Вход</button></p>
                                 <p class="help-block text-danger"></p>
                                 <a href="/regist.php">РЕГИСТРАЦИЯ</a>
                                 <p class="help-block text-danger"></p>
                              </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<?php require_once 'footer.php';?>