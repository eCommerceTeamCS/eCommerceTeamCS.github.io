<?php
			ini_set('display_errors',1);

       if (empty($_POST["login"])) {
			    $loginError = "Email or username is required";
			  } else {
			    $login = test_input($_POST["login"]);
			  }
       
       if (empty($_POST["pass"])) {
			    $passwordError = "Password is required";
			 } else {
			    $password = test_input($_POST["pass"]);
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
    
    $password = $_POST['pass'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $notfound = "SELECT * FROM siteusers WHERE (email = '$_POST[login]') OR (username = '$_POST[login]')";
	  $notfoundresult = pg_query($conn, $notfound);
    
    if (pg_num_rows($notfoundresult) == 0) {
	    	header("Location: https://lit-kits.herokuapp.com/login.html");
	    }
   	else  {
        $checkpass = "SELECT 'password' FROM siteusers WHERE (email = '$_POST[login]') OR (username = '$_POST[login]')";
	$res = pg_query($conn, $checkpass);	
	
	$numrows = pg_numrows($res);
		
	//res returns a boolean I need a way to get the hashed password from the table
	//$val = pg_fetch_result($res, 1, 0);
		//echo "hey ", $val;
	$row = pg_fetch_row($res);
	$hash = $row[8];
		echo $hash;
    
	if(password_verify($password,$hash))
	// If the password is a match, redirect to the member page and start the session!	
	//if($res)
      	{
		session_name( 'Member' );
		session_start();
		$_SESSION["name"] = "LitKits";
		
		if(isset($_SESSION["name"]))
		{
			header("Location: https://lit-kits.herokuapp.com/member.html");
		}
		else
		{
			header("Location: https://lit-kits.herokuapp.com/login.html");
		}
      	}
}
  
  
?>
