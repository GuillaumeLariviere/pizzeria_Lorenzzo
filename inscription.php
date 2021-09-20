<?php include ('panierController.php') ?>

<?php include ('base/head.php') ?>

<?php include ('base/header.php')?>

<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="subscribe section">

    <div class="subscribe__container container grid">

        <h1 class="subscribe__title">Ravi de vous rencontrer !</h1>

        <form action="formulaire-inscription.php" method="post" id="contact_form">

            <div class="subscribe__form-firstName">
                <label for="first_name">
                    <input type="text" placeholder="Votre prénom" name="first_name" required>
                </label>
            </div>

            <div class="subscribe__form-lastName">
                <label for="last_name">
                <input type="text" placeholder="Votre nom" name="last_name" required>
                </label>
            </div>

            <div class="subscribe__form-address">
                <label for="address">
                <input type="text" placeholder="Votre adresse de livraison" name="address" required>
                </label>
            </div>

            <div class="subscribe__form-cptAddress">
                <label for="cpt_address">
                <input type="text" placeholder="Complément adresse" name="cpt_address">
                </label>
            </div>

            <div class="subscribe__form-postCode">
                <label for="post_code">
                <input type="text" id="post_code" placeholder="Votre code postal" name="post_code" required>
                </label>
            </div>

            <div class="subscribe__form-city">
                <label for="city">
                <input type="text" id="city" placeholder="Votre ville" name="city" required>
                </label>
            </div>

            <ul>
                <li data-vicopo="#city, #post_code" data-vicopo-click='{"#post_code": "code", "#city": "ville"}'>
                    <strong data-vicopo-code-postal></strong>
                    <span data-vicopo-ville></span>
                </li>
            </ul>

            <div class="subscribe__form-phone">
                <label for="phone">
                <input type="tel" placeholder="Votre numéro de téléphone" name="phone" required>
                </label>
            </div>

            <div class="subscribe__form-email">
                <label for="email">
                <input name="email" type="text" id="email" placeholder="Votre email" required>
                </label>
            </div>

            <div class="subscribe__form-confEmail">
                <label for="conf-email">
                <input name="emailConfirm" type="text" id="confemail" onblur="confirmEmail()" placeholder="Confirmez votre email" required>
                </label>
            </div>

            <div class="subscribe__form-password">
                <label for="password">
                <input type="password" id="password" placeholder="Votre mot de passe" name="pass" required>
                </label>
            </div>

            <div class="subscribe__form-confPassword">
                <label for="conf_password">
                <input type="password" id="confirm_password" placeholder="Confirmez votre mot de passe" name="conf_mdp" required>
                </label>
            </div>

            <div class="button">
                <input type="submit" class="button__title button__slide-effect" value="S'inscrire"/>
            </div>

        </form>

    </div>

</section>

<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>