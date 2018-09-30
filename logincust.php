<form action="index.php?page=customer" method="post">
	<p>Username:<input name="custusername" /></p>
	<p>Password:<input name="custpassword" type="password" /></p>
	<?php
	if(isset($_GET['error'])) {
		echo "Dear Customer-Incorrect username or password";
	}
	
	?>
	<p><input type="submit" name="logincust" /></p>
</form>