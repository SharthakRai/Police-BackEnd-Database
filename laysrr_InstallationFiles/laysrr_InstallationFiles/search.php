<?php
include "config.php";

// https://www.youtube.com/watch?v=gf32KXTP0C4&ab_channel=Codecourse


// Validate form data when form is entered
if (isset($_POST['keywords'])) {

    $keywords = $conn->escape_string($_POST['keywords']);

    // construct the SELECT query
    $query = $conn->query("SELECT * FROM people WHERE People_name LIKE '%$keywords%' 
    OR People_licence LIKE '$keywords%'");


    if($query->num_rows) {
        while($r = $query->fetch_object()) {

            // output people_name, people_address, people_licence
            echo "<tr><td>". $r->People_name . "</td><td> <br>" . 
            $r->People_address  . "</td><td> <br> " . 
            $r->People_licence  . "</td><td> <br><br>";
        }
    } else // if query result is empty 
    {
        echo "Database is empty";
    }      

    mysqli_close($conn);
      
}
