<?php

class Router{

    function __construct($path){

        // var_dump($path);
        $path = trim($path, '/');
        // var_dump($path);
        $path = filter_var($path, FILTER_SANITIZE_URL);
        $path = explode('/', $path);
        // var_dump($path);

        $controllerName = array_shift($path);
        // var_dump($controllerName);

        $controllerClassName = ucfirst($controllerName)."Controller";
        // var_dump($controllerClassName);
        $controllerFileName = $controllerName.".controller.php";
        // var_dump($controllerFileName);
        
        if(!file_exists("controller/$controllerFileName")){
            header('Location: /notFound');
            exit();
            
        }
        else{
            require_once "controller/$controllerFileName";
            $this->controller = new $controllerClassName($path);
            //var_dump($controller);
        }

    }

    function render(){
        return $this->controller->render();
    }

}