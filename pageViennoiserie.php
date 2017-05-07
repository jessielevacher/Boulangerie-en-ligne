<!DOCTYPE html>
<html>
	<head>
		<title>Page des pains et viennoiseries</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
		<?php
			require("Client.class.php");
			require("Panier.class.php");
			session_start();
			$panier = $_SESSION['panier'];
			//$client = $_SESSION['client'];
		?>
	</head>

<body class="article">
		<header id="top">
			<a href="pagePrincipale.php" id="logo"> <input type="button" value="Déconnexion"> </a>
		<h1> Boulangerie "Les 5 gourmandes" </h1>
    Bienvenue sur la page des pains et viennoiseries.
		</header>

<form action="traiterArticles.php" method="POST">
	<div class="centrage">
	<table class="article">
		<tr class="article">
			<th class="article">Nos Pains</th>
			<th class="article">Prix</th>
			<th class="article">Quantité</th>
		</tr>
		<?php
			AffichagePain();
		?>

	</table>
	<br/>
	<table class="article">
		<tr class="article">
			<th class="article">Nos Viennoiseries</th>
			<th class="article">Prix</th>
			<th class="article">Quantité</th>
		</tr>
		<?php
			AffichageViennoiserie();
		?>

	</table>

	<br/>
	<a href="pagePrincipale.php"> <input type="button" value="Retour"> </a>

	<input type="submit" name="actionP" value="Valider"/>
	<input type="submit" name="effacerP" value="Effacer"/>
	</div>
</form>
</body>

</html>
