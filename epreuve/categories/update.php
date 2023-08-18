<?php session_start();
    include_once('./../config/mysql.php');
    include_once('./../config/user.php');
    include_once('./../variables.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
	echo('Il faut un identifiant de recette pour le modifier.');
    return;
}	

$retrieveCategorieStatement = $mysqlClient->prepare('SELECT * FROM categories WHERE categorie_id = :id');
$retrieveCategorieStatement->execute([
    'id' => $getData['id'],
]);

$categorie = $retrieveCategorieStatement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super W - Edition de categorie</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('./../header.php'); ?>
        <h1>Mettre à jour <?php echo($categorie['categorie_name']); ?></h1>
        <form action="<?php echo('post_update.php'); ?>" method="POST" enctype="multipart/form-data" >
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la categorie</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($getData['id']); ?>">
            </div>
            <div class="mb-3">
                <label for="categorie_name" class="form-label">Nom de la categorie</label>
                <input type="text" class="form-control" id="categorie_name" name="categorie_name" aria-describedby="title-help" value="<?php echo($categorie['categorie_name']); ?>">
                <div id="title-help" class="form-text">Choisissez un nom de categorie !</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description de la categorie</label>
                <textarea class="form-control" placeholder="Soyez original." id="description" name="description">
                <?php echo strip_tags($categorie['description']); ?>
                </textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Votre image</label>
                <input type="file" class="form-control" id="image" name="image" />
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once('./../footer.php'); ?>
</body>
</html>