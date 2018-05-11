<?php require_once 'header.php';?>
<?php require_once 'functions.php';?>
<?php
  if ($_POST) {
    registerUser($_POST);
  }
 
   ?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/enter.jpg')">
   <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="page-heading">
                  <h4>Регистрация</h4>
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-5 col-md-5 mx-auto">
                           <form name="registration" action="regist.php" method="POST">
                              <div class="control-group">
                                 <div class="form-group col-xs-2 floating-label-form-group controls">
                                    <label>Имя</label>
                                    <input type="text" class="" placeholder="Имя"  name="name" value="">
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <div class="control-group">
                                 <div class="form-group col-xs-2 floating-label-form-group controls">
                                    <label>Фамилия</label>
                                    <input type="text" class="form" placeholder="Фамилия"  name="last_name" value="">
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <div class="control-group">
                                 <div class="form-group col-xs-2 floating-label-form-group controls">
                                    <label>Email *:</label>
                                    <input type="text" class="" placeholder="Email"  name="email" value="" required/>
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <div class="control-group">
                                 <div class="form-group col-xs-2 floating-label-form-group controls">
                                    <label>Логин *:</label>
                                    <input type="text" class="" placeholder="Логин"  name="log" value="" required/>
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <div class="control-group">
                                 <div class="form-group col-xs-2 floating-label-form-group controls">
                                    <label>Пароль *:</label>
                                    <input type="password" class="" name="pass" placeholder="Пароль" value="" required/>
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                                 <div class="control-group">
                                 <div class="form-group col-xs-2 floating-label-form-group controls">
                                    <label>Пароль еще раз *:</label>
                                    <input type="password" class="" name="passconf" placeholder="Пароль" value="" required/>
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <div id="success">
                                 <div class="form-group">
                                    <button type="submit" class="btn btn-primary" value="">Отправить</button>
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