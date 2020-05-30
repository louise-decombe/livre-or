
<?php
//la session démarre
session_start();
$bdd= array();
$bdd['host']="localhost";
$bdd['user']="root";
$bdd['mdp']="";
$bdd["name"]="livreor";
$mysqli = mysqli_connect($bdd['host'], $bdd['user'],$bdd['mdp'], $bdd['name']);
$requete="SELECT * from utilisateurs WHERE login = '".$_SESSION['login']."' ";
$query=mysqli_query($mysqli,$requete);
$resultat=mysqli_fetch_assoc($query);
//si la connexion ne fonctionne pas message d'erreur
if (!$mysqli) {
	echo "problème de connexion.";
	exit;
}

?>

<?php
//si la demande déconnexion existe, fin de la session
if (isset($_GET['deconnexion'])) {

    unset($_SESSION['login']);
    //au bout de 2 secondes redirection vers la page d'accueil
    header("Refresh: 2; url=index.php");

    echo "<p>Vous avez été déconnecté</p><br><p>Redirection vers la page d'accueil...</p>";
}
?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>

  <div class="header_index">
    <?php
if (isset($_SESSION['login'])) {
    echo ' <p> Voici votre profil ' . $_SESSION['login'] . '</p>';
} else {
    echo "<a href='connexion.php'> connexion </a>";
}
?>
   <a href="livre-or.php">Voir le livre d'or</a>
  </div>
<main>

<div class="profil_modif">

  <?php
//si la session est démarrée l'utilisateur est accueilli par le nom de son login
if (isset($_SESSION['login'])) {
}
// si la session n'existe pas possibilité de se connecter ou de s'inscrire
else {
    echo "vous devez vous <a href=connexion.php> connectez </a> pour voir votre profil ou vous <a href=inscription.php> inscrire </a>";
}
?>
<img src="img/logo.png" alt="">
<div class="or">

<a href="commentaire.php">Signer le livre d'or</a>
</div>


<div class="formulaire_profil">
  <h2> Modifiez vos informations </h2>

<form class="" action="profil.php" method="post">
<table>

<tr>
  <td>
Entrez le nouveau login
  </td>
  <td> <input type="username" name="login" value="<?php
echo $_SESSION['login'];
?>"> </td>
</tr>
<tr>
  <td>Rentrez votre nouveau password</td>
  <td> <input type="password" name="nouveaupassword" value=""> </td>
</tr>
  <tr>
<td>Confirmez votre nouveau password </td>
  <td> <input type="password" name="confirmerpassword" value=""> </td>
  </tr>

</table>
<p> <input type="submit" name="valider" value="valider les modifications"> </p>
</form>
</div>
        <br>
    <div class="deconnect">

    <a href="profil.php?deconnexion">
        Déconnexion </a>

<a href="index.php"> retour à l'accueil</a>
   </div>
</div>
</main>

<?php
$bdd= array();
$bdd['host']="localhost";
$bdd['user']="root";
$bdd['mdp']="";
$bdd["name"]="livreor";
$mysqli = mysqli_connect($bdd['host'], $bdd['user'],$bdd['mdp'], $bdd['name']);
$login=$_SESSION['login'];
$req1="SELECT * FROM utilisateurs";
?>
<?php
if(isset($_SESSION['login'])){
if(isset($_POST['valider'])){

if(mysqli_query($mysqli,"UPDATE utilisateurs SET login='".htmlentities($_POST['login'],ENT_QUOTES,"UTF-8")."' WHERE login='$login'")){
                echo "<h2Login {$_POST['login']} modifié avec succès!<h2>";
            } else {
                echo "Il y a une erreur, mince !";
            }
        }
    if  (!isset($_POST['nouveaupassword'],$_POST['confirmerpassword'])){
            echo "Un des champs n'est pas reconnu.";
        } else {
            if($_POST['nouveaupassword']!=$_POST['confirmerpassword']){
                echo "Les mots de passe ne correspondent pas.";
            } else {
                $password=($req1['password']);
                $newpassword=md5($_POST['nouveaupassword']);
                $req=mysqli_query($mysqli,"SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'");

                    if(mysqli_query($mysqli,"UPDATE utilisateurs SET password='$newpassword' WHERE login='$login'")){
                        echo "<h1>Mot de passe modifié avec succès!	</h1>";
                        $resultat=true;
                    } else {
                        echo "Une erreur est survenue";
                    }

            }
        }


}





?>

</body>

</html>
