
<?php
session_start();
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

if(isset($_POST['login'], $_POST['password']))
{
	if(empty($_POST['login']))
	{
		"il manque le login";
	}

	elseif (empty($_POST['password'])) {
		echo "il manque le mot de passe";
	}

	else {

		if (!mysqli_query($mysqli, "INSERT INTO utilisateurs SET login='".$_POST['login']."', password='".md5($_POST['password'])."'")) {

			echo "une erreur est arrivée :".mysqli_error($mysqli);
		}
		else {
		header ("location:connexion.php");
			$monform=0;
		}
	}
}

?>






<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="livre-or.css">
<link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">

</head>


<body>



<h1> Inscription  </h1>

<h2> Remplissez le formulaire pour vous inscrire</h2>

<form method="post" action="inscription.php">


<p>Login</p><input type="text" name="login">
<br />
<p>Password</p><input type="password" name="password">
<br />
<input type="submit" value="inscription">


</form>

<a href="index.php">Retour à l'accueil</a>


</body>



</html>
