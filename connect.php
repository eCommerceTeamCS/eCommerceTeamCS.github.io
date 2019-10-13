<?php
			$firstErr = $lastErr = $usernameErr = $emailErr = $passwordErr = $addressErr = $cityErr = $stateErr = $zipErr "";
			$firstname = $lastname = $email = $username = $address = $city = $state = $zipcode = $password = "";

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
			    $usernameError = "Username is required";
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
$conn = pg_connect("host=ec2-54-83-55-125.compute-1.amazonaws.com dbusername=pywlzaoqipszkz port=5432 dbpassword=0cef79548840ab44a871e15280ac8d12856f411749c240719c6d6c803010cfc dbname=LitKits");
if (!$conn) {
  echo "An error occurred.\n";
  exit;
}

$sql = "INSERT INTO SiteUsers (firstname, lastname, email, username, address, city, state, zipcode, password)
values ('$firstname','$lastname','$email','$username','$address','$city','$state','$zipcode','$password')";

$result = pg_query($conn, $sql);
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

$conn->close();

?>
