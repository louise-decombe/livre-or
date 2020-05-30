
<?php
//la session démarre
session_start();

?>

<?php
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
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>

  <div class="header_index">
    <?php
    if(isset($_SESSION['login'])){
      echo ' <p> Voici votre profil '.$_SESSION['login'].'</p>';
    }
    else {
      echo "<a href='connexion.php'> connexion </a>";
    }?>
    <a href="livre-or.php">Voir le livre d'or</a>
  </div>
<main>

<div class="profil_modif">

  <?php
//si la session est démarrée l'utilisateur est accueilli par le nom de son login
  if(isset($_SESSION['login'])){
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
  <td> <input type="username" name="login" value="<?php echo $_SESSION['login']; ?>"> </td>
</tr>
<tr>
  <td>Rentrez votre password actuel</td>
  <td> <input type="password" name="password" value=""> </td>
</tr>
  <tr>
<td>Entrez votre nouveau password </td>
  <td> <input type="password" name="newpassword" value=""> </td>
  </tr>
  <tr>
    <td>Confirmez votre nouveau password</td>
    <td> <input type="password" name="confirmnewpassword" value=""> </td>
  </tr>
</table>
<p> <input type="submit" name="" value="Valider les modifications"> </p>
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

</body>

</html>
