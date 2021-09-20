<?php include('base/head.php') ?>
<?php include ('panierController.php') ?>
<?php include ('base/header-admin.php') ?>
    <section class="hero">

        <img src="assets/img/home1.jpg" alt="" class="hero__img">

    </section>

    <section class="section">

        <div class="container grid">

            <div class="add__container container grid">

                <div class="add__categories-info">
                    <h1 class="add__categories-infoTitle">Quoi de neuf ?</h1>
                </div>

                <div class="add__categories-data">
                    <h3 class="add__categories-dataTitle">statut : </h3>
                    <h3 class="add__categories-dataTitle">Nombre de commande : ##</h3>
                    <h3 class="add__categories-dataTitle">Nombre de message (non-lu) : ##</h3>
                </div>

            </div>

            <div class="add__categories-button">
                <div class="button">
                    <a href="admin.php" class="button__title button__slide-effect">Retour Acceuil</a>
                </div>
            </div>

        </div>

    </section>

    <section class="categories section">

        <div class="categories__container container grid">

            <form action="" method="post" id="contact_form" enctype="multipart/form-data">

                <div class="categories__form-name">
                    <label for="name">
                        <input type="text" placeholder="Nom de la nouvelle catégorie" name="categorieName" id="name_input" required>
                    </label>
                </div>

                <div class="categories__form-button button">
                    <input type="submit" class="button__title button__slide-effect" value="Ajouter" name="Ajouter"/>
                </div>

        </div>

        </form>


        <div class="container grid" id="">
            <h2 class="categories__title section__title">Catégories</h2>

            <div class="categories__table-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th><i class="uil uil-trash-alt"></i></th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="categories__table-content">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td>"id"</td>
                            <td>"nom</td>
                            <td><i class="uil uil-trash-alt"></td>
                        </tr>
                        </tbody>
                    </table>
            </div>
        </div>

    </section>

<?php include('base/footer.php') ?>

<?php include ('base/script.php') ?>