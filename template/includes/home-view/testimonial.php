<?php
	$lastCmts = $request->getLastComments($request);
	echo $lastCmts->seen;
?>
<!-- Section Testimonials -->
<section class="section pb-3 text-center">

    <!-- Section Heading -->
    <h1 class="section-heading h1 pt-4">derniers commentaires</h1>
    <!--Section description-->
    <p class="section-description">Les derniers commentaires écrient par les lecteurs du roman "Billet simple pour l'Alaska".</p>
	
	<hr class="my3" style="width:50%;">

	<div class="row">

		<?php
			if($lastCmts == false) {
				?>
				<center>
					<h3>Aucun commentaire actuellement.</h3>
				<center>
		<?php
				
			}
			else {
				foreach ($lastCmts as $lastCmt) {
					?>
					
						<!-- Grid column -->
						<div class="col-lg-4 col-md-12 mb-4">
						
							<!-- Card -->
							<div class="card testimonial-card">

								<!-- Background Color -->
								<div class="card-up deep-orange lighten-2"></div>

								<!-- Avatar -->
								<div class="avatar mx-auto white"><img src="./public/img/avatar/avatar.jpg" alt="avatar mx-auto white" class="rounded-circle img-fluid">
								</div>

								<div class="card-body">
									<!-- Name -->
									<h4 class="card-title mt-1"><?= $lastCmt->name ?></h4>
									<hr>
									<p><strong><?= $lastCmt->title ?></p></strong>
									<hr style="width:20%;background-color:#222;">
									<!-- Quotation -->
									<p><i class="fa fa-quote-left"></i> <?= nl2br($lastCmt->comment); ?></p>
								</div>

							</div>
							<!-- End Card -->
							
						</div>
						<!-- End Grid Column -->

					<?php
				}
			}
		?>
					
	</div>
	<!-- End Row -->

</section>
<!-- End Section Testimonials -->