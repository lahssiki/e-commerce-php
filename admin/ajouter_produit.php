<?php
session_start();
require_once '../database/database.php';
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];

    // Using prepared statement to prevent SQL injection
    $sql = "INSERT INTO produits (id, name, description, quantite, prix, image) VALUES (NULL, ?, ?, ?, ?, ?)";
    $result = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($result, "ssids", $name, $description, $quantite, $prix, $image);

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Ajouter Produits</title>

</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #EAFF69;">
        Dashboard Admin
    </nav>
    <nav class="navbar navbar-light justify-content-center">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="../index.php">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="ajouter_produit.php">Add Produit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="commandes.php">Commandes</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h1 class="text-center">Add Produit</h1>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group m-2 col-md-6">
                    <label>Nom Produit</label>
                    <input type="text" class="form-control" name="name" placeholder="Nom Produit">
                </div>
                <div class="form-group m-2 col-md-6">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Description">
                </div>
            </div>
            <div class="form-group m-2 col-md-6">
                <label>Quantite</label>
                <input type="number" name="quantite" class="form-control" placeholder="0">
            </div>
            <div class="form-group m-2 col-md-6">
                <label>Prix</label>
                <input type="number" name="prix" class="form-control" placeholder="0 dh">
            </div>
            <div class="form-group m-2 col-md-6">
                <label>Image Produit</label>
                <input type="text" class="form-control" name="image" placeholder="Url">
            </div>
            <div class=" m-2">
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block text-center">Valide</button>
            </div>
        </form>
    </div>
</body>
<?php } else {
    header("Location:../index.php");
    exit();
} ?>

</html>