<!-- author Jessie & Laetitia
date 29/04/2017 -->

<!DOCTYPE html>
<html>
	<head>
		<title>Votre panier</title>
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

	<form action="traiterPanier.php" method="POST">
		<table class="panier">
			<tr class="panier"> <!-- Titres colonnes -->
				<th class="panier">Articles</th>
				<th class="panier">Quantité</th>
				<th class="panier">Prix</th>
				<th class="panier"></th>
			</tr>

			<?php
				$panier = $client->getPanier();
			//	$panier->afficherPanier();
			?>

		</table>

	<div class="centrage">
	<label for="date " id="date">Date de réception de la commande (2 jours ouvrables) : </label>

  <?php
    echo "<SELECT name='jour' id='jour'>";
		echo "<option selected disabled>Jour</option>";
			//Lister les jours
			for($jour=1; $jour<=31;$jour++){
				//Lister les jours pour pouvoir leur ajouter un 0 devant
				if ($jour < 10) echo "<OPTION>0$jour<br></OPTION>";
        else echo "<OPTION>$jour<br></OPTION>";
      }
    echo "</SELECT>";

    echo '<SELECT name="mois" id="mois">';
		echo "<option selected disabled>Mois</option>";
			//Lister les mois
 			for($mois=1; $mois<=12;$mois++){
				//Lister les jours pour pouvoir leur ajouter un 0 devant
				if ($mois < 10) echo "<OPTION>0$mois<br></OPTION>";
				else echo "<OPTION>$mois<br></OPTION>";
      }
    echo "</SELECT>";

    $date = date('Y'); //On prend l'année en cours

    echo '<SELECT name="annee" id="annee">';
		echo "<option selected disabled>Année</option>";
			//De l'année actuelle à l'année 2022
			for ($annee=$date; $annee<=$date+5; $annee++)
				echo "<OPTION><br>$annee<br></OPTION>";
    echo "</SELECT>";
	?>

  <br/>
  <input type="radio" id="matin" name="moment" value="matin" /> <label class="labelradio" for="matin "> matin </label>
  <input type="radio" id="après-midi" name="moment" value="après-midi" /> <label class="labelradio" for="après-midi "> après-midi </label>
	<br/>
	<input type="submit" name="action" value="Commander"/>

	<a href="pagePrincipale.html"> <input type="button" value="Retour"> </a>
	</div>

	</form>

</body>

</html>
