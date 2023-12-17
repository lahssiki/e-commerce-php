<?php
include "database/database.php";

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

    <title>Commandes</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #EAFF69;">
        E-commerce WebSite
    </nav>
    <nav class="navbar navbar-light justify-content-center">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="ajouter_produit.php">Add Produit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="admin.php">Dashboard Admin</a>
            </li>
        </ul>
    </nav>
</body>
<div class="text-center">
    <h1>Commandes</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom Client</th>
                <th scope="col">Email</th>
                <th scope="col">Adresse</th>
                <th scope="col">phone</th>
                <th scope="col">Total Prix</th>
                <th scope="col">ID Produit</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $sql = "SELECT * FROM `e-commerce_php`.`commandes` ";

                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <tr>
                <th scope="row"><?php echo $row["id"] ?></th>
                <td><?php echo $row["nom_client"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["adresse"] ?></td>
                <td><?php echo $row["phone"] ?></td>
                <td><?php echo $row["total_prix"] ?></td>
                <td><?php echo $row["id_produit"] ?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

</html>