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
<h1>Statistics Page</h1>

<div class="well well-lg">
<h4>Customers who've been to every venue</h4> <!-- **THIS IS DIVISION** -->
<button>Show list</button><br>
<br>
<h4>See how many tickets have sold for an event</h4>
 *put dropdown here*
<button>Enter</button><br>
<br>
<h4>Which Event so far had the hottest customers (on average)</h4> <!-- **THIS IS AGG. W/ GROUP BY** -->
<button>Show Event name</button><br>
<br>
<h4>Some other query</h4>
<button>Some other button</button><br>
<br>

</div>

</body>
</html>

 <?php
}
?>
