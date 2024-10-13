<?php 


include("function.php");

$user = login($pdo,$_POST["email"],$_POST["mdp"]);


if(!empty($user)){
  session_start();
  $_SESSION['user']= serialize($user);

  header('location:home.php');
}else{
  echo "Informations incorrects";
}

?>