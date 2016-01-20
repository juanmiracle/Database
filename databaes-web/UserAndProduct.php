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
//print 'Connected successfully!<br>';

// Getting the input parameter (user):
$userID = $_REQUEST["userID"];

// Get the attributes of the user with the given username
$query = ("SELECT Customer.userID AS userID, username, productName, Buy.productID AS productID
           From Product, Buy, Customer
           WHERE Product.productID = Buy.productID 
           AND   Customer.userID = Buy.userID
           AND   Buy.userID = '$userID'");

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));


print "Hi <b> $userID </b> has bought the following products:";
While($tuple = mysqli_fetch_array($result)) {

// Printing user attributes in HTML
print '<li> productName: '.$tuple['productName'];
print '</ul>';
?>
<BODY bgcolor ="#F3F0E6">
 <hr />
 you can add this product in your order, after enter the orderID, and the quantity of product you want
<form   method="post" action="BuyProduct.php">
<input  type="hidden" name="productID" id="productID" value = "<?php print $_SESSION['userID'] ?>"/> 
<input  type="hidden" name="userID" id="userID" value = "<?php print $_SESSION['userID'] ?>"/> 
<br> Enter the OrderID: eg: #0000-0000-1002, #0000-0000-1111, #0000-0000-1212
<br> OrderID<input type="text" name="OrderID" />  
<br> quantity<input type="text" name="quantity" id = "quantity" value = 0 />  
<br> buy it now? <button value="text"> buy </button>
 <hr />
</form>

<?php
}
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 
<br>
<a href="UserFinalPage.html">back to HomePage</a>
</BODY>