<?php
    session_start();
    include "inc/functions.php";
    $categorie = getAllCategories();
    if(isset($_GET['id'])){
        $produit = getProductBy($_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
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
    <div class="row col-12 mt-4 mb-5">
        <div class="card col-8 offset-2">
            <img src="images/<?php echo $produit['Image'];?>" class="card-img-top" widhth="400" height="400">
            <div class="card-body">
                <h5 class="card-title"><?php echo $produit['Nom']?></h5>
                <p class="card-text"><?php echo $produit['Description']?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $produit['Prix']?> DT</li>
                <li class="list-group-item"><?php echo $produit['Catégorie']?></li>
            </ul>
            <div class="mb-4">
                <form action="action/commander.php" method="post">
                    <input type="hidden" value="<?php echo $produit['ID'];?>" name="produit">
                    <div class="form-group d-flex" >
                        <input type="number" class="form-control" name="quantite" step="1" placeholder="Quantité du produit">
                        <button type="submit" class="btn btn-outline-primary">Ajouter au panier</button>
                    </div>
                </form>
            </div>
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

</html>