<?php

function ConfigConnexionBdd()
{
    return [
        'host' => 'sql204.infinityfree.com',
        'username' => 'if0_38557513',
        'password' => 'az12er34ty567',
    ];
}

function ObtenirConnexionBdd($nomBDD)
{

    $configDB = ConfigConnexionBdd();

    $pdo = new PDO("mysql:host={$configDB['host']};dbname=$nomBDD;charset=utf8", $configDB['username'], $configDB['password']);

    // Définir le mode d'erreur sur "exception".
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}
