<body>
<?php
$host = 'cspp53001.cs.uchicago.edu';
$username = 'juanmiracle';   
$password = 'juan1992925';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$reviewID = $_POST['ReviewID'];
//$productID = $_POST['pID']；
// sql to delete a record
$query  = "DELETE FROM ReviewInfo WHERE reviewID = '$reviewID'";

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

mysqli_close($dbcon);
?>

<br>
<div>Delete successfully!</div>
<a href="UserFinalPage.html">back to HomePage</a>
</body>

