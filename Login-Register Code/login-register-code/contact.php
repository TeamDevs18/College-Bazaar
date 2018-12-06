<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bazaar</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-item.css" rel="stylesheet">

  </head>

  <body>
    <style>
body{
  background-image:url('images/whitebackground.jpg');
}
</style>

    <?php include 'header.php'; ?>
   
    <!-- Page Content -->
    <div class="container">
      <?php
        if(!empty($_POST['text'])){
      
          // Send 
          $to      = 'collegebazaarllc@gmail.com';
          $subject = 'Email from '.$_POST['firstname'].' '.$_POST['lastname'];
          $message_body = '
          <p>Email from '.$_POST['firstname'].' '.$_POST['lastname'].':</p>
          <p>Phone: '.$_POST['phone'].'</p>
          <p>Email: '.$_POST['email'].'</p>
          <p>'.$_POST['text'].'</p>';  
    
          require("Login-Register/login-register-code/phpmailer/phpmailer/src/PHPMailer.php");
          require("Login-Register/login-register-code/phpmailer/phpmailer/src/Exception.php");
          require("Login-Register/login-register-code/phpmailer/phpmailer/src/OAuth.php");
          require("Login-Register/login-register-code/phpmailer/phpmailer/src/POP3.php");
          require("Login-Register/login-register-code/phpmailer/phpmailer/src/SMTP.php");
          
          $mail = new PHPMailer\PHPMailer\PHPMailer(true);
          
          $mail->SMTPDebug = 0;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'collegebazaarllc@gmail.com';                 // SMTP username
          $mail->Password = 'Bazaar1!';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to
          
          //Set who the message is to be sent from
          $mail->setFrom('collegebazaarllc@gmail.com', 'College Bazaar');
          //Set who the message is to be sent to
          $mail->addAddress($to);
          $mail->isHTML(true);                                  // Set email format to HTML
          //Set the subject line
          $mail->Subject = $subject;
          //Read an HTML message body from an external file, convert referenced images to embedded,
          //convert HTML into a basic plain-text alternative body
          //$mail->msgHTML('<p>Hello!</p>');
          $mail->Body = $message_body;
          //Replace the plain text body with one created manually
          //$mail->AltBody = 'This is a plain-text message body';
       
       }
      
       //send the message, check for errors ....BROKEN at the moment
       //if (!$mail->send()) {
       //    echo '<p class="emailMessage">We could not receive your message. Please try sending it again in a few minutes!</p>';
       // } else {
      //  echo '<p class="emailMessage">Your message has been sent and will be reviewed soon!</p>';
      //  }
      ?>

      <div class="row">

        <div class="col-lg-9">
           <h2>We would love to hear from you!</h2>
           <br>
           <h5>Fill out this short form and we will get back to you quickly:</h5>
<form action="contact.php" method="post">
  <div class="input-group">

    <input id="firstname" type="text" class="form-control" name="firstname" placeholder="First Name" required>
    
    <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Last Name" required>
  </div>
  <br>
  <div class="input-group">
    
    <input id="phone" type="tel" class="form-control" name="phone" placeholder="Phone Number">
  </div>
  <br>
  <div class="input-group">

    <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
  </div>
  <br>
  <div class="input-group">
    <textarea name="text" class="form-control custom-control" rows="4" id="msg" type="text" placeholder="How can we help you?"></textarea>
  </div>
  <br>
  <div class="input-group">
    <button class="buttonHome">Submit</button>
  </div>
</form>
        </div> <!-- col-lg-9 -->
        
        <div class="col-lg-3">
          <h3 class="mt-4">Or</h3>
          <br>
          <h4>Contact Us Directly</h4>
          <address>
            <strong>College Bazaar Admin</strong>
            <br>3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
          </address>
          <address>
            (123) 456-7890
            <br>
            <a href="mailto:collegebazaarllc@gmail.com">collegebazaarllc@gmail.com</a>
          </address>
          <a href="https://twitter.com/intent/tweet?screen_name=colbazaarllc&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-show-count="false">Tweet to @colbazaarllc</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div> <!-- col-lg-4 -->

      </div> <!-- row -->

    </div>
    <!-- /.container -->


    <?php include 'footer.php'; ?>
    

  </body>

</html>
