<?php
include "config.php";

$type = $_POST['type'];
$colour = $_POST['colour'];
$licence = $_POST['licence'];
$people = $_POST['people'];
$address = $_POST['address'];
$peoplelicence = $_POST['peoplelicence'];

//Insert new data into two different tables
$sql = "INSERT INTO vehicle (Vehicle_type, Vehicle_colour, Vehicle_licence) 
VALUES ('$type', '$colour', '$licence') ; 
INSERT INTO people (People_name, People_address, People_licence)
    VALUES ('$people', '$address', '$peoplelicence') ";

mysqli_multi_query($conn, $sql);

header("Location: home.php?Insertion=success!");

