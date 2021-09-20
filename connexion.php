<?php include ('panierController.php') ?>
<?php require_once ('dbcontroller.php')?>
<?php include ('base/head.php') ?>
<?php include ('base/header.php')?>
<?php 
$db_handle=new DBcontroller();
if(isset($_POST['email'])){
$user = $db_handle->runQuery("SELECT id, email, pass FROM user WHERE email='" . $_POST['email'] . "'");
$admin = $db_handle->runQuery("SELECT id, email, pass FROM admin WHERE email='" . $_POST['email'] . "'");
$worker = $db_handle->runQuery("SELECT id, email, pass FROM worker WHERE email='".$_POST['email']."'");

    if (count($admin) == 1 && $admin != null) {
        $admin = $admin[0];
        if ($admin['pass'] == password_verify($_POST['pass'], $admin['pass'])) {
            $_SESSION['admin'] = $admin;
            header("Location:admin.php");
            exit;
        }
    }
    elseif(count($worker) == 1 && $worker != null){
        $worker = $worker[0];
        if ($worker['pass'] == password_verify($_POST['pass'], $worker['pass'])) {
            $_SESSION['worker'] = $worker;
            header("Location:worker.php");
            exit;
        }
    }
    elseif(count($user) == 1 && $user != null){
         $user = $user[0];
        if ($user['pass'] == password_verify($_POST['pass'], $user['pass'])){
            $_SESSION['user']=$user;
                header("Location:mon-compte.php");
                exit;
        }
        else{
            echo "Ceci n'est pas le bon mot de passe !";
            }

        }
        else{
            echo "Je ne connais pas cette email..";
        }
}

?>
<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="connexion__section section">

    <div class="connexion__container container grid">

        <h1 class="connexion__form-title">Bienvenue !</h1>

        <form action="" method="post" id="connexion_form">

            <div class="connexion__form-email">

                <label for="email">
                <input type="email" placeholder="Votre adresse email" name="email" id="mail_input" required>
                </label>

            </div>

            <div class="connexion__form-password">

                <label for="password">
                <input type="password" placeholder="Votre mot de passe" name="pass" id="mdp_input" required>
                </label>

            </div>

            <div class="button">
                <input type="submit" value="Connexion" class="button__title button__slide-effect" />
            </div>

        </form>
    
    </div>

</section>


<?php include ('base/footer.php') ?>

<?php include ('base/script.php') ?>