<?php
    require_once ('dbcontroller.php');
    $pdo = new DBController();
?>

<?php include ('base/head.php') ?>

<?php include ('base/header.php')?>

<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<?php 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $cpt_address = $_POST['cpt_address'];
    $post_code = $_POST['post_code'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $sql ="INSERT INTO `user`(`first_name`, `last_name`, `address`, `cpt_address`, `post_code`, `city`, `phone`, `email`, `pass`) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo->connectDB()->prepare($sql);
    $stmt -> execute([$first_name, $last_name, $address, $cpt_address, $post_code, $city, $phone, $email, $pass]);
?>

<section class="form__subscribe section">

    <h1 class="form__subscribe-title">Bien le bonjour <?php echo $_POST['first_name']?> !</h1>

    <div class="form__subscribe-container container grid">

        <div class="form__subscribe-data">

            <h2 class="section__title">Vous voilà devenu <br> notre client préféré !</h2>
            <p class="form__subscribe-description">C'est l'heure de passer votre première commande! <br>
                Vos identifant de connexion sont votre email (<?php echo $_POST['email']?>) et votre mot de passe.
            </p>

        </div>

        <div class="form__subscribe-img">

            <div class="form__subscribe-imgOverlay">
                <img src="assets/img/about1.jpg" alt="" class="form__subscribe-imgOne">
            </div>

            <div class="form__subscribe-imgOverlay">
                <img src="assets/img/about2.jpg" alt="" class="form__subscribe-imgTwo">
            </div>

        </div>

    </div>

    <div class="form__subscribe-button">
        <div class="button">
            <a href="connexion.php" class="button__title button__slide-effect" >Connectez vous</a>
        </div>
    </div>

</section>

<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>