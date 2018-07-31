<?php
require_once('./model/login.class.php');

$access = new Restricted;

if(isset($_SESSION['admin'])){
	header("Location:index.php?view=dashboard");
}


	if(isset($_POST['lostpwd'])) {
		?>
			<script>
				window.location.replace("index.php?view=new");
			</script>
		<?php
	}
?>


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
							<h2 class="card-header-title"><i class="fa fa-user-circle prefix white-text"></i> administration</h2>
						</div>
									  
						<?php
							if(isset($_POST['submit'])){
								$email = htmlspecialchars(trim($_POST['email']));
								$password = htmlspecialchars(trim($_POST['password']));

								$errors = [];

								if(empty($email) || empty($password)) {
									$errors['empty'] = "Tous les champs n'ont pas été remplis!";
								}
								else if($access->isAdmin($email, $password) == 0) {
									$errors['exist']  = "Cet administrateur n'existe pas";
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
								}
								else {
									$_SESSION['admin'] = $email;
									header("Location:index.php?view=dashboard");
								}

							}
							// End If
						?>

						<form method="post">
							<!-- Card content -->
							<div class="card-body card-body-cascade text-center">
										
								<div class="row">
									<!-- Material input email -->
									<div class="md-form">
										<i class="fa fa-envelope prefix white-text"></i>
										<input type="text" id="email" name="email" class="form-control">
										<label for="email">Adresse email</label>
									</div>

									<!-- Material input password -->
									<div class="md-form">
										<i class="fa fa-lock prefix white-text"></i>
										<input type="password" id="password" name="password" class="form-control">
										<label for="password">Mot de passe</label>
									</div>
								</div>
								<!-- End Row -->

								<center>
									<button type="submit" name="submit" class="waves-effect waves-light btn light-blue">
										se connecter
									</button>
									<hr/>
									<button type="submit" name="lostpwd" class="btn light-blue">Mot de passe perdu ?</button>							
								</center>

							</div>
							<!-- End Card Content -->
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