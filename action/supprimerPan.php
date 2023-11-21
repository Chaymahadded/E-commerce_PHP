<?php
session_start();
//recuperation des données
$id = $_GET['id'];
//echo $id;

$total_en = $_SESSION['Panier'][3][$id][1];
$_SESSION['Panier'][1] -=$total_en;

unset($_SESSION['Panier'][3][$id]);

// // connexion bd
// include "../../config.php";
// //création req
// $req = "DELETE FROM produit WHERE ID='$id'";
// //exec req
// $res = $cnx->query($req);
// //resultat req
// if($res){
//     header('location:listProd.php?supprimer=ok');
// }
header('location:../panier.php?supprimerPan=ok');
?>