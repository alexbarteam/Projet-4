<?php
$request = new Write;

if($request->admin()!=1){
    header("Location:index.php?view=dashboard");
}

if(isset($_POST['post'])){
	$title = htmlspecialchars(trim($_POST['title']));
	$content = htmlspecialchars(trim($_POST['content']));
	$posted = isset($_POST['public']) ? "1" : "0";

	$errors = [];

	if(empty($title) || empty($content)){
		$errors['empty'] = "Veuillez remplir tous les champs";
	}

	if(!empty($_FILES['image']['name'])){
		$file = $_FILES['image']['name'];
		$extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
		$extension = strrchr($file,'.');

		if(!in_array($extension,$extensions)){
                $errors['image'] = "Le format de l'image n'est pas pris en charge.";
		}
	}

	if(!empty($errors)) {
?>
		<div class="card red">
			<div class="card-content white-text">
				<?php
					foreach($errors as $error) {
						echo $error."<br/>";
					}
				?>
            </div>
		</div>
	<?php
	}
	else {
		$request->post($title, $content, $posted);
      
		if(!empty($_FILES['image']['name'])) {
			$request->postImg($_FILES['image']['tmp_name'], $extension);
		}
		else {
			$id = $this->_connection->lastInsertId();
			header("Location:index.php?view=post&id=".$id);
		}
	}
}

if(isset($_POST['cancel'])) {
	?>
		<script>
			window.location.replace("index.php?view=dashboard");
		</script>
	<?php
}
?>

	<form method="post" enctype="multipart/form-data">
		<!-- Section: Create Page -->
		<section class="section mt-5">
		<br><br>
        
        <h2 class="mb-0">Publier un épisode</h2>
		
		<!-- First row -->
		<div class="row">
        
			<!-- First col -->
			<div class="col-lg-8">
                        
				<!-- First card -->
				<div class="card mb-4 post-title-panel">
					<div class="card-body">
						<div class="md-form mt-1 mb-0">
							<input type="text" name="title" id="title" class="form-control black-text">
							<label for="title" class="black-text">Titre de l'épisode</label>
						</div>
					</div>
				</div>

				<!-- Second card -->
				<div class="card mb-4">
					<textarea name="content" id="content" rows=20></textarea>
				</div>

			</div>
			<!-- End First col -->
					
			<!-- Second col -->
			<div class="col-lg-4">

				<!-- Card -->
				<div class="card card-cascade narrower mb-4">

					<!-- Card image -->
					<div class="view gradient-card-header blue-gradient">
						<h3 class="mb-0">Image</h3>
					</div>

					<!-- Card content -->
					<div class="card-body">
						<div class="input-field file-field">
							<div class="btn btn-primary">
								<span class="white-text">parcourir</span>
								<input type="file" name="image"/>
							</div>
							<input type="text" class="file-path col s10" readonly />
						</div>
					</div>

				</div>
				<!-- End Card -->
							
				<br>
							
				<!-- Card -->
				<div class="card card-cascade narrower mb-4">

					<!-- Card image -->
					<div class="view gradient-card-header blue-gradient">
						<h3 class="mb-0">Publier</h3>
					</div>

					<!-- Card content -->
					<div class="card-body">
									
						<p><i class="fa fa-eye mr-1" aria-hidden="true"></i> Rendre public
							<div class="switch success-switch">
								<label>
									Non
									<input type="checkbox" name="public"/>
									<span class="lever"></span>
									Oui
								</label>
							</div>
						</p>
						<div class="text-right">
							<button class="btn btn-flat" type="submit" name="cancel">Annuler</button>
							<button class="btn btn-primary" type="submit" name="post">Publier</button>
						</div>

					</div>
					<!-- End Card content -->

				</div>
				<!-- End Card -->
							
			</div>
			<!-- End Second col -->
					
		</div>
		<!-- End First row -->
				
		</section>
		<!-- End Section: Create Page -->
			
	</form>