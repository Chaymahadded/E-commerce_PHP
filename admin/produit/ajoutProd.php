<?php
session_start();
//recuperation des données
$nom = $_POST['Nom'];
$prix = $_POST['Prix'];
$description = $_POST['Description'];
$categorie = $_POST['Categorie'];
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["Image"]["name"]);
if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
     $image=$_FILES["Image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
$qte = $_POST['quantite'];
// connexion bd
include "../../config.php";
//création req
$req = "INSERT INTO produit(Image,Nom,Prix,Description,Catégorie) VALUES ('$image','$nom','$prix','$description','$categorie')";
//exec req
$res = $cnx->query($req);
//----
$id_p = $cnx->lastInsertId();
include "../../config.php";
$req2 = "INSERT INTO stock (Produit,Quantité) VALUES ('$id_p','$qte')";
//resultat req
$res2 = $cnx->query($req2);
if($res2){
    header('location:listProd.php?ajout=ok');
}
?>