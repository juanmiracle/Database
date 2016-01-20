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
$productTitle = $_REQUEST["fname"];

// Get the attributes of the user with the given username
$query = "SELECT productID, productName, productPrice,productDescription, productStock FROM Product WHERE productName Like '%$productTitle%'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// list the array of the product information  
While($tuple = mysqli_fetch_array($result)) {
	echo $tuple[1];
    print '<ul>';  
    print '<li> productID: '.$tuple['productID'];
    print '<li> productName: '.$tuple['productName'];
    print '<li> productPrice: '.$tuple['productPrice'];
    print '<li> productDescription: '.$tuple['productDescription'];
    print '<li> productStock: '.$tuple['productStock'];
    print '</ul>'; 
    ?> 

                    <form   method="post" action="listItem.php">
                    <input type="hidden" name="productID" id="productID" value = "<?php print $tuple['productID'] ?>"/> 
                    <button value="submit"> look up  </button>
                    </form>

<?php 
}
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 

<br>
<a href="final.html">back to Home Page</a>

</BODY>

