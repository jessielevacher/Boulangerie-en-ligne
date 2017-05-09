<?php

 require("Client.class.php");
 session_start();
 $client = $_SESSION['client'];
 $panier = $client->getPanier();

	  if(isset($_POST["actionG"])){
		  for($i=0;$i<18;$i++){
        $n = $panier->listeArticles[$i]->getNom();
			   $panier->ajouterArticle($n,$_POST['quantite'.strval($i)])
		  }
      //header("Location:pagePrincipale.html");
      <script language="JavaScript">
        window.location.replace("pagePrincipale.html");
        </script>
    }

    if(isset($_POST["actionP"])){
  		  for($i=18;$i<36;$i++){
          $n = $listeArticles[$i]->getNom();
  			  $panier->ajouterArticle($n,$_POST['quantite'.strval($i)])
  		  }
        //header("Location:pagePrincipale.html");
        <script language="JavaScript">
          window.location.replace("pagePrincipale.html");
          </script>
	  }

    if(isset($_POST["actionC"])){
		  for($i=36;$i<54;$i++){
        $n = $listeArticles[$i]->getNom();
			  $panier->ajouterArticle($n,$_POST['quantite'.strval($i)])
		  }
      //  header("Location:pagePrincipale.html");*
      <script language="JavaScript">
        window.location.replace("pagePrincipale.html");
        </script>
    }
//}else {
    //   if (isset ($_POST ["effacerP"]) {
    //     //On réinitialise les pains et viennoiseries
    //     $panier->reinitialiserPanier(18,36);
    //     //On ouvre la page des pains et viennoiseries
    //     header("location:pageViennoiserie.php");
    //   }
     //
    //   if (isset ($_POST ["effacerC"]) {
    //     //On réinitialise les chocolats
    //     $panier->reinitialiserPanier(36,);
    //     //On ouvre la page des chocolats
    //     header("location:pageChocolat.php");
    //  }
     //
    //  if (isset ($_POST ["effacerG"]){
    //    //On réinitialise les gâteaux
    //    $panier->reinitialiserPanier(0,18);
    //    //On ouvre la page des gâteaux
    //    header("location:pageGateau.php");
    //  }
    //}

 ?>
