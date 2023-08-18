<?php $sqlQuery = 'SELECT categorie_name, description, categorie_id, image_path FROM categories'; ?>
<?php $categorieStatement = $mysqlClient->prepare($sqlQuery); ?>
<?php $categorieStatement->execute(); ?>
<?php $categories = $categorieStatement->fetchAll(); ?>