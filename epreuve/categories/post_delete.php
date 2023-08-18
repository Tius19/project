<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../config/user.php');
include_once('./../variables.php');

$postData = $_POST;

if (!isset($postData['id']))
{
	echo('Il faut un identifiant valide pour supprimer une categorie.');
    return;
}	

$id = $postData['id'];

$deleteCategorieStatement = $mysqlClient->prepare('DELETE FROM categories WHERE categorie_id = :id');
$deleteCategorieStatement->execute([
    'id' => $id,
]);

header('Location: '.$rootUrl.'/epreuve/home.php');
?>