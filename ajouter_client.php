<?php 
include("function.php");


  


  if (inscription($pdo,$_POST["nom"],$_POST["prenom"],$_POST["telephone"],$_POST["email"],
  $_POST["mdp"])){

    header("location: connexion.php ");
  }

?>