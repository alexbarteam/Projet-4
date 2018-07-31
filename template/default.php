<!-- HEADER -->
<?php
	include('./template/includes/header.php');
?>
		
<!-- BLOG CONTENTS -->
<div class="container">
	<?php
		include('./view/'.$view.'.php');
	?>
</div>
	
<!-- FOOTER -->
<?php
	include('./template/includes/footer.php');
?>