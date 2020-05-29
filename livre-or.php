<?php

session_start();
 ?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Le livre d'or</title>
  <link rel="stylesheet" href="livre-or.css">
<link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">

</head>



<body>

<h1> Voici tout ce qui est écrit sur le livre d'or </h1>

    <?php

    try
    {
      //connexion à la base de donnée
      $bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', '');
    }
    //vérification de l'existence d'une erreur
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
// requête à la bdd

    $reponse = $bdd->query('SELECT * FROM commentaires, utilisateurs');
    $donnees = $reponse->fetch();
// la boucle démarre pour afficher les commentaires
    while ($donnees = $reponse->fetch())
    {
    	echo $donnees['commentaire'].'<br />'.'posté le :   '. $donnees['date'] . '<br />'. 'par     '. $donnees['login']. '<br />';
    }
//fin de la requête
    $reponse->closeCursor();

    ?>

    <?php
if(isset($_SESSION['login'])){

  echo "<a><a href=commentaire.php> Signez le livre d'or </a></h2>";
}
else {
  echo "<a href=connexion.php>Connectez vous pour signer le livre </a></h2>";
}

     ?>
<footer>
  <a href="index.php">Retour à accueil</a>
  <a href="profil.php"> Mon profil</a>
</footer>


</html>
