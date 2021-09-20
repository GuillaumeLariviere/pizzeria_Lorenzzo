<?php
session_start();
require_once "models/products.models.php";
require_once "models/category.model.php";
    require_once("dbcontroller.php");// lance la connexion a la base de donnée;
    $db_handle= new DBcontroller();//lance la connexion a la base de donnée;
    $categories = $db_handle->runQuery("SELECT * FROM category"); //va rechercher tout ce que contient category présente dans la base de donnée
    $products= $db_handle->runQuery("SELECT * FROM produit");//va chercher tout ce que contient présente dans la base de donnée
    $suggestion = $db_handle->runQuery("SELECT * FROM suggestion");
?>

<?php include ('base/head.php') ?>

<?php include ('base/header.php')?>

<main class="menu" id="menu">

    <section class="hero">
    
        <img src="assets/img/home1.jpg" alt="" class="hero__img">
    
    </section>

    <section class="menu_section section">

        <h1 class="menu__data-title">Vous avez faim ?</h1>

        <p class="menu__data-subtitle">Faites votre choix</p>

        <h2 class="section__title menu__category">Nos Suggestions</h2>
        <div class="menu__container container swiper__container swiper-container">

            <div class="swiper-wrapper">
               

<?php 
        foreach($suggestion as $suggest){
            $filtered_SuggestProducts = array_filter($products, static function($suggestProduit) use ($suggest){
                if($suggestProduit['id'] === $suggest['produit_id']){
                    return $suggestProduit;
                }
            });
        
            foreach($filtered_SuggestProducts as $suggestProd){
    ?>          <div class="menu__card swiper-slide">
                    <div onclick = "window.location='produits.php?id=<?= $suggestProd['id'] ?>'">

                        <img src="<?= $suggestProd['img_path'] ?>" alt="" class="menu__img"> <!-- récupère la colone ,img_path, dans la table produit present dans la BA qui contient la source de l'image ,le chemin -->

                            <div class="menu__data">
                                <h2 class="menu__data-titleProduct"><?= $suggestProd['name'] ?></h2><!-- récupère la colone ,name, de la table produit -->
                            </div>

                    </div>

                </div>
                <?php
    }
}?>
            </div>

        </div>

            <?php
                foreach($categories as $category){ // parcour chaque element dans category pour exécuter ce qui suit pour chacune d'elle
                        $filteredProducts = array_filter($products, static function($item) use($category){

                            if($item['category_id'] === $category['id']){
                                return $item; // item filtre les produits qui ont pour category_id l'ID de la category
                            }

                });
            ?>

                    <h2 class="section__title menu__category"><?=$category['name'] ?></h2> <!-- place le 'name' présent dans category -->

                    <div class="menu__container container swiper__container swiper-container">

                            <div class="swiper-wrapper">

                            <?php foreach($filteredProducts as $produit){ // parcour pour chaque Produit filtrer précédemment ?>

                                <div class="menu__card swiper-slide">

                                    <div onclick = "window.location='produits.php?id=<?= $produit['id'] ?>'">

                                        <img src="<?= $produit['img_path'] ?>" alt="" class="menu__img"> <!-- récupère la colone ,img_path, dans la table produit present dans la BA qui contient la source de l'image ,le chemin -->

                                        <div class="menu__data">
                                            <h2 class="menu__data-titleProduct"><?= $produit['name'] ?></h2><!-- récupère la colone ,name, de la table produit -->
                                        </div>

                                    </div>

                                </div>

                    <?php
                            } // une fois ici on a parcouru chaque category, récupérer le nom de la category, pour ensuite intégrer chaque produit qui avait pour category_id l'id de la category, affin d'avoir le menu.
                    ?>

                            </div>

                    </div>

            <?php
                }
            ?>
    </section>
    
    <section class="recap__section section">

        <h1 class="recap__data-title">Du coup ? <br>On mange quoi ?</h1>

        <div class="recap__data-container container grid">

        <?php
            if(isset($_SESSION["Panier_item"])){
            $quantityTotal = 0;
            $PrxTotal = 0;

            foreach($_SESSION["Panier_item"]as $item){
            $item_prix = $item["quantity"]*$item["price"];
        ?>

            <div class="recap__products">
                <div class="recap__products-title">
                    <h1 class="recap__products-title"><?php echo $item["name"]." ".$item['optionSelect']?> (x <?php echo $item["quantity"]; ?>)</h1>
                </div>
                <div class="recap__products-price">
                    <h2 class="recap__products-price"><?php echo $item_prix . " €"; ?></h2>
                </div>
                
            </div>

                <?php
                $quantityTotal += $item["quantity"];
                $PrxTotal += ($item["price"]*$item["quantity"]);
                $livraison = 3.50;
                    if($PrxTotal >20){
                        $livraison = 0 ;
                    }
                }
                ?>

            <div class="recap__products-cart">
                <div class="recap__products-cartTitle">
                    <h2 class="section__title">Récapitulatif</h2>
                </div>

                <div class="recap__products-cartTotal">
                    <h2 class="section__title">Sous-total : <b><?php echo  number_format($PrxTotal,2) . " €"; ?></b></h2>
                    <h2 class="section__title">Livraison : <b><?php echo number_format($livraison,2) . " €"; ?></b></h2>
                    <br>
                    <h2 class="section__title">Total : <b><?php echo number_format(($PrxTotal +$livraison),2) . " €"; ?></b></h2>
                </div>
            </div>

            <div class="recap__products-button">
                <div class="button">
                    <a href="panier.php" class="button__title button__slide-effect">Accéder au panier</a>
                </div>
            </div>

            <?php
                }
                else {
            ?>

            <div class="recap__products-cartEmpty">
                <h1 class="recap__products-cartEmptyTitle">Car Votre Panier est vide</h1>
            </div>

            <?php
                }
            ?>

        </div>

    </section>

</main>

<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>