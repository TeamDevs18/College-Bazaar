<?php

	$conn = mysqli_connect('localhost','root','','Bazaar'); //connection


	session_start();
	
	if(!isset($_SESSION['active'])) {
		header("Location:index.php");
	}
	
	if(isset($_POST['submit'])) {
		$_SESSION['addproduct']['name']=$_POST['name'];
		$_SESSION['addproduct']['categoryID']=$_POST['categoryID'];
		$_SESSION['addproduct']['price']=$_POST['price'];
		$_SESSION['addproduct']['topline']=$_POST['topline'];
		$_SESSION['addproduct']['description']=$_POST['description'];
	} else {
		header("Location:index.php");
	}
	
	//files upload
	
	if(isset($_FILES['fileToUpload']['name'])) {
		
		$file_image = $_FILES['fileToUpload']['name']; //file image
		$target_dir = "images/";  //file directory
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //target file destination
		$uploadOk = 1; //if it is uploaded, check 1
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); //image type
		
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);  
			
			//check the validation of the image
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
			
		}
		
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ;
			header("Location: https://market-place-kellywebr.c9users.io/CollegeBazaar/products.php");
			
		}
		
	}
	
	
	$price = $_POST['price'];
	$top_line = $_POST['topline'];
	$description = $_POST['description'];
	$name = $_POST['name'];
	
	

	
	
	$sql = "INSERT INTO `products`(`userId`, `name`, `price`, `thumbnail`, `topline`, `description`) VALUES (".$_SESSION['id'].", '$name','$price','$target_file','$top_line','$description')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo '1';
	}else{
		echo '2';
	}
	
		
		?>
	