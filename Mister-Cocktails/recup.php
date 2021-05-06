<?php
session_start();
// ----  Chargement des fichiers de fonctions (librairie)
include 'lib/database.php';

// ---- Code principal

//move_uploaded_file($_FILES["UrlPhoto"]["tmp_name"], $target_file)

// Récupération de tous les cocktails stockés en base de données

    //////////// MÉTHODE 1

    $pdo = connectToDatabase();

    // Creer la requete la SQL dans une variable

    $sql = "INSERT INTO Cocktail (`id`, `Nom`, `Description`, `UrlPhoto`, `DateConception`, `Prixindicatif` , `id_categorie`) VALUES (NULL, :Nom, :Description, :UrlPhoto, :DateConception, :Prixindicatif, :id_categorie)";

    // Charger la requete 

    $query = $pdo->prepare($sql);

    // Creer le tableau de valeur qui va remplacer les ? dans la requete
var_dump($_FILES);

    $parameters = [
        'Nom' => $_POST['Nom'] , 
        'Description' => $_POST['Description'] ,
        'UrlPhoto' => basename($_FILES['UrlPhoto']['name']) , 
        'DateConception' => $_POST['DateConception'] ,
        'Prixindicatif' => $_POST['Prixindicatif'] ,
        'id_categorie' => $_POST['id_categorie']
    ]; 

    // execution de la requete

    $query->execute( $parameters );
    
    //////////// MÉTHODE 2
/*     $pdo = connectToDatabase();
    $sql = 'INSERT INTO Cocktail VALUES(
        :Nom, 
        :Description,
        \'mojito.jpg\', 
        :DateConception, 
        :PrixIndicatif )';

    $parameters = [
        NULL,
        'Nom' => $_POST['Nom'] , 
        'Description' => $_POST['Description'], 
        'DateConception' => $_POST['DateConception'],
        'PrixIndicatif' => $_POST['PrixIndicatif']
    ];

    $query = $pdo->prepare($sql);

    // execution de la requete

    $query->execute( $parameters ); */

 // ======= VERSION 3 =========== 
    
    /* $pdo = connectToDatabase();

    $sql = 'INSERT INTO Cocktail VALUES(NULL, 
        :Nom, 
        :Description, 
        \'mojito.jpg\', 
        :DateConception, 
        :PrixIndicatif)';

    // Charger la requete 

    $query = $pdo->prepare($sql);

    // Creer le tableau de valeur qui va remplacer les ? dans la requete

    $query->bindValue( ':Nom' , $_POST['Nom'], PDO::PARAM_STR );
    $query->bindValue( ':Description' , $_POST['Description'], PDO::PARAM_STR );
    $query->bindValue( ':DateConception' , $_POST['DateConception'], PDO::PARAM_STR );
    $query->bindValue( ':PrixIndicatif' , $_POST['PrixIndicatif'], PDO::PARAM_STR );

    // execution de la requete

    $query->execute(); */
    
//////RENVOI À LA PAGE INDEX

    

// ---- Chargement du template

// Affichage du template de la page d'accueil
$uploaddir = '/Applications/MAMP/htdocs/Banderas/Day 6/cocktails - départ-1/www/images/cocktails/';
$uploadfile = $uploaddir . basename($_FILES['UrlPhoto']['name']);

echo '<p>Le cheming ou le qu\'est ce que le fichier va etre stockay : <em>' . $uploadfile . '</em></p>';

echo '<pre>';

// Sécurité : Retourne true si le fichier filename a été téléchargé par HTTP POST.
//      https://www.php.net/manual/fr/function.is-uploaded-file.php
if (is_uploaded_file($_FILES['UrlPhoto']['tmp_name'])) {

    // Vérifie que le fichier est bien PUIS l'envoi ou tu veux sur ton serveur (ou alors ton DD si t'es en local)
    if (move_uploaded_file($_FILES['UrlPhoto']['tmp_name'], $uploadfile)) {
        echo "Le fichier est valide, et a été téléchargé
            avec succès. Voici plus d'informations :\n";
            
        // Réutilisation : dans src d'une balise <img>
        echo '<img src="' . basename($_FILES['UrlPhoto']['name']) . '">';

        echo '<p>avec le bon cheming : ' . getcwd() . '<span style="color: red;"> / ' . $uploadfile . '</span></p>';
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
                Voici plus d'informations :\n";
        }
    }
    else {
    // TODO : Gérer les différents types d'erreur > Meillur debug & retour utilisateur
    //      https://www.php.net/manual/fr/function.is-uploaded-file.php#29635
    echo "<p>Problème lors de l'envoi du fichier :'( // Fixer erreurs/retours utilisateurs ici</p>.";
    }

    echo 'Voici quelques informations de débogage :';
    print_r($_FILES);

    echo '</pre>';

    
    $_SESSION['alerte'] = "Formulaire OK";
    // Je définit la session
    //
    header('Location: index.php');