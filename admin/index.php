<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php
session_start();
{
	if(isset($_SESSION["admin_id"])){
		header("location:acceuil.php");
	}
}
$mess="";
include "fonctions.php";
if(isset($_POST["login"])){
	$conn=connexion();
$login=$_POST["login"];
$psw=$_POST["psw"];
$req="SELECT * FROM admin WHERE `username`='$login' AND `password`='$psw'";
$res=$conn->query($req);
$admin=$res->fetch();
if(isset($admin["id"])){
	
	$_SESSION["admin_id"]=$admin["id"];
	header("location:acceuil.php");
}
else{
	$mess="<h2> Nom d'utilisatuer ou mot de passe incorrects</h2>";
}
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		
		<!--fav icon -->
				<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
				<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
				<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
				<link rel="manifest" href="/site.webmanifest">
		<!--fav icon -->
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Esprit Cuisine Admin </title>
	</head>

	<body >

		<!-- Start Header/Navigation -->
		<nav style="border-bottom:2px solid white" class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Esprit Cuisine<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					

					<
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero" style="height:90vh;display:flex;justify-content:center;align-items:center;">
				<div class="container" style="width:78%">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt" style="margin-top:-30px">
								<h1>Connexion Espace Admin </h1>
								
							</div>
						</div>
						<div class="col-lg-7">
						<form action="index.php" method="post" style="margin-top:-80px;margin-bottom:55px">
  <div class="mb-3" >
    <label style="color:white" for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
    <input name="login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label style="color:white" for="exampleInputPassword1" class="form-label">Mot de Passe</label>
    <input name="psw" type="password" class="form-control" id="exampleInputPassword1">
  </div>
 
  <button style="background-color:#e04b5a" type="submit" class="btn btn-primary">Submit</button>
  <?php echo $mess;?>
</form>
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Footer Section -->
		<footer class="footer-section" style="padding:30px">
			

						<div class="col-lg-6 text-center text-lg-end" style="max-height:50px">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
