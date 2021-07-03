<!DOCTYPE html>
<html>
<head>
  <title>Reteieve and edit Reports</title>
</head>
<body>

<h2>List of Incidents</h2>

<table border="1">
  <tr>
    <td>Incident_ID</td>
    <td>Vehicle ID</td>
    <td>People ID</td>
    <td>Date of incident</td>
    <td>Report statement</td>
    <td>Offence ID</td>
    <td>Edit</td>

  </tr>

<?php

include "config.php"; // Using database connection file here

$records = mysqli_query($conn,"SELECT * FROM incident ORDER BY Incident_Date"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Incident_ID']; ?></td>
    <td><?php echo $data['Vehicle_ID']; ?></td>
    <td><?php echo $data['People_ID']; ?></td>
    <td><?php echo $data['Incident_Date']; ?></td>
    <td><?php echo $data['Incident_Report']; ?></td>
    <td><?php echo $data['Offence_ID']; ?></td>
    <td><a href="editcode.php?id=<?php echo $data['Incident_ID']; ?>">Edit</a></td>
  </tr>	
<?php
}
?>
</table>

<nav class="home-nav">

    <br><br><br><a href="incident.php">Back to Filing incidents</a></br>

    </nav>

</body>
</html>

