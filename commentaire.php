
<?php

session_start();

$bdd=new mysqli("localhost","root","","livreor");

$bdd= array();
$bdd['host']="localhost";
$bdd['user']="root";
$bdd['mdp']="";
$bdd["name"]="livreor";
$mysqli = mysqli_connect($bdd['host'], $bdd['user'],$bdd['mdp'], $bdd['name']);

if (!$mysqli) {

	echo "problème de connexion.";
	exit;
}

$monform=1;

if($_SESSION['login']){

if(isset($_POST['submit']))
{
	if(empty($_POST['submit']))
	{
	echo	"il manque votre commentaire";
	}

	else {

    if (!mysqli_query($mysqli, "INSERT INTO commentaires SET commentaire='".$_POST['commentaire']."'"))
    {
      echo "erreur est arrivée";
    }
else{
echo "<br />votre signature a bien été ajoutée";
			$monform=0;
		}
	}
}

}

?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="livre-or.css">
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">

    <title>Commentaires</title>
  </head>
  <body>

    <h2>Poster un commentaire</h2>

<form class="post" method="post">
Votre commentaire<textarea name="commentaire" placeholder="votre commentaire"></textarea>
<input type="submit" name="submit" value="poster le commentaire">
</form>


<?php if(isset($erreur)) {echo"Erreur:". $erreur;} ?>

<footer>
  <a href="index.php">Retour à accueil</a>
  <a href="profil.php"> Mon profil</a>
  <a href="livre-or.php">Voir le livre d'or</a>
</footer>
  </body>
</html>
