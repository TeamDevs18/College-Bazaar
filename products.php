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
            <a href="/CollegeBazaar/products.php" class="list-group-item active">Products</a>
            <a href="/CollegeBazaar/services.php" class="list-group-item">Services</a>
            <a href="/CollegeBazaar/events.php" class="list-group-item">Events</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->
    

        <div class="col-lg-9">
          <a href="postproducts.php">Post Products</a>

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="images/blackops.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/car.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/futon.jpg" alt="Third slide">
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

          <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/blackops.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">COD BlackOps PS4 copy</a>
                  </h4>
                  <h5>$59.99</h5>
                  <p class="card-text">Extra copy of new COD for sale message for inquiries</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/car.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Used Toyota Corolla 115,000</a>
                  </h4>
                  <h5>$4,000</h5>
                  <p class="card-text">Selling my corolla great condition message for meetup taking highest bed</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/futon.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Futon for sale</a>
                  </h4>
                  <h5>$299</h5>
                  <p class="card-text">Futon for sale slightly used</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/macbook.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">2015 Macbook Pro</a>
                  </h4>
                  <h5>$699</h5>
                  <p class="card-text">Used Macbook Pro for sale great condition original box included</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/bike.png" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Bike for sale</a>
                  </h4>
                  <h5>$499</h5>
                  <p class="card-text">Used bike for sale great condition slightly used </p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/couch.png" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Slightly Used Couch</a>
                  </h4>
                  <h5>$299</h5>
                  <p class="card-text">Used couch for sale great condition message for inquiries</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

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