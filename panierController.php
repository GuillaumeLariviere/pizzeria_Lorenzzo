<?php session_start();
require_once("dbcontroller.php");


$db_handle= new DBcontroller();
if(!empty($_GET["action"])) {
    switch($_GET["action"]){
        case "vider":
            unset($_SESSION["Panier_item"]);
            break;
    }
    if($_GET['action']=='moin'){
        $_SESSION['Panier_item'][$_GET['id']]['quantity']-=1;
        if($_SESSION['Panier_item'][$_GET['id']]['quantity']<1){
            unset($_SESSION["Panier_item"][$_GET["id"]]);
            if(empty($_SESSION['Panier_item'])){
                unset($_SESSION["Panier_item"]);
            }
        }
    }
    if($_GET['action']=='plus'){
        $_SESSION['Panier_item'][$_GET['id']]['quantity']+=1;
    }
}
?>