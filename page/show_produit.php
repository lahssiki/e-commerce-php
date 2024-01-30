<?php
include_once "../database/database.php";
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

include "../layouts/head.php";
include "../layouts/nav.php";
?>

<body>
    <?php if (isset($_GET['id'])) { ?>
        <h1 class="text-center">Cart</h1>
        <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover m-3 d-flex flex-row-reverse" href="index.php">Annuler la commande</a>
        <div class="row m-3">
            <div class="col-sm-6">
                <div class="card bg-light text-dark">
                    <div class="card-body row">
                        <h5 class="card-title"><?php echo $row["name"] ?></h5>
                        <img class="col-sm-3 image" height="100" src="<?php echo $row["image"] ?>" alt="nom produit">
                        <p class="card-text col-6"><?php echo $row["description"] ?></p>
                        <h5 class="card-text col d-flex flex-row-reverse">Prix : <?php echo $row["prix"] ?>.00 DH</h5>
                        <h6 class="card-text col d-flex flex-row-reverse"> Kg<input id="quantite" name="quantite" value="1" type="number" min="1" max="5" onchange="updateTotalPrix()">Quantite :</h6>
                        <hr>
                        <p class="card-text col  d-flex justify-content-end"><button class=" btn btn-danger">Supprimer</button></p>    
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Mon Panier</h5>
                        <p class="card-text">Total : <span id="totalPrix"><?php echo $row["prix"] ?> </span> DH</p>
                        <!-- Add a button to proceed to the commandes page -->
                        <button onclick="proceedToCommandes()" class="btn btn-success">Proceed to Commandes</button>

                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        include "../404-403/empty_cart.php";
    }
    include "../layouts/footer.php";
    ?>

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