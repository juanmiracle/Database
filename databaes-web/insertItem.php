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

$query="INSERT INTO Product (productID, productName, productPrice,productDescription, productStock)
VALUES
('$_POST[productID]','$_POST[productName]','$_POST[productPrice]','$_POST[productDescription]','$_POST[productStock]')";

if (!mysqli_query($dbcon, $query))
  {
  die('Query failed: ' . mysqli_error($dbcon));
  }
$productID = $_REQUEST["productID"];

// Get the attributes of the user with the given username
$query = "SELECT * FROM Product WHERE productID = '$productID'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));


// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  or die("product $productID not found!");

    print "new Product <b> $productID </b> has the following attributes:";
    print '<ul>';  
    print '<li> productID: '.$tuple['productID'];
    print '<li> productName: '.$tuple['productName'];
    print '<li> productPrice: '.$tuple['productPrice'];
    print '<li> productDescription: '.$tuple['productDescription'];
    print '<li> productStock: '.$tuple['productStock'];
    print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>
<BODY bgcolor ="#FFFAFA"> 
<br>
<a href="UserFinalPage.html">back to HomePage</a>
</BODY>
