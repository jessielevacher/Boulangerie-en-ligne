<!DOCTYPE html>
<html>
	<head>
		<title>Page des chocolats</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
		<?php
			require("Boulangerie.class.php");
			require("Panier.class.php");
			session_start();
			$panier = $_SESSION['panier'];

		?>
	</head>
<body class="article">
		<header id="top">
			<a href="pagePrincipale.php" id="logo"> <input type="button" value="Déconnexion"> </a>
		<h1> Boulangerie "Les 5 gourmandes" </h1>
    Bienvenue sur la page des chocolats.
		</header>
	
<form action="traiterArticles.php" method="POST">
	<div class="centrage">
	<table class="article">
		<tr class="article">
			<th class="article">Nos Chocolats</th>
			<th class="article">Prix</th>
			<th class="article">Quantité</th>
		</tr>
		<?php
			AffichageChocolat();
		?>
	</table>
	<br/>
	<a href="pagePrincipale.php"> <input type="button" value="Retour"> </a>
	
	<input type="submit" name="actionC" value="Valider"/>
	<input type="submit" name="effacerC" value="Effacer"/>
	</div>
</form>
</body>

</html>
