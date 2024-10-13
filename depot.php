<?php
session_start();

include("navbar.php");
include("function.php");
     
if(empty($_SESSION["user"])){
  echo "Accès non autorisée";
  
  exit();

}else{
    if(!empty($_POST["submit"])){
      depot($pdo,$_GET["id"],$_POST["somme"]);
      header("location: home.php");
    }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<form method="POST">
 <div class="form-group">
 <label for="solde">Somme dépot</label>
 <input type="number" class="form-control" id="somme" name="somme" placeholder="Solde dépot"
min="10" max="2000" required>
 </div>
 <input hidden type="number" value=<?=$_GET["id"]?> class="form-control" id="clientId" name="clientId">
 <button type="submit" name="submit" value="submit" class="btn btn-primary mt-4">Ajouter la somme</button>
</form>

<?php
}

