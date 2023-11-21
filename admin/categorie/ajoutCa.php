<?php
session_start();
//recuperation des données
$nom = $_POST['Nom'];
$description = $_POST['Description'];
// connexion bd
include "../../config.php";
//création req
$req = "INSERT INTO categorie(Nom,Description) VALUES ('$nom','$description')";
//exec req
$res = $cnx->query($req);
//resultat req
if($res){
    header('location:listCa.php?ajout=ok');
}
?>