<?php
session_start();
// connexion bd
include "../config.php";
//recuperation des données
$visiteur = $_SESSION['ID'];
$total = $_SESSION['Panier'][1];
$date = date("Y-m-d");
//création panier
$req_panier = "INSERT INTO panier(Visiteur,Total,Date_création) VALUES ('$visiteur','$total','$date')";
// execution
$res_panier = $cnx->query($req_panier);
$id_panier = $cnx->lastInsertId();
//ajouter commande
$cmd = $_SESSION['Panier'][3];
foreach($cmd as $c){
    //recuperation des données
    $qte = $c[0];
    $total = $c[1];
    $id_p = $c[4];
    //req
    $req = "INSERT INTO commande(Quantité,Total,Panier,Date_création,Produit) VALUES ('$qte','$total','$id_panier','$date','$id_p') ";
    //execution
    $res = $cnx->query($req);
}
//supprimer panier 
$_SESSION['Panier'] = null;
// redirection vers index
header("Location: ../index.php?valider=ok");
?>