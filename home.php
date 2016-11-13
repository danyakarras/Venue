<!DOCTYPE html>
<html>
<body>

<h1>Welcome to VENUE</h1>
<h2>Where all your dreams come true</h2>
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
  <!--The above isn't working but this just creates a button for now -->


</body>
</html>