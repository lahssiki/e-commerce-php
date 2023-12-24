<?php
include "database/database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>E-commerce WebSite</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center  mb-2">
        E-commerce WebSite
    </nav>
    <div class="container-fluid">
        <form action="" method="post">
            <div class="row">
                <?php
                $sql = "SELECT * FROM `e-commerce_php`.`produits` ";

                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="card mb-3 m-3 col-md-3">
                        <img class="card-img-top" height="300" src="<?php echo $row["image"] ?>" alt="image">
                        <div class="card-body">
                            
                            <h5 class="card-title"><?php echo $row["name"] ?></h5>
                            <p class="card-text"><?php echo $row["description"] ?></p>
                            <a href="cart.php?id=<?php echo $row["id"] ?>" class="btn btn-primary"><?php echo $row["prix"] ?> DH</a> &nbsp; <span>1KG</span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </form>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>