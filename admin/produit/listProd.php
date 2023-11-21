<?php
    session_start();
    include "../../inc/functions.php";
    $produit = getAllProducts();
    $categorie = getAllCategories();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Espace Administrative</title>
    <link rel="icon" type="ico" href="../../images/favicon.ico" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <script type="text/javascript" src="https://me.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=BoH_c0EbmIriRLLSm-HngAFiw2xesZVbcntZVRKhWLsCjOwnmBAJ1pi_EXtx14BqvzvA9CLJLUDRThV0AFQfNLQKiUR4ZpEM-ggchsSgzgY" charset="UTF-8"></script><style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../../index.php">Hiya Collection</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../../deconnexion.php">Déconnexion</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item ">
            <a class="nav-link" href="../profileAdmin.php">
              <span data-feather="layers"></span>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../categorie/listCa.php">
              <span data-feather="file"></span>
              Catégories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active"  href="listProd.php">
              <span data-feather="shopping-cart"></span>
              Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../visiteur/listVis.php">
              <span data-feather="users"></span>
              Visiteurs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../stock/listS.php">
              <span data-feather="bar-chart-2"></span>
              Stock
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../commande/listC.php">
              <span data-feather="command"></span>
              Commande
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Liste des produits</h1>
        
        <div>
            <a href="ajoutProd.php" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
        </div>
      </div>
      <?php
        if(isset($_GET['ajout']) && $_GET['ajout']=="ok"){
          echo '
            <div class="alert alert-success">
              Produit ajouté avec succés
            </div>
          ';
        }
        if(isset($_GET['supprimer']) && $_GET['supprimer']=="ok"){
          echo '
            <div class="alert alert-success">
              Produit suprimé avec succés
            </div>
          ';
        }
        if(isset($_GET['modifier']) && $_GET['modifier']=="ok"){
          echo '
            <div class="alert alert-success">
              Mise à jour du produit avec succés
            </div>
          ';
        }
      ?>
      <div>
            <!--Liste des produits-->
            <table class="table">
                    <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Description</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Action</th>
                            </tr>
                    </thead>
                <tbody>
                    <?php
                        $i = 0;
                        foreach($produit as $produit){
                          $i++;
                            echo '
                            <tr>
                                <th scope="row">'.$i.'</th>
                                <td>'.$produit['Nom'].'</td>
                                <td>  <img src= "../../images/'.$produit['Image'].'" width="50" height="50"> </td>
                                <td>'.$produit['Prix'].'</td>
                                <td>'.$produit['Description'].'</td>
                                <td>'.$produit['Catégorie'].'</td>
                                <td>
                                    <a href="modifierForm.php?id='.$produit['ID'].'" class="btn btn-outline-success">Modifier</a>
                                    <a onClick="return popUpDeleteProduit()" href="supprimerProd.php?id='.$produit['ID'].'" class="btn btn-outline-danger">Supprimer</a>
                                </td>
                            </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
  </div>
</div>
<!-- ajout Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Produit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="ajoutProd.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group mb-4">
              <input type="text" name="Nom" class="form-control" placeholder="Nom du produit ...">
          </div>
          <div class="form-group mb-4">
              <input type="number" step="0.01" name="Prix" class="form-control" placeholder="Prix du produit ...">
          </div>
          <div class="form-group mb-4">
              <textarea name="Description" class="form-control" placeholder="Description du produit ..."></textarea>
          </div>
          <div class="form-group mb-4">
              <input type="file" name="Image" class="form-control">
          </div>
          <div class="form-group mb-4">
                <select name="Categorie" class="form-control">
                    <?php
                        foreach($categorie as $row){
                            print '<option>'.$row['Nom'].'</option>';
                        }
                    ?>
                </select>
          </div>
          <div class="form-group mb-4">
              <input type="number" name="quantite" class="form-control" placeholder="Quantité du produit ...">
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-outline-primary">Ajouter</button>
        </div>
      </form>
    </div>
  </div>
</div>
    <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../../js/dashboard.js"></script>
    <script>
      function popUpDeleteProduit(){
        return confirm("Voulez-vous vraiment supprimer le produit ?");
      }
    </script>
  </body>
</html>
