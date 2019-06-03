<?php

//THIS FILE CONTAINS FRONT CONTROLLER
//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
//header("Last-Modified: " . gmdate("D, d M Y H:i:s")." GMT");
//header("Cache-Control: no-cache, must-revalidate");
//header("Cache-Control: post-check=0,pre-check=0", false);
//header("Cache-Control: max-age=0", false);
//header("Pragma: no-cache");

session_start();

define('ROOT', dirname(__FILE__));

//Function for automatic connection of classes
require_once(ROOT.'/components/Autoload.php');

$router = new Router();
$router -> run();




