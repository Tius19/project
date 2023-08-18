<?php session_start(); 
    include_once('./../config/mysql.php');
    include_once('./../config/user.php');
    include_once('./../variables.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super W - Ajout d'un produit</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('./../header.php'); ?>
        <h1>Ajouter un produit</h1>
        <form action="<?php echo('/epreuve/products/post_create.php'); ?>" method="POST" enctype="multipart/form-data"> 
            <div class="mb-3">
                <label for="categorie_id" class="form-label">Identifiant de la Categorie</label>
                <input type="text" class="form-control" id="categorie_id" name="categorie_id" aria-describedby="title-help">
                <div id="title-help" class="form-text">
                    <?php $sqlQuery = 'SELECT categorie_name, categorie_id FROM categories'; ?>
                    <?php $categorieStatement = $mysqlClient->prepare($sqlQuery); ?>
                    <?php $categorieStatement->execute(); ?>
                    <?php $categories = $categorieStatement->fetchAll(); ?>
                    <?php foreach(($categories) as $categorie) : ?>
                        <article>
                            <p><?php echo $categorie['categorie_id']; ?> : <?php echo $categorie['categorie_name']; ?> </br></p>
                        </article>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="mb-3">
              <label for="product_name" class="form-label">Nom du Produit</label>
              <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="title-help">
              <div id="title-help" class="form-text">Vous voulez ajouter quel produit ?</div>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <input type="text" class="form-control" id="description" name="description" aria-describedby="title-help">
              <div id="title-help" class="form-text">Soyez original</div>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Votre image</label>
              <input type="file" class="form-control" id="image" name="image" />
            </div>
        <input type="submit" class="btn btn-primary" value="Envoyer" />
        </form>
        <br />
    </div>

    <?php include_once('./../footer.php'); ?>
</body>
</html>