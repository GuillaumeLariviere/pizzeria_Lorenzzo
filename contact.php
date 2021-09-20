<?php include ('panierController.php') ?>

<?php include ('base/head.php') ?>

<?php include ('base/header.php')?>

<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="form__contact section">

    <div class="form__container container grid">

        <h1 class="form__contact-title">Dites nous tout !</h1>

        <form action="formulaire-contact.php" method="POST">

            <div class="form__contact-name">
                <label for="first_name">
                    <input type="text" placeholder="Votre prénom" name="first_name" required>
                </label>
            </div>

            <div class="form__contact-email">
                <label for="email">
                    <input type="email" placeholder="Votre email" name="email" required>
                </label>
            </div>

            <div class="form__contact-phone">
                <label for="phone">
                    <input type="text" placeholder="Votre numéro de téléphone" name="phone" required>
                </label>
            </div>

            <div class="form__contact-subject">
                <label for="subject">
                    <select name="subject" id="subject_input">
                        <option disabled hidden selected>Selectionnez l'objet de votre message</option>
                        <option>Je souhaite avoir des informtions sur les pizzas</option>
                        <option>J'ai un soucis avec ma commande</option>
                        <option>Je n'arrive pas à passer commande</option>
                        <option>Je veux juste faire blabla :)</option>
                    </select>
                </label>
            </div>

            <div class="form__contact-message">
                <label for="message">
                    <textarea name="message" placeholder="Je suis toute ouïe" id="message_input" cols="30" rows="5" required></textarea>
                </label>
            </div>

            <div class="button">
                <input type="submit" value="Envoyer" class="button__title button__slide-effect" />
            </div>

        </form>

    </div>

</section>

<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>