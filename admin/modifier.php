<?php
session_start();
if(!isset($_SESSION["admin_id"])){
	header("location:index.php");
}
if(isset($_POST["des"])){
    include "fonctions.php";
    $conn=connexion();
    $des=$_POST["des"];
    $desc=$_POST["desc"];
    $prix=$_POST["prix"];
    $id=$_POST["id"];
    $req="UPDATE `produits` SET `Desingation` = '$des', `Description` = '$desc', `prix` = '$prix' WHERE `produits`.`id` = '$id'";
    $res=$conn->query($req);
    header("location:acceuil.php?mod=1");
}
else{
    header("acceuil.php");
}