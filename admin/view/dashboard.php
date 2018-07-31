<?php
$request = new Dashboard;

if($request->hasnt_password() == 1){
    header("Location:index.php?view=password");
}
?>
    <!--Main layout-->
	<div class="mt-5 p-5">
		<div class="mt-lg-5">
			<!--Grid row-->
			<div class="row fadeIn">
			
			<?php
				$tables = [
					"Publications"      =>  "posts",
					"Commentaires"      =>  "comments",
					"Administrateurs"   =>  "admins"
				];

				$colors = [
					"posts"     =>  "info-color fa fa-book",
					"comments"  =>  "success-color fa fa-file",
					"admins"    =>  "secondary-color fa fa-user"
				];
					

				foreach($tables as $table_name => $table) {
			?>
					<div class="col-md-4">
						<div class="cascading-admin-card card card-cascade">
							<div class="admin-up">
								<i class="<?= $request->getColor($table, $colors) ?>"></i>
								<div class="data">
									<h4><?= $table_name ?></h4>
									<?php $numInTable = $request->inTable($table); ?>
									<h3><strong><?= $numInTable[0] ?></strong></h3>
								</div>
							</div>
						</div>
					</div>
			<?php
				}
			?>
			</div>
			<!--Grid row-->
		</div>
	</div>
    <!--Main layout-->
	
<?php
    $comments = $request->getComments($request);
?>
	<div class="table-responsive">
		<div class="card-panel">
			<!-- Card -->
			<div class="card card-cascade narrower">
				<!-- Card image -->
				<div class="view view-cascade gradient-card-header success-color">
					<!-- Title -->
					<h3 class="card-header-title">Commentaires non lus</h3>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Épisodes</th>
							<th scope="col">Commentaires</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($comments)) {
							foreach ($comments as $comment) {
						?>
								<tr id="commentaire_<?= $comment->id ?>">
									<td><?= $comment->title ?></td>
									<td><?= substr($comment->comment, 0, 100); ?>...</td>
									<td>
										<a href="#" id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light success-color see-comment">
											<i class="fa fa-check"></i>
										</a>
										<a href="#" id="<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light danger-color delete-comment">
											<i class="fa fa-trash"></i>
										</a>
										<a href="#comment_<?= $comment->id ?>" class="btn-floating btn-small waves-effect waves-light info-color" data-toggle="modal" data-target="#comment_<?= $comment->id ?>">
											<i class="fa fa-plus"></i>
										</a>

										<!-- Modal Infos -->
										<div class="modal fade" id="comment_<?= $comment->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<!-- Modal Content -->
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header info-color">
														<h3 class="white-text"><?= $comment->title ?></h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<!-- Modal Body -->
													<div class="modal-body">
														<p>Commentaire posté par
															<strong><?= $comment->name . " (" . $comment->email . ")</strong><br/>Le " . date("d/m/Y à H:i", strtotime($comment->date)) ?>
														</p>
														<hr/>
														<p><?= nl2br($comment->comment) ?></p>
													</div>
													<!-- Modal Footer -->
													<div class="modal-footer">
														<a href="#" id="<?= $comment->id ?>" class="btn danger-color waves-effect waves-light delete-comment">
															<i class="fa fa-trash"></i>
														</a>
														<a href="#" id="<?= $comment->id ?>" class="btn success-color waves-effect waves-light see-comment">
															<i class="fa fa-check"></i>
														</a>
													</div>
												</div>
												<!-- End Modal Content -->
											</div>
										</div>							
										<!-- End Modal Infos -->

									</td>
								</tr>

						<?php
							}
						}
						else {
						?>
								<tr>
									<td></td>
									<td>
										<center>Aucun commentaire à valider</center>
									</td>
								</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<!-- End Card -->
		</div>
		<!-- End Card Panel -->
	</div>
	<!-- End Div Table -->