<?php
session_start();
if(!isset($_SESSION["admin_id"])){
	header("location:index.php");
}
if(isset($_GET["id"])){
    $id=$_GET["id"];
    include "fonctions.php";
    $conn=connexion();
    $req="UPDATE `commandes` SET `etat` = 'annulée' WHERE `commandes`.`id` = '$id'";
    $res=$conn->query($req);
    header("location:gerercomandes.php?ann=1");
}
else{
    header("location:acceuil.php");
}