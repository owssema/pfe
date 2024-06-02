<?php
include "header.php";
$comms=getCommandesForClient($_SESSION["id"]);
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
								<h1>Historique des commandes de  <span style="color:#f9bf29" clsas="d-block"><?php echo $_SESSION["nom"]?></span></h1>
								
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

        <div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">
                  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Prix</th>
      <th scope="col">Date</th>
      <th scope="col">Etat</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=0;
    foreach($comms as $comm){
        $produit=getProductById($comm["idproduit"]);
        $i++;
        if($comm["etat"]=="validé"){$trclass="table-success";}
        else if($comm["etat"]=="annulée") {$trclass="table-danger";}
        else {$trclass="table-secondary";}
        ?>
    <tr class="<?php echo $trclass;?>">
      <th scope="row"><?php echo $i;?></th>
      <td><?php echo $produit["Desingation"];?></td>
      <td><?php echo $produit["prix"];?></td>
      <td><?php echo $comm["date"];?></td>
      <td><?php echo $comm["etat"];?></td>
    </tr>
<?php
    }
?>
   
  </tbody>
</table>
					
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
