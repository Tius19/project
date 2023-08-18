<?php $sqlQuery = 'SELECT product_name, description, product_id, image_path FROM products'; ?>
<?php $productStatement = $mysqlClient->prepare($sqlQuery); ?>
<?php $productStatement->execute(); ?>
<?php $products = $productStatement->fetchAll(); ?>