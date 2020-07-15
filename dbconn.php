<?php
$servername = "localhost";
$database = "task2";
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