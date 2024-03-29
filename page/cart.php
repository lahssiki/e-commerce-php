<?php
session_start();

include_once "../database/database.php";

include "../layouts/head.php";
include "../layouts/nav.php";


?>

<body>

    <?php
    if (!empty($_SESSION['cart'])) {
    ?>
        <h1 class="text-center">Cart</h1>
        <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover m-3 d-flex flex-row-reverse" href="../page/sup.php">Annuler la commande</a>
        <div class="row m-3">
            <div class="col-sm-6">
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
                    $totalItemPrice = $value["prix"] * $value["quantite"];
                    $total += $totalItemPrice;
                ?>
                    <div class="card bg-light text-dark">
                        <div class="card-body row">
                            <h5 class="card-title"><?php echo $value["name"] ?></h5>
                            <img class="col-sm-3 image" height="100" src="<?php echo $value["image"] ?>" alt="nom produit">
                            <p class="card-text col-6"><?php echo $value["description"] ?></p>
                            <h5 class="card-text col d-flex flex-row-reverse">Prix : <?php echo $value["prix"] ?>.00 DH
                            </h5>
                            <h5 id="quantite" class="card-text col d-flex flex-row-reverse">
                                Quantite : <?php echo $value['quantite']; ?>
                            </h5>
                            <hr>
                            <p class="card-text col  d-flex justify-content-end">
                                <a href="../page/remove_from_cart.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">Supprimer</a>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-6">
                <div class="col card bg-light text-dark">
                    <div class="col card-body">
                        <h5 class="card-title">Mon Panier</h5>
                        <h5 class="card-text">Total :
                            <?php echo $total; ?> DH <span id="totalPrix"></span></h5>
                        <a href="http://localhost/E-commerce_php/page/checkout.php" class="col btn btn-success">Proceed
                            to Commandes
                        </a>
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

</body>

</html>