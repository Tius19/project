<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../config/user.php');
include_once('./../variables.php');
include_once('./../functions.php');

$postData = $_POST;

if (
    !isset($postData['product_name']) &&
    !isset($postData['categorie_id']) &&
    !isset($postData['description']) &&
    !is_numeric($postData['categorie_id'])
)
    {
        echo('Le produit est invalide');
        return;
    }

if (!isset($loggedUser)) {
    echo('Vous devez etre connecté pour ajouter un produit');
    return;
}

$productName = $postData['product_name'];
$categorieId = $postData['categorie_id'];
$description = $postData['description'];
$imagePath = "/uploads/".$_FILES["image"]["name"];

$insertProduct = $mysqlClient->prepare('INSERT INTO products(categorie_id, product_name, description, image_path) VALUES (:categorie_id, :product_name, :description, :image_path)');
$insertProduct->execute([
    'categorie_id' => $categorieId,
    'product_name' => $productName,
    'description' => $description,
    'image_path' => $imagePath
]);

?>

<?php
$to_upload_path = $imagePath;
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
                else {
                    echo "L'extension est mauvaise";
                }
        }
        else {
            echo "L'image est trop volumineuse";
        }
}

$image = $_FILES['image'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super W - Ajout de Produit</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('./../header.php'); ?>
        <h1>Produit ajouté avec succès !</h1>
        
        <div class="card">
            
            <div class="card-body">
                <p class="card-text">
                    <b>Votre produit</b> : <?php echo strip_tags($productName); ?>
                    <b>Description</b> : <?php echo strip_tags($description); ?>
                    <b>Image</b> : <?php echo '<img src="/epreuve' . $imagePath . '" />'; ?>
                </p>
            </div>
        </div>
    </div>
    <?php include_once('./../footer.php'); ?>
</body>
</html>