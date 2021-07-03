<?php
include "config.php";

// Validate form data when form is entered
if (isset($_POST['keywords'])) {

    $keywords = $conn->escape_string($_POST['keywords']);

    // construct the SELECT query by joining tables through ownership
    $query = "SELECT ownership.People_ID, ownership.Vehicle_ID, 
    people.People_name, people.People_licence, 
    vehicle.Vehicle_type, vehicle.Vehicle_colour, vehicle.Vehicle_licence 
    FROM ownership JOIN people ON ownership.People_ID = people.People_ID 
    JOIN vehicle ON ownership.Vehicle_ID = vehicle.Vehicle_ID
    WHERE Vehicle_licence LIKE '%$keywords%'";

    $result = $conn->query($query);

    if($result->num_rows) {
        while($r = $result->fetch_object()) {

            // output Vehicle type, colour and licence, people_name, people_licence
            echo "<tr><td>". $r->People_name . "</td><td> <br>" . 
            $r->People_licence  . "</td><td> <br>" .
            "<tr><td>". "Vehicle Type: " . $r->Vehicle_type . 
            "</td><td> <br>". "Vehicle Colour: " . $r->Vehicle_colour  . 
            "</td><td> <br> ". "Vehicle Licence: " . $r->Vehicle_licence  . "</td><td> <br><br>";
        }
    } else // if query result is empty 
    {
        echo "Database is empty";
    }      
    mysqli_close($conn);
}
