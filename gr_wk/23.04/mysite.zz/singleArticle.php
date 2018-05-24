<?php require_once 'functions.php';?>
<?php require_once 'functionBlog.php';?>
<?php 
    if (!$_SESSION['access']) {
        header('Location: /access_denied.php');
        exit;
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
    <title>Тег FORM</title>
    </head>

    <body>

        <div>
            <p>user "<?php showUserName();?>"</p>
            <a href="/?logout">Logout</a>
        
            <div class="blog">
                <?php $article = $_GET; ?>
                <?php if ($article) : ?>

                        <div class="article">
                        <h1><?php echo $article['title'];?></h1>
                        <p><?php echo $article['content'];?></p>
                    </div>
                <?php else: ?>
                    <p>Articles not found!!!</p>
                <?php endif; ?>
            </div>
        </div>

    </body>
</html>