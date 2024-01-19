<?php
require_once '../database/database.php';
include "../layouts/head.php"

?>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #EAFF69;">
        Dashboard Admin
    </nav>
    <nav class="navbar navbar-light justify-content-center">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <h5><a class="nav-link active" href="index.php">Index</a></h5>
            </li>
            <li class="nav-item">
                <h5><a class="nav-link active" href="ajouter_produit.php">Add Produit</a></h5>
            </li>
            <li class="nav-item">
                <h5><a class="nav-link active" href="commandes.php">Commandes</a></h5>
            </li>
        </ul>
    </nav>
    <div class="container">
    
        <div class="list-group row justify-content-start">
            <div class="col-4" >
            <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>


            <a href="#" class="list-group-item list-group-item-action list-group-item-primary">This is a primary list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">This is a secondary list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-success">This is a success list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-danger">This is a danger list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-warning">This is a warning list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-info">This is a info list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a light list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-dark">This is a dark list group item</a>
</div>
<div class="row justify-content-end">
            <table class="table table-hover col-8 ">
                <thead>
                    <tr>
                        <th scope="col">Nom produit</th>
                        <th scope="col">Description</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantite</th>
                        <th scope="col"><i class="fa fa-pencil" aria-hidden="true"></i></th>
                        <th scope="col"><i class="fa fa-trash" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `e-commerce_php`.`produits` ";

                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo substr_replace($row["description"], "...", 20); ?></td>
                            <td><?php echo $row["prix"] ?> DH </td>
                            <td><?php echo $row["quantite"] ?></td>
                            <td><a style="text-decoration: none;" href="edit_produit.php">Modifier</a></td>
                            <td><a style="color: #FF0000 ; text-decoration: none;" href="#">Supprimer</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>