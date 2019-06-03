<?php 

//THIS FILE CONTAINS FRONT CONTROLLER
session_start();
define('ROOT', dirname(__FILE__));

//Function for automatic connection of classes
require_once(ROOT.'/components/Autoload.php');
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('index.html');
echo $template -> render(array());
//$router = new Router();
//$router -> run();


