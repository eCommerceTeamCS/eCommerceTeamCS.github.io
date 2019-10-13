<?php
			$firstErr = $lastErr = $usernameErr = $emailErr = $passwordErr = $addressErr = $cityErr = $stateErr = $zipErr "";
			$first = $last = $username = $email = $password = $address = $city = $state = $zip = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["first"])) {
			    $firstErr = "First name is required";
			  } else {
			    $first = test_input($_POST["first"]);
			  }

			  if (empty($_POST["last"])) {
			    $lastErr = "Last name is required";
			  } else {
			    $last = test_input($_POST["last"]);
			  }

			  if (empty($_POST["username"])) {
			    $username = "";
			  } else {
			    $username = test_input($_POST["username"]);
			  }

			  if (empty($_POST["password"])) {
			    $password = "";
			  } else {
			    $password = test_input($_POST["password"]);
			  }

			  if (empty($_POST["address"])) {
			    $address = "Address is required";
			  } else {
			    $address = test_input($_POST["address"]);
			  }
			  
			  if (empty($_POST["city"])) {
			    $city = "City is required";
			  } else {
			    $city = test_input($_POST["city"]);
			  }
			  
			  if ($_POST["state"] == "Select State") {
			    $state = "State is required";
			  } else {
			    $state = test_input($_POST["state"]);
			  }

			  if (empty($_POST["zip"])) {
			    $zip = "Zip code is required";
			  } else {
			    $zip = test_input($_POST["zip"]);
			  }
			}
	

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

$host = "ec2-54-83-55-125.compute-1.amazonaws.com";
$dbusername = "pywlzaoqipszkz";
$dbpassword = "0cef79548840ab44a871e15280ac8d12856f411749c240719c6d6c803010cfc9";
$dbname = "dfhnip1bkpfplp";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO SiteUsers (FirstName, LastName, Email, Username, Address, City, State, ZipCode, Password)
values ('$FirstName','$LastName','$Email','$Username','$Address','$City','$State','$ZipCode','$Password')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "First Name should not be empty";
die();
}
}
else{
echo "Last Name should not be empty";
die();
}
}
else{
echo "Email should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}
}
else{
echo "Address should not be empty";
die();
}
}
else{
echo "City should not be empty";
die();
}
}
else{
echo "State should not be empty";
die();
}
}
else{
echo "Zip Code should not be empty";
die();
}
}
else{
echo "Password should not be empty";
die();
}
?>
