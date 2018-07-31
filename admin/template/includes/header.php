<?php
require_once('../config/config.class.php');
$session = new Database;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Jean Forteroche">
    <meta name="keywords" content="">
    <meta name="author" content="">
	
	<!-- Titre Site -->
    <title>Jean Forteroche</title>
	
    <!-- Favicon -->
    <!--<link rel="shortcut icon" type="image/x-icon" href="img/ico/favicon.ico">-->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./private/css/bootstrap.min.css">
    
	<!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="./private/css/mdb.min.css">
	
	<!-- Custom style -->
    <link rel="stylesheet" href="./private/css/login.css">
    <link rel="stylesheet" href="./private/css/dashboard.css">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<?php
	if($session->admin()==1){
?>
<body class="white lighten-3">
	
	<div class="flexible-content">

		<!-- Main Navigation -->
		<header>
			<!-- Navbar Top -->
			<nav class="flexible-navbar white navbar navbar-light navbar-expand-lg fixed-top scrolling-navbar">
				<div class="container-fluid">

					<!-- Collapse -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Links -->
					<div class="collapse navbar-collapse" id="navbarSupportedContent">

						<!-- Left -->
						<ul class="navbar-nav mr-auto">
							<li class="nav-item ">
								<a class="nav-link waves-effect <?php echo ($view=="dashboard")?"active" : ""; ?>" href="index.php?view=dashboard">Tableau de bord</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link waves-effect <?php echo ($view=="settings")?"active" : ""; ?>" href="index.php?view=settings">Mon Profil</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link waves-effect <?php echo ($view=="write")?"active" : ""; ?>" href="index.php?view=write">Publier un épisode</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link waves-effect <?php echo ($view=="list")?"active" : ""; ?>" href="index.php?view=list">Liste des épisodes</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link waves-effect <?php echo ($view=="logout")?"active" : ""; ?>" href="index.php?view=logout">Se déconnecter</a>
							</li>
						</ul>
						
						<!-- Right -->
						<ul class="navbar-nav">
							<li class="nav-item">
								<span>Connecté : <strong><?= $_SESSION['admin'] ?></strong></span>
							</li>
						</ul>

					</div>

				</div>
			</nav>
			<!-- Navbar -->

			<!-- Sidebar -->
			<div class="sidebar-fixed position-fixed">

				<a class="logo-wrapper waves-effect">
					<strong class="blue-text">jean forteroche</strong>
				</a>

				<div class="list-group list-group-flush">
					<a href="index.php?view=dashboard" class="list-group-item list-group-item-action waves-effect <?php echo ($view=="dashboard")?"active" : ""; ?>">
						<i class="fa fa-pie-chart mr-3"></i>Tableau de bord
					</a>
					<a href="index.php?view=settings" class="list-group-item list-group-item-action waves-effect <?php echo ($view=="settings")?"active" : ""; ?>">
						<i class="fa fa-user mr-3"></i>Mon profil
					</a>
					<a href="index.php?view=write" class="list-group-item list-group-item-action waves-effect <?php echo ($view=="write")?"active" : ""; ?>">
						<i class="fa fa fa-book mr-3"></i>Publier un épisode
					</a>
					<a href="index.php?view=list" class="list-group-item list-group-item-action waves-effect <?php echo ($view=="list")?"active" : ""; ?>">
						<i class="fa fa-list-ol mr-3"></i>Liste des épisodes
					</a>
					<a href="index.php?view=logout" class="list-group-item list-group-item-action waves-effect <?php echo ($view=="logout")?"active" : ""; ?>">
						<i class="fa fa-sign-out mr-3"></i>Se déconnecter
					</a>
				</div>

			</div>
			<!-- Sidebar -->

		</header>
		<!-- End Main Navigation -->
					
<?php
	} // End if
	else {
?>
<body>
	<!-- Main Navigation -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
				
		<!-- Navbar Container -->
		<div class="container">
			<!-- Navbar Brand -->
			<a href="index.php?view=home" class="navbar-brand deep-orange-text">jean forteroche</a>	
		</div>
	</nav>
	<!-- End Main Navigation -->

	<!-- Main Content -->
	<div class="view admin-bg-2">
		<div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
	
<?php
	}
?>