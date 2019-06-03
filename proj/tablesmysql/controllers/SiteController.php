<?php

class SiteController
{
    public function indexAction()
    {
        $template = Twig::connectTwig('index.html');
        echo $template->render(array());
        return true;
    }
}
