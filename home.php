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


<div style="text-align:right;">Logged in as <?php echo $username; ?> | <a href="http://localhost/304_project/logout.php">Logout</a> | <a href="customer_account.php">Account info</a></div>
<div style="text-align:left;"><a href="customer_reservations.php">View Reservations</a> | <a href="customer_tickets.php">View Tickets</a></div>


<h1>Welcome to VENUE</h1>
<br>

<a href="http://localhost/304_project/events.php"><button class="button" style="width:150px;height:50px;" id="EventsBtn" >Browse all Events</button></a>
  <br>
  <br>
  
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

$sql = "SELECT name, branchID FROM `venue`";
$result = $conn->query($sql);

$names = array();
$ids = array();
$venue_stringList = "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $venue_stringList.= '<a href = "http://localhost/304_project/venue_page.php?branchID='.$row["branchID"].'"><button class="button" style="width:100px;height:30px;">'.$row["name"].'</button></a>';

    }
} else {
    echo "0 results";
}

$conn->close();

 ?>
 
  <br>
  <?php echo $venue_stringList; ?>
  <!--The above just creates a buttons -->


</body>
</html>

<?php
}
?>