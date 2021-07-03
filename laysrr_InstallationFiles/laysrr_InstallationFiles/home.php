<?php 
session_start();
// Validate user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>POLICE HUB</title>
</head>
<body>
     <h1>POLICE HUB </h1>
     <h2>Hello <?php echo $_SESSION['username']; ?></h2>
     <h3> People database: </h3>

     <form method="post" action="search.php">

               <input type="text" name="keywords" placeholder="People name or licence...">
               <input type="submit" name="submit" value="Search">
               <br></br>
          </form>
     
     <h3> Vehicle database: </h3>
          
     <form method="post" action="vehicle.php">

          <input type="text" name="keywords" placeholder="Vehicle licence plate...">
          <input type="submit" name="submit" value="Search">

          </form>

     <h4> Insert new vehicle and people data:</h4>

     <form method="post" action="insert.php">

          <input type="text" name="type" placeholder="Vehicle Type..."> <br>
          <input type="text" name="colour" placeholder="Vehicle Colour..."> <br>
          <input type="text" name="licence" placeholder="Vehicle licence number..."> <br>
          <input type="text" name="people" placeholder="People name..."> <br>
          <input type="text" name="address" placeholder="People address..."> <br>
          <input type="text" name="peoplelicence" placeholder="People licence..."> <br>

          <br> <input type="submit" name="submit" value="Insert data">

          </form>

     <nav class="incident-nav">

          <br> <h3> Report an incident: </h3>

     	<a href="incident.php">File a Report for an Incident</a></br>

     </nav>

     <nav class="home-nav">

     	<br><br><br><a href="changePass.php">Change Password</a></br>
          <br><a href="logout.php">Logout</a></br>

     </nav>
</body>
</html>

<?php 
}else{
     // redirect user
     header("Location: index.php");
     exit();
}
 ?>
 