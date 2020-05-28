


<?php
session_start();

      if(isset($_GET['deconnexion'])){

unset($_SESSION['login']);
header("Refresh: 3; url=index.php");

echo "<p>Vous avez été déconnecté</p><br><p>Redirection vers la page d'accueil...</p>";
      }
    ?>
    <?php
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
  <title>Profil</title>
  <link rel="stylesheet" href="livre-or.css">
<link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&family=Roboto&display=swap" rel="stylesheet">

</head>

<body>


<main>

  <?php

  if(isset($_SESSION['login'])){

    echo 'Bon retour parmi nous '.$_SESSION['login'].'';
  }

   ?>

  <h1> Poster un commentaire </h1>

<a href="commentaire.php">Poster sur le livre d'or</a>

<h1> Modifiez vos informations </h1>
<form class="" action="profil.php" method="post">
<table>

<tr>
  <td>
Entrez le nouveau log
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
    <td>Re entrz votre password actuel</td>
    <td> <input type="password" name="confirmnewpassword" value=""> </td>
  </tr>
</table>
<p> <input type="submit" name="" value="Update Password"> </p>
</form>



        <br>
      <p>  Pour vous déconnecter <a href="profil.php?deconnexion">
        cliquez ici</a> </p>

      </main>
</body>

<footer>

<a href="index.php"> retour à l'accueil</a>
<a href="livre-or.php">voir le livre d'or</a>

</footer>

</html>
