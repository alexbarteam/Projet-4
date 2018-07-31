<?php
$request = new Settings();

if($request->admin()!=1){
	
    header("Location:index.php?view=dashboard");
	
}
?>


	<!-- Section: Add Admin -->
	<section class="section mt-5">
	<br /><br />
	
		<form method="post">
			<!-- Grid row -->
			<div class="row text-center">

				<!-- Grid column -->
				<div class="table-responsive">

					<!-- Card -->
					<div class="card card-cascade cascading-admin-card user-card">

						<!-- Card Data -->
						<div class="admin-up d-flex justify-content-start">
							<i class="fa fa-users info-color py-4"></i>
							<div class="data">
								<h5 class="font-weight-bold black-text">Ajouter un admin - <span class="text-muted">Compléter les champs ci-dessous</span></h5>
							</div>
						</div>
								
						<?php							
						if(isset($_POST['add_admin'])) {

							$name = htmlspecialchars(trim($_POST['name']));
							$email = htmlspecialchars(trim($_POST['email']));
							$email_again = htmlspecialchars(trim($_POST['email_again']));
							$role = htmlspecialchars(trim($_POST['role']));
							$token = $request->token(30);

							$errors = [];

							if(empty($name) || empty($email) || empty($email_again)) {
									
								$errors['empty'] = "Veuillez remplier tous les champs";
										
							}

							if($email != $email_again) {
									
								$errors['different'] = "Les adresses email ne correspondent pas";
										
							}

							if($request->email_taken($email)) {
										
								$errors['taken'] = "L'adresse email est déjà assignée à un modérateur";
									
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
								$request->add_admin($name, $email, $role, $token);
							}

						}
						// End If
						?>

						<!-- Card content -->
						<div class="card-body">

							<!-- Grid row -->
							<div class="row">

								<!-- Grid column -->
								<div class="col-lg-6">

									<div class="md-form form-sm mb-0">
										<input type="text" name="name" id="name" class="form-control form-control-sm black-text"/>
										<label for="name" class="black-text">Nom</label>
									</div>

								</div>
										
							</div>
							<!-- End Grid Row -->
									
							<!-- Grid row -->
							<div class="row">
									
								<!-- Grid column -->
								<div class="col-lg-6">

									<div class="md-form form-sm mb-0">
										<input type="text" name="email" id="email" class="form-control form-control-sm black-text"/>
										<label for="email" class="black-text">Adresse email</label>
									</div>

								</div>

								<!-- Grid column -->
								<div class="col-lg-6">

									<div class="md-form form-sm mb-0">
										<input type="email" name="email_again" id="email_again" class="form-control form-control-sm black-text"/>
										<label for="email_again" class="black-text">Répéter adresse email</label>
									</div>

								</div>

							</div>
							<!-- End Grid row -->

							<!-- Grid row -->
							<div class="row">

								<!-- Grid column -->
								<div class="col-md-6">

									<div class="md-form form-sm mb-0">
										<select name="role" id="role" class="mdb-select colorful-select dropdown-primary">
											<option value="" disabled selected>Choisir un rôle</option>
											<option value="modo">Modérateur</option>
											<option value="admin">Administrateur</option>
										</select>
										<label for="role" class="black-text">Rôle</label>
									</div>

								</div>

							</div>
							<!-- End Grid row -->
							
							<center>
								<button type="submit" name="add_admin" class="btn btn-primary">Ajouter</button>
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
				
		<div class="clearfix my-5"></div>
				
		<!-- Grid row -->
		<div class="row text-center">
					
			<!-- Grid column -->
			<div class="table-responsive">

				<!-- Card -->
				<div class="card card-cascade narrower">

					<div class="view view-cascade gradient-card-header success-color">
						<!-- Title -->
							<h3 class="card-header-title">Administrateurs</h3>
					</div>
					
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Nom</th>
								<th scope="col">Email</th>
								<th scope="col">Rôle</th>
								<th scope="col">Validé</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$admins = $request->get_admin();
								foreach($admins as $admin){
							?>
									<tr id="admin_<?= $admin->id ?>">
										<td><?= $admin->name ?></td>
										<td><?= $admin->email ?></td>
										<td><?= $admin->role ?></td>
										<?php
											if(!empty($admin->password)) {
												echo '<td class="green-text"><em>vérifié</em> <i class="fa fa-check"></i></td>';
											}
											else {
												echo '<td class="red-text"><em><a href="http://alexandre-jacquin.fr/projet-4/admin/index.php?view=new" class="red-text">non vérifié</a></em> <i class="fa fa-ban"></i></td>';
											}
										?>
										<td>
											<a href="#" name="deletePost" id="<?= $admin->id ?>" class="btn-floating btn-small waves-effect waves-light danger-color delete-admin">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
							<?php
								}
							?>
						</tbody>
					</table>
						
				</div>
				<!--Card-->

			</div>
			<!-- Grid column -->

		</div>
		<!--Grid row-->

	</section>
	<!--Section: Add Admin-->