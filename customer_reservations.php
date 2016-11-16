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
<h2><?php echo $user?>'s Reservations</h2>

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

//maybe later join with venue has table to get the section type too
$sql = "SELECT name, confirmationNum, numOfGuests, date, time FROM `tablereservation` r, `venue` v WHERE r.branchID = v.branchID AND cid = '$cid'";

$result = $conn->query($sql);

$reservationList = "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$venueName = $row["name"];
		$confirmationNum = $row["confirmationNum"];
		$numOfGuests = $row["numOfGuests"];
		$date = $row["date"];
		$time = $row["time"];

		$reservationList .=  '<div style="padding: 20px; height: 80px; width:50%;background-color: powderblue; border: 1px solid black; ">'.$venueName.'<br> On '.$date.' at '.$time.'<br>Confirmation number: '.$confirmationNum.'<br>For '.$numOfGuests.' Guest(s)<br><a href="cancel_confirm.php?confirmationNum='.$confirmationNum.'" onclick="return confirm(\'Are you sure?\')"><button value ="$confirmationNum">Cancel</button></a></div><br>';

		
		// <a href="http://stackoverflow.com" 
  //   onclick="return confirm('Are you sure?');">My Link</a>
    }
} else {
    echo "You don't have any reservations yet! Go make some ;)";
}

$conn->close(); 
echo $reservationList;
?>




</body>
</html>
<?php
}
?>