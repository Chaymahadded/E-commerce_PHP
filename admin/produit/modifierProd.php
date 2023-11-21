<?php
    //recuperation des données
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    $img = $_POST["image"];
    $image=$_FILES["$img"]['name'];
    // connexion bd
    include "../../config.php";
    if ($image=="")
    {
        //création req
        $req = "UPDATE produit SET ID='$id', Nom='$nom', Prix='$prix', Description='$description', Catégorie='$categorie' WHERE id='$id'";
        //exec req
        $res = $cnx->query($req);
        //resultat req
        if($res){
            header('location:listProd.php?modifier=ok');
        }
    } else
    {
       $fichierTemp=$_FILES['image']['tmp_name'];
        move_uploaded_file($fichierTemp, '../../images/'.$image );
        //création req
        $req = "UPDATE produit SET ID='$id', Nom='$nom', Prix='$prix', Description='$description', Catégorie='$categorie', Image='$image' WHERE id='$id'";
        //exec req
        $res = $cnx->query($req);
        //resultat req
        if($res){
            header('location:listProd.php?modifier=ok');
        }
    }
?>
