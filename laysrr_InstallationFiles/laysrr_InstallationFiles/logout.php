<?php 
// Initialise the session
session_start();

// Unset all of the session variables
session_unset();
// Destroy the session.
session_destroy();

// Redirect user
header("Location: index.php");
