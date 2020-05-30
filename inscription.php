
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

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">

</head>

<?php

if(isset($_SESSION['login'])){
	echo "<h4>vous etes en ligne actuellement</h4> <br />";
	echo "<a href=profil.php>voir mon profil </a> ou <a href=index.php>retour à l'accueil </a> ou <a href=commentaire.php>
	signer le livre d'or</a> ";
	exit;
}

$monform=1;
//si les champs de login et de password sont remplis dans le formulaire
if(isset($_POST['login'], $_POST['password']))
{
	if(empty($_POST['login']))
	{
		"<p><i>il manque le login</i></p>";
	}

	elseif (empty($_POST['password'])) {
		echo "<p><i>il manque le mot de passe</i></p>";
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

<body>

<h1> Inscription  </h1>

<p> Remplissez le formulaire pour vous inscrire</p>

<div class="formulaire_inscription">

<form method="post" action="inscription.php">

<p>Login</p><input type="text" name="login">
<br />
<p>Password</p><input type="password" name="password">
<br />
<input type="submit" value="inscription" class="form-submit-button">

</form>
</div>
<div class="lien_inscription">
	<a href="index.php">Retour à l'accueil</a>
</div>

</body>



</html>
