<section class="my-lg-14 my-8">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-6">
                <h3 class="mb-4 d-flex justify-content-center ">Popular Products</h3>
            </div>
        </div>
        <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">

        <?php
        $sql = "SELECT * FROM `e-commerce_php`.`produits` ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col">
                    <div class="card card-product">

                        <div class="card-body">
                            <div class="text-center position-relative">
                                <div class="position-absolute top-0 start-0">
                                    <span class="badge bg-danger">Sale</span>
                                </div>
                                <a href="cart.php?id=<?php echo $row["id"] ?>"><img  src="<?php echo $row["image"] ?>" alt="" class="mb-3 img-fluid" /></a>
                            </div>
                            <div class="text-small mb-1">
                                <a href="#!" class="text-decoration-none text-muted"><small>Snack & Munchies</small></a>
                            </div>
                            <h2 class="fs-6"><a href="./pages/shop-single.html" class="text-inherit text-decoration-none"><?php echo $row["name"] ?></a></h2>
                            <div>
                                <small class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </small>
                                <!--<span class="text-muted small">4.5(149)</span>-->
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <span class="text-dark"><?php echo $row["prix"] ?> DH</span>
                                    <!--<span class="text-decoration-line-through text-muted">$24</span>-->
                                </div>
                                <div>
                                    <a href="cart.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>