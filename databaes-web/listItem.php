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
$productID = $_REQUEST["productID"];

// Get the attributes of the user with the given username
$query = "SELECT productID, productName, productPrice,productDescription, productStock FROM Product WHERE productID = '$productID'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

  print "Product <b> $productID </b> has the following attributes:";
// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  or die("product $productID not found!");

    print "Product <b> $productID </b> has the following attributes:";
    print '<ul>';  
    print '<li> productID: '.$tuple['productID'];
    print '<li> productName: '.$tuple['productName'];
    print '<li> productPrice: '.$tuple['productPrice'];
    print '<li> productDescription: '.$tuple['productDescription'];
    print '<li> productStock: '.$tuple['productStock'];
    print '</ul>';
   ?> 

<hr />   
<form   method="post" action="updateProduct.php">
change the default information of the product and click update to modify it
<input type="hidden" name="productID" id="productID" value = "<?php print $tuple['productID'] ?>"/> 
<br>productName:<input type="text" name="productName" id="productName" value = "<?php print $tuple['productName'] ?>"/> 
<br>productPrice: <input type="text" name="productPrice" id="productPrice" value = "<?php print $tuple['productPrice'] ?>"/> 
<br>productDescription:<input type="text" name="productDescription" id="productDescription" value = "<?php print $tuple['productDescription'] ?>"/> 
<br>productStock: <input type="text" name="productStock" id="productStock" value = "<?php print $tuple['productStock'] ?>"/> 
<button value="text"> update  </button>
</form>

<?php
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 

</BODY>

