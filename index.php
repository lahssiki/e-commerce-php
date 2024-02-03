<?php
session_start();

include "database/database.php";


if (isset($_POST['add_to_cart'])) {
  if (isset($_SESSION['cart'])) {
      $session_array_id = array_column($_SESSION['cart'], "id");

      if (!in_array($_POST['id'], $session_array_id)) {
          $session_array = array(
              "id" => $_POST['id'],
              "name" => $_POST['name'],
              "image" => $_POST['image'],
              "description" => $_POST['description'],
              "prix" => $_POST['prix'],
              "quantite" => $_POST['quantite'],
          );
          $_SESSION['cart'][] = $session_array;
      } else {
          // Find the index of the existing item in the cart
          $index = array_search($_POST['id'], $session_array_id);
      }
  } else {
      // If the cart is not set, create a new cart with the current item
      $session_array = array(
          "id" => $_POST['id'],
          "name" => $_POST['name'],
          "image" => $_POST['image'],
          "description" => $_POST['description'],
          "prix" => $_POST['prix'],
          "quantite" => $_POST['quantite'],

      );
      $_SESSION['cart'][] = $session_array;
  }
  header('Location: http://localhost/E-commerce_php/index.php#1');

}

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#712cf9">
    <link rel="shortcut icon" href="https://img.icons8.com/cotton/64/orange--v1.png" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>E-commerce WebSite</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Fawakih.ma</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarText">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php"><h5 class="navil">Home <i class="fa-solid fa-house fa-sm"></i></h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./page/Shop.php"><h5 class="navil">Shop <i class="fa-solid fa-shop fa-sm"></i></h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./page/cart.php"><h5 class="navil">cart 
            <?php    
              if (isset($_SESSION['cart'])){$count  = count($_SESSION['cart']);?>
                <span class="badge rounded-pill text-bg-danger"><?php echo "$count";}else{ echo "";}?></span>
              <i class="fa-solid fa-cart-shopping fa-sm"></i></h5>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body>
<?php include "./layouts/hero.php" ?> <!-- hero section -->
<?php include "./page/card-produits.php" ?> <!-- products section -->
<?php include "./layouts/footer.php"?> <!-- footer section -->
<script src="js/script.js"></script>
</body>

</html>