
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="dropdown_style.css">
	<script>
		//ALL THIS IS FOR FILTERING BY VENUE NAME
		function filterEvents() {
			hideEvents();
			var events = document.getElementsByName('events');
			var txt = "";
			var i;
			for (i = 0; i < events.length; i++) {
				if(events[i].checked) {

					txt += events[i].value + " ";
					showEvents(events[i].value);
				}
			}
		}

		function hideEvents() {
			var elements = document.getElementsByClassName("event");
			for(var i = 0; i < elements.length; i++) {
				elements[i].style.display = "none";
			}
		}

		function showEvents(eventName) {
			var elements = document.getElementsByClassName(eventName);
			console.log(elements);
			for(var i = 0; i < elements.length; i++) {
				elements[i].style.display = "block";
			}
		}

	</script>
</head>

<body>

<h1>Browse Events!</h1>

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

$sql = "SELECT evid, e.name AS eventName, date AS eventDate, start_time, v.name AS venueName FROM `hostedevent` e, `venue` v WHERE v.branchID = e.branchID";

$result = $conn->query($sql);

$capacity = 0;
$cover_charge = 0;
$eventList = "";
$checkboxList = "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$eventName=$row["eventName"];
		$venueName = $row["venueName"];
		$date = $row["eventDate"];
		$time = $row["start_time"];
		$evid = $row["evid"];
		$eventList .=  '<div class="event '.$venueName.'"><a href = "http://localhost/304_project/event_page.php?evid='.$row["evid"].'">'.$eventName.'</a><br>'.$time.'<br>'.$date.'<br>'.$venueName.'</div>';


		
		if(strpos($checkboxList, $venueName) !== false){

		} else {
			$checkboxList .='<input type="checkbox" name="events" value="'.$venueName.'">'.$venueName.' ';
		}
    }
} else {
    echo "0 results";
}

$conn->close();  

echo $checkboxList. '<button onclick="filterEvents()">Filter</button><hr>'.$eventList;

?>



</body>
</html>