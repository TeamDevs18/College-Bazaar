<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>College Bazaar</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>
    <style>
body{
  background-image:url('images/whitebackground.jpg');
}
</style>
    <?php include 'popup.php'; ?>
    <?php include 'header.php'; ?>
    <?php
        if(empty($_SESSION['active'])){
            header('location: /CollegeBazaar/index.php');
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
            <a href="/CollegeBazaar/products.php" class="list-group-item">Products</a>
            <a href="/CollegeBazaar/services.php" class="list-group-item active">Services</a>
            <a href="/CollegeBazaar/events.php" class="list-group-item">Events</a>
            <a href="/CollegeBazaar/addservice.php" class="list-group-item">Add Service</a>

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
              date,
              thumbnail,
              topline,
              description
              FROM services
              WHERE
                hidden=0
                AND NOT userId=".$_SESSION['id']);
            
            foreach($result as $service) {
              ?>
                <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-120">
                
                <div class="card-title"><?php echo $service['name']; ?></div>
                <a><img class="card-img-top" src="<?php echo $service['thumbnail']; ?>" alt=""></a>
                <div class="card-body">
                  <p class="card-text"><?php echo $service['description']; ?></p>
                  <div class="card-text"><?php echo $service['date']; ?></div>
                  <div class="card-price">$<?php echo number_format($service['price'],2); ?></div>
                  <br>
                  <?php
                      $serviceId=$service['id']; #passes the id to sendmessage.php -- which is apparently not this easy easy -- need different messaging system for products, events, and services
                      
                      echo "<button class='buttonMessage' onclick='showMessages($serviceId,null,2)'>Message</button>";
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