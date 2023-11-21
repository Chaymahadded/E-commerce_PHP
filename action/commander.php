<?php
session_start();
if(!isset($_SESSION['Nom'])){
    header('location:../connexion.php');
    exit();
}

// connexion bd
include "../config.php";
//recuperation des données
$id_p = $_POST['produit'];
$qte = $_POST['quantite'];
$visiteur = $_SESSION['ID'];
//création req
$req = "SELECT Prix,Nom FROM produit WHERE ID='$id_p'";
//exec req
$res = $cnx->query($req);
//resultat req
$produit = $res->fetch();
$total = $qte*$produit['Prix'];
$date = date("Y-m-d");
if(!isset($_SESSION['Panier'])){ //panier n'existe pas
    $_SESSION['Panier'] = array($visiteur,0,$date,array()); //création panier
}
$_SESSION['Panier'][1] += $total;
$_SESSION['Panier'][3][] = array($qte,$total,$date,$produit['Nom'],$id_p);
header('location:../index.php?commander=ok');
?>