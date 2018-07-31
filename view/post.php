<?php
	$request = new Post();
	$posts = $request->getSinglePost($request);
	$responses = $request->getComments($request);
	foreach($posts as $post) {}
?>
	</div>
	
	<!-- HEADER -->
	<div class="view jarallax" data-jarallax='{"speed": 0.5}' data-img-src="./public/img/posts/<?= $post->image ?>">
		<div class="mask rgba-stylish-strong flex-center">
			<div class="container text-center white-text wow fadeInUp">
				<h1 class="deep-orange-text">Billet simple pour l'Alaska</h1>
				<h1 class="ml15">
					<span class="word"><?= $post->title ?></span>
				</h1>
			</div>
		</div>
	</div>
	
	<!-- SECTION CONTENT -->
	<section class="my-5">
        <div class="container">

            <br>
			<!-- Post Title -->
			<div class="text-center">
				<h2 class="deep-orange-text"><?= $post->title ?></h2>
				<h6>Publié le <i><small><?= date("d/m/Y", strtotime($post->date)) ?></small></i></h6>
			</div>
			
			<!-- Post Content -->
			<hr class="my-5">
            <div class="text-justify"><?= html_entity_decode($post->content); ?></div>
            <hr class="my-5">
			
			<!-- Post Comments -->
			<div class="card">
				<div class="card-body">
		
					<!-- Header -->
					<div class="form-header grey darken-3">
						<h3 class="mt-2 deep-orange-text"><i class="fa fa-quote-left" aria-hidden="true"></i> Commentaires</h3>
					</div>
					<?php
						if($responses != false) {
							foreach($responses as $response) {
								?>
									<br>
									<blockquote class="blockquote bq-primary">
										<h5 class="card-title blue-text"><strong><?= $response->name ?></strong> - <em><small>le <?= date("d/m/Y", strtotime($response->date)) ?></small></em></h5>
										<p class="card-text"><i class="fa fa-quote-left" aria-hidden="true"></i> <?= nl2br($response->comment); ?></p>
									</blockquote>
								<?php
							}
						}
						else {
							echo "<span class='text-center w-responsive mx-auto pb-5'>Aucun commentaire n'a été publié... Soyez le premier !</span>";
						}
					?>
					
				</div>
				<!-- End Card Body -->
			</div>
			<!-- End Card -->

            <hr class="my-5">
			
            <?php
                if(isset($_POST['submit'])) {
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $comment = htmlspecialchars(trim($_POST['comment']));
                    $errors = [];

                    if(empty($name) || empty($email) || empty($comment)) {
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    } 
					else {
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $errors['email'] = "L'adresse email n'est pas valide";
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
                        $request->addComment($name, $email, $comment);
                        ?>
                            <script>
                                window.location.replace("index.php?view=post&id=<?= $_GET['id'] ?>");
                            </script>
                        <?php
                    }

                }
				// End if
            ?>

			<!-- Form with header -->
			<form method="post">
				<div class="card">
					<div class="card-body">
		
						<!-- Header -->
						<div class="form-header grey darken-3">
							<h3 class="mt-2 deep-orange-text"><i class="fa fa-pencil"></i> Ajouter un commentaire</h3>
						</div>
						<center>
							<h5>Vos commentaires seront visibles une fois validés par l'administrateur.</h5>
						</center>
						<!-- Body -->
						<div class="md-form">
							<input type="text" name="name" id="name" class="form-control">
							<label for="name" class="black-text">Nom</label>
						</div>
						<div class="md-form">
							<input type="email" name="email" id="email" class="form-control">
							<label for="email" class="black-text">Adresse email</label>
						</div>
						<div class="md-form">
							<textarea type="text" name="comment" id="comment" class="form-control md-textarea" rows="5"></textarea>
							<label for="comment" class="black-text">Commentaire</label>
						</div>
						<div class="text-center">
							<button type="submit" name="submit" class="btn btn-light-blue waves-effect">Valider</button>
						</div>
						
					</div>
					<!-- End Card Body -->
				</div>
				<!-- End Card -->
			</form>
			<!-- End Form -->
		</div>
		<!-- END DIV CONTAINER -->
	</section>
	<!-- END SECTION CONTENT -->