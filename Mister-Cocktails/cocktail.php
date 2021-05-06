<?php

// ----  Chargement des fichiers de fonctions (librairie)
include 'lib/database.php';

// ---- Code principal

// Récupération de tous les cocktails stockés en base de données
$pdo = connectToDatabase();

$query = $pdo->prepare("
SELECT * 
FROM `Cocktail`
INNER JOIN categorie 
ON Cocktail.id_categorie = categorie.id_categorie
WHERE id = ?;
");

$query->execute([$_GET['Id']]);
//$query->execute();

$produit = $query->fetch(PDO::FETCH_ASSOC);

//echo '<pre>'; var_dump($produit); echo '</pre>';

// ---- Chargement du template

// Affichage du template de la page d'accueil
include 'templates/cocktail.phtml';