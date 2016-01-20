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
$userID = $_SESSION['userID'];

// Get the attributes of the user with the given username
$query = "SELECT * FROM Customer WHERE userID = '$userID'";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));


// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  or die("user $userID not found!");

    print "User <b> $userID </b> has the following attributes now:";
    print '<ul>';  
    print '<li> userID: '.$tuple['userID'];
    print '<li> username: '.$tuple['username'];
    print '<li> passwd: '.$tuple['passwd'];
    // print '<li> historyScan: '.$tuple['historyScan'];
    print '<li> address: '.$tuple['address'];
    print '<li> telephone: '.$tuple['telephone'];
    print '</ul>';
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 
<br>
<a href="UserFinalPage.html">back to HomePage</a>
</BODY>

