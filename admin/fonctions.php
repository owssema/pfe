<?php
    function connexion(){
        $servername="localhost";
        $user="root";
        $DBpsw="";
        $DBname="cuisine";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$DBname", $user, $DBpsw);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }       
}
function getProducts(){
    $conn=connexion();
    $req="SELECT * FROM produits ";
    $res=$conn->query($req);
    $prods=$res->fetchAll();
    return $prods;
}
function getProductsBySearch($rech){
  $conn=connexion();
    $req="SELECT * FROM produits WHERE `Desingation` LIKE '%$rech%'";
    $res=$conn->query($req);
    $prods=$res->fetchAll();
    return $prods;
}

function getProductById($id){
  $conn=connexion();
  $req="SELECT * FROM produits WHERE `id`='$id'";
  $res=$conn->query($req);
  $prod=$res->fetch();
  return $prod;
}
function getClientById($id){
  $conn=connexion();
  $req="SELECT * FROM clients WHERE `id`='$id'";
  $res=$conn->query($req);
  $client=$res->fetch();
  return $client;
}

function getAllcommandes(){
  $conn=connexion();
  $req="SELECT * FROM commandes WHERE etat IN ('En attente','validé','annulée') ORDER BY FIELD(etat,'En attente','validé','annulée');";
  $res=$conn->query($req);
  $comm=$res->fetchAll();
  return $comm;
}
function getcommandesBySearchClient($client){
  $commandes=array();
  $conn=connexion();
  $req="SELECT * FROM clients WHERE `nom` LIKE '%$client%'";
  $res=$conn->query($req);
  $clients=$res->fetchAll();
  foreach($clients as $client){
        $clientId=$client["id"];
        $req2="SELECT * FROM commandes WHERE `idclient` = '$clientId'";
        $res2=$conn->query($req2);
        $comms=$res2->fetchAll();
        foreach($comms as $comm){
          array_push($commandes,$comm);
        }
    }
return $commandes;
}
function getcommandesBySearchProduct($prod){
      $commandes=array();
      $conn=connexion();
      $req="SELECT * FROM produits WHERE `Desingation` LIKE '%$prod%'";
      $res=$conn->query($req);
      $prods=$res->fetchAll();
      foreach($prods as $prod){
            $prodId=$prod["id"];
            $req2="SELECT * FROM commandes WHERE `idproduit` = '$prodId'";
            $res2=$conn->query($req2);
            $comms=$res2->fetchAll();
            foreach($comms as $comm){
              array_push($commandes,$comm);
            }
        }
  return $commandes;
}
function getcommandesByStatusFilter($status){
  $conn=connexion();
  $req="SELECT * FROM commandes WHERE `etat`='$status' ;";
  $res=$conn->query($req);
  $comm=$res->fetchAll();
  return $comm;
}