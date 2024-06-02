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
include "fonctions.php";
$comms=getAllcommandes();
if(isset($_POST["rechD"])){
	$comms=getcommandesBySearchProduct($_POST["rechD"]);
}
if(isset($_POST["rechC"])){
	$comms=getcommandesBySearchClient($_POST["rechC"]);
}
if(isset($_POST["filter"])){
	$comms=getcommandesByStatusFilter($_POST["filter"]);
}
$mess2="";
if(isset($_GET["val"]) && $_GET["val"]==1){
	
	$mess2='
	<script>
	Toastify({
	
		text: "Commande Validée!",
		
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
if(isset($_GET["ann"]) && $_GET["ann"]==1){
	
	$mess2='
	<script>
	Toastify({
	
		text: "Commande Annulée!",
		
		duration: 3000,
		style: {
			background: "linear-gradient(to right,#660000, #f44336)",
		  },
		  offset: {
			x: 20, // horizontal axis - can be a number or a string indicating unity. eg: "2em"
			y: 640 // vertical axis - can be a number or a string indicating unity. eg: "2em"
		  },
		
		}).showToast();
	</script>
	';
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
			a{
				text-decoration:none;
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
						<li class="nav-item">
							<a class="nav-link" href="acceuil.php">Acceuil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="ajouterproduit.php">Ajouter Produit</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="#">Gérer Commandes</a>
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
								<h1 style="margin-right:50px">Gérer Les Commandes</h1>
                        </div>
						<div style="display:flex">
								<form style="margin-top:-35px; margin-right:50px" class="row row-cols-lg-auto g-3 align-items-center" action="gerercomandes.php" method="post">
											<div class="col-12">
												<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
												<div class="input-group">
												<div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
												<input name="rechD" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Chercher par Désignation">
												</div>
											</div>

											

											

											<div class="col-12">
												<button hidden type="submit" class="btn btn-primary">Submit</button>
											</div>
								</form>
								<form style="margin-top:-35px" class="row row-cols-lg-auto g-3 align-items-center" action="gerercomandes.php" method="post">
											<div class="col-12">
												<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
												<div class="input-group">
												<div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
												<input name="rechC" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Chercher par Client">
												</div>
											</div>

											

											

											<div class="col-12">
												<button hidden type="submit" class="btn btn-primary">Submit</button>
											</div>
								</form>
								<form id="filterForm"  action="gerercomandes.php" method="post">
								<select name="filter" id="filter"  style="margin-bottom:19px;height:50px" class="form-select" aria-label="Default select example">
										<option selected>Filtrer par état</option>
										<option value="En attente">En attente</option>
										<option value="validé">Validé</option>
										<option value="annulée">Annulé</option>
								</select>
								</form>
						</div>
						<table class="table">
								<thead>
									<tr>
									<th scope="col">#</th>
									<th scope="col">Client</th>
									<th scope="col">Email</th>
									<th scope="col">Produit</th>
									<th scope="col">Prix</th>
									<th scope="col">Date</th>
									<th scope="col">Etat</th>
									<th scope="col">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=0;
										foreach($comms as $comm){
											$i++;
											$prod=getProductById($comm["idproduit"]);
											$client=getClientById($comm["idclient"]);
											if($comm["etat"]=="En attente"){
													$etat='<p style="color:black;width:fit-content;background:#EEE;padding:5px">En attente</p>';
													$action='<p style="margin-top:5px"><a href="validercommande.php?id='.$comm["id"].'" style="margin-right:8px;color:white;width:fit-content;background:#80BB3D;padding:5px">Valider</a><a href="annulercommande.php?id='.$comm["id"].'" style="color:white;width:fit-content;background:#D00B1E;padding:5px">Annuler</a></p>';
											}
											else if ($comm["etat"]=="validé") {
												$etat='<p style="color:white;width:fit-content;background:#80BB3D;padding:5px">Validé</p>';
												$action='';
											}
											else if ($comm["etat"]=="annulée") {
												$etat='<p style="color:white;width:fit-content;background:#D00B1E;padding:5px">Annulée</p>';
												$action='';
											}

									?>
									<tr>
									<th scope="row"><?php echo $i?></th>
									<td><?php echo $client["nom"];?></td>
									<td><?php echo $client["email"];?></td>
									<td><?php echo $prod["Desingation"];?></td>
									<td><?php echo $prod["prix"];?></td>
									<td><?php echo $comm["date"];?></td>
									<td><?php echo $etat;?></td>
									<td><?php echo $action;?></td>
									
									</tr>
									<?php
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
		<script>
			formF=document.getElementById("filterForm");
			filterS=document.getElementById("filter");
			filterS.addEventListener("change",()=>{
					formF.submit();
			});
		</script>
	</body>

</html>
