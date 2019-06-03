<?php

class SiteController
{
    public function indexAction() {        
        $categoryList = Category::getCategory();        
        $productsList = Product::getLatestProducts();      
        //require_once(ROOT . '/templates/index.html');        
        require_once(ROOT . '/vendor/autoload.php');
        $loader = new Twig_Loader_Filesystem(ROOT . '/templates');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('index.html');
        echo $template->render(array('categoryList' => $categoryList, 'product' => $productsList));
        return true;        
    }
}
