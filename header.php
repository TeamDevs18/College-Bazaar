<!-- CSS is RECOMMENDED to be put in the head, but we can get away with having it down here instead -->

<!-- Bootstrap core CSS -->
<link href="/CollegeBazaar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<!--<link href="/CollegeBazaar/css/business-frontpage.css" rel="stylesheet">-->

<!-- Custom Styles -->
<link href="/CollegeBazaar/styles.css" rel="stylesheet">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/CollegeBazaar/index.php">College Bazaar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
     <a class="nav-link" href="market.php">
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <?php
        session_start();
        
        if(isset($_SESSION['active'])){
          echo '<li class="nav-item">
            <a class="nav-link" href="/CollegeBazaar/account.php">Account</a>
          </li>';
        }
        
        ?>
        <li class="nav-item">
          <a class="nav-link" href="/CollegeBazaar/contact.php">Contact</a>
        </li>
        <?php

        if(isset($_SESSION['active'])){
          echo '<li class="nav-item">
            <a class="nav-link" href="/CollegeBazaar/Login-Register/login-register-code/logout.php">Logout</a>
          </li>';
        }else{
          echo '<li class="nav-item">
            <a class="nav-link" href="/CollegeBazaar/Login-Register/login-register-code/index.php">Login</a>
          </li>';
        }
        
        ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Header with Background Image -->
<header class="business-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="display-3 text-center text-white mt-4">College Bazaar</h1>
      </div>
    </div>
  </div>
</header>