<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Hiya Collection</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                                foreach($categorie as $categorie){
                                echo '<li><a class="dropdown-item" href="#">'.$categorie["Nom"].'</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                    <?php
                        if(isset($_SESSION['Nom'])){
                            if($_SESSION['Etat']==1){
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/profileAdmin.php">Profile</a>
                                </li>
                                '; 
                            }else{
                                    echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="profile.php">Profile</a>
                                </li>
                                ';
                                if(isset($_SESSION['Panier']) && is_array($_SESSION['Panier'][3])){
                                    echo '
                                        <li class="nav-item">
                                            <a class="nav-link" href="panier.php">Panier('.count($_SESSION['Panier'][3]).')</a>
                                        </li>
                                        ';
                                }
                                else{
                                    echo '
                                        <li class="nav-item">
                                            <a class="nav-link" href="panier.php">Panier(0)</a>
                                        </li>
                                        ';
                                }
                            }
                        }
                        else{
                            echo '
                            <li class="nav-item">
                                <a class="nav-link" href="connexion.php">Connexion</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="register.php">Registre</a>
                            </li>
                            ';
                        }
                    ?>
                </ul>
                <?php
                        if(isset($_SESSION['Nom'])){
                            echo '
                            <a href="deconnexion.php" class="btn" style="background-color: #FFE6E6;">Déconnexion</a>
                            ';
                        }
                ?>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
