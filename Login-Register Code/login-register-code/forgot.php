<?php 
/* Reset your password form, sends reset.php password link */
require 'db.php';
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link';
        $resetLink= 'https://market-place-kellywebr.c9users.io/CollegeBazaar/Login-Register/login-register-code/reset.php?email='.$email.'&hash='.$hash;
        $message_body = '
        <p>Hello '.$first_name.',</p>

        <p>You have requested password reset!</p>

        <p>Please click this link to reset your password:</p>

        <p><a href="'.$resetLink.'">'.$resetLink.'</a></p>';  

        require("phpmailer/phpmailer/src/PHPMailer.php");
        require("phpmailer/phpmailer/src/Exception.php");
        require("phpmailer/phpmailer/src/OAuth.php");
        require("phpmailer/phpmailer/src/POP3.php");
        require("phpmailer/phpmailer/src/SMTP.php");
        
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
        $mail->addAddress($email);
        $mail->isHTML(true);                                  // Set email format to HTML
        //Set the subject line
        $mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML('<p>Hello!</p>');
        $mail->Body = $message_body;
        //Replace the plain text body with one created manually
        //$mail->AltBody = 'This is a plain-text message body';
     
     
        
        //send the message, check for errors
        if (!$mail->send()) {
            header("location: error.php");
            $_SESSION['message']= "Mailer Error: " . $mail->ErrorInfo;
            
        
        } else {
          header("location: success.php");
           $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";
        }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Reset Your Password</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
      <style>

 body {background-image:url(/CollegeBazaar/images/whitebackground.jpg); }
 
</style>
    <?php include '../../header.php'; ?>
  <div class="form">

    <h1>Reset Your Password</h1>

    <form action="forgot.php" method="post">
     <div class="field-wrap">
      <input type="email"required autocomplete="off" name="email" placeholder="Email Address"/>
    </div>
    <button class="button button-block"/>Reset</button>
    </form>
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
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

  <?php include '../../footer.php'; ?>
    <?php include 'login-footer.php'; ?>
</body>

</html>
