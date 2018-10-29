<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bazaar</title>

    <!-- Custom styles for this template -->
    <link href="css/shop-item.css" rel="stylesheet">

  </head>
  <style>
body{
  background-image:url('images/whitebackground.jpg');
}
</style>

  <body>

    <?php include 'header.php'; ?>
    <?php
        if(empty($_SESSION['active'])){
            header('location: /CollegeBazaar/index.php');
        }
    ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4">Account</h1>
          <div class="list-group">
            <a href="/CollegeBazaar/products.php" class="list-group-item">Products</a>
            <a href="/CollegeBazaar/services.php" class="list-group-item">Services</a>
            <a href="/CollegeBazaar/events.php" class="list-group-item">Events</a>
            <a href="/CollegeBazaar/addproduct.php" class="list-group-item">Add Product</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <!--Account's Posted Products-->
        <div class="col-lg-9">
          <h2>Your Posted Products</h2>
          <div class="row">
        <?php
          require 'db.php';
        
          $result = $mysqli->query("SELECT
              id,
              userId,
              name,
              categoryId,
              price,
              thumbnail,
              topline,
              description
              FROM products
              WHERE
                userId=".$_SESSION['id']."
                AND hidden=0");
              
            if(!empty($result)){
              foreach($result as $product) {
                ?>
                  <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="<?php echo $product['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $product['name']; ?></h4>
                    <h5>$<?php echo number_format($product['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $product['description']; ?></p>
                    <a href="deletepost.php?product=<?php echo $product['id']; ?>">Delete</a>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                  </div>
                </div>
              </div>
                <?php
              }
            }
          ?>
          </div>

        <!--Viewed Products-->
          <h2>Viewed Products</h2>
          <div class="row">
        <?php
          require 'db.php';
        
          $result = $mysqli->query("SELECT
              products.userId,
              products.name,
              products.categoryId,
              products.price,
              products.thumbnail,
              products.topline,
              products.description
              FROM products_viewed
              INNER JOIN products ON products_viewed.productId=products.id
              WHERE products_viewed.userId=".$_SESSION['id']."
                AND products.hidden=0");
              
             /* $result = $mysqli->query("SELECT *
              FROM products_viewed
              WHERE userId=".$_SESSION['id']);
            */
            if(!empty($result)){
              foreach($result as $product) {
                ?>
                  <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="<?php echo $product['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="mailto:<?php
                        $user = $mysqli->query("SELECT
                          email
                          FROM users
                          WHERE id=".$product['userId']);
                          
                          foreach($user as $thisUser){
                            echo $thisUser['email'];
                          }
                          
                      ?>"><?php echo $product['name']; ?></a>
                    </h4>
                    <h5>$<?php echo number_format($product['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $product['description']; ?></p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                  </div>
                </div>
              </div>
                <?php
              }
            }
          ?>
          </div>
        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->

    <?php include 'footer.php'; ?>

  </body>

</html>
