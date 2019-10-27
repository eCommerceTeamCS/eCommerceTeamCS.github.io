<?php
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["name"])) {
			    $nameErr = "Name is required";
			  } else {
			    $name = test_input($_POST["name"]);
			  }
			  if (empty($_POST["email"])) {
			    $emailErr = "Email is required";
			  } else {
			    $email = test_input($_POST["email"]);
			  }	
			  if (empty($_POST["message"])) {
			    $messageError = "Message is required";
			  } else {
			    $message = test_input($_POST["message"]);
			  }
			}	
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}


$conn = pg_connect("host=ec2-54-83-55-125.compute-1.amazonaws.com port=5432 dbname=dfhnip1bkpfplp user=pywlzaoqipszkz password=0cef79548840ab44a871e15280ac8d12856f411749c240719c6d6c803010cfc9");
if (!$conn) {
  echo "An error occurred.\n";
  exit;
}

$sql = "INSERT INTO contactus VALUES ('$_POST[name]','$_POST[email]','$_POST[message]')";
header("Location: http://localhost/eCommerceTeamCS.github.io/index.html");

$result = pg_query($conn, $sql);
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
pg_close($conn);
?>
