<?php
Session_start();
if(!isset($_SESSION["Nom"])){
    header('location:connexion.php');
}
include "inc/functions.php";
    $categorie = getAllCategories();
    if(isset($_POST['btn-mod'])){
      if(modifierAdmin($_POST)){
        $_SESSION['Email']= $_POST["email"];
        $_SESSION['Nom']= $_POST["nom"];
        $_SESSION['Prénom']= $_POST["prenom"];
        $_SESSION['NumTel']= $_POST["numtel"];
      } 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Profile</title>
    <link rel="icon" type="ico" href="images/favicon.ico" />
</head>
<body>
    <!--header-->
    <?php
        include "inc/header.php"
    ?>
    <!--body-->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-4 p-5 ml-4 mr-4 ">
        <h2>Profile</h2>
        <div>
            <h6>Bienvenue <?php echo $_SESSION['Nom']." ".$_SESSION['Prénom'];?></h6>
        </div>
    </div>
    <div  class="container">
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
              <td><a href="profile.php" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier</a></td>
            </tr>
        </table>
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
          <form action="profile.php" method="post">
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
    <!--footer-->
    <?php
        include "inc/footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</html>