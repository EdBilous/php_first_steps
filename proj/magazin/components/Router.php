<?php

class Router
{
    private $routes;
    
    public function __construct()
    {
        $this -> routes = include(ROOT . '/config/Routes.php');
    }
    
    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];        
        foreach ($this -> routes as $pattern => $path){                       
            if (preg_match($pattern, $uri)){
                $path = preg_replace($pattern, $path, $uri);
                $pathElements = explode('/', $path);
                $conctollerName = array_shift($pathElements) . 'Controller';
                $methodName = array_shift($pathElements) . 'Action';
                $parameters = $pathElements;                
            }
        }        
        call_user_func_array([$conctollerName, $methodName], $parameters);
    }
}