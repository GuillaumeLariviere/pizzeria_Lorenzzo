<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories</title>

    <link rel="shortcut icon" href="img/favicon.jpg" type="image/ico">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/category.dev.css">
</head>

<?php
    require_once "Model/category.model.php";
    require_once "Model/product.model.php";
    
    $dsn = "mysql:host=localhost;port=3306;dbname=lorenzo_pizza_db";
    $user = "root";
    $pass = "";
    $db = new PDO(
        $dsn,
        $user,
        $pass,
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        )
    );
    $id = $_GET['id'] ?? 1;
    $stmt = $db->query("SELECT * FROM category WHERE id = $id");
    $categories = $stmt->fetchAll(PDO::FETCH_CLASS,"Category");
    if(count($categories) == 1){
        $category = $categories[0];
        //var_dump($category);
        $stmt = $db->query("SELECT * FROM product WHERE category_id = $id ORDER BY title, size");
        $products = $stmt->fetchAll(PDO::FETCH_CLASS,"Product");

    }
    else{
        header('Location: .');
    }
    
    //addToCart
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }
    if(isset($_POST['addToCart'])){
        $productId = $_POST['product_id'];
        $qtyToAdd = $_SESSION['cart'][$productId] ?? 0;
        $_SESSION['cart'][$productId] = ++$qtyToAdd;
        header('Location: '. $_SERVER['PHP_SELF']);
        
    } 
    //var_dump($_SESSION['cart']);
?>

<body>
    <div class="container-fluid">

        <header>
            <?php include_once "header.dev.php";?>
        </header>

        <main>
            <h1><?= $category->title ?></h1>
            <div>
                <?php
                    foreach($products as $product){
                ?>
                    <div>
                        <span><?= $product->title?></span>
                        <span> (<?= $product->size?>) : </span>
                        <span> <?= $product->price?>€ </span>
                        <form action="" method="post">
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <input type="submit" value="Ajouter" name="addToCart">
                        </form>
                    </div>
                <?php 
                    }
                ?>
            </div>
        </main>

        <footer>
            <?php include_once "footer.dev.php";?>
        </footer>

    </div>


</body>

</html>