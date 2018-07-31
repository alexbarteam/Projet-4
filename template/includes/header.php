<!DOCTYPE html>
<html lang="fr" class="full-height">
<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Jean Forteroche">
    <meta name="keywords" content="">
    <meta name="author" content="">
	
	<!-- Meta Open Graph -->
	<meta property="og:title" content="Jean Forteroche" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://alexandre-jacquin.fr/" />
	<meta property="og:image" content="" />
	<meta property="og:description" content="" />
	
	<!-- Meta Twitter Card -->
	<meta name="twitter:card" content="summary">
	
	<!-- Titre Site -->
    <title>Jean Forteroche</title>
	
    <!-- Favicon -->
    <!--<link rel="shortcut icon" type="image/x-icon" href="img/ico/favicon.ico">-->
	
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    
	<!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="./public/css/mdb.min.css">
    
	<!-- Custom style -->
    <link rel="stylesheet" href="./public/css/style.css">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<header>
		<!--Main Navigation-->
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
			
			<!-- Navbar Container -->
			<div class="container">
			
				<!-- Navbar Brand -->
				<a href="index.php?view=home" class="navbar-brand deep-orange-text">jean forteroche</a>
					
				<!-- Toggle Button Mobile -->	
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<!-- Collapsible Content -->
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
						
					<!-- Links -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item <?php echo ($view=="home")?"active" : ""; ?>">
							<a class="nav-link" href="index.php?view=home"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
						</li>
						<li class="nav-item <?php echo ($view=="blog")?"active" : ""; ?>" >
							<a class="nav-link" href="index.php?view=blog"><i class="fa fa-book" aria-hidden="true"></i> Mon Blog</a>
						</li>
					</ul>
						
					<!--Search Form -->
					<!--
					<form class="form-inline">
						<div class="md-form my-0">
							<input class="form-control mr-sm-2" type="text" placeholder="Rechercher..." aria-label="Search">
						</div>
					</form>
					-->
				</div>
				<!-- End Collapsible Content -->
				
			</div>
			<!-- End Navbar Container -->
			
		</nav>
		<!-- End Main Navigation -->

		<!-- Content -->
		<?php
			// Display background if the view is different from the post page
			if($view != "post") {
				?>
					<div class="view jarallax" data-jarallax='{"speed": 0.5}' data-img-src="./public/img/header/background/alaska-glacier.jpg">
						<div class="mask rgba-stylish-strong flex-center">
							<div class="container text-center white-text wow fadeInUp">
								<h1 class="deep-orange-text">JEAN FORTEROCHE</h1>
								<h1 class="ml5">
								  <span class="text-wrapper">
									<span class="line line1"></span>
									<span class="letters letters-left">billet simple</span>
									<span class="letters letters-right">pour l'alaska</span>
									<span class="line line2"></span>
								  </span>
								</h1>
							</div>
						</div>
					</div>
				<?php
			}
		?>
	<header>