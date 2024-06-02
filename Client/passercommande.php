<?php
session_start();
if(!(isset($_SESSION["id"]) || isset($_GET["prod"])) ){
    header("location:index.php");
}
include "fonctions.php";
$prodId=$_GET["prod"];
$client=$_SESSION["id"];
$$conn=connexion();
$Date=date('Y-m-d');
$date=date('Y-m-d', strtotime($Date. ' + 10 days'));
$prod=getProductById($_GET["prod"]);
$prix=$prod["prix"];
$conn=connexion();
$req="INSERT INTO `commandes` (`id`, `idclient`, `idproduit`, `prix`, `date`, `datelivraison`, `etat`) VALUES (NULL, '$client', '$prodId', '$prix', '$Date', '$date', 'En attente')";
$res=$conn->query($req);
header("location:index.php?ajOk=1");