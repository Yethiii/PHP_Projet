<?php
$pageTitre = "Ma page d'inscription";
$metaDescription = "C'est la page d'inscription de mon site !";


require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'core/traitement_formulaire.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'models/model_utilisateur.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'core/traitement_authentification.php';

if (VerifierUtiSession()) {
    header('Location: profil.php');
    exit();
}
?>

<h1>Formulaire d'inscription</h1>

<form method="post" action="">

    <label for="nom"> Nom : </label>
    <br>
    <input type="text" name="nom" id="nom" placeholder="Votre nom ici ! " required minlength="2" maxlength="255" value="<?= htmlspecialchars($_POST["nom"] ?? "") ?>" aria-invalid="<?= isset($arrayerrors["nom"]) ? "true" : "false" ?>" aria-describedby="nom_invalide">
    <br>
    <p id="nom_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['nom'] ?? [])) ?></p>

    <label for="prenom"> Prénom : </label>
    <br>
    <input type="text" name="prenom" id="prenom" placeholder="Votre prénom ici ! " required minlength="2" maxlength="255" value="<?= htmlspecialchars($_POST["prenom"] ?? "") ?>" aria-invalid="<?= isset($arrayerrors["prenom"]) ? "true" : "false" ?>" aria-describedby="prenom_invalide">
    <br>
    <p id="prenom_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['prenom'] ?? [])) ?></p>

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


    <label for="confirmation"> Confirmation du mot de passe :</label>
    <br>
    <input type="password" name="confirmation" id="confirmation" placeholder="Et oui, encore !" required minlength="8" maxlength="72" value="<?= htmlspecialchars($_POST['confirmation'] ?? '') ?>" aria-invalid="<?= isset($arrayerrors["confirmation"]) ? "true" : "false" ?>" aria-describedby="confirmation_invalide">
    <br>
    <p id="confirmation_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['confirmation'] ?? [])) ?></p>


    <label for="email"> Votre e-mail : </label>
    <br>
    <input type="email" name="email" id="email" placeholder="Votre e-mail ici ! " required value="<?= htmlspecialchars($_POST['email'] ?? '') ?> " aria-invalid="<?= isset($arrayerrors["email"]) ? "true" : "false" ?>" aria-describedby="email_invalide">
    <br>
    <p id=" email_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['email'] ?? [])) ?></p>

    <button type="submit">Valider mon inscription</button>

</form>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);

    $message = AjouterUti($nom, $prenom, $pseudo, $email, $motdepasse);

    if (isset($message)) {
        echo "<p>$message</p>";
    }
}
?>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>