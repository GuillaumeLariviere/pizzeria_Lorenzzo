<?php include ('panierController.php') ?>

<?php include ('base/head.php') ?>

<?php include ('base/header.php')?>

<main class="home" id="home">

    <section class="hero">

        <img src="assets/img/home1.jpg" alt="" class="hero__img">

    </section>

    <section class="cart section">

        <?php
            if(isset($_SESSION["Panier_item"])){
                $quantityTotal = 0;
                $PrxTotal = 0;
                $Prht = 0;
                $ht = 0;
                $prttc = 0;

                foreach($_SESSION["Panier_item"]as $item){
                    $item_prix = $item["quantity"]*$item["price"];
        ?>

            <div class="cart__container container grid">

                <div class="cart__img">
                    <div class="cart__img-overlay">
                        <img src="<?php echo $item["img_path"];?>" alt="" class="cart__img-one">
                    </div>
                </div>

                <div class="cart__data">

                    <h1 class="cart__product-name"><?php echo $item["name"]." ".$item['optionSelect']?></h1>
                    <h2 class="cart__product-price"><?php echo number_format($item_prix,2) . " €"; ?></h2>

                    <ul class="cart__preferences">
                        <li>
                            <span class="cart__preferences-list">Quantité :</span>
                            <a href="panier.php?action=moin&id=<?= $item['id'].$item['optionSelect'] ?>"><i class="uil uil-minus"></i></a>
                            <span class="cart__preferences-listName"><?php echo $item["quantity"]; ?></span> <!-- recupere la quantité choicie qui a pour nom quantity -->
                            <a href="panier.php?action=plus&id=<?= $item['id'].$item['optionSelect'] ?>"><i class="uil uil-plus"></i></a>
                           
                        </li>
                    </ul>

                    <span class="cart__product-priceUnit">Prix unitaire :<?php echo  number_format($item['price'],2) . " €"; ?></b></span>

                </div>

            </div>

            <?php
                $quantityTotal += $item["quantity"];
                $PrxTotal += ($item["price"]*$item["quantity"]);
                $livraison = 3.50;
                if($PrxTotal >20){
                    $livraison = 0 ;
                }
                ?>
 
         
            <?php
                
             }
            ?>

             <div class="cart__recap">
                    <div class="cart__recap-title">
                        <h2 class="section__title">Récapitulatif</h2>
                    </div>

                    <div class="cart__recap-total">
                        <h2 class="section__title">Total (hors taxes) : <b><?php echo  number_format(($PrxTotal  /1.200),2) . " €"; ?></b></h2>
                        <h2 class="section__title">Sous-total : <b><?php echo  number_format(($PrxTotal),2) . " €"; ?></b></h2>
                        <h2 class="section__title">Livraison : <b><?php echo number_format($livraison,2) . " €"; ?></b></h2>
                        <h2 class="section__title">A regler: <b><?php echo number_format(($PrxTotal +$livraison),2) . " €"; ?></b></h2>
                        <!-- <h2 class="section__title">TVA : <b><?php echo number_format($prixttc,2) . " €"; ?></b></h2> -->
                        <br>
                       
                    </div>
             </div>

            <div class="cart__button">
                <div class="button">
                    <a href="validation-panier.php" class="button__title button__slide-effect">Valider mon panier</a>
                </div>
                <div class="button">
                    <a href="panier.php?action=vider" class="button__title cart__button-slideEffect">Vider le panier</a>
                </div>
                <div class="button">
                    <a href="menu.php" class="button__title button__slide-effect">Retour au menu</a>
                </div>
            </div>

            <?php
            }
            else {
            ?>

            <div class="cart__data-empty">
                <h1 class="cart__product-name">Votre Panier est vide</h1>
            </div>

            <div class="cart__button">
                <div class="button">
                    <a href="menu.php" class="button__title button__slide-effect">Retour au menu</a>
                </div>
            </div>

            <?php
            }
            ?>


    </section>

</main>

<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>