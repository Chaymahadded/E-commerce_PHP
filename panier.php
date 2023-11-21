<?php
    session_start();
    include "inc/functions.php";
    $total = 0;
    if(isset($_SESSION['Panier'])){
        $total = $_SESSION['Panier'][1];
    }
    $categorie = getAllCategories();
    if(!empty($_POST)){
        $produit = searchProduct($_POST["search"]);
    }
    else{
        $produit = getAllProducts();
    }
    $cmd = array();
    if(isset($_SESSION['Panier'])){
        if(count($_SESSION['Panier'][3])>0){
            $cmd = $_SESSION['Panier'][3];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="icon" type="ico" href="images/favicon.ico" />
</head>

<body>
    <!--header-->
    <?php
        include "inc/header.php";
    ?>
    <!--Body-->
    <div class="row col-12 mt-4 p-5">
        <?php
            if(isset($_GET['supprimerPan']) && $_GET['supprimerPan']=="ok"){
            echo '
                <div id="alert-container" class="alert alert-success">
                    Produit supprimé du pannier avec succès
                </div>
            ';
            }
        ?>
        <h1>Panier</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($cmd as $index => $c){
                        echo '
                            <tr>
                                <th scope="row">'.($index+1).'</th>
                                <td>'.$c[3].'</td>
                                <td>'.$c[0].'</td>
                                <td>'.$c[1].'DT</td>
                                <td><a onClick="return popUpDeletePanier()" href="action/supprimerPan.php?id='.$index.'" class="btn btn-outline-danger">Supprimer</a></td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
        <div class="text-end mt-3">
            <h3>Total : <?php echo $total;?> </h3>
            <hr/>
            <a href="action/validerPan.php" class="btn btn-outline-success" style="width:100px">Valider</a>
        </div>
    </div>
    <!--Footer-->
    <?php
        include "inc/footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
    <script>
      function popUpDeletePanier(){
        return confirm("Voulez-vous vraiment supprimer le produit du panier ?");
      }
    </script>

</html>