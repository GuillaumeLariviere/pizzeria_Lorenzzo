<?php include('base/head.php') ?>

<?php include ('base/header-admin.php') ?>

<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="order section">

    <div class="container grid">

        <div class="order__container container grid">

            <div class="order__info">
                <h1 class="order__info-title">Au boulot !</h1>
            </div>

            <div class="order__data">
                <h3 class="order__data-title">statut : admin</h3>
                <h3 class="order__data-title">Nombre de commande : ##</h3>
                <h3 class="order__data-title">Nombre de message (non-lu) : ##</h3>
            </div>

        </div>

        <div class="order__button">
            <div class="button">
                <a href="admin.php" class="button__title button__slide-effect">Retour Acceuil</a>
            </div>
        </div>

    </div>

</section>

<section>

    <div class="container grid" id="suggestions">

        <h2 class="order__title section__title">Les commandes en préparations / livraisons</h2>

        <div class="order__table-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th>Numéro de commande</th>
                    <th>Nom du client</th>
                    <th>Details</th>
                    <th>Prix total</th>
                    <th>Statut</th>
                    <th>Changer statut</th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="order__table-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td>123456-250821</td>
                    <td>John Doe</td>
                    <td>- La Mozza (x2) <br>- Carlsberg (x1) <br>- Coca-Cola (x 1)</td>
                    <td>27.00</td>
                    <td>en livraison</td>
                    <td class="order__table-icon">
                        <i class="uil uil-clock"></i> <i class="uil uil-pizza-slice"></i> <i class="uil uil-truck"></i>
                        <br> <i class="uil uil-check"></i> <i class="uil uil-multiply"></i>
                    </td>
                </tr>
                <tr>
                    <td>789012-250821</td>
                    <td>Bill Gates</td>
                    <td>- La pepperoni (x1) <br>- Vin (rosé) (x1)</td>
                    <td>19.00</td>
                    <td>en préparation</td>
                    <td class="order__table-icon">
                        <i class="uil uil-clock"></i> <i class="uil uil-pizza-slice"></i> <i class="uil uil-truck"></i>
                        <br> <i class="uil uil-check"></i> <i class="uil uil-multiply"></i>
                    </td>
                </tr>
                <tr>
                    <td>345678-250821</td>
                    <td>Steve Jobs</td>
                    <td>- La pizza enfant (x1) <br>-La 4 formages (x1) <br>-La poulette (x1) <br>- Tiramisu (x1)
                        <br>- Glace (vanille-choco) (x1) <br>- Coca-Cola (x1) <br>- Carlsberg (x1) <br>- Vin (rosé) (x1)</td>
                    <td>19.00</td>
                    <td>en attente</td>
                    <td class="order__table-icon">
                        <i class="uil uil-clock"></i> <i class="uil uil-pizza-slice"></i> <i class="uil uil-truck"></i>
                        <br> <i class="uil uil-check"></i> <i class="uil uil-multiply"></i>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="container grid" id="suggestions">

        <h2 class="order__title section__title">Les commandes terminées</h2>

        <div class="order__table-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th>Numéro de commande</th>
                    <th>Nom du client</th>
                    <th>Details</th>
                    <th>Prix total</th>
                    <th>Statut</th>
                    <th>Changer statut</th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="order__table-content">

            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td>123456-240821</td>
                    <td>John Doe</td>
                    <td>- La Mozza (x2) <br>- Carlsberg (x1) <br>- Coca-Cola (x 1)</td>
                    <td>27.00</td>
                    <td>livré</td>
                    <td class="order__table-icon">
                        <i class="uil uil-clock"></i> <i class="uil uil-pizza-slice"></i> <i class="uil uil-truck"></i>
                        <br> <i class="uil uil-check"></i> <i class="uil uil-multiply"></i>
                    </td>
                </tr>
                <tr>
                    <td>789012-240821</td>
                    <td>Bill Gates</td>
                    <td>- La pepperoni (x1) <br>- Vin (rosé) (x1)</td>
                    <td>19.00</td>
                    <td>annulé</td>
                    <td class="order__table-icon">
                        <i class="uil uil-clock"></i> <i class="uil uil-pizza-slice"></i> <i class="uil uil-truck"></i>
                        <br> <i class="uil uil-check"></i> <i class="uil uil-multiply"></i>
                    </td>
                </tr>
                <tr>
                    <td>345678-240821</td>
                    <td>Steve Jobs</td>
                    <td>- La pizza enfant (x1) <br>-La 4 formages (x1) <br>-La poulette (x1) <br>- Tiramisu (x1)
                        <br>- Glace (vanille-choco) (x1) <br>- Coca-Cola (x1) <br>- Carlsberg (x1) <br>- Vin (rosé) (x1)</td>
                    <td>19.00</td>
                    <td>livré</td>
                    <td class="order__table-icon">
                        <i class="uil uil-clock"></i> <i class="uil uil-pizza-slice"></i> <i class="uil uil-truck"></i>
                        <br> <i class="uil uil-check"></i> <i class="uil uil-multiply"></i>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>

    </div>

</section>

<?php include('base/footer.php') ?>

<?php include ('base/script.php') ?>