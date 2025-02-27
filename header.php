    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $metaDescription ?>">
        <link rel="stylesheet" type="text/css" href="./assets/styles.css">
        <link rel="stylesheet" href="./assets/bootstrap.min.css">


        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu">

        <title><?= $pageTitre ?></title>
    </head>

    <body>
        <header>
            <nav>
                <button class="BurgerButton" id="BurgerButton" aria-label="Afficher_Menu" aria-expanded="false" aria-controls="menu"><span class="material-symbols-outlined">menu</span></button>
                <ul class="menu" id="menu">
                    <?php include 'menu.php' ?>
                    <?php gestionMenu($elementsMenu); ?>

                </ul>
            </nav>
        </header>

        <div class="container-fluid p-0">
        <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/banner_laetitia.png" class="d-block w-100">
                    <div class="carousel-caption d-flex flex-column align-items-center">
                        <a href="/contact.php" class="btn btn-primary mt-3">Contactez-moi</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./img/banner_site.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="./img/banner_newsletter.jpg" class="d-block w-100">
                    <div class="carousel-caption d-flex flex-column align-items-center">
                        <a href="inscription.php" class="btn btn-primary mt-3">Rejoins-nous dès maintenant</a>
                    </div>
                </div>
            </div>
            <button type="button" class="carousel-control-prev" data-bs-target="carousel1" data-bs-slide="prev" ><span class="carousel-control-prev-icon"></span></button>
            <button type="button" class="carousel-control-next" data-bs-target="carousel1" data-bs-slide="next" ><span class="carousel-control-next-icon"></span></button>
        </div>

        </div>

        <main></main>
        <script type="module" src="./js/app.js"></script>
        <script src="./js/bootstrap.bundle.min.js"></script>

    </body>

    </html>