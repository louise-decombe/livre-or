<?php
//la session démarre
session_start();
//si la demande déconnexion existe, fin de la session
      if(isset($_GET['deconnexion'])){

unset($_SESSION['login']);
//au bout de 2 secondes redirection vers la page d'accueil
header("Refresh: 2; url=index.php");

echo "<p>Vous avez été déconnecté</p><br><p>Redirection vers la page d'accueil...</p>";
      }
    ?>
    <?php
    //connexion à la base de donnée
    $url='127.0.0.1';
    $username='root';
    $password='';
    $conn=mysqli_connect($url,$username,$password,"livreor");
    if(!$conn){
     die('Could not Connect My Sql:' .mysql_error());
    }
    ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="header_index">
  <?php
  if(isset($_SESSION['login'])){
    echo ' <a href="profil.php">Bienvenu  '.$_SESSION['login'].'</a>';
  }
  else {
    echo "<a href='connexion.php'> connexion </a>";
  }?>
  <a href="livre-or.php">Voir le livre d'or</a>
</div>
<main>


<div class="intro">

<h1><img src="logo.png" alt="" class="logo">

 My kitchen  </h1>

<p>Vous avez apprecié la cuisine de My Kitchen ? Vous pouvez laisser votre impression dans notre livre d'or </p>

</div>

<div class="formulaire_acces">

<div class="formulaire_access_part1">

  <h2> Pour signer le livre connectez vous </h2>
  <a href="connexion.php">Connexion</a>
</div>

<div class="formulaire_access_part2">

  <h2> inscrivez-vous pour signer le livre</h2>

  	<a href="inscription.php">Inscription</a>
  </div>

</div>


  <img src="cuisine1.jpg" alt="" class="cuisine">
</main>


<footer>
<div class="footer_index">

<p>Nous sommes sur les réseaux</p>
<img src="https://img.icons8.com/metro/26/000000/instagram-new.png"/>
<img src="https://img.icons8.com/material/24/000000/tripadvisor.png"/>
<img src="https://img.icons8.com/material-outlined/24/000000/facebook-circled.png"/>
</div>
</footer>
</body>



</html>
