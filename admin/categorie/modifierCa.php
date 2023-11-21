<?php
    //recuperation des données
    $id_c = $_POST['id'];
    $nom_c = $_POST['nom'];
    $description_c = $_POST['description'];
    // connexion bd
    include "../../config.php";
    //création req
    $req = "UPDATE categorie SET Nom ='" . $nom_c . "', Description='".$description_c."' WHERE ID='".$id_c."' ";
    //exec req
    $res = $cnx->query($req);
    //resultat req
    if($res){
        header('location:listCa.php?modifier=ok');
    }
?>