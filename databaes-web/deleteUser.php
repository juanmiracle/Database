<?php
session_start();

$host = 'cspp53001.cs.uchicago.edu';
$username = 'juanmiracle';   
$password = 'juan1992925';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$userID = $_SESSION['userID'];

// sql to delete a record
//$query  = "DELETE FROM Product WHERE productID = '$productID'";
$query  = "DELETE FROM Customer WHERE userID = '$userID'";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

header('Location: LogOut.php');

?>

