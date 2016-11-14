
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

	$time_picker = "  Start time: <select name='time'>'.$time_option.'</select>";
	$name = '  Event name: <input type="text" name="name">';
	$date = ' Date: <input type="date" name="date">';
	$venue = ' Venue name: <select name="branchID">'.$venue_options.'</select>';
	$price = ' Price: <input type="number" name="price" step="0.01" min="0">';

	echo '<form action="#" method="post">'.$venue.$name.$date.$time_picker.$price.'
	        <input type="submit" name="submit1" value="Submit" />
	        </form>';

	$conn->close();
			
	if(isset($_POST['submit1'])){

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
	<?php 

	$enname = '  Entertainment name: <input type="text" name="enname">';
	$genre = ' Genre: <input type="text" name="genre">';
	$cost = ' Cost: <input type="number" name="cost" step="0.01" min="0">';

	echo '<form action="#" method="post">'.$enname.$genre.$cost.'
	        <input type="submit" name="submit2" value="Submit" />
	        </form>';
		
	if(isset($_POST['submit2'])){

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

	    $enid = rand(100, 999);
		$input_enName = $_POST['enname'];
        $input_genre = $_POST['genre'];
        $input_cost = $_POST['cost'];
		
		$sql2 = "INSERT INTO `entertainment` VALUES ('$enid','$input_enName','$input_genre','$input_cost')";
		$conn->query($sql2);
		//add echo saying it was successful if it inserted and error if it didn't

		$conn->close();
	}
	
	?>
	
	<h3>Add Venue:</h3>
	<?php 

	$vname = ' Venue Name: <input type="text" name="vname">';
	$address = ' Address: <input type="text" name="address">';
	$capacity = ' Max. Capacity: <input type="number" name="capacity" step="1" min="0">';
	$cover_charge = ' Cover charge: <input type="number" name="cover" step="0.01" min="0">';

	echo '<form action="#" method="post">'.$vname.$address.$capacity.$cover_charge.'
	        <input type="submit" name="submit3" value="Submit" />
	        </form>';
		
	if(isset($_POST['submit3'])){

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

	    $brid = rand(10000, 99999);
		$input_vName = $_POST['vname'];
        $input_address = $_POST['address'];
        $input_capacity = $_POST['capacity'];
		$input_cover = $_POST['cover'];
		
		$sql3 = "INSERT INTO `venue` VALUES ('$brid','$input_vName','$input_address','$input_capacity','$input_cover')";
		$conn->query($sql3);
		//add echo saying it was successful if it inserted and error if it didn't
		

		$conn->close();
	}
	
	?>
	
	<h3>Add Staff:</h3>
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

	$fname = '  First name: <input type="text" name="fname">';
	$lname = '  Last name: <input type="text" name="lname">';
	$venue = ' Venue name: <select name="branchID">'.$venue_options.'</select>';

	echo '<form action="#" method="post">'.$fname.$lname.$venue.'
	        <input type="submit" name="submit4" value="Submit" />
	        </form>';

	$conn->close();
			
	if(isset($_POST['submit4'])){

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

	    $sid = rand(100000, 999999);
        $input_fName = $_POST['fname'];
		$input_lName = $_POST['lname'];
        $selected_venue = $_POST['branchID']; //gets branchID of selected venue name
		
		
		$sql4 = "INSERT INTO `staffemployed` VALUES ('$sid','$input_fName','$input_lName','$selected_venue')";
		$conn->query($sql4);
		//add echo saying it was successful if it inserted and error if it didn't

		$conn->close();
	}
	?>
	
	<h3>Add Table:</h3>
	
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

	//write and sql that willl select all branchID and names of venues, and then we put the name as venue and value="$branchID" where that's a variable $branchID = $row["branchID"];

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

	$tableNum = '  Table Number: <input type="number" name="tnum" step="1" min="0">';
	$tableSize = ' Table Size: <input type="number" name="tsize" step="1" min="0">';
	$tType = '  Table Type: <input type="text" name="ttype">';
	$numOfTType = ' Num of Table Type: <input type="number" name="numttype" step="1" min="0">';
	$tableCost = ' Table Cost: <input type="number" name="tCost" step="0.01" min="0">';
	$tvenue = ' Venue: <select name="tbranchID">'.$venue_options.'</select>';

	echo '<form action="#" method="post">'.$tableNum.$tableSize.$tType.$numOfTType.$tableCost.$tvenue.'
	        <input type="submit" name="submit5" value="Submit" />
	        </form>';

	$conn->close();
			
	if(isset($_POST['submit5'])){

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

	    $input_tableNum = $_POST['tnum'];
		$input_tableSize = $_POST['tsize'];
        $input_tType = $_POST['ttype'];
		$input_numOfTType = $_POST['numttype'];
		$input_tCost = $_POST['tCost'];
        $selected_tvenue = $_POST['tbranchID']; //gets branchID of selected venue name
		
		
		$sql5 = "INSERT INTO `venuehastable` VALUES ('$input_tableNum','$input_tableSize','$input_tType','$input_numOfTType','$input_tCost','$selected_tvenue')";
		$conn->query($sql5);
		//add echo saying it was successful if it inserted and error if it didn't

		/*$result = */$conn->close();
		//var_dump($result);
	}
	?>
	
	

	<h2>Remove </h2>
	<h3>Remove Event:</h3>
	<h3>Remove Entertainmant:</h3>
	<h3>Remove Venue:</h3>
	<h3>Remove Staff:</h3>
	<h3>Remove Table:</h3>

</body>
</html>