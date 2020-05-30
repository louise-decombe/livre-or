
<?php
//je démarre la session
session_start();

//connexion à la base de donnée
$bdd= array();
$bdd['host']="localhost";
$bdd['user']="root";
$bdd['mdp']="";
$bdd["name"]="livreor";
$mysqli = mysqli_connect($bdd['host'], $bdd['user'],$bdd['mdp'], $bdd['name']);

// si la connexion échoue affichage de l'erreur
if (!$mysqli) {
	echo "problème de connexion.";
	exit;
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
<link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
		<div class="header_index">
			<?php
			if(isset($_SESSION['login'])){
				echo ' <a href="profil.php">Retour à votre profil  '.$_SESSION['login'].'</a>';
			}
			else {
				echo "<a href='connexion.php'> connexion </a>";
			}?>
			<a href="livre-or.php">Voir le livre d'or</a>
			</div>
</div>

<div class="formulaire_commentaire">

<form class="post" method="post">
<h1>Signez</h1><textarea name="commentaire" placeholder="votre commentaire"></textarea>
<input type="submit" name="submit" value="poster le commentaire">
</form>

<?php
// vérification que la session en cours existe
if(isset($_SESSION['login'])){
// vérification que le bouton submit du formulaire a été cliqué
if(isset($_POST['submit']))
{

$id=("SELECT * FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id");
$commentaire=($_POST['commentaire']);
date_default_timezone_set('Europe/Paris');
$date=date('Y-m-d h:i:s');
$id_utilisateur=($_SESSION['id']);
mysqli_query($mysqli, "INSERT INTO `commentaires`( `commentaire`,`date`,`id_utilisateur`) VALUES ('$commentaire','$date','$id_utilisateur')");
}
//si la zone de texte est vide au moment du submit, demande de la remplir
	if(empty($_POST['submit']))
	{
	echo	"il manque votre commentaire";
	}
echo "votre signature a été bien enregistrée";
	}

?>
</div>

<img src="cuisine2.jpeg" alt="" class="cuisine">

  </body>
</html>
