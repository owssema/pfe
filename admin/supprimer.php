<?php
session_start();
if(!isset($_SESSION["admin_id"])){
	header("location:index.php");
}
if(isset($_GET["id"])){
    include "fonctions.php";
    $conn=connexion();
    
    $id=$_GET["id"];
    $req="UPDATE `produits` SET `deleted` = '1'  WHERE `produits`.`id` = '$id'";
    $res=$conn->query($req);
    header("location:acceuil.php?del=1");
}
else{
    header("acceuil.php");
}