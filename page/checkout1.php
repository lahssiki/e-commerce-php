<?php
session_start();
include_once "../database/database.php";


include "../layouts/head.php";
include "../layouts/nav.php";

?>


<body>
    <?php if (isset($_GET['id'])) { ?>
        <h1 class="text-center m-5">Shopping Cart</h1>
        <div class="container con">
            <div class="row">
                <div>
                    <h6><a href="../index.php">Annule la commande</a></h6>
                </div>
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
                            <!--form-->
                            <form class="form m-4" method="post" action="comm.php">
                                <div class="form-row">
                                    <div class="form-group col-md-6 m-2">
                                        <label>Nom complete</label>
                                        <input type="text" class="form-control" name="nom_client" placeholder="Nom" required>
                                    </div>
                                    <div class="form-group col-md-6 m-2">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 m-2">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="adresse" placeholder="adresse" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 m-2">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="06XXXXXXXX" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 m-2">
                                        <input type="hidden" class="form-control" name="total_prix" value="<?php echo $totalPrix; ?>">
                                        <input type="hidden" class="form-control" name="id_produit" value="<?php echo $product_id; ?>">
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
                    </div>
                </div>

            </div>
        </div>
    <?php
    } else {
        include "../404-403/empty_cart.php";
    }
    include "../layouts/footer.php"
    ?>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>


</html>