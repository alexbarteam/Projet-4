<?php
$request = new Password();
?>


	<br />
	<br />
	
	<!-- Section: Add Admin Password -->
	<section class="section mt-5">
		
		<form method="post">
        
			<!-- Grid row -->
			<div class="row text-center">

				<!-- Grid column -->
				<div class="table-responsive">

					<!-- Card -->
					<div class="card card-cascade cascading-admin-card user-card">

						<!-- Card Data -->
						<div class="admin-up d-flex justify-content-start">
							<i class="fa fa-lock info-color py-4"></i>
							<div class="data">
								<h5 class="font-weight-bold black-text">Choisir un mot de passe - <span class="text-muted">Compléter les champs ci-dessous</span></h5>
							</div>
						</div>
						<?php
							if(isset($_POST['submit'])){
								$password = htmlspecialchars(trim($_POST['password']));
								$password_again = htmlspecialchars(trim($_POST['password_again']));

								$errors = [];
								if(empty($password) || empty($password_again)){
									$errors['empty'] = "Tous les champs n'ont pas été remplis";
								}

								if($password != $password_again){
									$errors['different'] = "Les mots de passe sont différents";
								}

								if(!empty($errors)){
									?>
									<div class="card red">
										<div class="card-content white-text">
											<?php
											foreach($errors as $error){
												echo $error."<br/>";
											}
											?>
										</div>
									</div>
								<?php
								}else{
									$request->update_password($password);
								?>
									<script>
										window.location.replace("index.php?view=dashboard");
									</script>
								<?php
								}
							}
							// End IF
						?>
							
						<!-- Card content -->
						<div class="card-body">

							<!-- Grid row -->
							<div class="row">

								<!-- Grid column -->
								<div class="col-lg-6">

									<div class="md-form form-sm mb-0">
										<input type="text" name="password" id="password" class="form-control form-control-sm black-text"/>
										<label for="password" class="black-text">Mot de passe</label>
									</div>

								</div>
									
								<!-- Grid column -->
								<div class="col-lg-6">

									<div class="md-form form-sm mb-0">
										<input type="text" name="password_again" id="password_again" class="form-control form-control-sm black-text"/>
										<label for="password_again" class="black-text">Répéter le mot de passe</label>
									</div>

								</div>
									
							</div>
							<!-- End Grid Row -->
								
							<br />
                            
							<center>
								<button type="submit" name="submit" class="btn light-green waves-effect waves-light">
									<i class="fa fa-lock left"></i> Valider
								</button>
							</center>

						</div>
						<!-- End Card Content -->

					</div>
					<!-- End Card -->

				</div>
				<!-- End Grid column -->

			</div>
			<!-- End Grid Row -->
		</form>

	</section>
	<!--Section: Add Admin Password -->
