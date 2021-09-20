<?php
session_start();
require_once("dbcontroller.php");
$db_handle= new DBcontroller();

include_once 'ajout-panier.php';

$id=$_GET['id'] ?? 1;
$products = $db_handle->runQuery("SELECT * FROM produit WHERE id=$id");
$product = $products[0];
$prices = $db_handle->runQuery("SELECT * FROM price WHERE produit_id=$id");
$size =$db_handle->runQuery("SELECT * FROM option_product");
?>

<?php include ('base/head.php') ?>

<?php include ('base/header.php')?>

<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="products section">

    <div class="products__container container grid">

        <div class="products__info">
            <div class="products__info-title">
                <img src="<?= $product['img_path'] ?>" class="products__info-img">
            </div>
        </div>

        <form method="post" action="" id="products__form">

            <div class="products__data">

                <input type="hidden" name="name" value="<?= $product['name'] ?>">

                <h1 class="products__data-name"><?= $product['name'] ?></h1>

                <input type="hidden" name="price"value="<?= $prices[0]['price']?>">

                <h2 class="products__data-price"><?php echo  number_format($prices[0]['price'],2) ." €"?></h2>
                <h3 class="products__data-description"><?= $product['details'] ?></h3>

                <ul class="products__data-preferences">
                    <li>
                        
                    <?php
                        if ($product['category_id']== 2){
                    ?>
                        <span class="products__data-preferencesTaille">Taille (en cm) :</span>
                            <label>
                                <select name="optionSelect" class="products__data-preferencesTailleOption" >
                                    <?php
                                        foreach($size as $sizes ){
                                            if($sizes['category_id'] == 2){         
                                    ?>
                                    <option value="<?= $sizes['id'] ?>"><?= $sizes['opt'] ?></option>
                                    <?php
                                     }
                                    }
                                    ?>
                                </select>
                            </label>
                            <?php
                            } elseif($product['category_id']== 3){
                            ?>
                          <span class="products__data-preferencesTaille">Taille (en cl) :</span>
                            <label>
                                <select name="optionSelect" class="products__data-preferencesTailleOption">
                                <?php
                                        foreach($size as $sizes ){
                                            if($sizes['category_id'] == 3){         
                                    ?>
                                    <option value="<?= $sizes['id'] ?>"><?= $sizes['opt'] ?></option> 
                                    <?php
                                     }
                                    }
                                    ?>
                            </select>
                            </label>
                            <?php
                                } elseif($product['category_id'] == 4){
                            ?>
                            <span class="products__data-preferencesColor">Robe :</span>
                            <label>
                                <select name="optionSelect" class="products__data-preferencesColorOption">
                                <?php
                                        foreach($size as $sizes ){
                                            if($sizes['category_id'] == 4){       
                                    ?>
                                    <option value="<?= $sizes['id'] ?>"><?= $sizes['opt'] ?></option>
                                    <?php
                                     }
                                    }
                                    ?>
                                </select>
                            </label>
                            <?php
                            } elseif($product['category_id'] == 6){
                            ?>
                            <span class="products__data-preferencesParfum">Parfum :</span>
                            <label>
                                <select name="optionSelect" class="products__data-preferencesParfumOption">
                                <?php
                                        foreach($size as $sizes ){
                                            if($sizes['category_id'] == 6){       
                                    ?>
                                    <option value="<?= $sizes['id'] ?>"><?= $sizes['opt'] ?></option>
                                    <?php
                                     }
                                    }
                                    ?>
                                </select>
                            </label>
                            <?php
                            }
                            ?>

                    </li>

                    <li>

                        <span class="products__data-preferencesQuantity">Quantité :</span>
                        <label>
                            <select name="quantity" class="products__data-preferencesQuantityOption">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </label>

                    </li>

                </ul>

            </div>

            <div class="products__button">
                <div class="button">
                    <input type="hidden" name="id" value ="<?=$id?>">
                    <input type ="submit" name="ajoute" class="button__title button__slide-effect" value="Ajouter au panier">
                </div>
                <div class="button">
                    <a href="menu.php" class="button__title button__slide-effect">Retour au menu</a>
                </div>

            </form>

            </div>

</section>
<script>
    let prices = <?php echo json_encode($prices); ?>// ne pas enlever sinon les option ne fonctionneront plus
</script>

<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>