<section id="1" class="my-lg-14 my-8">
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
                $id = $row['id'];
            ?>
                <form class="col" id="addtocart" method="POST" action="index.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                    <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
                    <input type="hidden" name="prix" value="<?php echo $row['prix']; ?>">
                    <input type="hidden" name="quantite" value="<?php echo $row['quantite']; ?>">
                    <div class="col">
                        <div class="card card-product">
                            <div class="card-body">
                                <div class="text-center position-relative">
                                    <div class="position-absolute top-0 start-0">
                                        <span class="badge bg-danger">Sale</span>
                                    </div>
                                    <a href="cart.php?id=<?php echo $row["id"] ?>"><img src="<?php echo $row["image"] ?>" alt="" class="mb-3 img-fluid" /></a>
                                </div>
                                <div class="text-small mb-1">
                                    <a href="#!" class="text-decoration-none text-muted"><small>fawakih.ma</small></a>
                                </div>
                                <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none"><?php echo $row["name"] ?></a></h2>
                                <div>
                                    <small class="text-warning">
                                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>
                                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>
                                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>
                                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>
                                        <i class="far fa-star fa-sm" style="color: #FFD43B;"></i>
                                    </small>
                                    <span class="text-muted small">4.5</span>
                                </div>
                                <div class="form-inline">
                                    <span class="badge badge-danger m-2" style="background-color: red;" for="quantite">Quantite</span>
                                    <input class="form-control" type="number" name="quantite" id="" value="<?php $row['quantite'];?>" min="1" max="10" required>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div>
                                        <span class="text-dark"><?php echo $row["prix"] ?> DH</span>
                                    </div>
                                    <div>
                                        <button type="submit"  name="add_to_cart" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus fa-sm"></i> Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</section>