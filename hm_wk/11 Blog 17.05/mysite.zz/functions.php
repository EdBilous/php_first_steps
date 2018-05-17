<?php

use Classes\User;
use Classes\Article;
use Classes\ConnectDb;
use Classes\TablesDb;

session_start();

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'Classes\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/Classes/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});


$articleManager = new Article(ConnectDb::getConnect());
$userManager    = new User(ConnectDb::getConnect());
$manager        = new TablesDb(ConnectDb::getConnect());

//возвращает Title
function viewTitle()
{
   if ($_SERVER['REQUEST_URI'] === '/') {
       echo 'Custom Blog';
   } elseif (strpos($_SERVER['REQUEST_URI'], 'about')) {
       echo 'Custom Blog - About';
   } elseif (strpos($_SERVER['REQUEST_URI'], 'post')) {
       echo 'Custom Blog - Post';
   } elseif (strpos($_SERVER['REQUEST_URI'], 'contact')) {
       echo 'Custom Blog - Contact';
   } else {
       echo 'Custom Blog';
   }
}

//Форма для поиска по articles
//вызов в index.php
function viewSearchForm()
{
        if (strpos($_SERVER['REQUEST_URI'], 'index')) {
           echo '<form action="/search.php" method="POST" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" name="query" placeholder="Введите текст" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
            </form>';
        } else {
          return;
        }
}

function getErrorMessage()
{
    return isset($_SESSION['error_message']) ? $_SESSION['error_message'] : false;
}