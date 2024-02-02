<?php
session_start();
include("../layouts/head.php");
include("../layouts/nav.php");
?>
<div class="row">
    <div class="col-sm-6 m-3 row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="body-box">
                        <div><span class="badge rounded-pill text-bg-warning">Type de Paiement</span></div>
                        <button class="btn btn btn-outline-primary col-3 mt-3" type="button" id="addBook">Payment cart</button>
                        <div class="row">
                            <div class="form-popup" id="popUpForm">
                                <div class="icons">
                                    <img src="https://img.icons8.com/color/48/000000/visa.png" />
                                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                                    <img src="https://img.icons8.com/color/48/000000/maestro.png" />
                                </div>
                                <form>
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
                                </form>
                            </div>
                            <button class="btn btn btn-outline-primary col-3 mt-4 ms-2" type="button" id="addcod">Cash on Delivery</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($_SESSION['cart'])) { ?>
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
                    <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
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
                        <img width="48" height="48" src="https://img.icons8.com/fluency/48/delivery.png" alt="delivery"/>
                        </div>
                        <div class="col text-right">
                        <span class="col-3 m-2 text-right badge text-bg-warning">Gratuit</span></div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left">
                            <h4>Total to pay</h4>
                        </div>
                        <div class="col text-right badge text-bg-secondary">
                            <h5>$total</h5>
                        </div>
                    </div>
                    <div class="row lower d-flex justify-content-center mt-4">
                        <button class="btn btn-outline-success col-4 ">Place order</button>
                        <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                    </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php

include("../layouts/footer.php");
?>
<style>
    .form-popup {
        display: none;
    }
</style>

