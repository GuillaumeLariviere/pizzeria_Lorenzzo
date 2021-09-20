<?php include ('panierController.php') ?>

<?php include ('base/head.php') ?>

<?php include ('base/header.php')?>

    <main class="home" id="home">

        <section class="hero">

            <img src="assets/img/home1.jpg" alt="" class="hero__img">

        </section>

        <section class="validation section">

            <h1 class="validation__title">C'est bientôt l'heure de manger !</h1>

            <?php
            if(isset($_SESSION["Panier_item"])){
                $quantityTotal = 0;
                $PrxTotal = 0;

                foreach($_SESSION["Panier_item"]as $item){
                    $item_prix = $item["quantity"]*$item["price"];
                    ?>

                    <div class="validation__container container grid">

                        <div class="validation__img">
                            <div class="validation__img-overlay">
                                <img src="<?php echo $item["img_path"];?>" alt="" class="validation__img-one">
                            </div>
                        </div>

                        <div class="validation__data">

                            <h1 class="validation__data-product"><?php echo $item["name"]; ?> (x<?php echo $item["quantity"]; ?>)</h1>
                            <h1 class="validation__data-price"><?php echo number_format($item_prix,2) . " €"; ?></h1>

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
                    
                    <div class="validation__adresse-information">
                        
                        <div class="validation__address-container">

                            <div class="validation__address-title">
                                <h2 class="section__title">Adresse de livraison & paiement</h2>
                            </div>

                            <div class="validation__address">

                                <div class="validation__address-content">
                                    <h2 class="validation__address-street"><b>31 rue de la pizza</b></h2>
                                    <span class="validation__address-city">59960, Neuville en Ferrain</span>
                                    <span class="validation__address-phone">0606060606</span>
                                </div>

                                <div class="validation__paiement-form">

                                    <form action="#" method="POST" class="validation__form">

                                        <div class="form__validation-paiementCard">
                                            <label for="card">
                                                <select name="card" id="card_input">
                                                    <option disabled hidden selected>Type de carte</option>
                                                    <option>Visa</option>
                                                    <option>Mastercard</option>
                                                    <option>American Express</option>
                                                </select>
                                            </label>
                                        </div>

                                        <div class="form__validation-paiementCardNumber">
                                            <label for="card_number">
                                                <input type="text" placeholder="Numéro de carte bleue" name="card_number" required>
                                            </label>
                                        </div>

                                        <div class="form__validation-paiementDate">
                                            <label for="card_date">
                                                <input type="text" placeholder="Date d'expiration" name="card_date" required>
                                            </label>
                                        </div>

                                        <div class="form__validation-paiementExp">
                                            <label for="card_exp">
                                                <input type="text" placeholder="Cryptogramme" name="card_exp" required>
                                            </label>
                                        </div>

                                </div>

                            </div>

                            <div class="validation__button">
                                <div class="button">
                                    <a href="modifier-mon-compte.php" class="button__title button__slide-effect">Modifier mon adresse</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                <div class="validation__recap">
                    <div class="validation__recap-title">
                        <h2 class="section__title">Récapitulatif</h2>
                    </div>

                    <div class="validation__recap-total">
                        <h2 class="section__title">Sous-total : <b><?php echo  number_format($PrxTotal,2) . " €"; ?></b></h2>
                        <h2 class="section__title">Livraison : <b><?php echo number_format($livraison,2) . " €"; ?></b></h2>
                        <br>
                        <h2 class="section__title">Total : <b><?php echo number_format(($PrxTotal +$livraison),2) . " €"; ?></b></h2>
                    </div>
                </div>

                <div class="validation__button">

                        <div class="button">
                            <input type="submit" value="Payer" class="button__title button__slide-effect" />
                        </div>

                        </form>
                </div>

                <?php
            }
            else {
                ?>

                <div class="cart__data-empty">
                    <h1 class="cart__product-name">Comment tu es arrivé ici toi ??</h1>
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