<?php
	$posts = $request->getHomePost($request);
?>

<!-- Section Post Feature -->
<section class="text-center">

	<!-- Section Heading -->
	<h1 class="section-heading h1 pt-4">Derniers Épisodes Publiés</h1>
	
	<hr class="my3" style="width:50%;">

	<!-- Grid Row -->
	<div class="row">

		<?php
			foreach($posts as $post) {
				?>

					<!--Grid column-->
					<div class="col-lg-4 col-md-6 mb-4">

						<!--Card-->
						<div class="card">

							<!--Card image-->
							<div class="view overlay">
								<img src="./public/img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" class="card-img-top">
								<a href="index.php?view=post&id=<?= $post->id ?>" target="_blank">
									<div class="mask rgba-white-slight"></div>
								</a>
							</div>

							<!--Card content-->
							<div class="card-body">
								<!--Title-->
								<h3 class="card-title"><?= $post->title ?></h3>
								<!-- Post Data -->
								<p><small>Écrit par <?= $post->name ?> le <?= date("d/m/Y",strtotime($post->date)); ?></small></p>
								<!--Text-->
								<p class="card-text"><?= substr(html_entity_decode($post->content),0,150) ?>...</p>
								<!-- Read More Button -->
								<a href="index.php?view=post&id=<?= $post->id ?>" class="btn btn-deep-orange btn-rounded btn-md">lire l'épisode</a>
							</div>

						</div>
						<!--/.Card-->

					</div>
					<!--Grid column-->

				<?php
			}
		?>

	</div>
	<!-- End Grid Row -->

</section>
<!-- End Section Post Feature -->