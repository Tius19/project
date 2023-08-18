<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super W</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Super W</h1>

        <!-- inclusion des variables et fonctions -->
        <?php
            include_once('variables.php');
            include_once('functions.php');
        ?>

        <!-- inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>
        
        <?php include_once('login.php'); ?>
        

        <!-- Si l'utilisateur existe, on affiche les recettes -->
        <?php if(isset($_SESSION["LOGGED_USER"])): ?>

            <?php include_once('requetes/display_categories.php') ?>
            <?php foreach(($categories) as $categorie) : ?>
                <article>
                    <h3><?php echo $categorie['categorie_name']; ?></h3>
                    <div><?php echo $categorie['description']; ?></div>
                    <i><?php echo display_products($categorie['categorie_id']); ?></i>
                </article>
            <?php endforeach ?>
        <?php endif; ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>