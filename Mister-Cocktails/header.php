<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mister Cocktail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400">
    <!-- <link rel="stylesheet" href="www/css/cocktails.css"> -->
    <link rel="stylesheet" href="www/css/cocktails.css?unique=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css%22%3E
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400%22%3E
  <link rel="stylesheet" href="www/css/cocktails.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="container-fluid">
    <nav>
        <img src="www/images/cocktails/logo.png" alt="logo">
        <h1>Mister Cocktail</h1>
        <a href="index.php">Accueil</a>
        <a href="add.php">Ajout d'un cocktail</a>
        <a href="admin.php">Page Admin</a>
    </nav>