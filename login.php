<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if(!$user['active']){
        $_SESSION['message'] = "You need to verify your account before you can log in!";
        header("location: error.php");
    }else{
        if ( password_verify($_POST['password'], $user['password']) ) {
            
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['active'] = $user['active'];
            $_SESSION['id'] = $user['id'];
            
            echo $_SESSION['id'];
            
            // This is how we'll know the user is logged in
            $_SESSION['logged_in'] = true;
    
             header("location: https://collegebazaar.shop/CollegeBazaar/account.php");
        }
        else {
            $_SESSION['message'] = "You have entered wrong password, try again!";
             header("location: error.php");
        }
    }
}
?>


