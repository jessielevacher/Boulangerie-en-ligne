<!DOCTYPE html>
<html>
	<head>
		<title>Page des gateaux </title>
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

<body class="gateau">
		<header id="top">
			<a href="pagePrincipale.php" id="logo"> <input type="button" value="Déconnexion"> </a>
		<h1> Boulangerie "Les 5 gourmandes" </h1>
    Bienvenue sur la page des gâteaux.
		</header>

<form action="traiterArticles.php" method="POST">
	<div class="centrage">

	<table class="panier">
			<tr class="panier">
				<th class="panier">Nos Gâteaux</th>
				<th class="panier">Prix</th>
				<th class="panier">Quantité</th>
			</tr>
		<?php
			//	AffichageGateau();
		?>

	</table>
	<br/>
	<a href="pagePrincipale.php"> <input type="button" value="Retour"> </a>

	<input class = "bouton" type="reset" name="actionG" value="Valider"/>
	<input class = "bouton" type="reset" name="effacerG" value="Effacer"/>
	</div>
</form>

</body>


</html>
