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

	$firstnameError ='';
	$lastnameError = '';
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
		$cid = rand(100000, 900000);
		
		// if there's no error, continue to login
		if (!$error) {
			
		
			$query = "INSERT INTO `customer` VALUES('$cid', '$firstname', '$lastname', NULL, '$email','$pass')";
			$conn->query($query);

			$_SESSION['user'] = $cid;
			$_SESSION['username'] = $firstname;
			header("Location: home.php");
			exit;

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
           <button type="submit" name="login">Sign In</button>
           <br><br>
           <p>If you don't have an account set up, please sign up below.<br><br><a href="register.php">Sign Up</a></p>
          
    </form>


</body>
</html>
<?php ob_end_flush(); ?>