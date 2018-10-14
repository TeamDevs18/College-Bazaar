<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
 <style>

 body {background-image:url(/CollegeBazaar/images/whitebackground.jpg); }
 
</style>
    <?php include '../../header.php'; ?>
<div class="form">
    <h1><?= 'Success'; ?></h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>
    <a href="index.php"><button class="button button-block"/>Home</button></a>
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
