<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
            
            function checkForReservationConflict() {

            }

        </script>
    </head>
    <body>

        <?php 

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


        $conn->close();

        ?>
        <h2>Reserve a Table</h2>
        
        <!-- dropdown of next 14 days, cannot reserve further in the future -->
        <?php
        $day_option='';
        for ($x = 0; $x <= 14; $x++) {
            $timer='+'.$x.' day';
            $dayafter=strtotime($timer);
            $day_database_format= date("Y-m-d",$dayafter);
            $day_user_format= date("F j, Y",$dayafter); 
            $day_option.='<option value="'.$day_database_format.'">'.$day_user_format.'</option>';    
        } 

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

        $number_of_guests = '';
        for($z = 1; $z < 11; $z++){
            $number_of_guests.='<option value="'.$z.'">'.$z.' guest(s)</option>';
        }

        $date_picker='<select name="date">'.$day_option.'</select>';
        $time_picker = '<select name="time">'.$time_option.'</select>';
        $table_picker='<select name="table">'.$table_option.'</select>';
        $guestsNum_picker='<select name="guests">'.$number_of_guests.'</select>';

        //append all the dropdowns
        echo '<form action="#" method="post">'.$date_picker.$time_picker.$table_picker.$guestsNum_picker.'
        <input type="submit" name="submit" value="Reserve" />
        </form>';

        if(isset($_POST['submit'])){
        $selected_date = $_POST['date'];  // Storing Selected Value In Variable
        $selected_time = $_POST['time'];
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
        $cid = 796325; //hardcoded to be my cid for now - session management later
       
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
                echo "Reservation made! The cost of the table is $".$cost.". It will be added to your final bill.";
                //add INSERT INTO query

                $sqlInsertReservation = "INSERT INTO `tablereservation` VALUES ('$confirmationNum', '$selected_table', '$selected_guests', '$selected_branchID', '$cid', '$selected_date', '$selected_time')";
                $conn->query($sqlInsertReservation);
                
            }


        }else {
            //no time/date conflict so just make a reservation without checking for the number of spaces taken up
            echo "Reservation made! The cost of the table is $".$cost.". It will be added to your final bill.";
            //add INSERT INTO query
            $sqlInsertReservation = "INSERT INTO `tablereservation` VALUES ('$confirmationNum', '$selected_table', '$selected_guests', '$selected_branchID', '$cid', '$selected_date', '$selected_time')";
            $conn->query($sqlInsertReservation);
   
        }
            
        $conn->close();


    }
        ?>

    </body>
</html>