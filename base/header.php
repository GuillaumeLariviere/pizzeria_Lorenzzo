<header class="header nav__menu-page" id="header">
    <nav class="nav container">
        <a href="index.php" class="nav__logo">LORENZZO'S PIZZA</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li>
                    <a href="menu.php" class="nav__link">Le menu</a>
                </li>
                <li>
                    <a href="contact.php" class="nav__link">Nous contacter</a>
                </li>
                <li>
                    <a href="inscription.php" class="nav__link">Inscription</a>
                    |
                    <a href="connexion.php" class="nav__link">Connexion</a>
                    <!--
                    <a href="" class="nav__link">Mon compte</a>
                    |
                    <a href="" class="nav__link">Déconnexion</a>
                    -->
                </li>
            </ul>

            <i class="uil uil-times nav__close" id="nav-close"></i>
        </div>

        <?php
        $quantityTotal = 0;
        if(isset($_SESSION["Panier_item"])){
            foreach($_SESSION["Panier_item"]as $item){
                $quantityTotal += $item["quantity"];
            }
        }
        ?>

        <a href="panier.php" class="nav__cart"><i class="uil uil-pizza-slice nav__logo-cart"></i><span class="nav__cart-number"><?php echo $quantityTotal; ?></span></a>

        <div class="nav__toggle" id="nav-toggle">
            <i class="uil uil-bars"></i>
        </div>
    </nav>
</header>