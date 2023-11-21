<?php
    session_start();
    include "../../inc/functions.php";
    
    if(isset($_POST['btnSubmit'])){
      //changer l'etat de la commande
      changerEtat($_POST);
    }
    $cmd = getAllCmd();
    if(isset($_POST['btnSearch'])){
      $cmd = getPanierByEtat($cmd,$_POST['etat']);
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
            <a class="nav-link " href="../categorie/listCa.php">
              <span data-feather="file"></span>
              Catégories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../produit/listProd.php">
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
            <a class="nav-link active" href="listC.php">
              <span data-feather="command"></span>
              Commande
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Liste des Commandes</h1>
      </div>
      <!--filtrage-->
      <div>
        <form action="listC.php" method="post">
          <div class="form-group d-flex">
              <select name="etat" class="form-control">
                <option value="">Choisir l'etat</option>
                <option value="En cours">En cours</option>
                <option value="En livraison">En livraison</option>
                <option value="Reçu">Reçu</option>
              </select>
              <input type="submit" name="btnSearch" class="btn btn-outline-secondary" value="Chercher"/>
          </div>
        </form>
      </div>
      <div>
            <!--Liste des commande-->
            <table class="table">
                    <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Client</th>
                            <th scope="col">Numéro téléphone</th>
                            <th scope="col">Total</th>
                            <th scope="col">Date</th>
                            <th scope="col">Etat</th>
                            <th scope="col">Action</th>
                            </tr>
                    </thead>
                <tbody>
                    <?php
                        $i = 0;
                        foreach($cmd as $c){
                          $i++;
                                echo '
                                    <tr>
                                        <th scope="row">'.$i.'</th>
                                        <td>'.$c['Nom'].' '.$c['Prénom'].'</td>
                                        <td>'.$c['NumTel'].'</td>
                                        <td>'.$c['Total'].'</td>
                                        <td>'.$c['Date_création'].'</td>
                                        <td>'.$c['Etat'].'</td>
                                        <td> <a href="panier/listP.php?id='.$c['ID'].'&nom='.$c['Nom'].'&prenom='.$c['Prénom'].'" class="btn btn-outline-primary">Afficher</a> 
                                        <a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal'.$c['ID'].'">Valider</a> </td>
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
<?php foreach ($cmd as $index => $c) { ?>
  

<!-- valide Modal -->
<div class="modal fade" id="exampleModal<?php echo $c['ID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Traiter Commande</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form action="listC.php" method="post">
          <input type="hidden" value="<?php echo $c['ID']?>" name="panier_id">
            <div class="form-group mb-4">
                    <select name="etat" class="form-control">
                        <option value="En livraison">En livraison</option>
                        <option value="Reçu">Reçu</option>
                    </select>
            </div>
            <div class="modal-footer">
                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" name="btnSubmit" class="btn btn-outline-success">Valider</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
<?php } ?>
    <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../../js/dashboard.js"></script>
  </body>
</html>
