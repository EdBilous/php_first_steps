<?php

class Router
{
    private $routes;
    
    public function __construct()
    {
        $this -> routes = include(ROOT . '/config/routes.php');
    }
    
    public function run()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this -> routes as $pattern => $path){
            if (preg_match("~$pattern~", $uri)){
                $path = preg_replace("~$pattern~", $path, $uri);
                $pathElements = explode('/', $path);
                $conctollerName = ucfirst(array_shift($pathElements)) . 'Controller';
                $methodName = array_shift($pathElements) . 'Action';
                $parameters = $pathElements;
                break;
            }
            
        }
        //var_dump($conctollerName);
        //var_dump($methodName);
        //var_dump($parameters);
        call_user_func_array([$conctollerName, $methodName], $parameters);
    }
}