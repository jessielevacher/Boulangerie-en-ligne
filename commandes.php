<!-- author Jessie & Laetitia
date 1/05/2017 -->

<!DOCTYPE html>
<html>
	<head>
		<title>Vos commandes</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<?php
			require("Client.class.php");
			session_start();
			$client = $_SESSION['client'];
    ?>
	</head>

	<body class="panier">
		<h1> Boulangerie "Les 5 gourmandes" </h1>

		<div id="tableau">
			
			<table>
				<tr>
					<th><a href="pagePrincipale.html" class="bouton"> <input class="bouton" type="button" value="Les produits"></th>
					<th><a href="panier.php" class="bouton"> <input class="bouton" type="button" value="Mon panier"></th>
					<th><form action="deconnexion.php" method="POST"> <input class="bouton" type="submit" value="Se déconnecter"> </form></th>
				</tr>
			</table>
			
		</div>

		<h2> Mes commandes </h2>
		<table class="panier">
			<tr class="panier">
				<th class="panier">N° commande</th>
				<th class="panier">Date de réception</th>
				<th class="panier">Articles</th>
				<th class="panier">Total</th>
			</tr>

			<?php
				
				$client->afficherCommandes();
			?>
		</table>
</body>

</html>
