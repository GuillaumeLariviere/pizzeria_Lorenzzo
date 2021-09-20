<?php

// require_once 'base.controller.php';

class ProductController extends BaseController{


    function read(){
        var_dump('read Product',$this);
    }

    function create(){
        var_dump('create Product',$this);
    } 
    
    function update(){
        var_dump('update Product',$this);
    }

    function delete(){
        var_dump('delete Product',$this);
    }

}