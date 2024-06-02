<?php
if(isset($_GET["ajOk"])){
	print'
	<script>
			alert("Commande passé avec succé! Nos agents vont traiter votre commande.");
	</script>
	';
}
$pageName=basename($_SERVER['PHP_SELF']);
$indexactive="";
$produitactive="";
$aboutactive="";
$profactive="";
if($pageName=="index.php"){
	$indexactive="active";
	$produitactive="";
	$aboutactive="";
	$profactive="";
}
else if($pageName=="produits.php"){
	$indexactive="";
	$produitactive="active";
	$aboutactive="";
	$profactive="";

}
else if($pageName=="about.php"){
	$indexactive="";
	$produitactive="";
	$aboutactive="active";
	$profactive="";
}
else if($pageName=="profile.php"){
	$indexactive="";
	$produitactive="";
	$aboutactive="";
	$profactive="active";
}
include "fonctions.php";
session_start();
$prods=getProducts();
if(isset($_POST["login"])){
$login=$_POST["login"];
$psw=$_POST["psw"];
$conn=connexion();
$req="SELECT * FROM clients WHERE `username`='$login' AND `password`='$psw' ";
$res=$conn->query($req);
$client=$res->fetch();
if(isset($client["id"])){
	
	$_SESSION["id"]=$client["id"];
	$_SESSION["nom"]=$client["nom"];

}

else{
	print '
	<script>
		alert("login ou mot de passe incorrect")
	</script>
	';
}
}
if(isset($_SESSION["id"])){
	$userid=$_SESSION["id"];
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <!-- fav icon-->
  <link rel="apple-touch-icon" sizes="180x180" href="../admin/images/fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../admin/images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../admin/images/fav/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
  <!-- fav icon-->

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Esprit Cuisine</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav  style="border-bottom:1px solid white" class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.php">Esprit Cuisine<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item <?php echo $indexactive;?>">
							<a class="nav-link" href="index.php">Acceuil</a>
						</li>
						<li class="nav-item <?php echo $produitactive;?>"><a class="nav-link" href="produits.php">Produits</a></li>
						<li class="nav-item <?php echo $aboutactive;?>"><a class="nav-link" href="about.php">About Us</a></li>
						<?php
							if(isset($_SESSION["id"])){
								print'
								
						<li style="margin-top:-5px"class="nav-item '.$profactive.'"><a class="nav-link" href="profile.php?id='.$userid.'"><span class="nav-link" href="contact.html">'.$_SESSION["nom"].'    <img style="margin-left:10px;margin-top:-5px;margin-right:3px" src="../admin/images/user.svg"><?php echo $user; ?></span></a></li>
						<li><span class="nav-link" href="contact.html"></span></li>
					
						<li>
						<a class="nav-link" href="deconnexion.php">Déconnexion</a>
						</li>
								';
							}
							else{
								print'
								
						<li><a class="nav-link" href="inscription.php">Inscription</a></li>
						<li>
						<form action="index.php" method="post" style="display:flex;align-items:center">
  <div class="mb-3">
    
    <input placeholder="Login" name="login" style="width:140px;margin-right:10px;height:45px" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    
    <input placeholder="Mot de Passe" name="psw" style="width:140px;height:45px;margin-right:10px;border-radius:none" type="password" class="form-control" id="exampleInputPassword1">
  </div>
 
  <button style="margin-top:-14px;background-color:#f9bf29;color:#2f2f2f" type="submit" class="btn btn-primary">Connexion</button>
</form>
						</li>
								';
							}
						?>