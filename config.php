<?php
$servername = "localhost";
$database = "task1";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username,$password);

//Check Connection
if(!$conn)
{
   echo 'Connected';
}
  
  $conn->close();

?>