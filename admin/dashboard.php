<?php
session_start();
require_once '../database/database.php';

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "../layouts/head.php";
    include "../layouts/nav.php"
?>
    <body>
             <div class="alert alert-info text-center" role="alert">
            <h2 class="alert-heading text-center">Dashboard</h2>
            <p>welcome <?php echo $_SESSION['email'];?></p>
            <hr>
            <a href="../auth/logout.php">logout</a>
        </div>
    <?php } else {
    header("Location:../auth/login.php");
    exit();}
    include "../layouts/footer.php"?>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
    </html>