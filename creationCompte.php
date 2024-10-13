<?php 
session_start();
include("navbar.php");
include("function.php");

if(isset($_SESSION["user"])){

  $user=unserialize($_SESSION["user"]);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<form method="POST" action="ajouter_compte.php">
 <div class="form-group">
 <label for="numeroCompte">Numéro de compte</label>
 <input type="text" class="form-control" minlength="5" maxlength="15" id="numeroCompte" name="numeroCompte"
placeholder="Numéro de compte" required>
 </div>
 <div class="form-group">
 <label for="solde">Solde</label>
 <input type="number" class="form-control" id="solde" name="solde" placeholder="Solde initial"
min="10" max="2000" required>
<div></div>
 </div>
 <div class="form-group">
 <label for="typeDeCompte">Type de compte</label>
 <select class="form-control" id="typeDeCompte" name="typeDeCompte" required>
 <option value="courant">Courant</option>
 <option value="epargne">Épargne</option>
 <option value="entreprise">Entreprise</option>
 </select>
 <div></div>
 </div>
 <input hidden type="number" value=<?=$user["clientId"]?> class="form-control" id="clientId" name="clientId">
 <button type="submit" class="btn btn-primary mt-4">Créer compte</button>
</form>
<?php
} else {

  echo "Accès non autorisée";
}



?>

<script>

  
</script>


