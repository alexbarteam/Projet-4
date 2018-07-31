	<?php
		require_once('./model/footer.class.php');
		$footer = new Footer();
		$lastposts = $footer->getLastPost($footer);
	?>
	<!-- Footer -->
	<footer class="page-footer font-small grey darken-4 pt-4 mt-4">

		<!-- Footer Links -->
		<div class="container text-center text-md-left">

			<!-- Grid Row -->
			<div class="row">
				
				<!-- Grid Column -->
				<div class="col-lg-3 mx-auto">

					<!-- Content -->
					<h5 class="font-weight-bold text-uppercase">qui suis-je ?</h5>
					<hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">
									  
					<h5 class="font-weight-bold">Jean Forteroche</h5>
					<p class="text-uppercase blue-text"><strong>Écrivain et auteur</strong></p>
					<p class="grey-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci  sed quia non numquam modi tempora eius.</p>
				</div>
				<!-- End Grid Column -->

				<hr class="clearfix w-100 d-md-none pb-3">

				<!-- Grid Column -->
				<div class="col-lg-3 mx-auto">

					<!-- Image -->
					<h5 class="font-weight-bold text-uppercase">dernier épisode</h5>
					<hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">

						<?php
							foreach($lastposts as $lastpost) {
								?>
									<div class="view overlay zoom">
										<a href="index.php?view=post&id=<?= $lastpost->id ?>" target="_blank">
											<img src="./public/img/posts/<?= $lastpost->image ?>" alt="<?= $lastpost->title ?>" class="img-fluid flex-center">
											<div class="mask flex-center rgba-orange-strong">
												<p class="font-weight-bold black-text"><?= $lastpost->title ?></p>
											</div>
										</a>
									</div>
								<?php
							}
						?>
					
				</div>
				<!-- End Grid Column -->
				
				<hr class="clearfix w-100 d-md-none pb-3">
				
				<!-- Grid Column -->
				<div class="col-lg-3 mx-auto">

					<!-- Links -->
					<h5 class="font-weight-bold text-uppercase">navigation</h5>
					<hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">

					<ul class="list-unstyled">
						<li>
							<a class="nav-link" href="index.php?view=home"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
						</li>
						<li>
							<a class="nav-link" href="index.php?view=blog"><i class="fa fa-book" aria-hidden="true"></i> Blog</a>
						</li>
						<li>
							<a class="nav-link" href="admin/index.php?view=login"><i class="fa fa-lock" aria-hidden="true"></i> Admin</a>
						</li>
						<li>
							<a class="nav-link" href="index.php?view=mentions"><i class="fa fa-file" aria-hidden="true"></i> Mentions légales</a>
						</li>
					</ul>

			  </div>
			  <!-- End Grid Column -->

			</div>
			<!-- End Grid Row -->

		</div>
		<!-- End Footer Links -->
		
				<hr class="clearfix mb-5">
				<hr class="clearfix mb-3">

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">
			© 2018 Copyright<a href="http://alexandre-jacquin.fr/projet-4/"> jean forteroche</a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- End Footer -->

	
	<!-- SCRIPTS JAVASCRIPT -->
	<!-- JQuery -->
	<script type="text/javascript" src="./public/js/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="./public/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="./public/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="./public/js/mdb.min.js"></script>
	<!-- Animation -->
	<script type="text/javascript" src="./public/js/modules/anime.js"></script>
	<!-- Custom Script -->
	<script type="text/javascript" src="./public/js/script.js"></script>

</body>
</html>