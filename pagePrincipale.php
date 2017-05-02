<!DOCTYPE html>
<html>
	<head>
		<title>Bienvenue à la boulangerie en ligne "Les cinq gourmandes" !</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<?php
			require("Panier.class.php");
		?>
	</head>

	<body>
		<h1> Boulangerie "Les 5 gourmandes" </h1>
		</header>


<a href="commandes.php"> Mes commandes en cours </a>
<a href="panier.php"> Mon panier </a>
<a href="tmpDeconnection.php"> Se déconnecter </a>

<figure>
<a href="pageGateau.php">
  <img src="images/gateau.jpeg" alt="Gâteaux"/ width="100" height="100" >
</a>

<a href="pageViennoiserie.php">
  <img src="images/viennoiserie.jpeg" alt="Pains/Viennoiseries"/ width="100" height="100">
</a>

<a href="pageChocolat.php">
  <img src="images/chocolat.jpeg" alt="Chocolats"/ width="100" height="100">
</a>
</figure>


</body>

</html>
