<!DOCTYPE html>
<html>
	<head>
		<title>Page des gateaux</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
		<?php
		  require("Article.class.php");
			/*require("Client.class.php");
			require("Panier.class.php");
			session_start();
			$panier = $_SESSION['panier'];*/
			//$client = $_SESSION['client'];
		?>
	</head>
<body class="chocolat">
		<header id="top">
			<a href="pagePrincipale.php" id="logo"> <input type="button" value="Déconnexion"> </a>
		<h1> Boulangerie "Les 5 gourmandes" </h1>
    <h2>Bienvenue sur la page des Gâteaux.</h2>
		</header>
<?php //On remplit la listeArticles avec le fichier comme dans la classe Panier
 //protected $listeArticles;     
  $i = 0;
      $fichier = fopen ("Fichiers/articles.txt", "r");
    	while (! feof ($fichier)) {
    		$c = fgets ($fichier);
        $Champ = explode(";",$c);
        $article = new Article($Champ[0],intval($Champ[1]),$Champ[2],floatval($Champ[3]));
    	$listeArticles[$i] = $article;
        $i = $i + 1;
      }
      fclose ($fichier);
      ?>
<form action="traiterArticles.php" method="POST">
	<div class="centrage">
	<table class="panier">
		<tr class="panier">
			<th class="panier">Nos Gâteaux</th>
			<th class="panier">Prix</th>
			<th class="panier">Quantité</th>
		</tr>
		<?php
			for ($i=0; $i < 18; $i++) {
          echo "<tr class=\"panier\">";
          echo "<td class=\"panier\">".$listeArticles[$i]->getNom()."</td>";
          $prix = $listeArticles[$i]->getPrix();
          echo "<td class=\"panier\">".$prix."€</td>";
          echo  "<td class=\"panier\"><input type=\"number\" name=\"quantite".strval($i)."\" min=\"1\" max=\"50\" defaultValue=\"0\"></td>";
          echo "</tr>";
    }
		?>
	</table>
	<br/>
	<a href="pagePrincipale.html"> <input type="button" value="Retour"> </a>

	<input type="submit" name="actionC" value="Valider"/>
	<input type="submit" name="effacerC" value="Effacer"/>
	</div>
</form>
</body>

</html>
