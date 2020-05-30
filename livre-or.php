<?php

session_start();
 ?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">

</head>

<div class="header_index">
  <?php
  if(isset($_SESSION['login'])){
    echo ' <a href="profil.php">Bienvenu  '.$_SESSION['login'].'</a>';
  }
  else {
    echo "<a href='connexion.php'> connexion </a>";
  }?>
  <a href=".php">Voir le livre d'or</a>
</div>
<main>
<body>

<h1>Les signatures</h1>

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

  echo "<a href=commentaire.php><p> Signez le livre d'or</p> </a>";
}
else {
  echo "<a href=connexion.php><p>Connectez vous pour signer le livre </p></a>";
}

     ?>
<footer>
  <a href="index.php">Retour à accueil</a>
  <a href="profil.php"> Mon profil</a>
</footer>


</html>
