<?php 
$servername = "localhost";
$username = "root";
$password = "java22030";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
$data = json_decode(file_get_contents("php://input")); 
echo $query = "DELETE FROM shift_user WHERE user_id=$data->user_id";
mysqli_query($conn, $query);

?>