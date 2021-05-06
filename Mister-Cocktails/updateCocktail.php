<?php

    include 'lib/database.php';

    $id = $_GET['Id'];

    // recuperer le produit dans la BD

    $pdo = connectToDatabase();

    $sql = "SELECT * FROM Cocktail WHERE id = ?";

    $query = $pdo->prepare($sql);

    $parameters = [$id];
    $query->execute( $parameters );

    $cocktail = $query->fetch(PDO::FETCH_ASSOC);

    include 'templates/update.phtml';

?>




