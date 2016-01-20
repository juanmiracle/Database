<BODY bgcolor ="#F3F0E6">
<?php

// Connection parameters 
$host = 'cspp53001.cs.uchicago.edu';
$username = 'juanmiracle';   
$password = 'juan1992925';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
//print 'Connected successfully!<br>';

// Getting the input parameter (user):
$userID = $_REQUEST["fname"];

// Get the attributes of the user with the given username
$query = ("SELECT Customer.userID AS user, username, productName
           From Product, Buy, Customer
           WHERE Product.ProductID = Buy.ProductID 
           AND   Customer.userID = Buy.userID
           AND   Buy.userID = '$userID'");

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));


print "User <b> $userID </b> has bought the following products:";
While($tuple = mysqli_fetch_array($result)) {

// Printing user attributes in HTML
print '<li> productName: '.$tuple['productName'];
print '</ul>';
}




// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 
</BODY>