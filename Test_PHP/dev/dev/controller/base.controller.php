<?php

abstract class BaseController{

    function __construct($params){
        
        $action = $params[0] ?? 'index';
        //var_dump($params);
        $this->id = $params[1] ?? null;
        $this->post = $_SESSION['post'] ?? null;

        if(!method_exists(get_called_class(), $action)){
            header('Location: /notFound');
            exit();
            
        }
        
        

        $this->$action();

    }

    function index(){
        //var_dump("action index of ".get_called_class());
        $ctrlName = lcfirst(str_replace("Controller", "", get_called_class()));

        //Récupererr les entities
        $user = new UserEntity();
        $toto = ['coucou'=>"Hello"];

        //Récuperer le template
        ob_start();
        include_once 'template/'.$ctrlName.'/index.php';
        $this->content = ob_get_clean();
        //$this->content = file_get_contents('template/'.$ctrlName.'/index.php');

    }

    function render(){
        return $this->content;
    }

}