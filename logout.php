<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <style>

 body {background-image:url(/CollegeBazaar/images/whitebackground.jpg); }
 
</style>
  <?php include '../../header.php'; ?>

    <div class="form">
          <h1>Thanks for stopping by</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Home</button></a>

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
