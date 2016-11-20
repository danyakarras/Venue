
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<body>
<h1>Welcome to VENUE</h1>
<h3>You are logged in as a Manager</h3>
<br>
<div class="well well-lg">
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

	$time_picker = "  <label for='stime'>Start Time:</label> <select name='stime' class='form-control'>'.$time_option.'</select>";
	$name = '  <label for="name">Title:</label> <input type="text" class="form-control" name="name">';
	$date = ' <label for="date">Date:</label> <input type="date" name="date" class="form-control">';
	$venue = ' <label for="branchID">Venue:</label> <select name="branchID" class="form-control">'.$venue_options.'</select>';
	$price = ' <label for="price">Price:</label> <input type="number" name="price" step="0.01" min="0" class="form-control">';

	echo '<form action="#" class="form-inline" method="post">'.$venue.$name.$date.$time_picker.$price.'
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
        $selected_time = $_POST['stime'];
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
	
	<h3>Add Entertainment to Event:</h3>
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

	$sql_ent = "SELECT name, enid FROM `entertainment`";

	$en_options = '';
	$entertainments = $conn->query($sql_ent);
        if($entertainments->num_rows > 0) {
            while($row = $entertainments->fetch_assoc()) {
                $entertainmentName = $row["name"];
                $entertainmentID = $row["enid"];
                $en_options .='<option value="'.$entertainmentID.'">'.$entertainmentName.'</option>';
            }
        } else {
        	echo "0 results";
        }
		
	$sql_ev = "SELECT name, evid, branchID FROM `hostedevent`";

	$ev_options = '';
	$evs = $conn->query($sql_ev);
        if($evs->num_rows > 0) {
            while($row = $evs->fetch_assoc()) {
                $evName = $row["name"];
                $evID = $row["evid"];
				$evBranchID = $row["branchID"];
                $ev_options .='<option value="'.$evID.'">'.$evName.'</option>';
            }
        } else {
        	echo "0 results";
        }
		
	$plays_ev = '   Select Entertainment to play at Event: <select name="plays_evid">'.$ev_options.'</select>';
	$plays_en= '  <select name="plays_enid">'.$en_options.'</select>';
	
	echo '<form action="#" method="post">'.$plays_ev.$plays_en.'
	        <input type="submit" name="submit11" value="Submit" />
	        </form>';

	$conn->close();
	
	if(isset($_POST['submit11'])){

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
	$fname = '  First name: <input type="text" name="fname">';
	$lname = '  Last name: <input type="text" name="lname">';
	$venue = ' Venue name: <select name="branchID">'.$venue_options.'</select>';

	echo '<form action="#" method="post">'.$fname.$lname.$venue.'
	        <input type="submit" name="submit4" value="Submit" />
	        </form>';
			
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
	$tableNum = '  Table Number: <input type="number" name="tnum" step="1" min="0">';
	$tableSize = ' Table Size: <input type="number" name="tsize" step="1" min="0">';
	$tType = '  Table Type: <input type="text" name="ttype">';
	$numOfTType = ' Num of Table Type: <input type="number" name="numttype" step="1" min="0">';
	$tableCost = ' Table Cost: <input type="number" name="tCost" step="0.01" min="0">';
	$tvenue = ' Venue: <select name="tbranchID">'.$venue_options.'</select>';

	echo '<form action="#" method="post">'.$tableNum.$tableSize.$tType.$numOfTType.$tableCost.$tvenue.'
	        <input type="submit" name="submit5" value="Submit" />
	        </form>';
			
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
	</div>
	<div class="well well-lg">
	<h2>Remove </h2>
	<h3>Remove Event:</h3>
	<h3>Remove Entertainmant:</h3>
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

	$sql_en = "SELECT name, enid FROM `entertainment`";

	$entertainment_options = '';
	$entertainments = $conn->query($sql_en);
        if($entertainments->num_rows > 0) {
            while($row = $entertainments->fetch_assoc()) {
                $entertainmentName = $row["name"];
                $entertainmentID = $row["enid"];
                $entertainment_options .='<option value="'.$entertainmentID.'">'.$entertainmentName.'</option>';
            }
        } else {
        	echo "0 results";
        }

	$del_entertainment= ' Select Entertainment to delete: <select name="del_enid">'.$entertainment_options.'</select>';

	echo '<form action="#" method="post">'.$del_entertainment.'
	        <input type="submit" name="submit7" value="Submit" />
	        </form>';

	$conn->close();
			
	if(isset($_POST['submit7'])){

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

        $selected_entertainment_to_delete = $_POST['del_enid']; //gets branchID of selected venue name
		
		$sql7 = "DELETE FROM `entertainment` WHERE enid = '$selected_entertainment_to_delete'";
		$conn->query($sql7);
		//add echo saying it was successful if it inserted and error if it didn't

		$conn->close();
	}
	?>
	
	
	
	<h3>Remove Venue:</h3>
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

	$venue = ' Select Venue to delete: <select name="del_branchID">'.$venue_options.'</select>';

	echo '<form action="#" method="post">'.$venue.'
	        <input type="submit" name="submit8" value="Submit" />
	        </form>';

	$conn->close();
			
	if(isset($_POST['submit8'])){

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

        $selected_venue_to_delete = $_POST['del_branchID']; //gets branchID of selected venue name
		
		$sql8 = "DELETE FROM `venue` WHERE branchID = '$selected_venue_to_delete'";
		$conn->query($sql8);
		//add echo saying it was successful if it inserted and error if it didn't

		$conn->close();
	}
	?>
	
	<h3>Remove Staff:</h3>
	<h3>Remove Table:</h3>
	</div>
</body>
</html>