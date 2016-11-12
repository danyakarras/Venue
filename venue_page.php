<!--Venue Page-->
<!DOCTYPE html>
<html>
<body>
<h1>Thrills</h1>
<h2>Blah blah blah</h2>
<h2>Address or something</h2>


<!-- DO WE NEED TO DO THIS EVERY TIME WE MAKE A QUERY? -->
<?php 
$servername = "localhost";
$username = "root";
$password = NULL;
$databasename = 'Venue';

//connect
$conn = new mysqli($servername, $username, $password, $databasename);

//check connecting
if($conn->connect_error) {
	die("Connection falied: " . $conn->connect_error);
}

$sql = "SELECT name, branchID, address, capacity, cover_charge FROM `venue` WHERE branchID = 89200";
$result = $conn->query($sql);

$capacity = 0;
$cover_charge = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - ID: " . $row["branchID"]. "<br>";
		$capacity = $row["capacity"];
		$cover_charge = $row["cover_charge"];

    }
} else {
    echo "0 results";
}

$conn->close();

 ?>
 
 <p>Cover charge for this event is: <?php echo $cover_charge;?></p>
 <p>Displaying the capacity for now cuz whatever: <?php echo $capacity;?></p>
 
 </body>
</html>
 