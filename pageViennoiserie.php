<!DOCTYPE html>
<html>
	<head>
		<title>Page des pains et viennoiseries</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
		<?php
			require("Boulangerie.class.php");
			require("Panier.class.php");
			session_start();
			$panier = $_SESSION['panier'];
			$pain = ;
		?>
	</head>
		
<body class="viennoiserie">
		<header id="top">
			<a href="pagePrincipale.php" id="logo"> <input type="button" value="Déconnexion"> </a>
		<h1> Boulangerie "Les 5 gourmandes" </h1>
    Bienvenue sur la page des pains et viennoiseries.
		</header>
		
	<table class="viennoiserie">
			<tr class="viennoiserie">
				<th class="viennoiserie">Nos Pains</th>
				<th class="viennoiserie">Prix</th>
				<th class="viennoiserie">Quantité</th>
			</tr>
		<?php
				$pain->AffichageViennoiserie();
		?>
		
	</table>
	</body>

</html>
