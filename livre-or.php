
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Le livre d'or</title>
  <link rel="stylesheet" href="livre-or.css">
<link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">

</head>


<?php

session_start();

$bdd=mysqli_connect("localhost","root","","livreor");

if(isset($_GET['id']) AND !empty($_GET['id'])) {

  $getid = htmlspecialchars($_GET['id']);

  $commentaire= $bdd ->prepare('SELECT * FROM commentaires');
  $commentaire->execute(array($getid));
  $commentaire = $commentaire->fetch();
}


 ?>

<body>

<h1> Voici tout ce qui est écrit sur le livre d'or </h1>

<p><? echo "$commentaire['commentaire'] ?"></p>


<a href="index.php">Retour à accueil</a>
<a href="profil.php"> Mon profil</a>
</html>
