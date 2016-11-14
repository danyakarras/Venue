<?php
session_start();
if ( isset($_SESSION['user'])=="" ) {
    header("Location: index.php");
    exit;
  }
else
{
$cid=$_SESSION['user'];
$username=$_SESSION['username'];



?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
<div style="text-align:right;">Logged in as <?php echo $username; ?> | <a href="http://localhost/304_project/logout.php">Logout</a></div>
        <?php 
        $evid = $_GET['evid'];
        $branchID = $_GET['branchID'];

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


        $sql = "SELECT tableNum, type FROM `venuehastable` WHERE branchID = '$branchID'";
        $sql2 = "SELECT date, start_time FROM `hostedevent` WHERE branchID = '$branchID' AND evid= '$evid'";

        $table_option = "";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $tableNum = $row["tableNum"];
                $type = $row["type"];
                $table_option.='<option value="'.$tableNum.'">'.$type.'</option>'; 
            }
        } else {
            echo "0 results";
        }
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $date = $row2["date"];
        $start_time = $row2["start_time"];

        $conn->close();

        ?>
        <h2>Reserve a Table</h2>
        
        <!-- dropdown of next 14 days, cannot reserve further in the future -->
        <?php


        //dropdown of working hours
        

        $number_of_guests = '';
        for($z = 1; $z < 11; $z++){
            $number_of_guests.='<option value="'.$z.'">'.$z.' guest(s)</option>';
        }

        $table_picker='<select name="table">'.$table_option.'</select>';
        $guestsNum_picker='<select name="guests">'.$number_of_guests.'</select>';

        //append all the dropdowns
        echo '<form action="#" method="post">'.$table_picker.$guestsNum_picker.'
        <input type="submit" name="submit" value="Reserve" />
        </form>';

        if(isset($_POST['submit'])){
        $selected_date = $date;  // Storing Selected Value In Variable
        $selected_time = $start_time;
        $selected_table = $_POST['table'];
        $selected_guests = $_POST['guests'];
        $selected_branchID = $branchID;

        //echo "You have selected :" .$selected_date.'*'.$selected_time.'*'.$selected_table.'*'.$selected_guests.'*'.$selected_branchID;  // Displaying Selected Value

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


        $sql = "SELECT *  FROM `tablereservation` WHERE tableNum = '$selected_table' AND date = '$selected_date' AND time = '$selected_time' AND branchID = '$selected_branchID'";

        $sql2 = "SELECT size, cost, numOfTableType FROM `venuehastable` WHERE tableNum = '$selected_table' AND branchID = '$selected_branchID'";
        $result2 = $conn->query($sql2);
        if($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                $size=$row2["size"];
                $cost=$row2["cost"];
                $numOfTableType=$row2["numOfTableType"];
            }
        }

        //variables for insert into query
        $confirmationNum = rand(1000000, 9000000);
        
        $totalNumOfGuests = 0;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $numOfGuests=$row["numOfGuests"];
                $totalNumOfGuests +=  $numOfGuests;
             }

            if(($totalNumOfGuests + $selected_guests) > ($numOfTableType*$size)){
                echo "Sorry, this table has been reserved at this time/date. Please pick another time/date.";
            } 
            else {
                //if time/date conflict: make a reservation if there are free tables in the section on that date/time
                //selectedTable has value tableNum, but in the sropdown the user picks table type
                echo "Reservation made for ".$date." at ".$start_time."! The cost of the table is $".$cost.". It will be added to your final bill.";
                //add INSERT INTO query

                $sqlInsertReservation = "INSERT INTO `tablereservation` VALUES ('$confirmationNum', '$selected_table', '$selected_guests', '$selected_branchID', '$cid', '$selected_date', '$selected_time')";
                $conn->query($sqlInsertReservation);
                
            }


        }else {
            //no time/date conflict so just make a reservation without checking for the number of spaces taken up
            echo "Reservation made for ".$date." at ".$start_time."! The cost of the table is $".$cost.". It will be added to your final bill.";
            //add INSERT INTO query
            $sqlInsertReservation = "INSERT INTO `tablereservation` VALUES ('$confirmationNum', '$selected_table', '$selected_guests', '$selected_branchID', '$cid', '$selected_date', '$selected_time')";
            $conn->query($sqlInsertReservation);
   
        }
            
        $conn->close();


    }
        ?>

    </body>
</html>
<?php
}
?>