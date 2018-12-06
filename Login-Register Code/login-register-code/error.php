<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
    <style>

 body {background-image:url(/CollegeBazaar/images/whitebackground.jpg); }
 
</style>
    
    <?php include '../../header.php'; ?>
<div class="form">
     <h2>You are not logged in.</h2>


    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>     
    <a href="index.php"><button class="button button-block"/>Log in/Register</button></a>
</div>
  </div>
    <div class="col-lg-4">
          <h2 class="mt-4"> </h2>
          <address>
            <strong> </strong>
            <br>
            <br>
            <br>
          </address>
          <address>
            <abbr title=></abbr>
            
            <br>
           <abbr title=></abbr>
            <a href=></a>
          </address>
        </div>

      </div>

    </div>
    <?php include '../../footer.php'; ?>
    <?php include 'login-footer.php'; ?>
</body>
</html>
