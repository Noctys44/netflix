<?php

require_once 'init.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>NETFLIX</title>
    <style>
    body {
        background: #1d1b1b;
    }
    label, h2, p, ul {
        color: white;
    }
    a:hover {
      color: red !important;
    }
    h1 {
      color : red;
      font-size : 50px;
      text-align : center;
    }
    a {
      color: white !important;
    }
    .black{
      color:black;
    }
    h3{
      color:black;
    }
  </style>
  </head>
  <body>


  <nav class="navbar navbar-expand-lg text-decoration-none">
    <div class="container-fluid">
        <a class="navbar-brand text-decoration-none" href="connexion.php">NETFLIX</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-controls="navbarColor01" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">

            <?php if (userConnected()) : ?>
              <li class="nav-item">
              <a class="nav-link" href="<?= URL ?>profil.php">Profil</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="<?= URL ?>connexion.php?action=deconnexion">Déconnexion</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
              <a class="nav-link" href="<?= URL ?>inscription.php">Inscription</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="<?= URL ?>connexion.php">Connexion</a>
              </li>
            <?php endif ?>
        </ul>
        </div>
    </div>
    </nav>
   
    