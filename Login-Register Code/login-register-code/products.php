<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>College Bazaar</title>

  </head>
  
  <style>
body{
  background-image:url('images/whitebackground.jpg');
}
</style>

  <body>
    <?php include 'popup.php'; ?>
    <?php include 'header.php'; ?>
        <?php
        if(empty($_SESSION['active'])){
            $_SESSION['message']='You must be logged in to view products!';
            header('location: /CollegeBazaar/Login-Register/login-register-code/error.php');
        }
    ?>

    <!-- Page Content -->
    <div class="container">
<br>
<br>
      <div class="row">


        <div class="col-lg-3">

          <h1 class="my-4">Market</h1>
          <div class="list-group">
            <a href="/CollegeBazaar/products.php" class="list-group-item active">Products</a>
            <a href="/CollegeBazaar/services.php" class="list-group-item">Services</a>
            <a href="/CollegeBazaar/events.php" class="list-group-item">Events</a>
            <a href="/CollegeBazaar/addproduct.php" class="list-group-item">Add Product</a> <!-- Moved here from above the product images (below) -->
          </div>

        </div>
        <!-- /.col-lg-3 -->
    
        <div class="col-lg-9">
          

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
                hidden=0
                AND NOT userId=".$_SESSION['id']);
            
            foreach($result as $product) {
              ?>
                <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-120">
                
                <div class="card-title"><?php echo strtoupper($product['name']); ?></div>
                <a><img class="card-img-top" src="<?php echo $product['thumbnail']; ?>" alt=""></a>
                <div class="card-body">
                  <p class="card-text"><?php echo $product['description']; ?></p>
                   
                   <div class="card-price">$<?php echo number_format($product['price'],2); ?></div>
                  <br>
                  <?php
                      $productId=$product['id']; #Pass the product id to addmessagebutton.php
                      
                      echo "<button class='buttonMessage' onclick='showMessages($productId,null,0)'>Message Seller</button>";
                    ?>
                </div>
             
              </div>
            </div>
              <?php
            }
          ?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include 'footer.php'; ?>

  </body>

</html>