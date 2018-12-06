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
            $_SESSION['message']='You must be logged in to view events!';
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
            <a href="/CollegeBazaar/products.php" class="list-group-item">Products</a>
            <a href="/CollegeBazaar/services.php" class="list-group-item">Services</a>
            <a href="/CollegeBazaar/events.php" class="list-group-item active">Events</a>
            <a href="/CollegeBazaar/addevent.php" class="list-group-item">Add Event</a>
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
              FROM events
              WHERE
                hidden=0
                AND NOT userId=".$_SESSION['id']);
            
            foreach($result as $event) {
              ?>
                <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-120">
                <div class="card-title"><?php echo $event['name']; ?></div>
                <a><img class="card-img-top" src="<?php echo $event['thumbnail']; ?>" alt=""></a>
                   <div class="card-body">
                 
                  <p class="card-text"><?php echo $event['description']; ?></p>
                     <div class="card-date"><?php echo $event['date']; ?></div>
                    <div class="card-price">$<?php echo number_format($event['price'],2); ?></div>
                      <br>
                  <?php
                      $eventId=$event['id']; #passes the id to sendmessage.php -- which is apparently not this easy easy -- need different messaging system for products, events, and services
                      
                      echo "<button class='buttonMessage' onclick='showMessages($eventId,null,1)'>Message</button>";
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