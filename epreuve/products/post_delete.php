<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../config/user.php');
include_once('./../variables.php');

$postData = $_POST;

if (!isset($postData['id']))
{
	echo('Il faut un identifiant valide pour supprimer un produit.');
    return;
}	

$id = $postData['id'];

$deleteProductStatement = $mysqlClient->prepare('DELETE FROM products WHERE product_id = :id');
$deleteProductStatement->execute([
    'id' => $id,
]);

header('Location: '.$rootUrl.'/epreuve/home.php');
?>