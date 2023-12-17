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


    $quantite = isset($_GET['quantite']) ? $_GET['quantite'] : 1;
    $totalPrix = isset($_GET['totalPrix']) ? $_GET['totalPrix'] : $row['prix'] * $quantite;

//-----------------------------------------------------

   

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

    <title>Shopping Cart</title>
</head>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #EAFF69;">
    E-commerce WebSite
</nav>

<body>
<?php if (isset($_GET['id'])) { ?>
    <h1 class="text-center m-5">Shopping Cart</h1>
    <div class="container">
        <div class="row">
            <div><h6><a href="index.php">Annule la commande</a></h6></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["name"] ?></h5>
                        <img src="<?php echo $row["image"] ?>" height="100" alt="nom produit">
                        <p class="card-text"><?php echo $row["description"] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-text">Quantity: <?php echo $quantite; ?></h5>
                        <h4 class="card-text justify-content-center">Total Prix: <?php echo $totalPrix; ?> DH</h4>
                    </div>
                </div>
            </div>
            <form class="m-5" method="post" action="comm.php">
                <div class="form-row">
                    <div class="form-group col-md-6 m-2">
                        <label >Nom complete</label>
                        <input type="text" class="form-control" name="nom_client" placeholder="Nom" required>
                    </div>
                    <div class="form-group col-md-6 m-2">
                        <label >Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group col-md-6 m-2">
                    <label >Address</label>
                    <input type="text" class="form-control" name="adresse" placeholder="adresse" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 m-2">
                        <label >Phone</label>
                        <input type="text" class="form-control" name="phone"  placeholder="06XXXXXXXX" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 m-2">
                        <input type="hidden" class="form-control" name="total_prix" value="<?php echo $totalPrix; ?>">
                        <input type="hidden" class="form-control" name="id_produit" value="<?php echo $product_id; ?>" >
                    </div>
                </div>
                <div class="form-group m-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" required>
                        <label class="form-check-label" for="gridCheck">
                            <a href="#">les conditions générales</a>
                        </label>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary m-2">Valide la commande</button>
            </form>
        </div>
        <?php 
    } else {?>
        <H1 class ="text-center" >Not Found 404 :/</H1>
    <?php }?>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>