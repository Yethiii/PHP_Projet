    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $metaDescription ?>">
        <link rel="stylesheet" type="text/css" href="/assets/styles.css">

        <title><?= $pageTitre ?></title>
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <?php include 'menu.php' ?>
                    <?php gestionMenu($elementsMenu); ?>

                </ul>
            </nav>
        </header>
        <main>