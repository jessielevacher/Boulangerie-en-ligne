<!DOCTYPE html>
<html>
	<head>
		<title>Page des pains et viennoiseries</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="CSS/style.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
		<?php

		?>
	</head>

	<body>
		<h1> Boulangerie "Les 5 gourmandes" </h1>
    Bienvenue sur la page des pains et viennoiseries.
		</header>
	<table>
			<tr>
				<th>Nos Pains</th>
				<th>Prix</th>
				<th>Quantité</th>
			</tr>
		for($i=0;$i<count();i++){
					  echo "<tr>";
					  echo "<td> $this->listeArticles[$i]->getNom() </td>";
					  echo "<td> $this->listeArticles[$i]->getPrix() </td>" ;
					  echo"</tr>";
					  }
	</table>
	</body>

</html>
