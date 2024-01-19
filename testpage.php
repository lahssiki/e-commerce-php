<section>
    <div class="container-fluid">
        <form action="" method="post">
            <div class="row">
               
                    <div class="card mb-3 m-3 col-md-3">
                        <img class="card-img-top" height="300" src="<?php echo $row["image"] ?>" alt="image">
                        <div class="card-body">
                            
                            <h5 class="card-title"><?php echo $row["name"] ?></h5>
                            <p class="card-text"><?php echo $row["description"] ?></p>
                            <a href="cart.php?id=<?php echo $row["id"] ?>" class="btn btn-primary stretched-link"><?php echo $row["prix"] ?> DH</a> &nbsp; <span>1KG</span>
                        </div>
                    </div>
                
            </div>
        </form>
</section>