<?php
session_start();
// Connection parameters 
$host = 'cspp53001.cs.uchicago.edu';
$username = 'juanmiracle';   
$password = 'juan1992925';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

// Define $username and $password
$userID=$_POST['userID'];
$passwd=$_POST['passwd'];

$query = "SELECT * FROM Customer WHERE userID = '$userID' AND passwd='$passwd'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));  
  if (mysqli_num_rows($result)) {
  	$_SESSION['userID'] = $userID;

  	header('Location: UserFinalPage.html');
  } else {
  	header('Location: LoginFail.html');
  }

?>