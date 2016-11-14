
<!DOCTYPE html>
<html>
<body>
<h1>Welcome to VENUE</h1>
<h3>You are logged in as a Manager</h3>
<br>
<h2>Add </h2>
<h3>Add Event:</h3>


<?php 

	//dropdown of working hours
	$time_option='';
	$starttime= date("H:i:s", mktime(0, 0, 0));
	for ($y = 9; $y < 24; $y++) {
	    $timer='+'.$y.' hour';
	    $timeafter=strtotime($timer, strtotime($starttime));
	    $time_database_format= date("H:i:s",$timeafter);
	    $time_user_format= date("h:i A",$timeafter); 
	    $time_option.='<option value="'.$time_database_format.'">'.$time_user_format.'</option>';
	}

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

	//wrtie and sql that willl select all branchID and names of venues, and then we put the name as venue and value="$branchID" where that's a variable $branchID = $row["branchID"];

	$sql = "SELECT name, branchID FROM `venue`";

	$venue_options = '';
	$venues = $conn->query($sql);
        if($venues->num_rows > 0) {
            while($row = $venues->fetch_assoc()) {
                $venueName = $row["name"];
                $branchID = $row["branchID"];
                $venue_options .='<option value="'.$branchID.'">'.$venueName.'</option>';
            }
        } else {
        	echo "0 results";
        }

	$time_picker = "Start time: <select name='time'>'.$time_option.'</select><br>";
	$name = 'Event name: <input type="text" name="name"><br>';
	$date = 'Date: <input type="date" name="date"><br>';
	$venue = 'Venue name: <select name="branchID">'.$venue_options.'</select><br>';
	$price = 'Price: <input type="number" name="price" step="0.01" min="0"><br>';

	echo '<form action="#" method="post">'.$venue.$name.$date.$time_picker.$price.'
	        <input type="submit" name="submit" value="Submit" />
	        </form>';

	$conn->close();
			
	if(isset($_POST['submit'])){

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

	    $evid = rand(100, 900);
	    $selected_date = $_POST['date'];  // Storing Selected Value In Variable
        $selected_time = $_POST['time'];
        $input_eventName = $_POST['name'];
        $selected_venue = $_POST['branchID']; //gets branchID of selected venue name
        $input_price = $_POST['price'];
		
		
		$sql = "INSERT INTO `hostedevent` VALUES ('$evid','$input_eventName','$selected_date','$selected_time','$selected_venue','$input_price')";
		$conn->query($sql);
		//add echo saying it was successful if it inserted and error if it didn't

		$conn->close();
	}
	?>

	<h3>Add Entertainmant:</h3>
	<h3>Add Venue:</h3>
	<h3>Add Staff:</h3>
	<h3>Add Table:</h3>

	<h2>Remove </h2>
	<h3>Remove Event:</h3>
	<h3>Remove Entertainmant:</h3>
	<h3>Remove Venue:</h3>
	<h3>Remove Staff:</h3>
	<h3>Remove Table:</h3>

</body>
</html>