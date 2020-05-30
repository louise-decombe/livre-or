

<?php

//la session démarre
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">

</head>

<body>

<?php

if(isset($_SESSION['login'])){
	echo "<h4>vous etes en ligne actuellement</h4> <br />";
	echo "<a href=profil.php>voir mon profil </a> ou <a href=index.php>retour à l'accueil </a> ou <a href=commentaire.php>
	signer le livre d'or</a> ";

	exit;
}
//si la connexion est faite depuis la formulaire et le bouton submit
if(isset($_POST['connexion']))
{
	// vérification que les champs de login et password sont bien remplis
	if (empty($_POST['login']))
	{
		echo "<h2><i>il manque votre login.</i></h2>";
	}
	else
	{
		if(empty($_POST['password']))
		{
			echo "<h2><i>il manque votre mot de passe.</i></h2>";
		}
		else {

			$login= htmlentities($_POST['login']);
			$password= htmlentities($_POST['password']);
//connexion à la base de donnée
$mysqli= mysqli_connect ("localhost","root","","livreor");

if(!$mysqli){
	echo "erreur de connexion";
}


	else {
//si la session démarre, redirection vers la page de profil de l'utilisateur
	$_SESSION['login'] = $login;
	echo "vous êtes connecté";
header('location: profil.php');
}
}
}
}

?>

<h1> Connexion  </h1>

<h2> Remplissez le formulaire pour vous connecter</h2>

<form action ="connexion.php" method="post">

<p>Login</p> <input type="text" name="login" value=""/>
<br />
<p>Password</p> <input type="password" name="password" value=""/>
<br />
<input type="submit" name="connexion" value="connexion" class="form-submit-button"/>

</form>

<a href="index.php">Retour à l'accueil</a>
<a href="inscription.php">J'ai besoin de m'inscrire pour continuer</a>
</body>


</html>
