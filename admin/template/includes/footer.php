<?php
	if($session->admin()==1){
?>
		<!-- Footer -->
		<footer class="page-footer text-center font-small primary-color-dark darken-2 pt-0 mt-5">

			<!--Copyright-->
			<div class="footer-copyright py-3">
				© 2018 Copyright
				<a href="" target="_blank">Jean Forteroche</a> -
				Powered by <a href="https://mdbootstrap.com" target="_blank"> MDBootstrap.com </a>
			</div>
			<!-- End Copyright-->

		</footer>
		<!-- End Footer-->
	</div>
	<!-- End Flexible Content -->
<?php
	}
	else {
?>
		</div>
	</div>
	<!-- End Main Content -->
<?php	
	}
?>

	<!-- SCRIPTS JAVASCRIPT -->
    <!-- JQuery -->
    <script type="text/javascript" src="../public/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../public/js/mdb.min.js"></script>
	<!-- TinyMCE -->
	<script type="text/javascript" src="./private/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="./private/js/tinymce/jquery.tinymce.min.js"></script>
	<script>
		tinymce.init({
			language: 'fr_FR',
			selector: 'textarea',
			theme: 'modern'
		});
	</script>
	<!-- Custom Script -->
	<script type="text/javascript" src="./private/js/dashboard.class.js"></script>

</body>
</html>