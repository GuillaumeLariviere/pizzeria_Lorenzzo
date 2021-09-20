<?php include ('panierController.php') ?>

<?php include ('base/head.php') ?>

<?php include ('base/header-admin.php') ?>

    <section class="hero">

        <img src="assets/img/home1.jpg" alt="" class="hero__img">

    </section>

    <section class="message section">

        <div class="container grid">

            <div class="message__container container grid">

                <div class="message__info">
                    <h1 class="message__info-title">Quoi de neuf ?</h1>
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

        <div class="admin__subscribe-container container grid">

            <form action="formulaire-inscription.php" method="post" id="contact_form">

                <div class="admin__subscribe-formFirstName">
                    <label for="first_name">
                        <input type="text" placeholder="Votre prénom" name="first_name" required>
                    </label>
                </div>

                <div class="admin__subscribe-formLastName">
                    <label for="last_name">
                        <input type="text" placeholder="Votre nom" name="last_name" required>
                    </label>
                </div>

                <div class="admin__subscribe-formPhone">
                    <label for="phone">
                        <input type="tel" placeholder="Votre numéro de téléphone" name="phone" required>
                    </label>
                </div>

                <div class="admin__subscribe-formPassword">
                    <label for="password">
                        <input type="password" id="password" placeholder="Votre ancien mot de passe" name="pass" required>
                    </label>
                </div>

                <div class="admin__subscribe-formPassword">
                    <label for="password">
                        <input type="password" id="password" placeholder="Votre nouveau mot de passe" name="pass" required>
                    </label>
                </div>

                <div class="admin__subscribe-formConfPassword">
                    <label for="conf_password">
                        <input type="password" id="confirm_password" placeholder="Confirmez votre nouveau mot de passe" name="conf_mdp" required>
                    </label>
                </div>

                <div class="button">
                    <input type="submit" class="button__title button__slide-effect" value="Modifier vos informations"/>
                </div>

            </form>

        </div>

    </section>

<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>