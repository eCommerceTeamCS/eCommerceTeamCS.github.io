<?php
$FirstName = filter_input(INPUT_POST, 'FirstName');
$LastName = filter_input(INPUT_POST, 'LastName');
$Email = filter_input(INPUT_POST, 'Email');
$Username = filter_input(INPUT_POST, 'Username');
$Address = filter_input(INPUT_POST, 'Address');
$City = filter_input(INPUT_POST, 'City');
$State = filter_input(INPUT_POST, 'State');
$ZipCode = filter_input(INPUT_POST, 'ZipCode');
$Password = filter_input(INPUT_POST, 'Password');

if (!empty($FirstName)){
if (!empty($LastName)){
if (!empty($Email)){
if (!empty($Username)){
if (!empty($Address)){
if (!empty($City)){
if (!empty($State)){
if (!empty($ZipCode)){
if (!empty($Password)){
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
