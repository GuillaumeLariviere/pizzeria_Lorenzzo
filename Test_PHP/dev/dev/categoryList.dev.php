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
    $sql = "SELECT * FROM category";
    $stmt = $db->query($sql);
    $categories = $stmt->fetchAll(PDO::FETCH_CLASS, "Category");
    //var_dump($categories);
?>

<body>
    <div class="container-fluid">

        <header>
            <?php include_once "header.dev.php";?>
        </header>

        <main>
            <div class="row mt-1">
                <?php
                    foreach($categories as $category){
                ?>
                <div class="col-4">
                    
                    <div class="card card-with-bg text-white" 
                        onclick="window.location='categoryDetail.dev.php?id=<?= $category->id ?>'"
                        style="background-image:url('<?= $category->img_path ?>');">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <h3 class="card-title mt-0 "><?= $category->title ?></h3>
                                <span><?= $category->detail ?></span>
                            </div>
                        </div>
                    </div>
                    
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