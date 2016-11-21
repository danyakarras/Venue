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
<head>
<link rel="stylesheet" type="text/css" href="customer.css">
</head>
<body background="party.jpg">

<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="http://localhost/304_project/events.php">Events</a></li>
   <li class="dropdown">
    <a href="#" class="dropbtn">Dropdown</a>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </li>
  <li><a href="#contact">Venues</a></li>
  <li><a href="#about">My Reservations</a></li>
</ul>


<div style="text-align:right;">Logged in as <?php echo $username; ?> | <a href="http://localhost/304_project/logout.php">Logout</a> | <a href="customer_account.php">Account info</a></div>
<div style="text-align:left;"><a href="customer_reservations.php">View Reservations</a> | <a href="customer_tickets.php">View Tickets</a></div>


<h1>Welcome to VENUE</h1>
<br>
<div  >
<a href="http://localhost/304_project/events.php"><button class="main_button" style="vertical-align:middle" id="EventsBtn" ><span>Browse All Events </span></button></a>
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
        $venue_stringList.= '<a href = "http://localhost/304_project/venue_page.php?branchID='.$row["branchID"].'"><button class="second_button" style="vertical-align:middle"><span>'.$row["name"].'</span></button></a>';

    }
} else {
    echo "0 results";
}

$conn->close();

 ?>
 <br>
 <br>
 <h3>Or pick a venue:</h3>
  <br>
  <?php echo $venue_stringList; ?>
  <!--The above just creates a buttons -->

</div>
</body>
</html>

<?php
}
?>