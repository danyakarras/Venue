<?php

// code used from http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html as reference
	ob_start();
	session_start();
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
	
	$emailError='';
	$passError='';
	$errMSG='';

	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
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
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
		
			$sql="SELECT cid, f_name, password FROM `customer` WHERE email='$email'";

			$result = $conn->query($sql);
			$row=$result->fetch_assoc();
			$count = $result->num_rows; // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['password']==$pass ) {
				$_SESSION['user'] = $row['cid'];
				$_SESSION['username'] = $row['f_name'];
				header("Location: home.php");
			} else {
				$errMSG = "Incorrect Credentials, Try again...<br>";
			}
				
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	
            	<h2 class="">Sign In.</h2>
            
			<?php echo $errMSG; ?>
            <input type="email" name="email" placeholder="Your Email" maxlength="40" />
            <?php echo $emailError; ?>
            <br><br>
           <input type="password" name="pass" placeholder="Your Password" maxlength="15" />
           <?php echo $passError; ?>
			<br><br>
           <button type="submit" name="login">Sign In</button>
           <br><br>
           <a href="register.php">Sign Up Here...</a>
          
    </form>


</body>
</html>
<?php ob_end_flush(); ?>