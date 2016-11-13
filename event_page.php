<html>
<head>

</head>
<body>
<?php 

$evid = $_GET['evid'];
//$branchID = $_GET['branchID'];

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


$sql = "SELECT ev.evid AS evid, en.enid AS enid, ev.name AS eventName, date, start_time, en.name AS enName, genre, v.name AS venueName, address, ev.price AS eventPrice FROM `venue` v, `hostedevent` ev, `playsat` p, `entertainment` en, `buysticketsfor`t WHERE ev.branchID = p.branchID AND ev.evid = p.evid AND en.enid = p.enid AND v.branchID = p.branchID AND t.evid = ev.evid AND ev.evid = '$evid' AND p.evid = '$evid'  AND t.evid = '$evid'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $evid = $row["evid"];
        $enid = $row["enid"];

        $eventName = $row["eventName"];
        $eventPrice = $row["eventPrice"];
        $date = $row["date"];
        $time = $row["start_time"];

        $enName = $row["enName"];
        $enGenre = $row["genre"];

        $venueName = $row["venueName"];
        $venueAddress = $row["address"];
        
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
<p><a href = "http://localhost/304_project/buy_ticket_confirmation.php?evid=<?php echo $row["evid"]; ?>"><button>Buy my ticket!</button></a></p>

</body>
</html>