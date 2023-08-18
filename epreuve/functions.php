<?php
include_once('config/mysql.php');

function display_products(int $categoriesId) : string
{
    global $mysqlClient;
    $results = '';
    $sqlQuery = "SELECT product_name FROM products WHERE categorie_id = :category_id"; 
    $productStatement = $mysqlClient->prepare($sqlQuery); 
    $productStatement->execute([
        'category_id' => $categoriesId
    ]); 
    $products = $productStatement->fetchAll(); 
    foreach($products as $product) {
        $results .= '<li>' . $product["product_name"] . "</li>";
    }
    return $results;
}

function retrieve_id_from_user_mail(string $userEmail, array $users) : int 
{
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        if ($userEmail === $user['email']) {
            return $user['user_id'];
        }
    }

    return 0;
}