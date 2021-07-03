<!DOCTYPE html>
<html>
<body>

<h1>File Incident</h1>

<form method="post" action="report.php">

    <h3> Report Incident </h3>
    <textarea cols="40" rows="5" name="report" placeholder="Incident Statement..."></textarea><br>
    <h4> Time of incident </h4>
    <input type="text" name="time" placeholder="YYYY-MM-DD"> <br>

    <h4> Type of Offence </h4>
    <select name ="Offence">
        <option value = "">List of offences:</option>
        <option value = "1">Speeding</option>
        <option value = "2">Speeding on a motorway</option>
        <option value = "3">Seatbelt offence</option>
        <option value = "4">Illegal parking</option>
        <option value = "5">Drink driving</option>
        <option value = "6">Driving without a licence</option>
        <option value = "7">Driving without a licence</option>
        <option value = "8">Traffic light offences</option>
        <option value = "9">Cycling on pavement</option>
        <option value = "10">Failure to have control of vehicle</option>
        <option value = "11">Dangerous driving</option>
        <option value = "12">Careless driving</option>
        <option value = "12">Dangerous cycling</option>
    </select> <br>

    <br><input type="text" name="description" placeholder="State the Offence selected"> <br>

    <h4> Vehicle </h4>
    <input type="text" name="type" placeholder="Vehicle Type..."> <br>
    <input type="text" name="colour" placeholder="Vehicle Colour..."> <br>
    <input type="text" name="licence" placeholder="Vehicle licence number..."> <br>


    <h4> Person details </h4>
    <input type="text" name="people" placeholder="People name..."> <br>
    <input type="text" name="address" placeholder="People address..."> <br>
    <input type="text" name="peoplelicence" placeholder="People licence..."> <br>


    <br> <input type="submit" name="submit" value="Insert data">

    </form>


    <nav class="home-nav">

    <br><br><br><a href="edit.php">Retrieve and Edit Reports</a></br>

    </nav>

    <nav class="home-nav">

    <br><br><br><a href="home.php">Back to Police Hub</a></br>

    </nav>


</body>
</html>


