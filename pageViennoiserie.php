<!DOCTYPE html>
<html>
	<head>
		<title>Page des pains et viennoiseries</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
		<?php
			/*require("Client.class.php");
			require("Panier.class.php");

			session_start();
			$panier = $_SESSION['panier'];
			//$client = $_SESSION['client']; */
		?>
	</head>

<body class="viennoiserie">
		<header id="top">
			<a href="page_connexion.html" id="logo"> <input type="button" value="Se déconnecter" class="bouton_deconnexion"> </a>
		<h1> Boulangerie "Les cinq gourmandes" </h1>
		<h2> Bienvenue sur la page des pains et viennoiseries. </h2>
		</header>

<form action="traiterArticles.php" method="POST">
	<div class="centrage">
	<table class="panier">
		<tr class="panier">
			<th class="panier">Nos Pains</th>
			<th class="panier">Prix</th>
			<th class="panier">Quantité</th>
		</tr>
		<tr>
			<td> Citron des neiges </td>
			<td> 24 E </td>
			<td> <select name="quantite" size="3" multiple="multiple">
<option value="1">0</option>
<option selected="selected" value="2">1</option>
<option value="3">2</option>
</select> </td>
		</tr>
		<!--	<?php
					$boulangerie->AffichagePain();
				?>
			-->

	</table>

	<br/>
	<table class="panier">
		<tr class="panier">
			<th class="panier">Nos Viennoiseries</th>
			<th class="panier">Prix</th>
			<th class="panier">Quantité</th>
		</tr>
		<!--		<?php
				$boulangerie->AffichageViennoiserie();
			?>
		-->
	</table>

	<br/>
	<a href="pagePrincipale.html"> <input type="button" value="Retour"> </a>

	<input type="submit" name="actionP" value="Valider"/>
	<input type="reset" name="effacerP" value="Effacer"/>
	</div>
</form>

</body>

</html>
