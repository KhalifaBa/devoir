<?php 
session_start();

include("function.php");


 if(creationCompteBancaire($pdo,$_POST["numeroCompte"],$_POST["solde"],$_POST["typeDeCompte"],$_POST["clientId"])){
  header("location: home.php");
 }


