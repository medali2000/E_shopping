<?php
if(session_status() === PHP_SESSION_NONE){
  session_start();
}
require_once 'functions/header_functions.php';


require_once 'functions/auth.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title><?php if(isset($title)){ echo $title ;} else {echo 'E_Shoping' ; } ?> </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  

  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E_Shopping</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">

      <?= nav_item('/index.php','Acceuil');?>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catégorie
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Véhicules</a></li>
            <li><a class="dropdown-item" href="#">Immobilier</a></li>
            <li><a class="dropdown-item" href="#">Multimédias</a></li>
            <li><a class="dropdown-item" href="#">Vêtements</a></li>
          </ul>
      </li>


      <?php if(est_connecte()): ?>
        <?= nav_item('/publication.php','Publier annonce');?>
      <?php endif ?>

      <?= nav_item('/contact.php','Contact');?>
      </ul>
      
      
      <span class="navbar-nav">
        <?php if(!est_connecte()): ?>
        <a  class="btn btn-danger" href="/publication.php">Publier Une annonce</a>
        <?php endif ?>
      </span>&nbsp;&nbsp;&nbsp;
      <span class="navbar-nav">
        <?php if(!est_connecte()): ?>
        <a class="btn btn-success" href="/login.php">Connexion/Inscription</a>
        <?php endif ?>
      </span>
      
      <ul class="navbar-nav">
        <?php if(est_connecte()): ?>
        <li class="nav-item"><a class="btn btn-danger" href="/logout.php">Se déconnecter</a></li>
        <?php endif ?>
      </ul>
      
  </div>
</nav>

<main class="container">