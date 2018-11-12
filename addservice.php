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
	
</body>


<?php
	session_start();
	
	if(!isset($_SESSION['active'])) {
		header("Location:index.php");
	}
	
	if(!isset($_SESSION['addservice'])) {
		$_SESSION['addservice']['name']="";
		$_SESSION['addservice']['categoryId']="1";
		$_SESSION['addservice']['date']="";
		$_SESSION['addservice']['price']="";
		$_SESSION['addservice']['topline']="";
		$_SESSION['addservice']['description']="";
		$_SESSION['addservice']['thumbnail']="noimage.jpg";
	} else {
		if($_SESSION['addservice']['thumbnail']!="noimage.jpg"){
			unlink("".$_SESSION['addservice']['thumbnail']);
		}
	}
	
	

	
	
	
	
?>
<div class="maincontent">

	<h1>Enter details for Service To Be Posted</h1>
	<form method="post" action="confirmaddservice.php" enctype="multipart/form-data">
		<p>Service Name: <input required type="text" name="name" value="<?php echo $_SESSION['addservice']['name']; ?>" /></p>
		<p>Service Date: <input required type="date" name="date" value="<?php echo $_SESSION['addservice']['date']; ?>" /></p>
		<p>Picture (optional): <input  type="file" name="fileToUpload" id="fileToUpload" /></p>
		
		</p>
		<p>Price: $ <input type="number" step=".01" name="price" value="<?php echo $_SESSION['addservice']['price']; ?>" /></p>
		<p>Topline: <input type="text" name="topline" value="<?php echo $_SESSION['addservice']['topline']; ?>" /></p>
		<p>Description: <br>
		<textarea name="description" cols=60 rows=5><?php echo $_SESSION['addservice']['description']; ?></textarea></p>
		<input type="submit" name="submit" value="Submit" />
	</form>
</div>
<body>
	
	<?php include 'footer.php'; ?>
</body>