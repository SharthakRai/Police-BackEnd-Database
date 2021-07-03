<!DOCTYPE html>
<html>
<head>
	<title>POLICE LOGIN</title>

</head>
<body>
     <form action="login.php" method="post">
	 
     	<h2>POLICE LOGIN</h2>

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<br><button type="submit">Login</button></br>
     </form>
</body>
</html>
