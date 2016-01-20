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
$query = ("SELECT Product.ProductID AS product, productName, count(*) AS number
           From Product, Buy
           WHERE Product.ProductID = Buy.ProductID 
           GROUP BY Buy.ProductID
           HAVING count(*) >2
           ORDER BY count(*) ASC");
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// list the array of the product information
if ($result->num_rows > 0) {
  echo $result->num_rows . " amount of products found!<br>";
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

<br>
<img src="img/1.jpg">
<br>

<table  border='1px'>
  <thead>
    <tr>
      <th align="center">ProductID</th>
      <th align="center">productName</th>
      <th align="center">number</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($users) { ?>
      <?php foreach ($users as $index => $value) { ?>    
        <tr>
          <td align="center"><?php echo $value["product"]; ?></td>
          <td align="left"><?php echo $value["productName"]; ?></td>
          <td align="center"><?php echo $value["number"]; ?></td>
        </tr>
      <?php } ?>
    <?php } ?>
  </tbody>
</table>

</BODY>

