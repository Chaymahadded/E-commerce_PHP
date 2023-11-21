<?php
    session_start();
    if(isset($_SESSION['Nom'])){
        header('location:profile.php');
    }
    include "inc/functions.php";
    $user = true;
    if(!empty($_POST)){
        $user = connectVisiteur($_POST);
        if( is_array($user) && count($user) > 0 ){
            if($user['Etat'] == 0){
                session_start();
                $_SESSION['ID'] = $user['ID'];
                $_SESSION['Email']= $user["Email"];
                $_SESSION['Nom']= $user["Nom"];
                $_SESSION['Prénom']= $user["Prénom"];
                $_SESSION['Password']= $user["Password"];
                $_SESSION['NumTel']= $user["NumTel"];
                $_SESSION['Etat'] = $user['Etat'];
                header('location:profile.php');
            }
            else{
                session_start();
                $_SESSION['ID'] = $user['ID'];
                $_SESSION['Email']= $user["Email"];
                $_SESSION['Nom']= $user["Nom"];
                $_SESSION['Prénom']= $user["Prénom"];
                $_SESSION['NumTel']= $user["NumTel"];
                $_SESSION['Password']= $user["Password"];
                $_SESSION['Etat'] = $user['Etat'];
                header('location:admin/profileAdmin.php');
            }
            
        }
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.css">
    <link rel="icon" type="ico" href="images/favicon.ico" />
    <link href="css/styleHed.css" rel="stylesheet"/>
</head>

<body>
    <!--header-->
    <?php
        include "inc/headerCon.php"
    ?>  
    <!--Form-->
<section class="col-12 p-5 mt-5 mb-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="images/connexion.png"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <section >
                <h1 class="heading">
                    <span>C</span>
                    <span>O</span>
                    <span>N</span>
                    <span>N</span>
                    <span>E</span>
                    <span>X</span>
                    <span>I</span>
                    <span>O</span>
                    <span>N</span>
                </h1>
            </section>
                <form action="connexion.php" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Adresse mail</label>
                        <input type="email" name="Email" class="form-control form-control-lg"
                        placeholder="Entrez une adresse mail valide" />
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Mot de passe</label>
                        <input type="password" name="Password" class="form-control form-control-lg"
                        placeholder="Entrez mot de passe" />
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <p class="small fw-bold mt-2 pt-1 mb-3">Vous n'avez pas de compte ? <a href="register.php">Créer compte</a></p>
                        <button type="submit" class="btn" style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #FFE6E6;" >Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    <!--Footer-->
    <?php
        include "inc/footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.all.min.js"></script>
<?php
if(!$user){
    echo "
    <script>
    Swal.fire({
        title: 'Erreur!',
        text: 'Cordonnées',
        icon: 'error',
        confirmButtonText: 'Ok',
        timer : 2000
      })
    </script>
    ";
}
?>

</html>