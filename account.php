<?php

session_start();

?>

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


.content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
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
<!------ sidebar  ----------->
        <div class="col-lg-3">
          <h1 class="my-4">Account</h1>
          <div class="list-group">
            <a href="/CollegeBazaar/products.php" class="list-group-item">Products</a>
            <a href="/CollegeBazaar/addproduct.php" class="list-group-item">  Add Product</a>
            <a href="/CollegeBazaar/services.php" class="list-group-item">Services</a>
            <a href="/CollegeBazaar/addservice.php" class="list-group-item">  Add Service</a>
            <a href="/CollegeBazaar/events.php" class="list-group-item">Events</a>
            <a href="/CollegeBazaar/addevent.php" class="list-group-item">  Add Event</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->

<!--Account's Posted Products  -------------------------------------------------->
        <div class="col-sm-9">
          <br>
         <h1>Post Activity</h1>
         <br>
                      <button class='collapsible black'>Posted Products</button>
<div class="content">
  <p>
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
                  <h4 class="card-title"><?php echo $product['name']; ?></h4>
                  <a href="#"><img class="card-img-top" src="<?php echo $product['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h5>$<?php echo number_format($product['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $product['description']; ?></p>
                    <?php
                      $productId=$product['id']; #Pass the product id to addmessagebutton.php
                      
                      include('addproductmessagesbutton.php');
                    ?>
                    <a class="buttonDelete" href="deletepost.php?product=<?php echo $product['id']; ?>&type=0">Delete</a>
                  </div>
                
                </div>
              </div>
                <?php
              }
            }
          ?>
          </p>
          </div>
          </div>

        <!--Viewed Products-->
         
                               <button class='collapsible gold'>Viewed Products</button>
<div class="content">
  <p>
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
              INNER JOIN messages ON products.id=messages.productId
              WHERE messages.buyerId=".$_SESSION['id']."
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
                  <h4 class="card-title"><a><?php echo $product['name']; ?></a></h4>
                  <a href="#"><img class="card-img-top" src="<?php echo $product['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h5>$<?php echo number_format($product['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $product['description']; ?></p>
                    <a class="buttonDelete" href="deletethread.php?product=<?php echo $product['id']; ?>&type=0">Delete</a>
                    <?php
                      $productId=$product['id']; #Pass the product id to addmessagebutton.php
                      echo "<button class='buttonMessage' onclick='showMessages($productId,null,0)'>Messages</button>";
                    ?>
                  </div>
                 
                </div>
              </div>
                <?php
              }
            }
          ?>
             </p>
          </div>
          </div>
          
          <!--posted events by you -->
       
                               <button class='collapsible black'>Posted Events</button>
<div class="content">
  <p>
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
                  <h4 class="card-title"><?php echo $event['name']; ?></h4>
                  <a href="#"><img class="card-img-top" src="<?php echo $event['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h5>$<?php echo number_format($event['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $event['description']; ?></p>
                    <?php
                      $productId=$event['id']; #Pass the product id to addmessagebutton.php
                      
                      include('addproductmessagesbutton.php');
                    ?>
                    <a class="buttonDelete" href="deletepost.php?product=<?php echo $event['id']; ?>&type=1">Delete</a>
                  </div>
                  
                </div>
              </div>
                <?php
              }
            }
          ?>
             </p>
          </div>
          </div>

        <!--Viewed Events-->
                             <button class='collapsible gold'>Viewed Events</button>
<div class="content">
  <p>
          <h2></h2>
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
              INNER JOIN messages ON events.id=messages.productId
              WHERE messages.buyerId=".$_SESSION['id']."
              GROUP BY events.id");
              //will need to change messages part once messaging is expanded
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
                  <h4 class="card-title"><a><?php echo $event['name']; ?></a></h4>
                  <a href="#"><img class="card-img-top" src="<?php echo $event['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h5>$<?php echo number_format($event['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $event['description']; ?></p>
                    <a class="buttonDelete" href="deletethread.php?product=<?php echo $product['id']; ?>&type=1">Delete</a>
                    <?php
                      $event=$event['id']; #Pass the product id to addmessagebutton.php
                      echo "<button class='buttonMessage' onclick='showMessages($event,null,1)'>Messages</button>"; #again, will need to expand messaging functionality
                    ?>
                  </div>
             
                </div>
              </div>
                <?php
              }
            }
          ?>
             </p>
          </div>
          </div>
        
        
          <!--posted services by you -->
                               <button class='collapsible black'>Posted Services</button>
<div class="content">
  <p>
          <h2></h2>
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
                  <h4 class="card-title"><?php echo $service['name']; ?></h4>
                  <a href="#"><img class="card-img-top" src="<?php echo $service['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h5>$<?php echo number_format($service['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $service['description']; ?></p>
                    <?php
                      $productId=$service['id']; #Pass the product id to addmessagebutton.php
                      include('addproductmessagesbutton.php');
                    ?>
                    <a class="buttonDelete" href="deletepost.php?product=<?php echo $service['id']; ?>&type=2">Delete</a>
                  </div>
                  
                </div>
              </div>
                <?php
              }
            }
          ?>
             </p>
          </div>
          </div>

        <!--Viewed Services-->
                             <button class='collapsible gold'>Viewed Services</button>
<div class="content">
  <p>
          
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
              INNER JOIN messages ON services.id=messages.productId
              WHERE messages.buyerId=".$_SESSION['id']."
              GROUP BY services.id");
              //will need to change messages part once messaging is expanded
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
                  <h4 class="card-title"><a><?php echo $service['name']; ?></a></h4>
                  <a href="#"><img class="card-img-top" src="<?php echo $service['thumbnail']; ?>" alt=""></a>
                  <div class="card-body">
                    <h5>$<?php echo number_format($service['price'],2);; ?></h5>
                    <p class="card-text"><?php echo $service['description']; ?></p>
                    <a class="buttonDelete" href="deletethread.php?product=<?php echo $service['id']; ?>&type=2">Delete</a>
                    <?php
                      $service=$service['id']; #Pass the product id to addmessagebutton.php
                      echo "<button class='buttonMessage' onclick='showMessages($service,null,2)'>Messages</button>"; #again, will need to expand messaging functionality
                    ?>
                  </div>
                 
                </div>
              </div>
                <?php
              }
            }
          ?>
             </p>
          </div>
          </div>
          
        </div>
        <!-- /.col-sm-9 -->
        

        
        

      </div>

    </div>
    <br>
    <!-- /.container -->

    

  
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
<footer style="   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
 
   color: white;
   text-align: center;">
<?php include 'footer.php'; ?>
</footer>
</body>
</html>
