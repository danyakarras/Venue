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



?><html>
<head>

</head>
<body>

<div style="text-align:right;">Logged in as <?php echo $username; ?> | <a href="http://localhost/304_project/logout.php">Logout</a></div>

<?php 

$evid = $_GET['evid'];


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

//BROKEN PREVIOUS QUERY
// $sql = "SELECT ev.evid AS evid, en.enid AS enid, ev.name AS eventName, date, start_time, en.name AS enName, genre, v.name AS venueName, address, ev.price AS eventPrice, v.branchID AS branchID FROM `venue` v, `hostedevent` ev, `playsat` p, `entertainment` en, `buysticketsfor`t WHERE ev.branchID = p.branchID AND ev.evid = p.evid AND en.enid = p.enid AND v.branchID = p.branchID AND t.evid = ev.evid AND ev.evid = '$evid' AND p.evid = '$evid'  AND t.evid = '$evid'";

$sql = "SELECT ev.name AS eventName, date, start_time, price, en.name AS enName, genre, v.name AS venueName, address, v.branchID AS branchID FROM `entertainment` en, `hostedevent` ev, `playsat` p, `venue` v WHERE ev.branchID = p.branchID AND ev.evid = p.evid AND en.enid = p.enid AND v.branchID = ev.branchID AND p.evid ='$evid'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $eventName = $row["eventName"];
        $eventPrice = $row["price"];
        $date = $row["date"];
        $time = $row["start_time"];

        $enName = $row["enName"];
        $enGenre = $row["genre"];

        $venueName = $row["venueName"];
        $venueAddress = $row["address"];
        $branchID = $row["branchID"];
        
    }
} else {
    echo "0 results";
}

//I don't want it to be a table, just tell them all the info in paragraphs below

$conn->close();

 ?>

<h2><?php echo $eventName;?> </h2>
<h3>Be there at <?php echo $time;?> on <?php echo $date;?>.</h3>
<p><?php echo $enName;?> of <?php echo $enGenre;?> genre will be playing.</p>
<p>Individual tickets for this event are $<?php echo $eventPrice;?></p>
<p>This event is at <?php echo $venueName;?> located at <?php echo $venueAddress;?></p>
<p><a href = "http://localhost/304_project/buy_ticket_confirmation.php?evid=<?php echo $evid; ?>&branchID=<?php echo $branchID; ?>"><button>Buy my ticket!</button></a></p>

</body>
</html>
<?php
}
?>