<?php
session_start();
if ( isset($_SESSION['user'])=="" ) {
    header("Location: index.php");
    exit;
  }
else
{
$sid=$_SESSION['user'];
$username=$_SESSION['username'];

?>

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
<div style="text-align:right;">Logged in as <?php echo $username; ?> | <a href="http://localhost/304_project/logout.php">Logout</a></div>
<h1>Statistics Page</h1>

<div class="well well-lg">
<h4>Customers who've been to every venue</h4> <!-- **THIS IS DIVISION** -->
<?php
$vips = ' <label for="vips">Show VIP table:</label>';

echo '<form action="#" class="form-inline" method="post">'.$vips.'
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


$sql2 = "SELECT c.f_name, c.l_name FROM `customer` c WHERE NOT EXISTS (SELECT * from `venue` v WHERE NOT EXISTS (SELECT t.branchID FROM buysticketsfor t WHERE t.branchID = v.branchID AND c.cid = t.cid))";


$result2 = $conn->query($sql2);
echo $conn->error;

		//add echo saying it was successful if it inserted and error if it didn't
		
		$viplist = "";
		if ($result2->num_rows > 0) {
			// output data of each row
			while($row = $result2->fetch_assoc()) {
				$f_name=$row["f_name"];
				$l_name = $row["l_name"];
				$viplist .=  '<tr><td>'.$f_name.'</td><td>'.$l_name.'</td></tr>';
			}
		}

		$conn->close();
		
	echo '	<br><table style="width:25%">
	<tr>
    <th>First Name</th>
    <th>Last Name</th> 
	</tr>
	'.$viplist.'
	</table>';	
		
		
		
	}


?>

<br>
<h4>Average hotness of each event</h4> <!-- **THIS IS AGG. W/ GROUP BY** -->
<?php
$hotness = ' <label for="hotness">Show Event hotness table:</label>';

echo '<form action="#" class="form-inline" method="post">'.$hotness.'
	        <input type="submit" name="submit1" value="Submit" />
	        </form>';


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
		
		$sql1 = "SELECT AVG(hotness),branchID,evid FROM customer c, buysticketsfor t WHERE c.cid = t.cid GROUP BY branchID, evid"; // evid is auto-incremented
		$result = $conn->query($sql1);
		//add echo saying it was successful if it inserted and error if it didn't
		
		$tablelist = "";
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$avgHot=$row["AVG(hotness)"];
				$branchID = $row["branchID"];
				$evid = $row["evid"];
				$tablelist .=  '<tr><td>'.$branchID.'</td><td>'.$evid.'</td><td>'.$avgHot.'</td></tr>';
			}
		}

		$conn->close();
		
	echo '	<table style="width:50%">
	<tr>
    <th>Venue</th>
    <th>Event</th> 
    <th>avg hotness</th>
	</tr>
	'.$tablelist.'
	</table>';	
		
		
		
	}
	?>


<br>
<h4>Event with Max hotness</h4>

<?php
$maxhot2 = ' <label for="maxhot">Show hottest event:</label>';

echo '<form action="#" class="form-inline" method="post">'.$maxhot2.'
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
		
		$sql3 = "SELECT MAX(avghot) AS maxhot,branchID,evid 
FROM
(SELECT AVG(hotness) AS avghot,branchID,evid 
 FROM `customer` c, `buysticketsfor` t 
 WHERE c.cid = t.cid 
 GROUP BY branchID, evid) 
 AS T;"; 
		
		
		$sql4 = "SELECT MAX(avghot) AS maxhot,branchID,evid 
FROM
(SELECT AVG(hotness) AS avghot,branchID,evid 
 FROM `customer` c, `buysticketsfor` t 
 WHERE c.cid = t.cid 
 GROUP BY branchID, evid) 
 AS T
 WHERE avghot = 
	(SELECT MAX(avghot)
	FROM (SELECT AVG(hotness) AS avghot,branchID,evid 
 FROM `customer` c, `buysticketsfor` t 
 WHERE c.cid = t.cid 
 GROUP BY branchID, evid) 
 AS T)";

		
		
		
		$result = $conn->query($sql4);
		echo $conn->error;
		//add echo saying it was successful if it inserted and error if it didn't
		
		var_dump($result);
		
		$maxeventlist = "";
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$maxHot=$row["maxhot"];
				$branchID = $row["branchID"];
				$evid = $row["evid"];
				$maxeventlist .=  '<tr><td>'.$branchID.'</td><td>'.$evid.'</td><td>'.$maxHot.'</td></tr>';
			}
		}

		$conn->close();
		
	echo '	<table style="width:50%">
	<tr>
    <th>Venue</th>
    <th>Event</th> 
    <th>max hotness</th>
	</tr>
	'.$maxeventlist.'
	</table>';	
		
	}
	?>


<br>

</div>

</body>
</html>

 <?php
}
?>
