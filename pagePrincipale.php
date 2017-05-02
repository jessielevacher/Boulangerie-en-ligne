<!DOCTYPE html>
<html>
	<head>
		<title>Bienvenue à la boulangerie en ligne "Les cinq gourmandes" !</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<?php
		/*	require("Panier.class.php"); */
		?>
			<h1> Boulangerie "Les cinq gourmandes" </h1>
	</head>

	<body>

		</header>

<nav>
	<div id="barre_menu">
	<div class="lien">	<a href="commandes.php"> Mes commandes en cours </a> </div>
	<div class="lien">	<a href="panier.php"> Mon panier </a> </div>
	<div class="lien">	<a href="tmpDeconnection.php"> Se déconnecter </a> </div>
	</div>
</nav>

<section>
<figure>
		<div id="images_produit">
<a href="pageGateau.php">
  <img src="images/gateau.jpeg" alt="Gâteaux"/ width="100" height="100" >
</a>
 /* Mettre balises div pour les images renvoyant aux pages de produit*/
<a href="pageViennoiserie.php">
  <img src="images/viennoiserie.jpeg" alt="Pains/Viennoiseries"/ width="100" height="100">
</a>

<a href="pageChocolat.php">
  <img src="images/chocolat.jpeg" alt="Chocolats"/ width="100" height="100">
</a>
	</div>

</figure>
</section>
<footer>
Ce site est dévelopé dans le cadre d'un projet en GM4.
</footer>

</body>
</html>
