<?php session_start();

include_once('./../config/mysql.php');
include_once('./../config/user.php');
include_once('./../variables.php');

$getData = $_GET;
?>
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
        <h1>Supprimer le produit ?</h1>
        <form action="<?php echo('post_delete.php'); ?>" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant du produit</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($getData['id']); ?>">
            </div>
            
            <button type="submit" class="btn btn-danger">La suppression est définitive</button>
        </form>
        <br />
    </div>

    <?php include_once('./../footer.php'); ?>
</body>
</html>