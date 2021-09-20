<?php
// require_once("dbcontroller.php");
// $db_handle= new DBcontroller();
if(!empty($_POST["ajoute"])){

    if(!empty($_POST["quantity"])){
         $produitById = $_POST;
         $priceByProduitId= $_POST['price'];
         $imgProduit =$db_handle->runQuery("SELECT img_path FROM produit WHERE id='" . $_POST['id'] . "'");
    if(isset($_POST['optionSelect'])){
         $optionChose =$db_handle->runQuery("SELECT * FROM option_product WHERE id='" . $_POST['optionSelect'] . "'");
        $itemArray = array($produitById["id"].$optionChose[0]["opt"]=>array('name'=>$produitById["name"], 'id'=>$produitById["id"],'price'=>$priceByProduitId , 'quantity'=>$_POST["quantity"], 'img_path'=>$imgProduit[0]["img_path"], 'optionSelect'=>$optionChose[0]["opt"]));
    }
    else{
        $_POST['optionSelect']=null;
        $itemArray = array($produitById["id"].$_POST['optionSelect']=>array('name'=>$produitById["name"], 'id'=>$produitById["id"],'price'=>$priceByProduitId , 'quantity'=>$_POST["quantity"], 'img_path'=>$imgProduit[0]["img_path"], 'optionSelect'=>$_POST['optionSelect']));
    }
        if(!empty($_SESSION["Panier_item"])){
            //$_POST['id']
            if(in_array($_POST['id'],array_keys($_SESSION["Panier_item"]))){
                foreach($_SESSION["Panier_item"]as $k => $v){
                    if($produitById["id"] == $k){
                        $quantity = $_SESSION["Panier_item"][$k]["quantity"];
                        $quantity += $_POST["quantity"];
                        //if(empty($_SESSION["Panier_item"][$k]["quantity"])){
                            $_SESSION["Panier_item"][$k]["quantity"]= $quantity;
                        //}
                        // $_SESSION["Panier_item"][$k]["quantity"] += $_POST["quantity"];
                    }
                    else{
                    }
                }

            }
            else{
                 //$_SESSION["Panier_item"] = array_push($_SESSION["Panier_item"],$itemArray);
                 $_SESSION["Panier_item"] +=  $itemArray;
                $bp = 0;
            }
        }
        else{
            $_SESSION["Panier_item"] = $itemArray;
            $bp = 0;
        }

        
    }
    header("Location: menu.php");
}

?>