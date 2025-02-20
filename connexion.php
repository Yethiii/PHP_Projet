<?php
$pageTitre = "Ma page de connexion";
$metaDescription = "C'est la page pour se connecter à mon site !";


require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'core/traitement_formulaire.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'models/model_utilisateur.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'core/traitement_authentification.php';

if (VerifierUtiSession()) {
    header('Location: profil.php');
    exit();
}

?>

<h1>Connexion</h1>

<form method="post" action="">

    <label for="pseudo"> Pseudo : </label>
    <br>
    <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo ici ! " required minlength="2" maxlength="255" value="<?= htmlspecialchars($_POST["pseudo"] ?? "") ?>" aria-invalid="<?= isset($arrayerrors["pseudo"]) ? "true" : "false" ?>" aria-describedby="pseudo_invalide">
    <br>
    <p id="pseudo_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['pseudo'] ?? [])) ?></p>


    <label for="motdepasse"> Mot de passe :</label>
    <br>
    <input type="password" name="motdepasse" id="motdepasse" placeholder="Votre mot de passe ici !" required minlength="8" maxlength="72" value="<?= htmlspecialchars($_POST['motdepasse'] ?? '') ?>" aria-invalid="<?= isset($arrayerrors["motdepasse"]) ? "true" : "false" ?>" aria-describedby="motdepasse_invalide">
    <br>
    <p id="motdepasse_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['motdepasse'] ?? [])) ?></p>

    <button type="submit">Me connecter</button>

</form>

<p>Tu n'as pas encore de compte ? Inscrit-toi en cliquant <a href="/inscription.php">ici</a> !</p>
</p>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pseudo = $_POST['pseudo'];
    $motdepasse = $_POST['motdepasse'];

    $utilisateur = ConnexionUti($pseudo, $motdepasse);

    if ($utilisateur) {
        ConnecterUtiSession($utilisateur['uti_id']);
        header('Location: profil.php');
        exit();
    } else {
        echo "<p>Ces accès sont incorrects !</p>";
    }
}

?>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>