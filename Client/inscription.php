<?php
	include "fonctions.php";
	$mess="";
	if(isset($_POST["nom"])){
		$nom=$_POST["nom"];
		$prenom=$_POST["prenom"];
		$login=$_POST["login"];
		$psw=$_POST["psw"];
		$tel=$_POST["tel"];
		$ad=$_POST["adresse"];
		$email=$_POST["email"];
		$psw2=$_POST["psw2"];
		if($psw != $psw2){
			print '
				<script>
					alert("Mot de passes non conformes, verifier!")
				</script>
	';
		}
		else{
			$conn=connexion();
			$req="INSERT INTO `clients` (`id`, `username`, `password`, `nom`, `prenom`, `tel`, `email`, `adresse`) VALUES (NULL, '$login', '$psw', '$nom', '$prenom', '$tel', '$email', '$ad')";
			$res=$conn->query($req);
			if($res){
				$mess='<h3 style="color:">Compte crée avec sucée dériger vous vers acceuil pour se connecter<a href="index.php">Cliquer ici</a></a></h3>';
			}
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

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Esprit Cuisine </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav style="border-bottom:1px solid white" class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Esprit Cuisine<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item active">
							<a class="nav-link" href="#">Inscription</a>
							
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="index.php">Acceuil</a>
							
						</li>
						
					</ul>

					
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero" style="margin-bottom:120px">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Inscriver Vous</h1>
								
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		
		<!-- Start Contact Form -->
		<div class="untree_co-section">
      <div class="container">

        <div class="block">
          <div class="row justify-content-center">


            <div class="col-md-8 col-lg-8 pb-4">


           

              <form action="inscription.php" method="post">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label  class="text-black" >Nom <span style="color:red">*</span></label>
                      <input required name="nom" type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black" for="lname">Prénom <span style="color:red">*</span></label>
                      <input required name="prenom" type="text" class="form-control" >
                    </div>
                  </div>
                </div>
				<div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black" for="fname">Email <span style="color:red">*</span></label>
                      <input required name="email" type="email" class="form-control" >
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black" for="lname">Adresse </label>
                      <input  name="adresse" type="text" class="form-control" >
                    </div>
                  </div>
                </div>
				<div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black" for="fname">Téléphon <span style="color:red">*</span></label>
                      <input required name="tel" type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black" for="lname">Nom d'utilisateur <span style="color:red">*</span></label>
                      <input required  name="login" type="text" class="form-control" >
                    </div>
                  </div>
                </div>
				<div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black" for="fname">Mot de passe <span style="color:red">*</span></label>
                      <input required  name="psw" type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black" for="lname">Confirmer mot de passe <span style="color:red">*</span></label>
                      <input required name="psw2" type="text" class="form-control" >
                    </div>
                  </div>
                </div>
              

                <button style="margin-top:15px" type="submit" class="btn btn-primary-hover-outline">Inscription</button>
              </form>
			  <?php echo $mess; ?>

            </div>

          </div>

        </div>

      </div>


    </div>
  </div>

  <!-- End Contact Form -->

		

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">


				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
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
