<?php
  require("Client.class.php");
  require("Panier.class.php");
  session_start();
  $panier = $_SESSION['panier'];
  //$client = $_SESSION['client'];

  if (isset ($_POST ["action"])) {
	  if(isset($_POST["actionG"])){
		  for($i=0,$i<=18,$i++){
			  $panier->ajouterArticle($i,$_GET['quantite'.strval($i)])
		  }
      header("location:panier.php");
    }
      if(isset($_POST["actionP"])){
  		  for($i=19,$i<=36,$i++){
  			  $panier->ajouterArticle($i,$_GET['quantite'.strval($i)])
  		  }
      header("location:panier.php");
	  }
    if(isset($_POST["actionC"])){
		  for($i=37,$i<=54,$i++){
			  $panier->ajouterArticle($i,$_GET['quantite'.strval($i)])
		  }
      header("location:panier.php");
    }
}else {
      if (isset ($_POST ["effacerP"]) {
        //On réinitialise les pains et viennoiseries
        $panier->reinitialiserPanier(18,36);
        //On ouvre la page des pains et viennoiseries
        header("location:pageViennoiserie.php");
      }

      if (isset ($_POST ["effacerC"]) {
        //On réinitialise les chocolats
        $panier->reinitialiserPanier(36,);
        //On ouvre la page des chocolats
        header("location:pageChocolat.php");
     }

     if (isset ($_POST ["effacerG"]){
       //On réinitialise les gâteaux
       $panier->reinitialiserPanier(0,18);
       //On ouvre la page des gâteaux
       header("location:pageGateau.php");
     }

   }

 ?>
