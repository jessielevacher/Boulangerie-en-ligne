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
				<h1> Boulangerie "Les 5 gourmandes" </h1>
	    	<h2> Bienvenue sur la page des Gâteaux. </h2>
			</header>

			<?php
	 			$boulangerie = new Boulangerie(); //on crée une instance de Boulangerie
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
					/* On affiche les éléments du fichier d'articles correspondant aux grands gâteaux et aux tartes*/
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
					/* On affiche les articles du fichier d'articles correspondant aux petits gâteaux */
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
