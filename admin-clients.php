<?php include('base/head.php') ?>

<?php include ('base/header-admin.php') ?>

<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="user section">

    <div class="container grid">

        <div class="user__container container grid">

            <div class="user__info">
                <h1 class="user__info-title">Vos clients qui vous adore !</h1>
            </div>

            <div class="user__data">
                <h3 class="user__data-title">statut : admin</h3>
                <h3 class="user__data-title">Nombre de commande : ##</h3>
                <h3 class="user__data-title">Nombre de message (non-lu) : ##</h3>
            </div>

        </div>

        <div class="user__button">
            <div class="button">
                <a href="admin.php" class="button__title button__slide-effect">Retour Acceuil</a>
            </div>
        </div>

    </div>

</section>

<section>

    <div class="container grid">

        <div class="user__table-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="user__table-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Doe</td>
                    <td>John</td>
                    <td>john@doe.fr</td>
                    <td>06 06 06 06 06</td>
                    <td>
                        21 rue de la pizza <br>75001, PARIS
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Gates</td>
                    <td>Bill</td>
                    <td>bill@microsoft.com</td>
                    <td>06 06 06 06 06</td>
                    <td>
                        21 rue du pc <br>13003, MARSEILLE
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Jobs</td>
                    <td>Steve</td>
                    <td>steve@apple.com</td>
                    <td>06 06 06 06 06</td>
                    <td>
                        21 rue de la pomme <br>69002, LYON
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Stark</td>
                    <td>Tony</td>
                    <td>tony@ironman.com</td>
                    <td>06 06 06 06 06</td>
                    <td>
                        21 rue des Avengers <br>59001, LILLE
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Doe</td>
                    <td>John</td>
                    <td>john@doe.fr</td>
                    <td>06 06 06 06 06</td>
                    <td>
                        21 rue de la pizza <br>75001, PARIS
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Gates</td>
                    <td>Bill</td>
                    <td>bill@microsoft.com</td>
                    <td>06 06 06 06 06</td>
                    <td>
                        21 rue du pc <br>13003, MARSEILLE
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Jobs</td>
                    <td>Steve</td>
                    <td>steve@apple.com</td>
                    <td>06 06 06 06 06</td>
                    <td>
                        21 rue de la pomme <br>69002, LYON
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Stark</td>
                    <td>Tony</td>
                    <td>tony@ironman.com</td>
                    <td>06 06 06 06 06</td>
                    <td>
                        21 rue des Avengers <br>59001, LILLE
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

</section>

<?php include('base/footer.php') ?>

<?php include ('base/script.php') ?>