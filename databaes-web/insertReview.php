<?php
    // Connection parameters 
   $host = 'cspp53001.cs.uchicago.edu';
   $username = 'juanmiracle';   
   $password = 'juan1992925';
   $database = $username.'DB';

    // Attempting to connect 
    $dbcon = mysqli_connect($host, $username, $password, $database)
       or die('Could not connect: ' . mysqli_connect_error());

$query="INSERT INTO Review (reviewID, reviewDate, content, score)
VALUES
('$_POST[reviewID]','$_POST[reviewDate]','$_POST[content]','$_POST[score]')";

if (!mysqli_query($dbcon, $query))
  {
  die('Query failed: ' . mysqli_error($dbcon));
  }

$reviewID = $_REQUEST["reviewID"];

// Get the attributes of the user with the given username
$query = "SELECT * FROM Review WHERE reviewID = '$reviewID'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));


// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  or die("review $review not found!");

    print "new review <b> $reviewID </b> has the following attributes:";
    print '<ul>';  
    print '<li> reviewID: '.$tuple['reviewID'];
    print '<li> reviewDate: '.$tuple['reviewDate'];
    print '<li> content: '.$tuple['content'];
    print '<li> score: '.$tuple['score'];
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
