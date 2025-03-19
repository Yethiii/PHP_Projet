<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '/core/traitement_db.php';

function SelectUti_EMail($email)
{
    try {
        $pdo = ObtenirConnexionBdd('if0_38557513_siteweb');

        $requete = "SELECT * FROM t_utilisateur_uti WHERE uti_email = :email";

        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
    }
}

function SelectUti_ID($id)
{
    try {
        $pdo = ObtenirConnexionBdd('if0_38557513_siteweb');

        $requete = "SELECT * FROM t_utilisateur_uti WHERE uti_id = :id";

        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
            return $utilisateur;
        } else {
            return null;
        }
    } catch (PDOException $e) {
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
    }
}

function AjouterUti($nom, $prenom, $pseudo, $email, $motdepasse)
{
    if (SelectUti_EMail($email)) {
        return "Cet utilisateur existe déjà !";
    } else {
        try {
            $pdo = ObtenirConnexionBdd('if0_38557513_siteweb');
            $email = strtolower($email);

            $requete = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_email, uti_nom, uti_prenom,uti_motdepasse) VALUES (:pseudo, :email, :nom, :prenom, :motdepasse)";

            $stmt = $pdo->prepare($requete);
            $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindParam(':motdepasse', $motdepasse, PDO::PARAM_STR);
            $stmt->execute();

            return "Votre inscription est validée";
        } catch (PDOException $e) {
            echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
        }
    }
}

function ConnexionUti($pseudo, $motdepasse)
{
    try {
        $pdo = ObtenirConnexionBdd('if0_38557513_siteweb');

        $requete = "SELECT * FROM t_utilisateur_uti WHERE uti_pseudo = :pseudo";

        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->execute();

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
            if (password_verify($motdepasse, $utilisateur['uti_motdepasse']))
                return $utilisateur;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
    }
}
