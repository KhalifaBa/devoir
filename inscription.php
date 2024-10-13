<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<body>
<form method="POST" action="ajouter_client.php">
 <div class="form-group">
 <label for="nom">Nom</label>
 <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
 </div>
 <div class="form-group">
 <label for="prenom">Prénom</label>
 <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom"
required>
 </div>
 <div class="form-group">
 <label for="telephone">Téléphone</label>
 <input type="tel" class="form-control" id="telephone" name="telephone"
placeholder="Téléphone">
 </div>
 <div class="form-group">
 <label for="email">Email</label>
 <input type="email" class="form-control" id="email" name="email" placeholder="Email">
 </div>
 <div class="form-group">
 <label for="mdp">Mot de passe</label>
 <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de
passe" required>
 </div>
 <button type="submit" class="btn btn-primary">S’inscrire</button>
</form>
<a href="connexion.php" class="stretched-link">Déjà inscrit ? Connecte-toi !</a>
</body>