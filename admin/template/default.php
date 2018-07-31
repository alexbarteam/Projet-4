<?php
	require_once('controller/controller.php');
	
	if($view != 'login' && $view != 'new' && !isset($_SESSION['admin'])){
		header("Location:index.php?view=login");
	}

	/* HEADER */
	require ('includes/header.php');
?>
	
<!-- CONTENTS -->
<div class="container">
	<?php
		require './view/'.$view.'.php';
	?>
</div>
	
<?php
/* FOOTER */
require ('includes/footer.php');
?>
