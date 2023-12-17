<?php
include "database/database.php";
// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database based on the product ID
    $sql = "SELECT * FROM `e-commerce_php`.`produits` WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $error_message = "Product not found.";
    }
} else {
    $error_message = "Product ID not provided.";
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

    <title>Cart</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #EAFF69;">
        E-commerce WebSite
    </nav>
    
    <?php if (isset($_GET['id'])) { ?>
    <h1 class="text-center">Cart</h1>
    <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover m-3 d-flex flex-row-reverse" href="index.php">Annuler la commande</a>
    <div class="row m-3">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body row">
                        <h5 class="card-title"><?php echo $row["name"] ?></h5>
                        <img class="col" height="300" width="150" src="<?php echo $row["image"] ?>" alt="nom produit">
                        <p class="card-text col"><?php echo $row["description"] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mon Panier</h5>
                        
                        <p class="card-text"> Prix : <span><?php echo $row["prix"] ?>DH</span></p>
                        <p class="card-text">Quantite <input id="quantite" name="quantite" value="1" type="number" min="1" max="5" onchange="updateTotalPrix()" > Kg</p>
                        <p class="card-text">Total : <span id="totalPrix"><?php echo $row["prix"]?> </span> DH</p>
                        <p class="card-text">Quantite disponible <span><?php echo $row["quantite"]?> </span></p>
                         <!-- Add a button to proceed to the commandes page -->
                        <button onclick="proceedToCommandes()" class="btn btn-success">Proceed to Commandes</button>

                    </div>
                </div>
            </div>
    </div>
    <?php 
    } else {?>
        <H1 class ="text-center" >Not Found 404 :/</H1>
    <?php }?>

    <script>
        function updateTotalPrix() {
            var quantite = document.getElementById('quantite').value;
            var prix = <?php echo $row['prix']; ?>;
            var totalPrix = quantite * prix;
            document.getElementById('totalPrix').innerText = totalPrix.toFixed(2);  
        }

        function proceedToCommandes() {
            var quantite = document.getElementById('quantite').value;
            var totalPrix = document.getElementById('totalPrix').value;
            var productId = <?php echo $product_id; ?>;
            window.location.href = 'shopping_cart.php?id=' + productId + '&quantite=' + quantite;
        }
    </script>
   
 <!-- Bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>