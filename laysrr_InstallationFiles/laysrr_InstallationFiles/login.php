<?php 
session_start(); 
include "config.php";	// Include config file

// Validate form data when form is entered
if (isset($_POST['uname']) && isset($_POST['password'])) {

	// Validate credentials
	function validate($data){
       $data = trim($data);					//whitespace removed
	   $data = stripslashes($data);			//backslash removed
	   $data = htmlspecialchars($data);		//convert special chars to HTML entities
	   return $data;
	}
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	// Check if username or password is empty 
	if (empty($uname)) {
		header("Location: index.php?error=Username is required!");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required!");
	    exit();
	}else{

		// police database select statement for username and password
		$sql = "SELECT * FROM police WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		// Check if username exists, if yes then verify password
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				// Incorrect username or password, the user will see this
				header("Location: index.php?error=Incorrect username or password please try again.");
		        exit();
			}
		}else{
			// Incorrect username or password, the user will see this
			header("Location: index.php?error=Incorrect username or password please try again.");
	        exit();
		}
	}
	
}else{
	// Redirect user 
	header("Location: index.php");
	exit();
}

/*
if(isset($_POST['submit'])){
	
	$type=$_POST['type'];
	$username=$_POST['$uname'];
	$password=$_POST['password'];

	$query = "SELECT * FROM police WHERE username='$username' AND
	password = '$password' and type = '$type'";
	
	$result = mysql_query($query);

	while($row=mysql_fetch_array($result)){
		if($row['username']==$username && $row['password']==$password && $row['type']=='Admin'){
			header("Location: admin.php")
		}elseif($row['username']==$username && $row['password']==$password && $row['type']=='User'){
			header("Location: home.php")
		}
	}

}
*/