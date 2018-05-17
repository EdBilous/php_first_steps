<?php require_once 'header.php';?>
<?php require_once 'functions.php';?>
<?php
if ($_POST) {
    $userManager->registerUser($_POST);
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
                        <span class="subheading">Ргистрация</span>
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
                <form name="registration" action="registration.php" method="POST">
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
                            <input type="text" class="" placeholder="Логин"  name="login" value="" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-2 floating-label-form-group controls">
                            <label>Пароль *:</label>
                            <input type="password" class="" name="password" placeholder="Пароль" value="" required/>
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
    <!-- Footer -->
<?php require_once 'footer.php'; ?>