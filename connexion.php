<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<form method="POST" action="validation.php">
 <div class="form-group">
 <label for="email">Email</label>
 <input type="email" class="form-control" id="email" name="email" placeholder="Email"
required>
 </div>
 <div class="form-group">
 <label for="mdp">Mot de passe</label>
 <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de
passe" required>
 </div>
 <button type="submit" class="btn btn-primary">Se connecter</button>
</form>