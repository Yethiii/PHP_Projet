<?php

function gestionMenu($elements)
{

    foreach ($elements as $element) {
        echo "<li><a href='{$element['url']}'>{$element['nom']}</a></li>";
    }
}

$elementsMenu = [
    ["url" => "/", "nom" => "Accueil"],
    ["url" => "/inscription.php", "nom" => "Inscription"],
    ["url" => "/connexion.php", "nom" => "Connexion"],
    ["url" => "/contact.php", "nom" => "Contact"],
    ["url" => "/profil.php", "nom" => "Mon profil"]
];
