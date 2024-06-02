<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<script type="text/javascript" src="node_modules\toastify-js\src\toastify.js"></script>
<?php
session_start();
if(!isset($_SESSION["admin_id"])){
	header("location:index.php");
}
$mess="";
$mess2="";
include "fonctions.php";
$prods=getProducts();
if(isset($_POST["rech"])){
	$prods=getProductsBySearch($_POST["rech"]);
}
if(isset($_GET["mod"]) && $_GET["mod"]==1){
	
	$mess2='
	<script>
	Toastify({
	
		text: "Modifier avec succé!",
		
		duration: 3000,
		style: {
			background: "linear-gradient(to right, #00b09b, #96c93d)",
		  },
		  offset: {
			x: 20, // horizontal axis - can be a number or a string indicating unity. eg: "2em"
			y: 640 // vertical axis - can be a number or a string indicating unity. eg: "2em"
		  },
		
		}).showToast();
	</script>
	';
}
if(isset($_GET["del"]) && $_GET["del"]==1 ){
	
	$mess2='
	<script>
	Toastify({
	
		text: "Supprimer avec succé!",
		
		duration: 3000,
		style: {
			background: "linear-gradient(to right, #660000, #f44336)",
		  },
		  offset: {
			x: 20, // horizontal axis - can be a number or a string indicating unity. eg: "2em"
			y: 640 // vertical axis - can be a number or a string indicating unity. eg: "2em"
		  },
		
		}).showToast();
	</script>
	';
	
}
if(isset($_POST["login"])){
	$conn=connexion();
$login=$_POST["login"];
$psw=$_POST["psw"];
$req="SELECT * FROM admin WHERE `username`='$login' AND `password`='$psw'";
$res=$conn->query($req);
$admin=$res->fetch();
if(isset($admin["id"])){
	session_start();
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

  <!-- Toastify CSS-->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <!-- Toastify CSS-->

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Esprit Cuisine Admin </title>
        <style>
            th,td{
                color:white;
            }
        </style>
	</head>

	<body >
		<?php
		echo $mess2;
		?>

		<!-- Start Header/Navigation -->
		<nav style="border-bottom:2px solid white" class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="acceuil.php">Esprit Cuisine<span style="color:#220e24">.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="acceuil.php">Acceuil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="ajouterproduit.php">Ajouter Produit</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="gerercomandes.php">Gérer Commandes</a>
						</li>
						<li><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
					
					</ul>

				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero" style="margin-top:-50px;min-height:90vh;display:flex;justify-content:center;">
				<div class="container" style="width:78%">
					<div class="row justify-content-between">
						<div style="display:flex;align-items:center">
								<h1 style="margin-right:50px">Tous les produits</h1>
								<form style="margin-top:-35px" class="row row-cols-lg-auto g-3 align-items-center" action="acceuil.php" method="post">
									<div class="col-12">
										<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
										<div class="input-group">
										<div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
										<input name="rech" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Chercher par Désignation">
										</div>
									</div>

									

									

									<div class="col-12">
										<button hidden type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
						</div>
                        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Désignation</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
      <th scope="col">Supprimé?</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php
        foreach($prods as $prod){
			$supp='<p style="color:green;padding-top:30px">NON</p>';
			$act='<a href="modifierproduit.php?id='.$prod["id"].'" style="border-radius:9px;background-color:#e04b5a;margin-right:16px" class="btn">Modifier</a><a href="supprimer.php?id='.$prod["id"].'"><i style="margin-top:20px;font-size:25px;color:red" class="fa-solid fa-trash"></i></a>';
			if($prod["deleted"]==1){
				$supp='<p style="color:red;padding-top:30px">OUI</p>';
				$act='';
			}
            print'
            <tr>
            <th scope="row">1</th>
            <td>'.$prod["Desingation"].'</td>
            <td>'.$prod["prix"].'</td>
            <td><img style="width:140px" src="images/'.$prod["image"].'"></td>
            <td>'.$supp.'</td>
            <td>'.$act.'</td>
          </tr>
            ';
        }
   ?>
 
  </tbody>
</table>  
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
