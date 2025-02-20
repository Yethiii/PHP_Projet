<?php

session_start();

function ConnecterUtiSession($utilisateurID)

{
    $_SESSION['utilisateurID'] = $utilisateurID;
}

function VerifierUtiSession()
{
    return isset($_SESSION['utilisateurID']);
}

function DeconnexionUtiSession()
{
    unset($_SESSION['utilisateurID']);
    session_destroy();
}
