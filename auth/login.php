<?php
include "../layouts/head.php";
include "../layouts/nav.php";
?>
<link rel="stylesheet" href="../css/style.css">
<section class="vh-90">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="../image/hero.jpg" style="max-width: 100%;height: auto;" class="img-fluid" alt="image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
        <h3 class="text-center">Admin Login</h3>
        <?php if (isset($_GET['error'])){?>
        <p class="alert alert-danger" role="alert">
          <?php echo $_GET['error'];} ?>
         </p>  
       
        <form action="db_login.php" method="post">
          <div class="form-outline mb-4">
            <input type="text" class="form-control form-control-lg" name="email" placeholder="identifiant" />
          </div>
          <div class="form-outline mb-3">
            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" />
          </div>
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
        </form>
      </div>
    </div>
  </div>
</section>