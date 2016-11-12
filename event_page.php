<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
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


$branchID = $_GET['venues']; 
 echo $branchID . "<br>";

$sql = "SELECT name, date, start_time FROM `hostedevent` WHERE branchID = $branchID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Date: " . $row["date"]. " " . $row["start_time"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "HOW THE HELL DO WE MAKE A TABLE";
//TODO:
//FIX THIS (MAKE A TABLE)
echo "<table>
<tr>
<th>Name</th>
<th>Date</th>
<th>start_time</th>
</tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['start_time'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();



 ?>

</body>
</html>