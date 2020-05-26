

<?php


session_start();

if(isset($_POST['connexion'])) 
{
	if (empty($_POST['login']))
	{
		echo "il manque votre login.";
	}
	else
	{
		if(empty($_POST['password'])) 
		{
			echo "il manque votre mot de passe.";
		}
		else {
			
			$login= htmlentities($_POST['login']);
			$password= htmlentities($_POST['password']);

$mysqli= mysqli_connect ("localhost","root","","livreor");

if(!$mysqli){
	echo "erreur de connexion";
}

	
	else {
	
	$_SESSION['login'] = $login;
	
header('location: profil.php');	
}
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
	

	
<h1> Connexion  </h1>

<h2> Remplissez le formulaire pour vous connecter</h2>

<form action ="connexion.php" method="post">

<p>Login</p> <input type="text" name="login" value=""/>
<br />
<p>Password</p> <input type="password" name="password" value=""/>
<br />
<input type="submit" name="connexion" value="connexion" />

</form>
	
<a href="index.php">Retour à l'accueil</a>	
<a href="inscription.php">J'ai besoin de m'inscrire pour continuer</a>
</body>


</html>

