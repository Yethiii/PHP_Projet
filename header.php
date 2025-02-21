    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $metaDescription ?>">
        <link rel="stylesheet" type="text/css" href="./assets/styles.css">

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
        <main></main>
        <script type="module" src="./js/app.js"></script>
    </body>

    </html>