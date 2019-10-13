<?php
			$firstErr = $lastErr = $usernameErr = $emailErr = $passwordErr = $addressErr = $cityErr = $stateErr = $zipErr "";
			$FirstNamw = $LastName = $Username = $Email = $Password = $Address = $City = $State = $ZipCode = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["FirstName"])) {
			    $firstErr = "First name is required";
			  } else {
			    $FirstName = test_input($_POST["FirstName"]);
			  }

			  if (empty($_POST["LastName"])) {
			    $lastErr = "Last name is required";
			  } else {
			    $LastName = test_input($_POST["LastName"]);
			  }

			  if (empty($_POST["Username"])) {
			    $usernameError = "Username is required";
			  } else {
			    $Username = test_input($_POST["Username"]);
			  }

			  if (empty($_POST["Password"])) {
			    $passwordError = "Password is required";
			  } else {
			    $Password = test_input($_POST["Password"]);
			  }

			  if (empty($_POST["Address"])) {
			    $addressErr = "Address is required";
			  } else {
			    $Address = test_input($_POST["Address"]);
			  }
			  
			  if (empty($_POST["City"])) {
			    $cityErr = "City is required";
			  } else {
			    $City = test_input($_POST["City"]);
			  }
			  
			  if ($_POST["State"] == "Select State") {
			    $stateErr = "State is required";
			  } else {
			    $State = test_input($_POST["State"]);
			  }

			  if (empty($_POST["ZipCode"])) {
			    $zipErr = "Zip code is required";
			  } else {
			    $ZipCode = test_input($_POST["ZipCode"]);
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

?>
