<?php include ('panierController.php') ?>
<?php require_once ('dbcontroller.php');
$db_handle = new DBcontroller(); ?>
<?php include ('base/head.php') ?>

<?php include ('base/header.php')?>
<?php
if (isset($_POST['new_first_name']) && isset($_POST['new_last_name']) && isset($_POST['new_address']) && isset($_POST['new_post_code']) && isset($_POST['new_city'])){
    $id =$_SESSION['userInfo']['id'];
    $first_name=$_POST['new_first_name'];
    $last_name=$_POST['new_last_name'];
    $address=$_POST['new_address'];
    $post_code=$_POST['new_post_code'];
    $city=$_POST['new_city'];
    $sql ="UPDATE user SET first_name='$first_name', last_name='$last_name', address='$address', post_code='$post_code', city='$city'  WHERE id =$id";
    $stmt = $db_handle->connectDB()->prepare($sql);
    $stmt -> execute();

}
?>
<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="editAccount section">

    <div class="editAccount__container container grid">

        <h1 class="editAccount__title">Quoi de neuf ?</h1>

        <form action="#" method="post" id="editAccount__form">

            <div class="editAccount__form-firstName">
                <label for="first_name">
                    <input type="text" placeholder="Votre prenom" name="new_first_name" id="name_input" required>
                </label>
            </div>

            <div class="editAccount__form-lastName">
                <label for="last_name">
                    <input type="text" placeholder="Votre nom" name="new_last_name" id="name_input" required>
                </label>
            </div>

            <div class="editAccount__form-address">
                <label for="address">
                    <input type="text" placeholder="Votre adresse de livraison" name="new_address" id="name_input" required>
                </label>
            </div>

            <div class="editAccount__form-cptAdresse">
                <label for="cpt_address">
                    <input type="text" placeholder="Complément adresse" name="new_cpt_address" id="name_input">
                </label>
            </div>

            <div class="editAccount__form-postCode">
                <label for="post_code">
                    <input type="text" placeholder="Votre code postal" name="new_post_code" id="name_input" required>
                </label>
            </div>

            <div class="editAccount__form-city">
                <label for="city">
                    <input type="text" placeholder="Votre ville" name="new_city" id="name_input" required>
                </label>
            </div>

    </div>

    <div class="editAccount__form-button">
        <div class="button">
            <input type="submit" value="Modifier mes informations" class="button__title button__slide-effect">
        </div>
        <div class="button">
            <a href="mon-compte.php" class="button__title button__slide-effect">Retour à mon compte</a>
        </div>
    </div>

        </form>

</section>

<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>