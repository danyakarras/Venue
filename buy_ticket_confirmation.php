<!--Venue Page-->
<!DOCTYPE html>
<html>
<body>

<?php 


$evid = $_GET['evid'];
$branchID = $_GET['branchID']; //WILL THIS WORK?

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

//INSERT this new information into the database
//to know the cid we must have session management... :/

$sql = "INSERT INTO `buysticketsfor` VALUES '$evid', '$ticketID', '$branchID'"; // customer id MISSING

//randomly generate a ticketID
$ticketID = rand(1000, 9000);

$conn->close();

 ?>
<h2>See you there!</h2>
<h3>Your ticket id is <?php echo $ticketID;?>.</h3>
<p>Success! You have a ticket for your desired event. Be sure to provide the security staff with your ticket id upon your arrival so they let you in!</p>

<h3>Enjoy your event!</h3>
 
 </body>
</html>
 