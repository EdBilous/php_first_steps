<?php
 class Twig
 {
     public static function connectTwig($html)
     {
         require_once(ROOT . '/vendor/autoload.php');
         $loader = new Twig_Loader_Filesystem(ROOT . '/templates');
         $twig = new Twig_Environment($loader);
         $template = $twig->loadTemplate($html);         
         return $template;

     }

 }