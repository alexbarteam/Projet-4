<?php
	$blog = new Blog();
	$posts = $blog->getAllPost($blog);
?>

<!-- Section Blog -->
<section class="my-5">

	<!-- Section heading -->
	<h2 class="h1-responsive font-weight-bold text-center my-3">Épisodes Publiés</h2>
	<!-- Section description -->
	<p class="text-center w-responsive mx-auto mb-5">Retrouver tous les épisodes que j'ai publié jusqu'à aujourd'hui.</p>
	
	<hr class="my-5">

	<?php
		foreach($posts as $post) {
			?>
				<!-- Grid row -->
				<div class="row">

					<!-- Grid column -->
					<div class="col-lg-5">

						<!-- Featured image -->
						<div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
							<img src="./public/img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" class="img-fluid" >
							<a href="index.php?view=post&id=<?= $post->id ?>">
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>

					</div>
					<!-- End Grid column -->

					<!-- Grid column -->
					<div class="col-lg-7">

						<!-- Post title -->
						<h3 class="font-weight-bold mb-2"><?= $post->title ?></h3>
						<!-- Post date -->
						<p><small>Publié le <?= date("d/m/Y",strtotime($post->date)); ?></small></p>
						<!-- Excerpt -->
						<p><?= substr(html_entity_decode($post->content),0,500) ?>...</p>
						<!-- Read more button -->
						<a href="index.php?view=post&id=<?= $post->id ?>" class="btn btn-deep-orange btn-rounded btn-md">lire l'épisode</a>

					</div>
					<!-- End Grid column -->

				</div>
				<!-- End Grid row -->

				<!-- Separate Posts -->
				<hr class="my-5">

			<?php
		}
	?>
	
</section>
<!-- Section Blog -->