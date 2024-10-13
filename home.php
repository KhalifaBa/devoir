<?php 
session_start();

include("function.php");
include("navbar.php");
if(empty($_SESSION["user"])){
    echo "Accès non autorisée";
    
    exit();

}else{
    
    $user = unserialize($_SESSION["user"]);
    $tab = consulter($pdo,$user["clientId"]);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<h2 class="text-center">Consulter les comptes</h2>

<div class="row">
    <?php $i=1; foreach($tab as $compte): ?>
    <div class="card m-3">
        <div class="card-body">
            <h3 class="card-title">Compte n°<?=$i?></h3>
            <h5 class="card-title">Solde <?= $compte["solde"]; ?>€</h5>

            <p class="card-text">Type compte : <?= $compte["typeDeCompte"]; ?></p>

            <a href="depot.php?id=<?= $compte["compteId"]; ?>" class="btn btn-success">Dépot</a>
            <a href="retrait.php?id=<?= $compte["compteId"]; ?>" class="btn btn-danger">Retrait</a>
            <a href="virement.php?id=<?= $compte["compteId"]; ?>" class="btn btn-primary">Virement</a>
        </div>
    </div>
    <?php $i++; endforeach; ?>
</div>

<?php 

}