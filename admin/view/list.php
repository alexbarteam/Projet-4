<?php
$request = new ListPosts;
$posts = $request->getAllPosts($request);

if($request->admin()!=1){
    header("Location:index.php?view=dashboard");
}
?>

<!-- Section Content -->
<section class="section text-center mt-5">

	<!-- Div Heading -->
	<br>
	<h2 class="h1-responsive font-weight-bold my-5">Épisodes Publiés</h2>
	<hr class="my-5">

	<!-- Grid Row -->
	<div class="row">

	<?php
		if(!empty($posts)) {
			foreach($posts as $post){
				?>
				
				<!-- Grid column -->
				<div class="col-lg-4 col-md-6 mb-4">

					<!--Card-->
					<div class="card">

						<!-- Card image -->
						<div class="view overlay">
							<img src="../public/img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" class="card-img-top">
							<a href="index.php?view=post&id=<?= $post->id ?>" target="_blank">
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>

						<!-- Card content -->
						<div class="card-body">
							<!-- Title -->
							<h3 class="card-title"><?= $post->title ?><?php echo ($post->posted == "0") ? "<i class='fa fa-lock'></i>" : "" ?></h3>
							<!-- Post Data -->
							<p><small>Écrit le <?= date("d/m/Y",strtotime($post->date)); ?></small></p>
							<!-- Text -->
							<p class="card-text"><?= substr(nl2br($post->content),0,150) ?>...</p>
							<!-- Modify Button -->
							<a href="index.php?view=post&id=<?= $post->id ?>" class="btn btn-deep-orange btn-rounded btn-md">Modifier</a>
						</div>

					</div>
					<!-- End Card -->

				</div>
				<!-- End Grid column -->

			<?php
			} // End foreach
		?>

	</div>
	<!-- End Grid Row -->

</section>
<!-- End Section Content -->

	<?php
		} // End if
		else {
			?>
				<div class="row">
					<div class="col s12">
						<h4>Aucun épisode de publier.</h4>
					</div>
				</div>
		<?php
		}
	?>