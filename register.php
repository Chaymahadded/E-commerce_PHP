<?php
    session_start();
    if(isset($_SESSION['Nom'])){
        header('location:profile.php');
    }
    include "config.php";
    include "inc/functions.php";
    $showRegisterAlert = 0;
    if(!empty($_POST)){
        if(addVisiteur($_POST)){
            $showRegisterAlert=1;

        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.css">
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
                <img src="images/register.png"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <section>
                    <h1 class="heading">
                        <span>R</span>
                        <span>E</span>
                        <span>G</span>
                        <span>I</span>
                        <span>S</span>
                        <span>T</span>
                        <span>R</span>
                        <span>E</span>
                    </h1>
                </section>
                <form action="register.php" method="post">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Nom</label>
                        <input type="text" name="Nom" class="form-control form-control-lg"
                        placeholder="Entrez votre nom" />
                    </div>
                    <!-- Prenom input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Prénom</label>
                        <input type="text" name="Prénom" class="form-control form-control-lg"
                        placeholder="Entrez votre prénom" />
                    </div>
                    <!-- NumTel input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Numéro téléphone</label>
                        <input type="text" name="NumTel" class="form-control form-control-lg"
                        placeholder="Entrez votre numéro de téléphone" />
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Adresse mail</label>
                        <input type="email" name="Email" class="form-control form-control-lg"
                        placeholder="Entrez votre adresse mail" />
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Mot de passe</label>
                        <input type="password" name="Password" class="form-control form-control-lg"
                        placeholder="Entrez votre mot de passe" />
                    </div>
                    <!-- ComfirmPassword input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Comfirmer mot de passe</label>
                        <input type="password" name="cpwd" class="form-control form-control-lg"
                        placeholder="Comfirmez votre mot de passe" />
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <p class="small fw-bold mt-2 pt-1 mb-3">Vous avez déjà un compte ?<a href="connexion.php">Connexion</a></p>
                        <button type="submit" class="btn" style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #FFE6E6;" >Registre</button>
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
if($showRegisterAlert == 1){
    echo "
    <script>
    Swal.fire({
        title: 'Success!',
        text: 'Création du compte avec succès',
        icon: 'success',
        confirmButtonText: 'Ok',
        timer : 2000
      })
    </script>
    ";
}
?>
</html>