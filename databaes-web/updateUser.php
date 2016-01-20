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

$query="UPDATE  Customer SET username = '$_POST[username]', passwd = '$_POST[passwd]', historyScan = '$_POST[historyScan]' , address = '$_POST[address]' , telephone = '$_POST[telephone]' WHERE userID= '$_POST[userID]'";

if (!mysqli_query($dbcon, $query))
  {
  die('Query failed: ' . mysqli_error($dbcon));
  }
//echo "1 record successfully updated";

// Closing connection
mysqli_close($dbcon);

header("Location: listUserInfo.php");
?>

