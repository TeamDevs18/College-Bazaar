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
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #b7950b;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}


.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
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
	
	if(!isset($_SESSION['addevent'])) {
		$_SESSION['addevent']['name']="";
		$_SESSION['addevent']['categoryID']="1";
		$_SESSION['addevent']['date']="";
		$_SESSION['addevent']['price']="";
		$_SESSION['addevent']['topline']="";
		$_SESSION['addevent']['description']="";
		$_SESSION['addevent']['thumbnail']="noimage.jpg";
	} else {
		if($_SESSION['addevent']['thumbnail']!="noimage.jpg"){
			unlink("".$_SESSION['addevent']['thumbnail']);
		}
	}
	
	

	
	
	
	
?>
<div class="maincontent">

	<h1>Enter details for Event To Be Posted</h1>
	<div class="container" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
	<form method="post" action="confirmaddevent.php" enctype="multipart/form-data">
		<h1>Post Event</h1>
		<div class="row">
		 <div class="col-25">
		<p>Event Name: <input required type="text" name="name" value="<?php echo $_SESSION['addevent']['name']; ?>" maxlength="16" /></p>
		</div>		
		</div>
		<div class="row">
		<p>Event Date: <input required type="date" name="date" value="<?php echo $_SESSION['addevent']['date']; ?>" /></p>
		</div>
		<div class="row">
		<p>Event Flyer: <input required type="file" name="fileToUpload" id="fileToUpload" /></p>
		</div>
		<div class="row">
		<p>Price: $ <input type="number" step=".01" name="price" value="<?php echo $_SESSION['addevent']['price']; ?>" /></p>
</div>
		<div class="row">
		<p>Description: <br>
		<textarea name="description" cols=60 rows=5><?php echo $_SESSION['addevent']['description']; ?></textarea></p>
				</div>
		<div class="row">
		<input type="submit" name="submit" value="Submit" />
	</div>
	</form>
</div>
</div>
<body>
	
	<?php include 'footer.php'; ?>
</body>