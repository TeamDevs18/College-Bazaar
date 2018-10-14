<?php

/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

//Import the PHPMailer class into the global namespace

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}

else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification';
        $confirmationLink='https://market-place-kellywebr.c9users.io/CollegeBazaar/Login-Register/login-register-code/verify.php?email='.$email.'&hash='.$hash;
        $message_body = '
        <p>Hello '.$first_name.',</p>

        <p>Thank you for signing up!</p>

        <p>Please click this link to activate your account:</p>

        <p><a href="'.$confirmationLink.'">'.$confirmationLink.'</a></p>';  

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
            $_SESSION['message']= "Mailer Error: " . $mail->ErrorInfo;
            
        
        } else {
           $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";
        }

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }
    

 
 
}