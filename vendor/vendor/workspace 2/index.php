
<html>
	<head>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				
			</header>
 
<?php

    session_start();

    if(!(isset($_SESSION['id']))){
    	echo '<nav>
				<ul class="sidenav">
					<li><a class="active" href="https://unknowns-jietaowu.c9users.io/index.php">Home</a></li>
					<li><a href="">Men\'s Watches</a></li>
					<li><a href="">Women\'s Watches</a></li>
					<li><a href="">Children\'s Watches</a></li>
					<li><a href="">Accessories</a></li>
				
				</ul>
				
			</nav>
		<div class="hero-image">
    
  <div class="hero-text">
  </div>
</div>
			 <nav>
             <ul class="login">
         
                 <li style="float:right"><a class="active" href="https://unknowns-jietaowu.c9users.io/registration/login/login.php">Login</a></li>
             </ul>
         </nav>
			 ';
			
    }else{
    	
    		echo '<nav>
				<ul class="sidenav">
					<li><a class="active" href="index.php">Home</a></li>
					<li><a href="">Men\'s Watches</a></li>
					<li><a href="">Women\'s Watches</a></li>
					<li><a href="">Children\'s Watches</a></li>
					<li><a href="">Accessories</a></li>
					
					
				</ul>
			</nav>
			<div class="hero-image">
    <div class="hero-text">
  </div>
</div>
			  <nav>
             <ul class="login">
          			
                
                 
                  <li style="float:right"><a class="active" href="https://unknowns-jietaowu.c9users.io/registration/login/logout.php">Logout</a></li>
                  <li style="float:right"><a class="active" href="https://unknowns-jietaowu.c9users.io/accounts/profile.php">Account</a></li>
             </ul>
         </nav>';
    	
    }
?>
		

		<!--  -->

		<div class="content">
					

					<hr>
					<div class="gallery">
  <a target="_blank" href="/images/black_black_face.jpg">
    <img src="/images/black_black_face.jpg" alt="Trolltunga Norway" width="300" height="200">
  </a>
  <div class="desc">Black Link</div>
  
</div>

<div class="gallery">
  <a target="_blank" href="/images/black_red_face.jpg">
    <img src="/images/black_red_face.jpg" alt="Forest" width="600" height="400">
  </a>
  <div class="desc">Classic Black Leather</div>
</div>

<div class="gallery">
  <a target="_blank" href="/images/brown_black_face.jpg">
    <img src="/images/brown_black_face.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">Rose Gold Brown</div>
</div>

<div class="gallery">
  <a target="_blank" href="/images/brown_white_face.jpg">
    <img src="/images/brown_white_face.jpg" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc">Rosewood</div>
</div>
<div class="gallery">
  <a target="_blank" href="/images/grey_grey_face.jpg">
    <img src="/images/grey_grey_face.jpg" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc">Gotham</div>
</div>

<div class="gallery">
  <a target="_blank" href="/images/brown_black_face.jpg">
    <img src="/images/brown_black_face.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">Rose Gold Brown</div>
</div>

<div class="gallery">
  <a target="_blank" href="/images/black_red_face.jpg">
    <img src="/images/black_red_face.jpg" alt="Forest" width="600" height="400">
  </a>
  <div class="desc">Classic Black Leather</div>
</div>

<div class="gallery">
  <a target="_blank" href="/images/brown_black_face.jpg">
    <img src="/images/brown_black_face.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">Rose Gold Brown</div>
</div>

<div class="gallery">
  <a target="_blank" href="/images/brown_white_face.jpg">
    <img src="/images/brown_white_face.jpg" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc">Rosewood</div>
</div>
<div class="gallery">
  <a target="_blank" href="/images/grey_grey_face.jpg">
    <img src="/images/grey_grey_face.jpg" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc">Gotham</div>
</div>






 <iframe
  width="100%"
  height="200"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCgKgzfRDmerRHXvzGn86U1pLg02EcGtq4&q=oakland+hope" allowfullscreen>
</iframe>  

</div>


</div>		



	
		<!-- Footer -->
		<footer class="footer">
    	<p></p>
    	<address>
	Created By The Unknowns<br>
	Contact Us <a href="mailto:unknownwatches@example.com">TheUnknowns</a>.<br>

</address>
		</footer>

	
	</body>
</html>