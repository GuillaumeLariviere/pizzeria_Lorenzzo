<?php include('base/head.php') ?>
<?php include ('panierController.php') ?>
<?php
require_once ('dbcontroller.php');
$db_handle = new DBcontroller();
?>
<?php include ('base/header-admin.php') ?>
<?php
    $admin = $_SESSION['admin'];
    $id = $_GET['id'];
    $sizes = $db_handle->runQuery("SELECT * FROM option_product WHERE category_id = $id");

?>
<?php
    if(isset($_POST['Ajouter'])){
        if (isset($_FILES['upload']) && $_FILES['upload']['error']== 0){
            $infoImg = pathinfo($_FILES['upload']['name']);
            $ext = $infoImg['extension'];
            $ext_auto = array("jpg", "jpeg", "gif", "png");
            $imgName = "produit" . (microtime(true) * 10000)."." . $ext;
                if(in_array($ext,$ext_auto)){
                    move_uploaded_file($_FILES['upload']['tmp_name'], 'assets/upload/'.$imgName);
                }
                $_POST['img_path'] ="assets/upload/$imgName";
        } 
    }
?>
<?php
    if(!empty($_POST)){
        $forPrices = [];
        $forProducts = [];
        foreach($_POST as $k => $v){
            if(is_int($k)){
                $forPrices[$k] = $v;
            }
            elseif(!is_int($k) && $k != 'Ajouter'){
                $forProducts[$k] = $v;
            }
        }
        $name = $forProducts["productName"];
        $details = $forProducts["name"];
        $img_path = $forProducts["img_path"];
        $sql ="INSERT INTO produit (`name`, `details`, `img_path`, `category_id`) VALUE (?,?,?,?) ";
        $db = $db_handle->connectDB();
        $stmt= $db->prepare($sql);
        $stmt->execute([$name, $details, $img_path, $id]);
        foreach($forPrices as $k => $v){
            $optionId = $k;
            $price = $v;
            $productId = $db->lastInsertId();
            $sql ="INSERT INTO price (`price`, `option_id`, `produit_id`) VALUE (?,?,?) ";
            $stmt= $db_handle->connectDB()->prepare($sql);
            $stmt->execute([$price, $optionId, $productId]);
        }
        $_SESSION['newProduct']= $_POST;
        header("Location: admin-ajouter.php?id=$id");
    }
?>
<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<section class="section">

    <div class="container grid">

        <div class="add__container container grid">

            <div class="add__info">
                <h1 class="add__info-title">Il y a de la nouveauté ?</h1>
            </div>

            <div class="add__data">
                <h3 class="add__data-title">statut : <?= $admin['poste'] ?></h3>
                <h3 class="add__data-title">Nombre de commande : ##</h3>
                <h3 class="add__data-title">Nombre de message (non-lu) : ##</h3>
            </div>

        </div>

        <div class="add__button">
            <div class="button">
                <a href="admin.php" class="button__title button__slide-effect">Retour Acceuil</a>
            </div>
        </div>

    </div>

</section>

<section class="add section">

    <div class="container grid">

        <h1 class="add__title">Quoi de neuf ?</h1>

        <form action="" method="post" id="contact_form" enctype="multipart/form-data">

            <div class="add__form-name">
                <label for="name">
                <input type="text" placeholder="Nom du produit" name="productName" id="name_input" required>
                </label>
            </div>

            <div class="add__form-description">
                <label for="name">
                <input type="text" placeholder="Description du produit" name="name" id="name_input" required>
                </label>
            </div>

            <div class="add__form-price">
                <?php
                    foreach($sizes as $size){
                     ?>
                <label for="name">
               <?= $size['opt'] ?><input type="text" placeholder="Prix" name="<?= $size['id'] ?>" id="name_input" required>
                </label>
               <?php
                    }
                ?>
           </div>

            <div class="add__form-upload button">
                <span class="add__form-uploadLabel button__slide-effect">Importer une image</span>
                <input type="file" name="upload" class="add__form-uploadInput" placeholder="Upload File">
            </div>

    </div>

        <div class="add__form-button button">
            <input type="submit" class="button__title button__slide-effect" value="Ajouter" name="Ajouter"/>
        </div>

        </form>

</section>

<?php include('base/footer.php') ?>

<?php include ('base/script.php') ?>