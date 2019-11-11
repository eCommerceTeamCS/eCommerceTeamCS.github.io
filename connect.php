<?php
			ini_set('display_errors',1);
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\SMTP;
			require 'vendor/autoload.php';
			$firstErr = $lastErr = $usernameErr = $emailErr = $passwordErr = $addressErr = $cityErr = $stateErr = $zipErr = "";
			//$firstname = $lastname = $email = $username = $address = $city = $state = $zipcode = $password = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["firstname"])) {
			    $firstErr = "First name is required";
			  } else {
			    $firstname = test_input($_POST["firstname"]);
			  }

			  if (empty($_POST["lastname"])) {
			    $lastErr = "Last name is required";
			  } else {
			    $lastname = test_input($_POST["lastname"]);
			  }
				
			  if (empty($_POST["email"])) {
			    $passwordError = "Email is required";
			  } else {
			    $email = test_input($_POST["email"]);
			  }
				
			  if (empty($_POST["username"])) {
			    $username = test_input($_POST["email"]);
			  } else {
			    $username = test_input($_POST["username"]);
			  }

			  if (empty($_POST["address"])) {
			    $addressErr = "Address is required";
			  } else {
			    $address = test_input($_POST["address"]);
			  }
			  
			  if (empty($_POST["city"])) {
			    $cityErr = "City is required";
			  } else {
			    $city = test_input($_POST["city"]);
			  }
			  
			  if ($_POST["state"] == "Select State") {
			    $stateErr = "State is required";
			  } else {
			    $state = test_input($_POST["state"]);
			  }

			  if (empty($_POST["zipcode"])) {
			    $zipErr = "Zip code is required";
			  } else {
			    $zipcode = test_input($_POST["zipcode"]);
			  }
	
			if (empty($_POST["password"])) {
			    $passwordError = "Password is required";
			 } else {
			    $password = test_input($_POST["password"]);
			 }
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

// Create connection
$conn = pg_connect("host=ec2-54-83-55-125.compute-1.amazonaws.com port=5432 dbname=dfhnip1bkpfplp user=pywlzaoqipszkz password=0cef79548840ab44a871e15280ac8d12856f411749c240719c6d6c803010cfc9");
if (!$conn) {
  echo "An error occurred.\n";
  exit;
}

$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$email = $_POST['email'];
if (empty($_POST["username"])) {
	$dupesql2 = "SELECT * FROM siteusers WHERE (email = '$_POST[email]')";
	$duperesult2 = pg_query($conn, $dupesql2);
	if (pg_num_rows($duperesult2) > 0) {
		header("Location: https://lit-kits.herokuapp.com/signUpDuplicate.html");
	}
	else{
		$sql = "INSERT INTO siteusers VALUES ('$_POST[firstname]','$_POST[lastname]','$email','$email','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[zipcode]','$hashed_password')";  
		header("Location: https://lit-kits.herokuapp.com/member.html");
	}
}
else 
{
	$dupesql = "SELECT * FROM siteusers WHERE (username = '$_POST[username]' OR email = '$_POST[email]')";
	$duperesult = pg_query($conn, $dupesql);
	
	if (pg_num_rows($duperesult) > 0) {
		$duplicateErr = "That username or email already exists. Please try again with a different username or email.";
		echo $duplicateErr;
		header("Location: https://lit-kits.herokuapp.com/signUpDuplicate.html");
		exit;
	}
	else{
		$sql = "INSERT INTO siteusers VALUES ('$_POST[firstname]','$_POST[lastname]','$email','$_POST[username]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[zipcode]','$hashed_password')";
		
		session_start();
		$_SESSION['login']=true;
		
		if($_SESSION['login'] == true)
		{
			header("Location: member.php");
		}
		else
		{
			header("Location: login.html");
		}		

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'litkitsco@gmail.com';
//Password to use for SMTP authentication
$mail->Password = 'litkits2020!!';
//Set who the message is to be sent from
$mail->setFrom('litkitsco@gmail.com', 'LitKits');
//Set an alternative reply-to address
$mail->addReplyTo('litkitsco@gmail.com', 'LitKits');
//Set who the message is to be sent to
$mail->addAddress($email);
//Set the subject line
$mail->Subject = 'Thanks for registering with us!';
$mail->Body = 'Welcome to our site. Thanks for signing up!';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'Message sent!';
 
	}
    }
}

$result = pg_query($conn, $sql);
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

pg_close($conn);

?>
