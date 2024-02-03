<?php
session_start();

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

<?php 

// Vérifier si le panier existe dans la session
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Le panier est vide.";
    exit; // Sortir du script si le panier est vide
}

// Récupérer les données du panier depuis la session
$cart = $_SESSION['cart'];

// Insérer les données du panier dans la table de commandes
foreach ($cart as $item) {
    $nomProduit = $conn->real_escape_string($item['nomProduit']);
    $prixProduit = $conn->real_escape_string($item['prixProduit']);
    
    // Requête d'insertion SQL
    $sql = "INSERT INTO commande (nom_produit, prix_produit) VALUES ('$nomProduit', '$prixProduit')";
    
    if ($conn->query($sql) !== TRUE) {
        echo "Erreur lors de l'insertion dans la base de données : " . $conn->error;
        $conn->close();
        exit;
    }
}

// Effacer le panier dans la session après l'insertion dans la base de données
unset($_SESSION['cart']);

// Afficher un message de succès
echo "Les données du panier ont été insérées dans la base de données avec succès.";

// Fermer la connexion à la base de données
$conn->close();
?>