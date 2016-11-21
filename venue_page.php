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



?><!--Venue Page-->
<!DOCTYPE html>
<html>
<head>
</head>
<body onload="initialize()">

<div style="text-align:right;">Logged in as <?php echo $username; ?> | <a href="http://localhost/304_project/logout.php">Logout</a></div>

<!-- DO WE NEED TO DO THIS EVERY TIME WE MAKE A QUERY? -->
<?php 


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
//get venue details
$sql = "SELECT name, branchID, address, capacity, cover_charge FROM `venue` WHERE branchID = '$branchID'";
//TODO: GET ALL EVENTS FOR VENUE
$eventsForVenue = "SELECT * FROM `hostedevent` WHERE branchID = '$branchID'";
$result = $conn->query($sql);
$allEvents = $conn->query($eventsForVenue);

$capacity = 0;
$cover_charge = 0;

//details query for side div
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$venueName=$row["name"];
		$capacity = $row["capacity"];
		$cover_charge = $row["cover_charge"];
		$venueAddress = $row["address"];
    }
} else {
    echo "0 results";
}

//events list query for events :P
$eventList = "";
if ($allEvents->num_rows > 0) {
    // output data of each row
    while($rowEvents = $allEvents->fetch_assoc()) {
    	$eventName=$rowEvents["name"];
		$date = $rowEvents["date"];
		$time = $rowEvents["start_time"];
		$evid = $rowEvents["evid"];
		$eventList .=  '<div class="event" style="padding: 20px; background-color: powderblue; border: 1px solid black;">'.$eventName.'<br>'.$time.'<br>'.$date.'<br><br><a href = "http://localhost/304_project/event_page.php?evid='.$evid.'"><button>Buy Tickets</button></a></div><br>';
    }
} else {
    echo "0 results";
}

$conn->close();

 ?>
<!--  want to make two divs on the side, one which will have the address, cover charge and capacity of the venue and another that will have the "make a reservation button" -->
<h1><?php echo $venueName; ?></h1>
<!-- this div is for the list of events for each specific venue -->
<div style="overflow:hidden;">
<div style="float:left;width:60%;">  <?php echo $eventList; ?></div>

<div style="float:right;width:35%;background:#aaccdd; padding-left: 20px;padding-bottom: 20px;"><h4>Details</h4>
	<p>Address: <?php echo $venueAddress; ?></p>
	<p>Cover charge: <?php echo $cover_charge;?></p>
	<p>Capacity of venue: <?php echo $capacity;?></p>

<div><a href="http://localhost/304_project/table_reservation.php?branchID=<?php echo $branchID;?>"><button>Make a Reservation</button></a></div>
</div>
</div>

    <h3>Location</h3>
    <div id="map" style="width: 480px; height: 320px;"></div>
	<input id="address" type="textbox" value=<?php echo $venueAddress?>>
    <script>
	
  var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
      zoom: 15,
      center: latlng
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
	
	
	 var address = document.getElementById('address').value;   
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == 'OK') {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });

  }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0t1gWCV_4zDtWvqLTRhd89N-v_44V2PQ&callback=initMap">
    </script>

 </body>
</html>
 <?php
}
?>