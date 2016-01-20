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


// Get the attributes of the user with the given username
$query = ("SELECT Customer.userID AS user, username, count(*) AS Quantity
           From Product, Buy, Customer
           WHERE Product.ProductID = Buy.ProductID 
           AND   Customer.userID = Buy.userID
           GROUP BY Buy.userID
           HAVING count(*) >2
           ORDER BY count(*) ASC");
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// list the array of the User information
if ($result->num_rows > 0) {
  echo $result->num_rows . " number of customers found!<br>";
  while ($user = $result->fetch_assoc()) {
    $users[] = $user;
  }
} else {
  echo "No Followers found.";
}
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 

<table  border='1px'>
  <thead>
    <tr>
      <th align="center">userID</th>
      <th align="center">username</th>
      <th align="center">Quantity</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($users) { ?>
      <?php foreach ($users as $index => $value) { ?>    
        <tr>
          <td align="center"><?php echo $value["user"]; ?></td>
          <td align="left"><?php echo $value["username"]; ?></td>
          <td align="center"><?php echo $value["Quantity"]; ?></td>
        </tr>
      <?php } ?>
    <?php } ?>
  </tbody>
</table>

</BODY>

