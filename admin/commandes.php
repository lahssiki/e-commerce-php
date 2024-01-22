<?php
session_start();
require_once '../database/database.php';
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    include "../layouts/head.php";
    include "../layouts/admin-nav.php";
?>


<body>
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
<?php
include "../layouts/footer.php";
 } else {
    header("Location:../index.php");
    exit();
} ?>
</html>