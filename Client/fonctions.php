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
    $req="SELECT * FROM produits WHERE `deleted`!=1";
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
function getclientById($id){
  $conn=connexion();
  $req="SELECT * FROM clients WHERE `id`='$id'";
    $res=$conn->query($req);
    $client=$res->fetch();
    return $client;
}
function getCommandesForClient($id){
  $conn=connexion();
  $req="SELECT * FROM commandes WHERE `idclient`='$id'";
  $res=$conn->query($req);
  $comms=$res->fetchAll();
  return $comms;
}
