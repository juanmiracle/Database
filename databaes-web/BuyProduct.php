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

$userID= $_SESSION['userID'];
$query="INSERT INTO Buy (userID, OrderID, productID, quantity)
VALUES
('$userID','$_POST[OrderID]','$_POST[productID]','$_POST[quantity]')";

if (!mysqli_query($dbcon, $query))
  {
  die('Query failed: ' . mysqli_error($dbcon));
  }

// Get the attributes of the user with the given username
$query = ("SELECT Customer.userID AS userID, username, productName, Buy.productID AS productID, quantity
           From Product, Buy, Customer
           WHERE Product.productID = Buy.productID 
           AND   Customer.userID = Buy.userID
           AND   Buy.userID = '$userID'");

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));


print "you <b> $userID </b> has bought the following products:";
While($tuple = mysqli_fetch_array($result)) {

// Printing user attributes in HTML
print '<li> productName: '.$tuple['productName'];
print '     , quantity: '.$tuple['quantity'];
print '</ul>';
}
// Closing connection
mysqli_close($dbcon);
header("Location: UserAndProduct.php");
?>
<BODY bgcolor ="#F3F0E6">
<br>
<a href="UserFinalPage.html">back to HomePage</a>
</BODY>