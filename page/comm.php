<?php
include "../database/database.php";

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
<?php
include "../layouts/head.php";
?>
<head>
    <meta http-equiv="refresh" content="5; URL=http://127.0.0.1/E-commerce_php/">
</head>

<?php
include "../layouts/nav.php";
?>

<body>
<div class="alert alert-success text-center mt-5 " role="alert">
        <h2 class="alert-heading">Votre Commande Enregistrée avec Succès.</h2>
        <hr>
        <p>Vous serez dirigé vers la page d'accueil après 5 secondes...</p>
    </div>