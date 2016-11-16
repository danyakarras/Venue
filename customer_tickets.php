<?php
session_start();
if ( isset($_SESSION['user'])=="" ) {
    header("Location: index.php");
    exit;
  }
else
{
$cid=$_SESSION['user'];
$user=$_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
</head>

<body>
<div style="text-align:right;">Logged in as <?php echo $user; ?> | <a href="http://localhost/304_project/logout.php">Logout</a></div>
<h2><?php echo $user?>'s Event Tickets</h2>

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

//get all ticket info
$sql = "SELECT e.name AS eventName, e.date AS date, e.start_time AS time, e.price AS ticketPrice, v.name AS venueName, ticketID FROM `buysticketsfor` t, `hostedevent` e, `venue` v WHERE t.branchID = v.branchID AND cid = '$cid' AND t.evid = e.evid";

$result = $conn->query($sql);

$ticketList = "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$venueName = $row["venueName"];
		$eventName = $row["eventName"];
		$ticketPrice = $row["ticketPrice"];
		$ticketID = $row["ticketID"];
		$date = $row["date"];
		$time = $row["time"];

		$ticketList .=  '<div style="padding: 20px; height: 80px; width:50%;background-color: powderblue; border: 1px solid black; ">'.$eventName.' at venue '.$venueName.'<br> On '.$date.' at '.$time.'<br>TicketID: '.$ticketID.'<br><a href="cancelticket_confirm.php?ticketID='.$ticketID.'" onclick="return confirm(\'Are you sure?\')"><button value ="$ticketID">Cancel</button></a></div><br>';
    }
} else {
    echo "You don't have any tickets yet! Go buy some ;)";
}

$conn->close(); 
echo $ticketList;
?>




</body>
</html>
<?php
}
?>