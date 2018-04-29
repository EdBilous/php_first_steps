<?php require_once 'header.php';?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1></h1>
              <span class="subheading">Есть вопросы? У меня есть ответы.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Хотите связаться? Заполните форму ниже, чтобы отправить мне сообщение!</p>
          <!--Контактная форма - введите свой адрес электронной почты в строке 19 файла mail / contact_me.php, чтобы эта форма работала. ->
          <! - ПРЕДУПРЕЖДЕНИЕ. Некоторые веб-хосты не позволяют отправлять электронные письма через формы на обычные почтовые хосты, такие как Gmail или Yahoo. Рекомендуется использовать адрес электронной почты частного домена! ->
          <! - Чтобы использовать форму контакта, ваш сайт должен находиться на веб-хостинге в реальном времени с PHP! Форма не будет работать локально!-->
          <form action= "mail/contact_me.php" method= "POST" name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Имя</label>
                <input type="text" class="form-control" placeholder="Имя" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Номер телефона</label>
                <input type="tel" class="form-control" placeholder="Номер телефонпа" id="phone" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Сообщение</label>
                <textarea rows="5" class="form-control" placeholder="Сообщение" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Отправить</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php require_once 'footer.php';?>