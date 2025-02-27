<?php
$metaDescription = "C'est le profil de l'utilisateur !";
$pageTitre = "Mon profil";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '/core/traitement_authentification.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '/models/model_utilisateur.php';

if (!VerifierUtiSession()) {
    header('Location: connexion.php');
    exit();
}

if (isset($_SESSION['utilisateurID'])) {
    $utilisateurID = $_SESSION['utilisateurID'];
    $utilisateur = SelectUti_ID($utilisateurID);
} else {
    $utilisateur = null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    DeconnexionUtiSession();
    header('Location: connexion.php');
    exit();
}

?>
    <body class="page-profil">
<div class="contenu">
<h1>Mon profil</h1>
<p>ID : <?= htmlspecialchars($utilisateur['uti_id']) ?></p>
<p>Nom : <?= htmlspecialchars($utilisateur['uti_nom']) ?></p>
<p>Prénom : <?= htmlspecialchars($utilisateur['uti_prenom']) ?></p>
<p>Pseudo : <?= htmlspecialchars($utilisateur['uti_pseudo']) ?></p>
<p>Email : <?= htmlspecialchars($utilisateur['uti_email']) ?></p>

<form method="post" action="">
    <button type="submit">Déconnexion</button>
</form>
</div>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>