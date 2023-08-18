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

    <?php include_once('./../header.php'); ?>
        <h1>Super W</h1>

        <!-- inclusion des variables et fonctions -->
        <?php include_once('./../functions.php'); ?>
        
        <?php include_once('./../login.php'); ?>
        

        <!-- Si l'utilisateur existe, on affiche les recettes -->
        <?php if(isset($_SESSION["LOGGED_USER"])): ?>

            <?php include_once('./../requetes/display_products.php') ?>
            <?php foreach(($products) as $product) : ?>
                <article>
                    <i><?php echo $product["product_name"]; ?></i> :
                    <i><?php echo $product["description"]; ?></i> --
                    <b>Image</b> : <?php echo '<img src="/epreuve' . $product["image_path"] . '" />'; ?>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><a class="link-warning" href="update.php?id=<?php echo($product['product_id']); ?>">Editer le produit</a></li>
                        <li class="list-group-item"><a class="link-danger" href="delete.php?id=<?php echo($product['product_id']); ?>">Supprimer le produit</a></li>
                    </ul>
                    <p>-----------------------------------------------------</p>
                </article>
            <?php endforeach ?>
        <?php endif; ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('./../footer.php'); ?>
</body>
</html>