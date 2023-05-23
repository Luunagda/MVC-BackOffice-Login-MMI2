<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <?= $css //boucle (pas dans controller)?>
    <title>Backoffice</title>
   <!-- <link rel="stylesheet" href="../css/css.css">-->
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MVC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Main">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/articles">Articles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/backoffice">Backoffice</a>
        </li>
        <?php 
        if ($user == null){
            ?>
        <li class="nav-item">
            <a class="nav-link" href="/login">Se connecter</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">S'inscrire</a>
        </li>
        <?php 
        } else {
            ?>
        <li class="nav-item">
            <a class="nav-link" href="/login/deconnexion">Bonjour <?= $user ?>, Se déconnecter</a>
        </li>
        <?php } ?>
        
      </ul>
    </div>
  </div>
</nav>
<h1>Bienvenue sur mon blog</h1>
</header>
<main>
<?php if($erreur !== null): ?>
    <div class="alert alert-danger mt-2 mb-2">
        <strong>Erreur !</strong><p><?= $erreur ?></p>
    </div>
<?php endif; ?>
<?= $content ?>
</main>
<footer>
<p>Copyright 2019</p>
</footer> 
</body>
</html>
