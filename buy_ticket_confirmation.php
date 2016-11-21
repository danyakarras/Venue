<!--Venue Page-->
<?php
session_start();
if ( isset($_SESSION['user'])=="" ) {
    header("Location: index.php");
    exit;
  }
else
{
$cid=$_SESSION['user'];
$username=$_SESSION['username'];



?>
<!DOCTYPE html>
<html>
<body>
<div style="text-align:right;">Logged in as <?php echo $username; ?> | <a href="http://localhost/304_project/logout.php">Logout</a></div>
<?php 


$evid = $_GET['evid'];
$branchID = $_GET['branchID']; 

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

$sql = "INSERT INTO `buysticketsfor` VALUES ('', '$branchID', '$evid', '$cid')"; // ticketID is autoincrement
$conn->query($sql);

$conn->close();

 ?>

<h2>See you there!</h2>

<p>Success! You have a ticket for your desired event. You will receieve your ticket via email. Please bring it with you to the event!</p>

<h3>Enjoy your event!</h3>
<p><a href="http://localhost/304_project/tablebooking.php?evid=<?php echo $evid; ?>&branchID=<?php echo $branchID; ?>"><button>Book table for this event</button></a></p>
 
 </body>
</html>
<?php
}
?>
 