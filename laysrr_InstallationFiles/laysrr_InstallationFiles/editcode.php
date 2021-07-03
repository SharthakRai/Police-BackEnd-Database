
<html>
   <head>
      <title>Edit Report statements</title>
      <h1>Edit Report statements</h1>
   </head>
   <body>
      <?php
         if(isset($_POST['update'])) {

            include "config.php";
            
            $id = $_POST['Incident_ID'];
            $report = $_POST['Incident_Report'];
            $date = $_POST['Incident_Date'];
            
            $sql = mysqli_query($conn,"UPDATE incident SET Incident_Report = '$report', 
            Incident_Date='$date' WHERE Incident_ID = $id");
            
            if(! $sql ) {
               die('Could not update data: ' . mysqli_error($conn));
            }
            // redirect user
            header("Location: edit.php");

         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                     <tr>
                        <td width = "100">Incident ID</td>
                        <td><input name = "Incident_ID" type = "text" 
                           id = "Incident_ID"></td><br><br>
                     </tr>
                     <tr>
                        <td width = "100">Incident Report</td>
                        <td><input name = "Incident_Report" type = "text" 
                           id = "Incident_Report" placeholder="Incident Statement..."></td><br><br>
                     </tr>
                     <tr>
                        <td width = "100">Date of Incident</td>
                        <td><input name = "Incident_Date" type = "text" 
                           id = "Incident_Date" placeholder="YYYY-MM-DD"> </td><br><br>
                     </tr>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td><br><br><br>
                     </tr>
               </form>
               <a href="edit.php">Back to retrieve and edit reports</a></br>
            <?php
         }
      ?>
   </body>
</html>

