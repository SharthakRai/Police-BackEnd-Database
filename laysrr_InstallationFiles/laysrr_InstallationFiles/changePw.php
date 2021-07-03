<?php 
//session store information (in variables) to be used across multiple pages.
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include "config.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);                 //whitespace removed
	   $data = stripslashes($data);         //backslash removed
	   $data = htmlspecialchars($data);     //convert special chars to HTML entities
	   return $data;
    }
    // collect form data after submitting an HTML form with method="post" refer to changePass.php
	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){     // if this field is empty
      header("Location: changePass.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){   // if this field is empty
      header("Location: changePass.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){ // if new password does not match new password confirmation
      header("Location: changePass.php?error=The new passwords does not match");
	  exit();
    }else {
        $id = $_SESSION['id'];

        // police database select query for username and password
        $sql = "SELECT password FROM police WHERE id='$id' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
            
            // police database UPDATE query for  password
        	$sql_2 = "UPDATE police SET password='$np' WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: changePass.php?success=Your password has been changed successfully");
	        exit();

        }else {  // if password is incorrect
        	header("Location: changePass.php?error=Incorrect password");
	        exit();
        }
    }
}else{  // redirect user to changePass.php
	header("Location: changePass.php");
	exit();
}
}else{  // redirect user to index.php
     header("Location: index.php");
     exit();
}
