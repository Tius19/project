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
  
      <?php include_once('./../requetes/display_categories.php') ?>
      <?php foreach(($categories) as $categorie) : ?>
          <article>
            <h3><?php echo $categorie['categorie_name']; ?></h3>
            <div><?php echo $categorie['description']; ?></div>
            <b>Image</b> : <?php echo '<img src="/epreuve' . $categorie["image_path"] . '" />'; ?>
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item"><a class="link-warning" href="update.php?id=<?php echo($categorie['categorie_id']); ?>">Editer categorie</a></li>
              <li class="list-group-item"><a class="link-danger" href="delete.php?id=<?php echo($categorie['categorie_id']); ?>">Supprimer categorie</a></li>
            </ul>
            <p>-----------------------------------------------</p>
          </article>
       <?php endforeach ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('./../footer.php'); ?>
</body>
</html>