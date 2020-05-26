



<?php


session_start()

$pseudo=$_SESSION[


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
	

<main>
<h1> Modifiez vos informations </h1>


        <br>
      <p>  Pour vous déconnecter <a href="profil.php?deconnexion">cliquez ici</a> </p>
	
	
	
  <?php
        if(isset($_GET['deconnexion'])){
         
unset($_SESSION['login']);
header("Refresh: 3; url=index.php");

echo "<p>Vous avez été déconnecté</p><br><p>Redirection vers la page d'accueil...</p>";
        }
	                  
        
        
      ?>
      
      </main>
</body>

<footer>

<a href="index.php"> retour à l'accueil</a> 
<a href="livre-or.php">voir le livre d'or</a>


</footer>


</html>

