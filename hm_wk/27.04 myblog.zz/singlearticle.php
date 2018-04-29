<?php require_once 'header.php';?>
    <?php $value = $_GET; ?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?php echo $value['title'];?></h1>
              <span class="meta">Автор:
              <a> <?php echo $value['author'] ?></a>
          	  </span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
          	<div class="post-preview">
			     <p><?php echo $value['content'];?>     
           <p><?php echo $value['img'];?></p>
           <p class="post-meta">Пост опубликован: <?php echo $value['date']; ?></p>

            <!--<p>Placeholder text by
              <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by
              <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p> -->
          </div>
        </div>
      </div>
    </article>
    <?php require_once 'footer.php';?>