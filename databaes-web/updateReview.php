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


$query="UPDATE Review SET reviewDate = '$_POST[reviewDate]', content = '$_POST[content]', score = '$_POST[score]' WHERE reviewID = '$_POST[ReviewID]'";

if (!mysqli_query($dbcon, $query))
  {
  die('Query failed: ' . mysqli_error($dbcon));
  }

$reviewID = $_POST['ReviewID'];
// Get the attributes of the user with the given username
$query = ("SELECT productName, username, content, score
FROM  Product, ReviewInfo, Customer, Review WHERE Product.ProductID = ReviewInfo.ProductID 
AND   Customer.userId = ReviewInfo.userID 
AND   Product.productID = ReviewInfo.productID
AND   Review.reviewID = ReviewInfo.reviewID
AND   ReviewInfo.reviewID = '$reviewID'");
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// list the array of the product information

print "Product now has the following comments:";  
While($tuple = mysqli_fetch_array($result)) {
    print '<ul>';  
    print '<li> productName: '.$tuple['productName'];
    print '<li> username: '.$tuple['username'];
    print '<li> content: '.$tuple['content'];
    print '<li> score: '.$tuple['score'];
    print '</ul>';
  }
// Closing connection
mysqli_close($dbcon);

?>
<br>
<a href="UserFinalPage.html">back to HomePage</a>
</BODY>
