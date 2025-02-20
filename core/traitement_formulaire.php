<?php

$arraychampsregles =
    [
        "nom" =>
        [
            "required" => true,
            "minlength" => 2,
            "maxlength" => 255,
        ],
        "prenom" =>
        [
            "required" => false,
            "minlength" => 2,
            "maxlength" => 255,
        ],
        "email" =>
        [
            "required" => true,
            "type_verification" => "email",
        ],
        "message" =>
        [
            "required" => true,
            "minlength" => 10,
            "maxlength" => 3000,
        ],
        "pseudo" =>
        [
            "required" => true,
            "minlength" => 2,
            "maxlength" => 255,
        ],
        "motdepasse" =>
        [
            "required" => true,
            "minlength" => 8,
            "maxlength" => 72,
        ],
        "confirmation" =>
        [
            "required" => true,
            "type_verification" => "comparaison",
        ]
    ];

$formulaire_envoye = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $arrayerrors = [];
    $arrayerrors = validerchamps($arraychampsregles);

    if (empty($arrayerrors)) {
        $formulaire_envoye = true;
    } else $formulaire_envoye = false;
}

function validerchamps($array)
{
    $errors = [];

    foreach ($array as $champs => $regles) {
        $value = ($_POST[$champs]) ?? "";

        if (isset($regles['required']) && $regles['required']) {
            $erreur = required($champs, $value);
            if ($erreur) {
                $errors[$champs][] = $erreur;
            }
        }

        if (isset($regles['minlength']) && isset($regles['maxlength'])) {
            $erreur = minmaxlength($champs, $value, $regles['minlength'], $regles['maxlength']);

            if ($erreur) {
                $errors[$champs][] = $erreur;
            }
        }

        if (isset($regles['type_verification'])) {
            if ($regles['type_verification'] == 'email') {
                $erreur = email($value);

                if ($erreur) {
                    $errors[$champs][] = $erreur;
                }
            } elseif ($regles['type_verification'] == 'comparaison') {
                $erreur = comparaison($_POST['motdepasse'], $value);

                if ($erreur) {
                    $errors[$champs][] = $erreur;
                }
            }
        }
    }
    return $errors;
}

function required($champ, $valeur)
{
    if (!array_key_exists($champ, $_POST)) {
        return null;
    }
    if (empty($valeur)) {
        return "Le champ $champ n'est pas complété !";
    } else {
        return null;
    }
}

function minmaxlength($champ, $valeur, $minlength, $maxlength)
{
    if (!empty($valeur) && strlen($valeur) < $minlength || strlen($valeur) > $maxlength) {
        return "Le champ $champ doit contenir entre $minlength et $maxlength caractère(s).";
    } else {
        return null;
    }
}

function email($valeur)
{
    if (!empty($valeur) && !filter_var($valeur, FILTER_VALIDATE_EMAIL)) {
        return "L'adresse e-mail n'est pas valide !";
    } else {
        return null;
    }
}

function comparaison($valeur1, $valeur2)
{
    if ($valeur1 !== $valeur2) {
        return "Les champs 'Mot de passe'  doivent être identiques";
    }
    return null;
}
