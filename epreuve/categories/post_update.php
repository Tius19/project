<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../config/user.php');
include_once('./../variables.php');

$postData = $_POST;

if (
    !isset($postData['id'])
    || !isset($postData['categorie_name']) 
    || !isset($postData['description'])
    )
{
	echo('Il manque des informations pour permettre l\'édition du formulaire.');
    return;
}	

$id = $postData['id'];
$categorie_name = $postData['categorie_name'];
$description = $postData['description'];
$imagePath = "/uploads/".$_FILES["image"]["name"];

$insertCategorieStatement = $mysqlClient->prepare('UPDATE categories SET categorie_name = :categorie_name, description = :description, image_path = :image_path WHERE categorie_id = :id');
$insertCategorieStatement->execute([
    'categorie_name' => $categorie_name,
    'description' => $description,
    'id' => $id,
    'image_path' => $imagePath,
]);

?>

<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['image']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['image']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if (in_array($extension, $allowedExtensions))
                {
                  $filename = basename($_FILES["image"]["name"]);
                  $to_upload_path = 'C:\MAMP\htdocs\epreuve' . "/uploads/".$filename; 
                  move_uploaded_file($_FILES["image"]["tmp_name"], $to_upload_path);
                }
        } else {
            echo "L'image est trop volumineuse";
        }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super W </title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('./../header.php'); ?>
        <h1>Categorie modifiée avec succès !</h1>
        
        <div class="card">
            
            <div class="card-body">
                <h5 class="card-title"><?php echo($categorie_name); ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo($loggedUser['email']); ?></p>
                <p class="card-text"><b>Categorie</b> : <?php echo strip_tags($description); ?></p>
                <b>Image</b> : <img src="/epreuve<?php echo $imagePath; ?>" />
            </div>
        </div>
    </div>
    <?php include_once('./../footer.php'); ?>
</body>
</html>