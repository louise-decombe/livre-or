
<?php
//la session démarre
session_start();
//connexion à la base de donnée
$bdd= array();
$bdd['host']="localhost";
$bdd['user']="root";
$bdd['mdp']="";
$bdd["name"]="livreor";
$mysqli = mysqli_connect($bdd['host'], $bdd['user'],$bdd['mdp'], $bdd['name']);

//si la connexion ne fonctionne pas message d'erreur
if (!$mysqli) {
	echo "problème de connexion.";
	exit;
}


$monform=1;
//si les champs de login et de password sont remplis dans le formulaire
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
//requête d'insertion dans la base de donnée
		if (!mysqli_query($mysqli, "INSERT INTO utilisateurs SET login='".$_POST['login']."', password='".md5($_POST['password'])."'")) {
//si la requête ne fonctionne pas affichage d'une erreur
			echo "une erreur est arrivée :".mysqli_error($mysqli);
		}
//si la requête est correctement exécutée redirection vers la page de connexion
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
<input type="submit" value="inscription" class="form-submit-button">


</form>

<a href="index.php">Retour à l'accueil</a>


</body>



</html>
