<?php
session_start();
//recuperation des données
$id = $_GET['id'];
// connexion bd
include "../../config.php";
//création req
$req = "DELETE FROM categorie WHERE ID='$id'";
//exec req
$res = $cnx->query($req);
//resultat req
if($res){
    header('location:listCa.php?supprimer=ok');
}
?>