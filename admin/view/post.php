<?php
	$request = new UpdatePost();
	$post = $request->getPost($request);

    if($request->admin()!=1) {
        header("Location:index.php?view=dashboard");
    }

    if($post == false) {
?>
		<script>
			window.location.replace("index.php?view=dashboard");
		</script>
<?php
	}


	if(isset($_POST['updatePost'])) {
		$title = htmlspecialchars(trim($_POST['title']));
		$content = htmlspecialchars(trim($_POST['content']));
		$posted = isset($_POST['public']) ? "1" : "0";
		$errors = [];

		if(empty($title) || empty($content)) {
			$errors['empty'] = "Veuillez remplir tous les champs";
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
			$request->editPost($title, $content, $posted, $_GET['id']);
?>
			<script>
				window.location.replace("index.php?view=post&id=<?= $_GET['id'] ?>");
			</script>
<?php
		}

	}
	
	if(isset($_POST['cancel'])) {
		?>
			<script>
				window.location.replace("index.php?view=list");
			</script>
		<?php
	}
?>

    <form method="post" enctype="multipart/form-data">
		<!-- Section: Create Page -->
		<section class="section mt-5">
			<br><br>
			<h2 class="mb-0">Modifier l'épisode</h2>
            
			<!-- First row -->
			<div class="row">
				
				<!-- First col -->
				<div class="col-lg-8">
					
					<!-- First card -->
					<div class="card mb-4 post-title-panel">
						<div class="card-body">
							<div class="md-form mt-1 mb-0">
								<input type="text" name="title" id="title" value="<?= $post->title ?>"/>
								<label for="title">Modifier le titre</label>
							</div>
						</div>
					</div>

					<!-- Second card -->
					<div class="card mb-4">
						<label for="content" class="text-center my-3">MODIFIER LE CONTENU</label>
						<textarea id="content" name="content" rows=20><?= $post->content ?></textarea>
					</div>

				</div>
				<!-- End First col -->
                
				<!-- Second col -->
				<div class="col-lg-4">

					<!-- Card -->
					<div class="card card-cascade narrower mb-4">

						<!-- Card image -->
						<div class="view gradient-card-header blue-gradient">
							<h3 class="mb-0">Modifier</h3>
						</div>

						<!--Card content-->
						<div class="card-body">
							<p><i class="fa fa-eye mr-1" aria-hidden="true"></i> Rendre public
								<div class="switch">
									<label>
										Non
										<input type="checkbox" name="public" <?php echo ($post->posted == "1")?"checked" : "" ?>/>
										<span class="lever"></span>
										Oui
									</label>
								</div>
							</p>
							<div class="text-center">
								<button class="btn btn-flat" type="submit" name="cancel">Annuler</button>
								<button class="btn btn-primary" type="submit" name="updatePost">Modifier</button>
							</div>
						</div>
						<!-- End Card content -->

					</div>
					<!-- End Card -->
					
					<br>
					
					<!-- Card -->
					<div class="card card-cascade narrower mb-4">

						<!-- Card image -->
						<div class="view gradient-card-header blue-gradient">
							<h3 class="mb-0">Supprimer Épisode</h3>
						</div>

						<!-- Card content -->
						<div class="card-body">
							<div class="text-center">
								<button name="deletePost" id="<?= $post->id ?>" class="btn peach-gradient delete-post">Supprimer</button>
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
