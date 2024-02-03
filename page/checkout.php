<?php
session_start();
include("../layouts/head.php");
include("../layouts/nav.php");

//print_r($_SESSION['cart']);

if (!empty($_SESSION['cart'])) {

?>
<div class="row">
    <div class="col-sm-6 m-3 row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="body-box">
                        <div><span class="badge rounded-pill text-bg-warning">Type de Paiement</span></div>
                        <div class="row">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle mt-3" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">Payment cart</button>
                                <form class="dropdown-menu p-4">
                                    <div class="icons">
                                        <img src="https://img.icons8.com/color/48/000000/visa.png" />
                                        <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                                        <img src="https://img.icons8.com/color/48/000000/maestro.png" />
                                    </div>
                                    <span class="badge text-bg-secondary">Cardholder's name:</span>
                                    <input class="form-control" placeholder="Linda Williams">
                                    <span class="badge text-bg-secondary">Card Number:</span>
                                    <input class="form-control" placeholder="0125 6780 4567 9909" maxlength="16">
                                    <div class="row">
                                        <div class="col-4 "><span class=" badge text-bg-secondary">Expiry date:</span>
                                            <input type="month" class="form-control" placeholder="YY/MM" min="2024-02" value="2024-02">
                                        </div>
                                        <div class="col-4"><span class=" badge text-bg-secondary">CVV:</span>
                                            <input class="form-control" id="cvv" placeholder="123">
                                        </div>
                                    </div>
                                    <input type="checkbox" id="save_card" class="align-left">
                                    <label for="save_card">Save card details to wallet</label>
                                    <button class="btn btn-outline-primary">valide</button>
                                </form>
                            </div>
                            <div> <button class="btn btn btn-outline-primary col-3 mt-4 ms-2" id="addBook1" type="button" id="addcod">Cash on Delivery</button>
                            </div>
                            <div class="mt-2"><span class="badge rounded-pill text-bg-warning">informations Personnelles</span></div>
                            <div>
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
        </div>
    </div>
        <div class="col-sm-5 m-2 row">
            <div class="right border">
                <div class="header">Order Summary</div>
                <?php if (isset($_SESSION['cart'])) {
                    $count  = count($_SESSION['cart']); ?>
                    <span style="font-style: italic;" class="badge text-bg-info">
                    <?php echo "$count items";
                } else {
                    echo "";
                } ?></span>
                    <?php $total = 0;
                    foreach ($_SESSION['cart'] as $key => $value) {

                        $totalItemPrice = $value["prix"] * $value["quantite"];
                        $total += $totalItemPrice;
                    ?>
                        <div class="row item">
                            <div class="col-4 align-self-center"><img class="col-sm-6" src="<?php echo $value["image"] ?>"></div>
                            <div class="col-8">
                                <div class="row"><b><?php echo $value["prix"] ?> DH</b></div>
                                <div class="row text-muted"><?php echo $value["name"] ?></div>
                                <div class="row">Quantite : <?php echo $value["quantite"] ?></div>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                    <div class="row lower">
                        <div class="col text-left">
                            <img width="48" height="48" src="https://img.icons8.com/fluency/48/delivery.png" alt="delivery" />
                        </div>
                        <div class="col text-right">
                            <span class="col-3 m-2 text-right badge text-bg-warning">Gratuit</span>
                        </div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left">
                            <h4>TOTAL</h4>
                        </div>
                        <div class="col text-right badge text-bg-secondary">
                            <h5> <?php echo $total; ?> Dh</h5>
                        </div>
                    </div>
                    <div class="row lower d-flex justify-content-center mt-5">
                        <button class="btn btn-outline-success col-4 mt-3">Place order</button>
                        <p class="text-muted text-center mt-5">Complimentary Shipping & Returns</p>
                    </div>
            </div>
        </div>
    <?php }else{
        include "../404-403/empty_cart.php";
    } ?>
</div>
</div>
<?php

include("../layouts/footer.php");
?>
