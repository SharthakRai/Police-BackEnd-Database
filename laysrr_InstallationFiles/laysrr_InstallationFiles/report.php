<?php
include "config.php";

$report = $_POST['report'];
$time = $_POST['time'];
$description = $_POST['description'];

$type = $_POST['type'];
$colour = $_POST['colour'];
$licence = $_POST['licence'];
$people = $_POST['people'];
$address = $_POST['address'];
$peoplelicence = $_POST['peoplelicence'];

$sql = "INSERT INTO incident (Incident_Report, Incident_Date) 
VALUES ('$report', '$time') ; 
INSERT INTO offence (Offence_description) 
VALUES ('$description') ;
INSERT INTO vehicle (Vehicle_type, Vehicle_colour, Vehicle_licence) 
VALUES ('$type', '$colour', '$licence') ; 
INSERT INTO people (People_name, People_address, People_licence)
    VALUES ('$people', '$address', '$peoplelicence');
"; 

mysqli_multi_query($conn, $sql);

header("Location: incident.php?Insertion=success!");

?>

