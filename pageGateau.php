<!DOCTYPE html>
<html>
	<head>
		<title>Page des gâteaux</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
		<?php
		  require("Boulangerie.class.php");
			session_start();
			$client = $_SESSION['client'];
		?>
	</head>

	<body class="chocolat">
			<header id="top">
				<a href="page_connexion.html" id="logo"> <input type="button" value="Se déconnecter"> </a>
				<!-- Bouton à modifier selon ce qu'a fait Léa -->
				<h1> Boulangerie "Les 5 gourmandes" </h1>
	    	<h2> Bienvenue sur la page des Gâteaux. </h2>
			</header>

			<?php
	 			$boulangerie = new Boulangerie();
	    ?>

		<form action="traiterArticles.php" method="POST">
			<div class="centrage">
				<table class="panier">
					<tr class="panier">
						<th class="panier">Nos Grands Gâteaux</th>
						<th class="panier">Prix</th>
						<th class="panier">Quantité</th>
					</tr>

					<?php
						$boulangerie->AfficherCategorie(0,6);
						$boulangerie->AfficherCategorie(14,18);
					?>

				</table>

				<br/>

				<table class="panier">
					<tr class="panier">
						<th class="panier">Nos Petits Gâteaux</th>
						<th class="panier">Prix</th>
						<th class="panier">Quantité</th>
					</tr>

					<?php
						$boulangerie->AfficherCategorie(6,14);
					?>

				</table>

					<br/>


				<a href="pagePrincipale.html"> <input type="button" value="Retour"> </a>

				<input type="submit" name="actionG" value="Valider"/>
				<input type="reset" name="effacerG" value="Effacer"/>
			</div>
		</form>
	</body>

</html>
