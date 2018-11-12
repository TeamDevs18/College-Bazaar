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
          
<!-- getting rid of carousel, again for now
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
end carousel       -->

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
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo $event['thumbnail']; ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $event['name']; ?></h4>
                  <h5 class="card-text"><?php echo $event['date']; ?></h5>
                  <h5>$<?php echo number_format($event['price'],2); ?></h5>
                  <p class="card-text"><?php echo $event['description']; ?></p>
                  <?php
                      $eventId=$event['id']; #passes the id to sendmessage.php -- which is apparently not this easy easy -- need different messaging system for products, events, and services
                      
                      echo "<button class='message-button btn btn-primary' onclick='showMessages($eventID,null)'>Message</button>";
                    ?>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
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