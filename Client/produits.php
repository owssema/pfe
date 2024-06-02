<?php
include "header.php";
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
								<h1>Tous nos <span style="color:#f9bf29" clsas="d-block">Produits.</span></h1>
								
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

        <div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">
                    <?php
                        foreach($prods as $prod){
                    ?>
		      		<!-- Start Column i -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="afficher_produit.php?id=<?php echo $prod["id"];?>">
							<img src="../admin/images/<?php echo $prod["image"];?>" class="img-fluid product-thumbnail">
							<h3 class="product-title"><?php echo $prod["Desingation"];?></h3>
							<strong class="product-price"><?php echo $prod["prix"];?>TND</strong>

						
						</a>
					</div> 
					<!-- End Column i -->
						
					<?php }?>

					
		      	</div>
		    </div>
		</div>
		


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
