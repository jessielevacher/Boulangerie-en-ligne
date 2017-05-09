<!DOCTYPE html>
<html>
	<head>
		<title>Page des chocolats</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
		<?php
		/*	require("Client.class.php");
			require("Panier.class.php");
			session_start();
			$panier = $_SESSION['panier'];
			//$client = $_SESSION['client'];
			*/
		?>
	</head>
<body class="chocolat">
		<header id="top">
			<a href="pagePrincipale.php" id="logo"> <input type="button" value="Déconnexion"> </a>
		<h1> Boulangerie "Les 5 gourmandes" </h1>
    <h2>Bienvenue sur la page des chocolats.</h2>
		</header>

<form action="traiterArticles.php" method="POST">
	<div class="centrage">
	<table class="panier">
		<tr class="panier">
			<th class="panier">Nos Chocolats</th>
			<th class="panier">Prix</th>
			<th class="panier">Quantité</th>
		</tr>
		<?php
			$boulangerie->AffichageChocolat();
		?>
	</table>
	<br/>
	<a href="pagePrincipale.html"> <input type="button" value="Retour"> </a>

	<input type="submit" name="actionC" value="Valider"/>
	<input type="reset" name="effacerC" value="Effacer"/>
	</div>
</form>
</body>

</html>
