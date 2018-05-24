<?php

//THIS FILE CONTAINS FRONT CONTROLLER

session_start();

define('ROOT', dirname(__FILE__));

//Function for automatic connection of classes
require_once(ROOT.'/components/Autoload.php');

$router = new Router();

$router -> run();




