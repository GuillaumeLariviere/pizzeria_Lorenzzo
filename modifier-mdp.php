<?php include ('panierController.php') ?>
<?php require_once ('dbcontroller.php');
$db_handle = new DBcontroller(); ?>
<?php include ('base/head.php') ?>

<?php include ('base/header.php')?>
<?php
    if(isset($_POST['old_pass'])){
        if($_POST['old_pass'] != password_verify($_POST['old_pass'], $_SESSION['userInfo']['pass'])){
            echo 'invalide password';
        }
        else{
            $id=$_SESSION['userInfo']['id'];
            $pass = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
            $sql ="UPDATE user SET pass='$pass' WHERE id =$id";
             $stmt = $db_handle->connectDB()->prepare($sql);
             $stmt -> execute();
             
        }
    }
?>
<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="form__password section">

    <div class="form__password-container container grid">

        <h1 class="form__password-title">Sécurité avant tout !</h1>

        <form action="" method="post" id="contact_form">

            <div class="form__password-oldPassword">
                <label for="name">
                    <input type="text" placeholder="Votre ancien mot de passe" name="old_pass" id="old_pass_input" required>
                </label>
            </div>

            <div class="form__password-newPassword">
                <label for="name">
                    <input type="text" placeholder="Votre nouveau mot de passe" name="new_pass" id="new_pass_input" required>
                </label>
            </div>

            <div class="form__password-confNewPassword">
                <label for="name">
                    <input type="text" placeholder="Confirmez votre nouveau mot de passe" name="conf_new_pass" id="conf_new_pass_input" required>
                </label>
            </div>

    </div>

    <div class="form__password-button">
        <div class="button">
            <input type="submit" value="Modifier mon mot de passe" class="button__title button__slide-effect"/>
        </div>
        <div class="button">
            <a href="mon-compte.php" class="button__title button__slide-effect">Retour à mon compte</a>
        </div>
    </div>

        </form>
</section>

<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>