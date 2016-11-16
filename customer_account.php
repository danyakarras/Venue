<?php
session_start();
if ( isset($_SESSION['user'])=="" ) {
    header("Location: index.php");
    exit;
  }
else
{
$cid=$_SESSION['user'];
$user=$_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <script>
   		function infoUpdated() {
   			alert("Your account information has been updated!");
   		}

   </script>
</head>

<body>
<?php

// code used from http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html as reference
	ob_start();
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

	$firstnameError ='';
	$lastnameError = '';
	$emailError='';
	$passError='';
	$errMSG='';

	$error = false;
	
	if( isset($_POST['updateInfo']) ) {	
		
		// prevent sql injections/ clear user invalid inputs

		$firstname = trim($_POST['firstname']);
		$firstname = strip_tags($firstname);
		$firstname = htmlspecialchars($firstname);


		$lastname = trim($_POST['lastname']);
		$lastname = strip_tags($lastname);
		$lastname = htmlspecialchars($lastname);


		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}

		if(empty($firstname)){
			$error = true;
			$firstnameError = "Please enter your first name.";
		}

	    if(empty($lastname)){
			$error = true;
			$lastnameError = "Please enter your last name.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to update
		if (!$error) {
			
			$query = " UPDATE `customer` SET f_name='$firstname', l_name='$lastname', email='$email', password='$pass' WHERE cid='$cid'";

			$conn->query($query);
		}
		
	}
//TODO
// maybe later if we really have time left over, we could populate their name and last name and email so they only change what they want to, we won't have their passowrd in there however

?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    	
            <h2 class=""><?php echo $user ?>'s Account Information.</h2>
            <p> Below you can change your name, email address (your username) and your password.<p>

            <p>For the fields you wish to remain unchanged enter your current info.</p>
            <br>
			<?php echo $errMSG; ?>
			<input type="text" name="firstname" placeholder="Your First Name" maxlength="40" />
            <?php echo $firstnameError; ?>
            <br><br>
            <input type="text" name="lastname" placeholder="Your Last Name" maxlength="40" />
            <?php echo $lastnameError; ?>
            <br><br>
            <input type="email" name="email" placeholder="Your Email" maxlength="40" />
            <?php echo $emailError; ?>
            <br><br>
           <input type="password" name="pass" placeholder="Your Password" maxlength="15" />
           <?php echo $passError; ?>
			<br><br>
           <button type="submit" name="updateInfo" onclick="infoUpdated()">Save</button>
           <br><br>
          
    </form>


</body>
</html>
<?php
}

ob_end_flush()
?>
