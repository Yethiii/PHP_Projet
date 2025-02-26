<link rel="stylesheet" type="text/css" href="./assets/styles.css">

<?php
$pageTitre = "Ma page contact";
$metaDescription = "C'est la page formulaire de mon site !";


require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'core/traitement_formulaire.php';

?>

<h1>Formulaire de contact</h1>

<form method="post" action="" class="forms">

    <label for="nom"> Votre nom : </label>
    <br>
    <input type="text" name="nom" id="nom" placeholder="Votre nom ici ! " required minlength="2" maxlength="255" value="<?= htmlspecialchars($_POST["nom"] ?? "") ?>" aria-invalid="<?= isset($arrayerrors["nom"]) ? "true" : "false" ?>" aria-describedby="nom_invalide">
    <br>
    <p id="nom_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['nom'] ?? [])) ?></p>

    <label for="prenom"> Votre prénom :</label>
    <br>
    <input type="text" name="prenom" id="prenom" placeholder="Votre prénom ici !" minlength="2" maxlength="255" value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>" aria-invalid="<?= isset($arrayerrors["prenom"]) ? "true" : "false" ?>" aria-describedby="prenom_invalide">
    <br>
    <p id="prenom_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['prenom'] ?? [])) ?></p>

    <label for="email"> Votre e-mail : </label>
    <br>
    <input type="email" name="email" id="email" placeholder="Votre e-mail ici ! " required value="<?= htmlspecialchars($_POST['email'] ?? '') ?> " aria-invalid="<?= isset($arrayerrors["email"]) ? "true" : "false" ?>" aria-describedby="email_invalide">
    <br>
    <p id=" email_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['email'] ?? [])) ?></p>

    <label for="message"> Votre message : </label>
    <br>
    <textarea name="message" id="message" placeholder="Votre message ici !" required minlength="10" maxlength="3000" aria-invalid="<?= isset($arrayerrors["message"]) ? "true" : "false" ?>" aria-describedby="message_invalide"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
    <p id="message_invalide" class="error-message"><?= implode('<br>', ($arrayerrors['message'] ?? [])) ?></p>
    <button type="submit">Envoyer mon message</button>

</form>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($formulaire_envoye) {
        echo "<p>Le formulaire a été envoyé! </p>";
    } else {
        echo "<p>Le formulaire n'a pas été envoyé ! </p>";
    }
}
?>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>