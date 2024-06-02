<?php


include "header.php";
if(isset($_GET["id"])){
	$prodId=$_GET["id"];
	$thisProd=getProductById($prodId);
	}
	else{
		header("location:index.php");
	}
						?>
					</ul>


				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

			<!-- Start Hero Section -->
			<div class="hero" style="padding-top:20px;padding-bottom:20px">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Consulter en plus de détails votre <span style="color:#f9bf29" clsas="d-block">Produit.</span></h1>
								
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		<!-- End Hero Section -->
		

		<!-- Start We Help Section -->
		<div class="we-help-section" style="margin-top:30px">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="../admin/images/<?php echo $thisProd['image'];?>" alt="Untree.co"></div>
							
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4"><?php echo $thisProd['Desingation'];?></h2>
						<p><?php echo $thisProd['Description'];?></p>

						<ul class="list-unstyled custom-list my-4">
							<li>Prix : <?php echo $thisProd['prix'];?></li>
							
						</ul>
						<?php
							if(isset($_SESSION["id"])){
								print '<p><a href="commander.php?id='.$prodId.'" class="btn">Commander</a></p>';
							}
							else{
								print'<p>Connecter Vous ou Créer un compte pour commander</p>';
							}
						?>
						
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		


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
