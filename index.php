<?php
    session_start();
    include "inc/functions.php";
    $categorie = getAllCategories();
    $produit = getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiya Collection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet"/>
    <link rel="icon" type="ico" href="images/favicon.ico" />

</head>

<body>
    <!--header-->
    <?php
        include "inc/header.php";
    ?>
    <!--Body-->
    <img id="img" src="images/couverture.jpg" alt="hiya" width="720" height="406">
    <!--section-->
    <section class="products" id="products">
        <h1 class="heading">
        <span>P</span>
        <span>R</span>
        <span>O</span>
        <span>D</span>
        <span>U</span>
        <span>I</span>
        <span>T</span>
        <span>S</span>
        </h1>
    </section>
<!-- section produits starts -->
    <div class="row col-12 mt-4 p-5 mb-4" >
        <?php
            if(isset($_GET['commander']) && $_GET['commander']=="ok"){
            echo '
                <div id="alert-container" class="alert alert-success">
                Produit ajouté au pannier avec succés
                </div>
            ';
            }
            if(isset($_GET['valider']) && $_GET['valider']=="ok"){
                echo '
                    <div id="alert-container" class="alert alert-success">
                    Votre commande a été envoyée avec succès
                    </div>
                ';
                }
        ?>
        <?php
            foreach($produit as $produit){
                echo '<div class="row col-3 mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="images/'.$produit["Image"].'" class="card-img-top" widhth="50" height="200">
                    <div class="card-body">
                        <table row col-1>
                            <tr>
                                <td><h5 class="card-title">'.$produit["Nom"].'</h5></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><p class="card-text">'.$produit["Prix"].' DT</p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><a href="produit.php?id='.$produit["ID"].'" class="btn btn-outline-primary">Afficher</a></td>
                                <td>
                                    <form action="action/commander.php" method="post">
                                        <div class="form-group d-flex mr-5">
                                            <input type="hidden" value="'.$produit['ID'].'" name="produit">
                                            <input type="number" class="boutonquantitee"class="form-control" name="quantite" step="1" placeholder="Quantité">
                                            <button type="submit" class="btn btn-outline-success" class="bi bi-cart-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                            </svg>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                  </div>
            </div>';
            }
        ?>
    </div>
    <!--Footer-->
    <?php
        include "inc/footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script>
    var alertContainer = document.getElementById('alert-container');
    setTimeout(function() {
        alertContainer.style.display = "none";
    }, 5000);
</script>
</html>