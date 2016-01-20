
<?php
    // Connection parameters 
   $host = 'cspp53001.cs.uchicago.edu';
   $username = 'juanmiracle';   
   $password = 'juan1992925';
   $database = $username.'DB';

    // Attempting to connect 
    $dbcon = mysqli_connect($host, $username, $password, $database)
       or die('Could not connect: ' . mysqli_connect_error());
if ($_POST['userID'] == null) {
        die('userID must be not null, go back to sign again'); 
        //header('Location: signUpFail.html'); 
}

$query="INSERT INTO Customer (userID, username, passwd, address, telephone)
VALUES
('$_POST[userID]','$_POST[username]','$_POST[passwd]','$_POST[address]','$_POST[telephone]')";

  //header('Location:loginPage.html');

$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));
// header('Location: loginPage.html');
?>
<BODY bgcolor ="#FFFAFA">
<h4> Sign Up Successfully !!!! </h4>
Clike here to log in
<br>
<a href="loginPage.html"> clike to login in </a>
</BODY>
