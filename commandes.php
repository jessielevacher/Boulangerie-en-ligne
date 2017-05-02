<!-- author Jessie
date 1/05/2017 -->

<!DOCTYPE html>
<html>
	<head>
		<title>Vos commandes</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<?php
      require("Commande.class.php");
      require("Client.class.php");
    ?>
	</head>

	<body>
		<header id="top">
			<img id="logo" src="CSS/ecureil.png" alt="ecureil" width= "75"  />
		<h1> Boulangerie "Les 5 gourmandes" </h1>
		</header>

		<h2> Mes commandes </h2>
		<table>
			<tr> <!-- Titres colonnes -->
				<th>N° commande</th>
				<th>Date de réception</th>
				<th>Articles</th>
			</tr>

			<!-- Ce que doit afficher afficherCommandes()
			<tr>
				<td>302</td>
				<td>31/05/17 au matin</td>
				<td>3 croissant<br/> 1 baguette</td>
			</tr> -->
			<?php
				$client->afficherCommandes();
			?>
		</table>

</body>

</html>
