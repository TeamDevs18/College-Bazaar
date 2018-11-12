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
    <?php include 'popup.php'; ?>
    
    <!-- Buyer Product Messages Popup -->
  <div id="popup-buyers-container" class="popup-container">
    <div class="popup">
      <h2>Messages</h2>
      <button id="popup-buyers-close" class="popup-close">X</button>
      <div id="popup-buyers-threads"></div>
    </div>
  </div>
  
  <script>
    document.getElementById('popup-buyers-close').addEventListener('click',function(){
      document.getElementById('popup-buyers-container').classList.remove('active');
    });
  </script>
    
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
            <a href="/CollegeBazaar/addevent.php" class="list-group-item">Add Event</a>
            <a href="/CollegeBazaar/addservice.php" class="list-group-item">Add Service</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->

<!--Account's Posted Products  -------------------------------------------------->
        <div class="col-sm-9">
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
                    <?php
                      $productId=$product['id']; #Pass the product id to addmessagebutton.php
                      
                      include('addproductmessagesbutton.php');
                    ?>
                    <a class="post-delete btn btn-primary" href="deletepost.php?product=<?php echo $product['id']; ?>">Delete</a>
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
              products.id,
              products.userId,
              products.name,
              products.categoryId,
              products.price,
              products.thumbnail,
              products.topline,
              products.description
              FROM products
              INNER JOIN product_messages ON products.id=product_messages.productId
              WHERE product_messages.buyerId=".$_SESSION['id']."
              GROUP BY products.id");
              
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
                    <?php
                      $productId=$product['id']; #Pass the product id to addmessagebutton.php
                      echo "<button class='message-button btn btn-primary' onclick='showMessages($productId)'>Messages</button>";
                    ?>
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
          
            <div class="col-sm-9">
          
          <!--posted events by you -->
          <h2>Your Posted Events</h2>
          <div class="row">
        <?php
          require 'db.php';
        
          $result = $mysqli->query("SELECT
              id,
              userId,
              name,
              categoryId,
              price,
              date,
              thumbnail,
              topline,
              description
              FROM events
              WHERE
                userId=".$_SESSION['id']."
                AND hidden=0");
              
            if(!empty($result)){
              foreach($result as $event) {
                ?>
                  <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="<?php echo $event['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $event['name']; ?></h4>
                    <h5>$<?php echo number_format($event['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $event['description']; ?></p>
                    <?php
                      $productId=$event['id']; #Pass the product id to addmessagebutton.php
                      
                      include('addproductmessagesbutton.php');
                    ?>
                    <a class="post-delete btn btn-primary" href="deletepost.php?product=<?php echo $event['id']; ?>">Delete</a>
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

        <!--Viewed Events-->
          <h2>Viewed Events</h2>
          <div class="row">
        <?php
          require 'db.php';
        
          $result = $mysqli->query("SELECT
              events.id,
              events.userId,
              events.name,
              events.categoryId,
              events.price,
              events.date,
              events.thumbnail,
              events.topline,
              events.description
              FROM events
              INNER JOIN product_messages ON events.id=product_messages.productId
              WHERE product_messages.buyerId=".$_SESSION['id']."
              GROUP BY events.id");
              //will need to change product_messages part once messaging is expanded
              // in order to display viewed events
              
             /* $result = $mysqli->query("SELECT *
              FROM products_viewed
              WHERE userId=".$_SESSION['id']);
            */
            if(!empty($result)){
              foreach($result as $event) {
                ?>
                  <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="<?php echo $event['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="mailto:<?php
                        $user = $mysqli->query("SELECT
                          email
                          FROM users
                          WHERE id=".$event['userId']);
                          
                          foreach($user as $thisUser){
                            echo $thisUser['email'];
                          }
                          
                      ?>"><?php echo $event['name']; ?></a>
                    </h4>
                    <h5>$<?php echo number_format($event['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $event['description']; ?></p>
                    <?php
                      $event=$event['id']; #Pass the product id to addmessagebutton.php
                      echo "<button class='message-button btn btn-primary' onclick='showMessages($event)'>Messages</button>"; #again, will need to expand messaging functionality
                    ?>
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
<!-- col-sm-9 for events ------------------------------------------->
        
        
          <div class="col-sm-9">
          
          <!--posted events by you -->
          <h2>Your Posted Services</h2>
          <div class="row">
        <?php
          require 'db.php';
        
          $result = $mysqli->query("SELECT
              id,
              userId,
              name,
              categoryId,
              price,
              date,
              thumbnail,
              topline,
              description
              FROM services
              WHERE
                userId=".$_SESSION['id']."
                AND hidden=0");
              
            if(!empty($result)){
              foreach($result as $service) {
                ?>
                  <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="<?php echo $service['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $service['name']; ?></h4>
                    <h5>$<?php echo number_format($service['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $service['description']; ?></p>
                    <?php
                      $productId=$service['id']; #Pass the product id to addmessagebutton.php
                      
                      include('addproductmessagesbutton.php');
                    ?>
                    <a class="post-delete btn btn-primary" href="deletepost.php?product=<?php echo $service['id']; ?>">Delete</a>
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

        <!--Viewed Events-->
          <h2>Viewed Services</h2>
          <div class="row">
        <?php
          require 'db.php';
        
          $result = $mysqli->query("SELECT
              services.id,
              services.userId,
              services.name,
              services.categoryId,
              services.price,
              services.date,
              services.thumbnail,
              services.topline,
              services.description
              FROM services
              INNER JOIN product_messages ON services.id=product_messages.productId
              WHERE product_messages.buyerId=".$_SESSION['id']."
              GROUP BY services.id");
              //will need to change product_messages part once messaging is expanded
              // in order to display viewed services
              
             /* $result = $mysqli->query("SELECT *
              FROM products_viewed
              WHERE userId=".$_SESSION['id']);
            */
            if(!empty($result)){
              foreach($result as $service) {
                ?>
                  <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="<?php echo $service['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="mailto:<?php
                        $user = $mysqli->query("SELECT
                          email
                          FROM users
                          WHERE id=".$service['userId']);
                          
                          foreach($user as $thisUser){
                            echo $thisUser['email'];
                          }
                          
                      ?>"><?php echo $service['name']; ?></a>
                    </h4>
                    <h5>$<?php echo number_format($service['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $service['description']; ?></p>
                    <?php
                      $service=$service['id']; #Pass the product id to addmessagebutton.php
                      echo "<button class='message-button btn btn-primary' onclick='showMessages($service)'>Messages</button>"; #again, will need to expand messaging functionality
                    ?>
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
<!-- /.col-sm-9 for services  --------------------------------------------------------------->
        </div>
        <!-- /.col-sm-9 -->
        

        
        

      </div>

    </div>
    
    <!-- /.container -->

    <?php include 'footer.php'; ?>

  </body>

</html>
