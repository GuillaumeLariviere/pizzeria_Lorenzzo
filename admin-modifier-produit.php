<?php include('base/head.php') ?>
<?php
    require_once ('dbcontroller.php');
    $db_handle = new DBcontroller();
?>
<?php include ('base/header-admin.php') ?>
<?php
    $admins = $db_handle->runQuery("SELECT * FROM admin");
    $admin=$admins[0];
    $categories = $db_handle->runQuery("SELECT * FROM category");
    $products = $db_handle->runQuery("SELECT * FROM produit");
    $suggestion = $db_handle->runQuery("SELECT * FROM suggestion");
?>

<section class="hero">

    <img src="assets/img/home1.jpg" alt="" class="hero__img">

</section>

<div class="product section">

    <div class="container grid">

        <div class="product__container container grid">

            <div class="product__info">
                <h1 class="product__info-title">On mange quoi ? <br>On boit quoi ?</h1>
            </div>

            <div class="product__data">
                <h3 class="product__data-title">statut : <?= $admin['poste'] ?></h3>
                <h3 class="product__data-title">Nombre de commande : ##</h3>
                <h3 class="product__data-title">Nombre de message (non-lu) : ##</h3>
            </div>

        </div>

        <div class="product__menu">

            <div>
                <span>Accés rapide</span>
            </div>

            <div class="product__menu-button">
                <span>• › <a href="#Les Suggestions">Les Suggestions</a></span> <br>
        <?php foreach($categories as $category){
                 $category['name']=str_replace("Nos", "Les", $category['name']);
                ?><span>• › <a href="#<?= $category['name'] ?>"><?= $category['name'] ?></a></span> <br>
        <?php
        }
        ?>
            </div>

            <div class="product__button">
                <div class="button">
                    <a href="ajouter-categories.php" class="button__title button__slide-effect">Modifier catégories</a>
                </div>
                <div class="button">
                    <a href="admin.php" class="button__title button__slide-effect">Retour Acceuil</a>
                </div>
            </div>

        </div>

    </div>

<section>
    <div class="container grid" id="Les Suggestions">
        <h2 class="product__title section__title">Les suggestions</h2>

        <div class="product__table-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th><i class="uil uil-trash-alt"></i></th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="product__table-content">
        <?php
        foreach($suggestion as $suggest){
            $filtered_SuggestProducts = array_filter($products, static function($suggestProduit) use($suggest){
                if($suggestProduit['id'] === $suggest['produit_id']){
                    return $suggestProduit;
                }
            });
            foreach($filtered_SuggestProducts as $suggestProd){
                $id = $suggestProd["id"];
                $price = $db_handle->runQuery("SELECT price FROM price WHERE produit_id =$id")
            ?>
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td><?= $suggestProd['id'] ?></td>
                    <td><?= $suggestProd['name'] ?></td>
                    <td><?= $suggestProd['details'] ?></td>
                    <td><?= $price[0]['price'] ?> | <?= $price[1]['price'] ?> | <?= $price[2]['price'] ?> </td>
                    <td>
                        <label for="upload-photo">Importer photo</label>
                        <input type="file" name="photo" class="product__table-upload">
                    </td>
                    <td><i class="uil uil-trash-alt"></td>
                </tr>
                </tbody>
            </table>
            <?php
            }
        }
    ?>  
        </div>
        </div>  
    <?php
        foreach($categories as $category){
            $category['name']=str_replace("Nos", "Les", $category['name']);
            $filteredProducts = array_filter($products, static function($product) use($category){
                if($product['category_id'] === $category['id']){
                    return $product;
                }
            });
    ?>
    <div class="container grid" id="<?= $category['name'] ?>">
        <h2 class="product__title section__title"><?= $category['name'] ?></h2>
        <div class="button">
            <a href="admin-ajouter.php?id=<?= $category['id'] ?>" class="button__title button__slide-effect">ajouter</a>
        </div>

        <div class="product__table-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th><i class="uil uil-trash-alt"></i></th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="product__table-content">
        <?php
            foreach($filteredProducts as $product){
                $id = $product["id"];
                $price = $db_handle->runQuery("SELECT * FROM price WHERE produit_id =$id")
        ?>
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['details'] ?></td>
                    <td><?= $price[0]['price'] ?> | <?= $price[1]['price'] ?> | <?= $price[2]['price'] ?> | <?= $price[3]['price'] ?? null ?> </td>
                    <td>
                        <label for="upload-photo">Importer photo</label>
                        <input type="file" name="photo" class="product__table-upload">
                    </td>
                    <td><i class="uil uil-trash-alt"></td>
                </tr>
                </tbody>
            </table>
            <?php
        };
        ?>
        </div>
    </div>              
<?php    
    }
?>  
</section>

<?php include('base/footer.php') ?>

<?php include ('base/script.php') ?>