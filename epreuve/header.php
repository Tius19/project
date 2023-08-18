<?php 
  include_once('config/mysql.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/epreuve/home.php">Super W</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/epreuve/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/epreuve/categories/categories_list.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/epreuve/products/products_list.php">Produits</a>
        </li>
        <?php if(isset($_SESSION["LOGGED_USER"])) : ?>
          <li class="nav-item">
            <a class="nav-link" href= "/epreuve/categories/create.php"> Ajouter une categorie </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= "/epreuve/products/create.php"> Ajouter un produit </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>