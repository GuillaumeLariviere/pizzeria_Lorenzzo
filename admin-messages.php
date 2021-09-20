<?php
    $bdd = new PDO('mysql:host=localhost;dbname=lorenzzobd_dieug;charset=utf8', 'root', 'root');
    
    $reponse = $bdd -> query('SELECT * FROM `message`');

    while ($donnees = $reponse -> fetch()) {
?>

<?php include('base/head.php') ?>

<?php include ('base/header-admin.php') ?>

<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="message section">

    <div class="container grid">

        <div class="message__container container grid">

            <div class="message__info">
                <h1 class="message__info-title">Vous avez un mess@ge !</h1>
            </div>

            <div class="message__data">
                <h3 class="message__data-title">statut : admin</h3>
                <h3 class="message__data-title">Nombre de commande : ##</h3>
                <h3 class="message__data-title">Nombre de message (non-lu) : ##</h3>
            </div>

        </div>

        <div class="message__button">
            <div class="button">
                <a href="admin.php" class="button__title button__slide-effect">Retour Acceuil</a>
            </div>
        </div>

    </div>

</section>

<section>

    <div class="container grid">

        <div class="message__table-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
                </thead>
            </table>
        </div>

        <?php
            while ($messages = $message -> fetch()) {
        ?>

        <div class="message__table-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td><?php echo $donnees['Prenom']; ?></td>
                    <td><?php echo $donnees['Telephone']; ?></td>
                    <td><?php echo $donnees['Mail']; ?></td>
                    <td><?php echo $donnees['Message']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <?php
        }
    }
        ?>

    </div>

</section>

<?php include('base/footer.php') ?>

<?php include ('base/script.php') ?>