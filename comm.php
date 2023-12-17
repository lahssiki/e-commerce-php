<?php
include "database/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_client = $_POST['nom_client'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $phone = $_POST['phone'];
    $total_prix = $_POST['total_prix'];
    $product_id = $_POST['id_produit'];

    //$total_prix = isset($_POST["$total_prix"]) ? $_POST["$total_prix"] : 0;

    // Using prepared statement to prevent SQL injection
    $sql = "INSERT INTO commandes (id, nom_client, email, adresse, phone, total_prix, id_produit) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    $result = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($result, "ssssdi", $nom_client, $email, $adresse, $phone, $total_prix, $product_id);

    // Execute the statement
    mysqli_stmt_execute($result);

    // Close the statement
    mysqli_stmt_close($result);

    // Optionally, you might want to check for success and provide feedback to the user
    if ($result) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5; URL=http://127.0.0.1/E-commerce_php/index.php">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>E-commerce WebSite</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #EAFF69;">
        E-commerce WebSite
    </nav>
    <div class="container-fluid text-center">
        <h1>Votre Commande Enregistrée avec Succès.</h1>
        <p>Vous serez dirigé vers la page d'accueil après 5 secondes...</p>
    </div>