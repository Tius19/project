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
    <title>Super W - Ajout d'une catégorie</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('./../header.php'); ?>
        <h1>Ajouter une catégorie</h1>
        <form action="/epreuve/categories/post_create.php" method="POST" enctype="multipart/form-data" >
            <div class="mb-3 visually-hidden">
              <input class="form-control" type="text" name="user_id" value="<?php echo($users['user_id']); ?>" />
            </div>
            <div class="mb-3">
                <label for="categorie_name" class="form-label">Nom de la catégorie</label>
                <input type="text" class="form-control" id="categorie_name" name="categorie_name" aria-describedby="title-help">
                <div id="title-help" class="form-text">Entrez une catégorie de produits !</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description de la categorie</label>
                <textarea class="form-control" placeholder="Soyez original" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Votre image</label>
              <input type="file" class="form-control" id="image" name="image" />
            </div>
            <input type="submit" class="btn btn-primary" value="Envoyer"/>
        </form>
        <br />
    </div>

    <?php include_once('./../footer.php'); ?>
</body>
</html>