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
				<form action="deconnexion.php" method="POST"> <input class="bouton" type="submit" value="Se déconnecter"> </form>
				<!-- Bouton à modifier selon ce qu'a fait Léa -->
				<h1> Boulangerie "Les 5 gourmandes" </h1>
	    	<h2> Bienvenue sur la page des Pains et Viennoiseries </h2>
			</header>

			<?php
	 			$boulangerie = new Boulangerie();
	    ?>

			<form action="traiterArticles.php" method="POST">
				<div class="centrage">
					<table class="panier">
						<tr class="panier">
							<th class="panier">Nos Viennoiseries</th>
							<th class="panier">Prix</th>
							<th class="panier">Quantité</th>
						</tr>

						<?php
							$boulangerie->AfficherCategorie(18,28);
						?>

					</table>

					<br/>

				<table class="panier">
					<tr class="panier">
						<th class="panier">Nos Pains</th>
						<th class="panier">Prix</th>
						<th class="panier">Quantité</th>
					</tr>

					<?php
						$boulangerie->AfficherCategorie(28,36);
					?>

				</table>
				<br/>

				<a href="pagePrincipale.html"> <input type="button" value="Retour"> </a>

				<input type="submit" name="actionP" value="Valider"/>
				<input type="reset" name="effacerP" value="Effacer"/>
			</div>
		</form>
	</body>

</html>
