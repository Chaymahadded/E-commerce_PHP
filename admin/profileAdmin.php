<?php
    session_start();
    include "../inc/functions.php";
    if(isset($_POST['btn-mod'])){
      if(modifierAdmin($_POST)){
        $_SESSION['Email']= $_POST["email"];
        $_SESSION['Nom']= $_POST["nom"];
        $_SESSION['Prénom']= $_POST["prenom"];
        $_SESSION['NumTel']= $_POST["numtel"];
      } 
    }
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
    <link rel="icon" type="ico" href="../images/favicon.ico" />

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../index.php">Hiya Collection</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../deconnexion.php">Déconnexion</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item ">
            <a class="nav-link active" href="profileAdmin.php">
              <span data-feather="layers"></span>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categorie/listCa.php">
              <span data-feather="file"></span>
              Catégories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="produit/listProd.php">
              <span data-feather="shopping-cart"></span>
              Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="visiteur/listVis.php">
              <span data-feather="users"></span>
              Visiteurs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="stock/listS.php">
              <span data-feather="bar-chart-2"></span>
              Stock
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="commande/listC.php">
              <span data-feather="command"></span>
              Commande
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
        <div>
            <?php
                echo $_SESSION['Nom'];
            ?>
        </div>
      </div>
      <div>
        <table class="table">
            <tr>
              <td><strong>Nom : </strong></td>
              <td>
                <?php
                  echo $_SESSION['Nom'];
                ?>
              </td>
            </tr>
            <tr>
              <td><strong>Prénom : </strong></td>
              <td>
                <?php
                  echo $_SESSION['Prénom'];
                ?>
              </td>
            </tr>
            <tr>
              <td><strong>Email : </strong></td>
              <td>
                <?php
                  echo $_SESSION['Email'];
                ?>
              </td>
            </tr>
            <tr>
              <td><strong>Numéro téléphone : </strong></td>
              <td>
                <?php
                  echo $_SESSION['NumTel'];
                ?>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><a href="profileAdmin.php" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier</a></td>
            </tr>
        </table>
      </div>
    </main>
  </div>
</div>
<!--Modifier model-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mdifier Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form action="profileAdmin.php" method="post">
            <input type="hidden" value="<?php echo $_SESSION['ID']; ?>" name="id_admin">
            <div class="form-group mb-4">
                <input type="text" name="nom" class="form-control" value=" <?php echo $_SESSION['Nom']; ?>">
            </div>
            <div class="form-group mb-4">
                <input type="text" name="prenom" class="form-control" value=" <?php  echo $_SESSION['Prénom']; ?>">
            </div>
            <div class="form-group mb-4">
                <input type="text" name="numtel" class="form-control" value=" <?php  echo $_SESSION['NumTel']; ?>">
            </div>
            <div class="form-group mb-4">
                <input type="email" name="email" class="form-control" value=" <?php  echo $_SESSION['Email']; ?>">
            </div>
            <div class="form-group mb-4">
                <input type="password" name="mp" class="form-control" placeholder="Tappez votre nouveau mot de passe...">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="btn-mod" class="btn btn-outline-primary">Modifier</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>

    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../js/dashboard.js"></script>
  </body>
</html>
