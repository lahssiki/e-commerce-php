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
    include "../layouts/head.php";
    include "../layouts/admin-nav.php";

?>
    <body>
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

<?php
    include "../layouts/footer.php";
} else {
    header("Location:../index.php");
    exit();
} ?>

</html>