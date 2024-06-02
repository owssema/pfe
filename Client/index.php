<?php
include "header.php";
						?>
					</ul>


				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Tout Pour Votre  <span style="color:#f9bf29" clsas="d-block">Cuisine</span></h1>
								<p class="mb-4"> Équipez votre cuisine avec notre gamme complète d'outils et d'équipements. Qualité exceptionnelle à des prix imbattables.</p>
								
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap" style="margin-top:30px">
								<img src="../admin/images/oven2.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Conçu avec un matériau d'excellente qualité.</h2>
						<p class="mb-4">Nos ustensiles de cuisine sont méticuleusement fabriqués pour garantir durabilité et performance. Chaque produit est testé pour répondre aux normes les plus élevées, vous assurant ainsi une expérience culinaire exceptionnelle. Découvrez la différence que des outils de qualité peuvent apporter à votre cuisine quotidienne. </p>
						
					</div> 
					<!-- End Column 1 -->

					<?php
						foreach($prods as $prod){
							print '
							<!-- Start Column 2 -->
							<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
								<a class="product-item" href="afficher_produit.php?id='.$prod["id"].'">
									<img src="../admin/images/'.$prod["image"].'" class="img-fluid product-thumbnail">
									<h3 class="product-title">'.$prod["Desingation"].'</h3>
									<strong class="product-price">'.$prod["prix"].'TND</strong>
		
									
								</a>
							</div> 
							<!-- End Column 2 -->
		
							';
						}
					?>
				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Pour quoi nous choisir</h2>
						<p>Nous nous engageons à vous offrir le meilleur en matière de matériel de cuisine. Nous comprenons que chaque détail compte et que la qualité de vos ustensiles peut transformer votre expérience culinaire.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="../admin/images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Livraison &amp; Rapide et Gratuite</h3>
									<p>Recevez vos produits chez vous en un rien de temps, sans frais supplémentaires, pour une expérience d'achat sans souci.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="../admin/images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Facile à Acheter</h3>
									<p>Profitez d'un processus de commande simple et intuitif, conçu pour rendre vos achats en ligne aussi agréables que possible.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="../admin/images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Assistance 24h/24 et 7j/7</h3>
									<p>Nous sommes toujours là pour répondre à vos questions, vous guider et vous offrir une assistance personnalisée, à tout moment et où que vous soyez.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="../admin/images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Retours Faciles et Sans Souci</h3>
									<p>Achetez en toute tranquillité d'esprit ! Si vous n'êtes pas entièrement satisfait de votre achat, notre processus de retour est simple et sans tracas, pour une expérience d'achat sans risque.






</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="../admin/images/pourquoi.png" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="../admin/images/cuisine1.webp" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="../admin/images/cuisine2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="../admin/images/images.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">Nous vous aidons à réaliser une conception intérieure moderne dans la cuisine.</h2>
						<p>Transformez votre cuisine en un espace moderne et fonctionnel avec notre expertise en design d'intérieur. Des solutions innovantes et des idées créatives vous attendent pour créer l'ambiance parfaite dans votre espace culinaire. Laissez-nous vous guider à travers le processus de conception pour réaliser la cuisine de vos rêves, alliant style et praticité.</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Personnalisez votre cuisine avec des touches uniques qui reflètent votre style et votre personnalité.</li>
							<li>Créez une atmosphère accueillante avec un éclairage innovant et des accents décoratifs.</li>
							<li>Profitez d'une consultation personnalisée pour des conseils et des recommandations sur mesure.</li>
							<li>Choisissez parmi une sélection de matériaux de haute qualité pour une esthétique moderne et durable.</li>
						</ul>
						
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
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved.  <!-- License information: https://untree.co/license/ -->
            </p>
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
