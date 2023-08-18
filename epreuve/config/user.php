<?php

if (isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_SESSION['LOGGED_USER'],
    ];
} else {
    throw new Exception('Il faut être authentifié pour ajouter des recettes');
}