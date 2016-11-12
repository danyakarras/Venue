<html> 
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


// CREATE TABLE customer (
// 		cid INT PRIMARY KEY,
// 		f_name VARCHAR (20) not null,
// 		l_name VARCHAR (20),
// 		hotness INT,
// 		email VARCHAR (20) not null,
// );

/*$sql = "CREATE TABLE Customer (
			cid INT PRIMARY KEY,
			f_name VARCHAR (20) not null,
			l_name VARCHAR (20),
			hotness INT,
			email VARCHAR (20) not null);";

*/
/*
if ($conn->query($sql) == TRUE) {
	echo "Table created.";
} else {
	echo "Error: ". $conn->error;
}
*/

$sql = "SELECT name, date, start_time FROM `hostedevent` WHERE branchID = 89200";
$result = $conn->query($sql);

var_dump($result);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["name"]. " - Name: " . $row["date"]. " " . $row["start_time"]. "<br>";
    }
} else {
    echo "0 results";
}


echo "seems to be working?";
$conn->close();

// $sql = "INSERT INTO `customer` (`cid`, `f_name`, `l_name`, `hotness`, `email`) VALUES (\'236011\', \'Michael\', \'Young\', \'9\', \'hot@hotmail.ca\')";

?> 
</html>