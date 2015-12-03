<?php
	//session_start();

	//Info site
	$nom_site = 'Nuit de l\'info';
	
	include ('connexion.php');
	include ('fonction.php');
	include ('index_corps.php');
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<!--	bootstrap		-->
	<link rel="stylesheet" href="CSS/bootstrap.min.css" /> 
	<link rel="stylesheet" media="screen" type="text/css" title="index CSS" href="CSS/index.css" />
	<link rel="icon" type="image/png" href="images/icon.png" />
	

	<meta http-equiv="Content-Type" content="text/html" />
	<meta charset="UTF-8" />
	<meta name="lang" content="fr" />
	<meta name="generator" content="gedit" />
	<meta name="author" content="" />
	<meta name="copyright" content="" />
	<meta name="description" content="Aperobot" />
	<meta name="keywords" content="" />

	<script type="text/javascript" src="JS/jquery.min.js"></script>

	<title><?php echo $nom_site ?></title>
</head>

	<header>
		<nav id="menu">
			<?php include ("menu.php"); ?> 
		</nav>
	</header>
	<body>
		<div id="corps" > 
			<?php include ($p.'.php'); /*Insertion de la page */ ?>
		</div>
	</body>
</div>
</html>
