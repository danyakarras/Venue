
<!DOCTYPE html>
<html>
<body>
<h1>Welcome to VENUE</h1>
<h2>Where all your dreams come true</h2>
<h3>You are logged in as a Manager</h3>
<br>
<h2>Add </h2>
<h3>Add Event:</h3>


<?php 
$name = "";
$date = "";
$starttime = "";
$venue = "hi";
$price = 0;
echo 'Name: <input type="text" name=' .$name.'>
Date: <input type="date" name=' .$date.'>
Start-time: <input type="time" name='.$starttime.'>
Venue: <input type="text" name='.$venue.'>
Price: <input type="number" name='.$price.'><br>';



echo '<form action="#" method="post">'.$name.$date.$starttime.$venue.$price.'
        <input type="submit" name="submit" value="Submit" />
        </form>';
		
		
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
	
	
	$sql = "INSERT INTO `HostedEvent`
	VALUES ('12345','$name','$date','$starttime','4006','$price')";

	$result = $conn->query($sql);
	var_dump($result);
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