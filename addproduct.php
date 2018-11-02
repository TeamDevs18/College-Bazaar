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
	
	if(!isset($_SESSION['addproduct'])) {
		$_SESSION['addproduct']['name']="";
		$_SESSION['addproduct']['categoryID']="1";
		$_SESSION['addproduct']['price']="";
		$_SESSION['addproduct']['topline']="";
		$_SESSION['addproduct']['description']="";
		$_SESSION['addproduct']['thumbnail']="noimage.jpg";
	} else {
		if($_SESSION['addproduct']['thumbnail']!="noimage.jpg"){
			unlink("".$_SESSION['addproduct']['thumbnail']);
		}
	}
	
	

	
	
	
	
?>
<div class="maincontent">
	<!-- <p><a href="index.php">Back to Homepage</a></p> -->
	<h1>Enter details for Product To Be Posted</h1>
	<form method="post" action="confirmaddproduct.php" enctype="multipart/form-data">
		<p>Product Name: <input required type="text" name="name" value="<?php echo $_SESSION['addproduct']['name']; ?>" /></p>
		<p>Product image: <input required type="file" name="fileToUpload" id="fileToUpload" /></p>
		<!-- <p>Category: <select name="categoryID">
		    <!-- ?php $catlist_sql="SELECT * FROM category";
				$catlist_qry=mysqli_query($db, $catlist_sql);
				$catlist_rs=mysqli_fetch_assoc($catlist_qry);
				do { ?>
					<option value="<!--?php echo $catlist_rs['categoryID']; ?>"
					<!-- ?php 
						if($catlist_rs['categoryID']==$_SESSION['addproduct']['categoryID']) {
							echo "selected=selected";
						}
					?>
					><!--?php echo $catlist_rs['name']; ?></option>
				<!--?php }	while ($catlist_rs=mysqli_fetch_assoc($catlist_qry));
		?></select>  -->
		</p>
		<p>Price: $ <input required type="number" step=".01" name="price" value="<?php echo $_SESSION['addproduct']['price']; ?>" /></p>
		<p>Topline: <input type="text" name="topline" value="<?php echo $_SESSION['addproduct']['topline']; ?>" /></p>
		<p>Description: <br>
		<textarea name="description" cols=60 rows=5><?php echo $_SESSION['addproduct']['description']; ?></textarea></p>
		<input type="submit" name="submit" value="Submit" />
	</form>
</div>
<body>
	
	<?php include 'footer.php'; ?>
</body>
