<script type="text/javascript" src="node_modules\toastify-js\src\toastify.js"></script>
<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php
session_start();
if(!isset($_SESSION["admin_id"])){
	header("location:index.php");
}
$mess="";
include "fonctions.php";
$prods=getProducts();
if(isset($_POST["des"])){
$conn=connexion();
$des=$_POST["des"];
$desc=$_POST["desc"];
$prix=$_POST["prix"];
echo $prix;
$img=$_FILES["img"]["name"];
//Gérer le téléchargement de l'image

$dossier="images/";
$fileName=$_FILES["img"]["name"];
echo $fileName;
$dest=$dossier.$fileName;

if(!move_uploaded_file($_FILES["img"]["tmp_name"],$dest)){
    $toShow='<DIV>
    <h1>Erreur Impossible de téléverser le fichier</h1>
    <a class="btn btn-primary" href="ajouter_produit.php">RETOURNER</a>
    </DIV>';
}
$req="INSERT INTO `produits` (`id`, `Desingation`, `Description`, `prix`, `image`, `deleted`) VALUES (NULL, '$des', '$desc', '$prix', '$fileName','0');";
$res=$conn->query($req);
$mess='
<script>
Toastify({

    text: "Ajouté avec succé!",
    
    duration: 3000,
    style: {
        background: "linear-gradient(to right, #00b09b, #96c93d)",
      },
      offset: {
        x: 20, // horizontal axis - can be a number or a string indicating unity. eg: "2em"
        y: 640 // vertical axis - can be a number or a string indicating unity. eg: "2em"
      }
    
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
            input::file-selector-button {
                font-weight: bold;
                color: dodgerblue;
                height:100%;
                padding: 0.5em;
                border: thin solid grey;
                border-radius: 3px;
            }
        </style>
	</head>

	<body >
        <?php
            echo $mess;
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
						<li class="nav-item active">
							<a class="nav-link" href="#">Ajourt Produit</a>
						</li>
						<li><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
					
					</ul>

				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero" style="margin-top:-50px;min-height:92vh;display:flex;justify-content:center;">
				<div class="container" style="width:78%">
					<div class="row justify-content-between">
						<div style="display:flex;align-items:center">
								<h1 style="margin-right:50px">Ajouter Un Produit</h1>
                        </div>	
                        <form style="width:60%;" action="ajouterproduit.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="des" class="form-label">Désignation</label>
                                <input required name="des" type="text" class="form-control" id="des" aria-describedby="emailHelp">
                                
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Description</label>
                                <input required name="desc"  type="text" class="form-control" id="desc">
                            </div>
                            <div class="mb-3">
                                <label for="prix" class="form-label">Prix</label>
                                <input required name="prix" type="text" class="form-control" id="prix" aria-describedby="emailHelp">
                                
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <input required name="img" class="form-control" type="file" id="formFile">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <button type="reset" class="btn btn-danger">Annuler</button>
                        </form>
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
