<BODY bgcolor ="#F3F0E6">
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
$productID = $_REQUEST["fname"];
if($productID==null){
	$productID=$_GET['productID'];
}

// Get the attributes of the user with the given username
$query = ("SELECT Product.ProductID AS pID, productName, username, content, score, ReviewInfo.reviewID AS ReviewID
FROM  Product, ReviewInfo, Customer, Review WHERE Product.ProductID = ReviewInfo.ProductID 
AND   Customer.userId = ReviewInfo.userID 
AND   Review.reviewID = ReviewInfo.reviewID
AND   Product.productID = '$productID'");
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// list the array of the product information

print "Product with productID <b> $productID </b> has the following comments:";  
While($tuple = mysqli_fetch_array($result)) {
 
    print '<ul>';  
    print '<li> productName: '.$tuple['productName'];
    print '<li> username: '.$tuple['username'];
    print '<li> content: '.$tuple['content'];
    print '<li> score: '.$tuple['score'];
    print '</ul>';
 ?>
 <hr />
<form   method="post" action="deleteReview.php">
<input type="hidden" name="ReviewID" id="ReviewID" value = "<?php print $tuple['ReviewID'] ?>"/>
want to delete this review ? <button value="submit"> delete  </button>
</form>

<hr />
<form   method="post" action="updateReview.php">
<input type="hidden" name="ReviewID" id="ReviewID" value = "<?php print $tuple['ReviewID'] ?>"/>
productName: <?php print $tuple['productName'] ?>
<br>content:<input type="text" name="content" id="content" value = "<?php print $tuple['content'] ?>"/> 
<br>score  :<input type="text" name="score" id="score" value = "<?php print $tuple['score'] ?>"/>  
<br>want to modify this review ? <button value="submit"> modify  </button>
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
