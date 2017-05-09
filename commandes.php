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
		<header id="top">
			<a href="pagePrincipale.php" id="logo"> <input type="button" value="Déconnexion"> </a>
		<h1> Boulangerie "Les 5 gourmandes" </h1>
		</header>

		<h2> Mes commandes </h2>
		<table class="panier">
			<tr class="panier">
				<th class="panier">N° commande</th>
				<th class="panier">Date de réception</th>
				<th class="panier">Articles</th>
				<th class="panier">Total</th>
			</tr>

			<?php $client->afficherCommandes(); ?>
		</table>
</body>

</html>
