<?php

function ConfigConnexionBdd()
{
    return [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
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
