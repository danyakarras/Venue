<!DOCTYPE html>
<html>
<body>

<h1>Welcome to VENUE</h1>
<h2>Where all your dreams come true</h2>
<br>
<button class="button" style="width:150px;height:50px;" id="EventsBtn">Browse all Events</button>
  <script>
    var btn = document.getElementById('EventsBtn');
    btn.addEventListener('click', function() {
      document.location.href = 'http://localhost/cs304proj/events.php';
    });
  </script>
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
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - ID: " . $row["branchID"]. "<br>";
		array_push($names, $row["name"]);
		array_push($ids, $row["branchID"]);
    }
} else {
    echo "0 results";
}

$conn->close();

 ?>
 
//TODO:
//TRY TO MAKE BUTTONS BASED ON THE VENUES IN THE DB BUT ITS NOT WORKING 
  <div id="button">whyyy</div>
  <script>
  //var names = "<?php echo $names; ?>";
  //var ids = "<?php echo $ids; ?>";
  /*for (var i = 0; i < 5; i++) {
	var btn = document.createElement("BUTTON");
	 btn.type = "button";
    btn.value = "im a button";
	var t = document.createTextNode("hi");
	btn.appendChild(t);
	var element = document.getElementById("h2");
	element.appendChild(btn);
  }*/
/*// 1. Create the button
var button = document.createElement("button");
button.innerHTML = "Do Something";

// 2. Append somewhere
var body = document.getElementByTagName("div");
body.appendChild(button);

// 3. Add event handler
button.addEventListener ("click", function() {
  alert("did something");
}); */

myButton = document.createElement("input");
myButton.type = "button";
myButton.value = "my button";
placeHolder = document.getElementById("button");
placeHolder.appendChild(myButton);
  </script>
  
  <br>
  
  <!--The above isn't working but this just creates a button for now -->
  <button class="button" style="width:100px;height:30px;" id="Venue1Btn">Thrills</button>
  <script>
    var btn = document.getElementById('Venue1Btn');
    btn.addEventListener('click', function() {
      document.location.href = 'http://localhost/cs304proj/venue_page.php';
    });
  </script>
  
  

</body>
</html>