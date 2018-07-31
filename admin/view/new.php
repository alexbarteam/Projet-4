<?php
$request = new Validation();
?>

	<div class="clearfix my-5"></div>
	
	<!-- Content -->
	<div class="row">
		<div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
			<div class="col l4 m6 s12 offset-l4 offset-m3">
					
				<!-- Card Panel -->
				<div class="card-panel">
		
					<!-- Card -->
					<div class="card card-cascade narrower">

						<!-- Card image -->
						<div class="view view-cascade gradient-card-header light-blue">
							<!-- Title -->
							<h3 class="card-header-title"><i class="fa fa-user-circle prefix white-text"></i> Valider Admin</h3>
						</div>
									  
						<?php

							if(isset($_POST['submit'])){
								$email = htmlspecialchars(trim($_POST['email']));
								$token = htmlspecialchars(trim($_POST['token']));

								$errors = [];

								if(empty($email) || empty($token)) {
									
									$errors['empty'] = "Tous les champs n'ont pas été remplis";
									
								}
								else if($request->isAdmin($email, $token) == 0) {
									$errors['exist'] = "Ce modérateur n'existe pas";
								}
								
								if(!empty($errors)) {
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
								}
								else {
									$_SESSION['admin'] = $email;
								}
								?>
									<script>
										window.location.replace("index.php?view=password");
									</script>
								<?php
							}
						?>

						<form method="post">
							<!-- Card content -->
							<div class="card-body card-body-cascade text-center">
										
								<div class="row">
									<!-- Material input email -->
									<div class="md-form">
										<i class="fa fa-envelope prefix white-text"></i>
										<input type="text" id="email" name="email" class="form-control black-text">
										<label for="email" class="black-text">Adresse email</label>
									</div>

									<!-- Material input password -->
									<div class="md-form">
										<i class="fa fa-lock prefix white-text"></i>
										<input type="text" id="token" name="token" class="form-control black-text">
										<label for="token" class="black-text">Clé unique</label>
									</div>
								</div>
								<!-- End Row -->

								<center>
									<button type="submit" name="submit" class="btn waves-effect waves-light light-blue">Valider</button>
								</center>

							</div>
							<!-- End Card content -->
						</form>
					</div>
					<!-- End Card -->
				</div>
				<!-- End Card Panel -->
			</div>
		</div>
		<!-- End Col -->
	</div>
	<!-- End Row Content -->