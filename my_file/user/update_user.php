<?php 
$servername = "localhost";
$username = "root";
$password = "java22030";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$data = json_decode(file_get_contents("php://input")); 

$user_id = mysqli_real_escape_string($conn, $data->user_id);

$first_name = mysqli_real_escape_string($conn, $data->first_name);
$last_name = mysqli_real_escape_string($conn, $data->last_name);
$email = mysqli_real_escape_string($conn, $data->email);
$userpassword = mysqli_real_escape_string($conn, $data->userpassword);
$level=mysqli_real_escape_string($conn, $data->userlevel);

echo $query = "UPDATE shift_user SET first_name='$first_name',last_name='$last_name',email='$email',userlevel='$level',userpassword='$userpassword',active=1 WHERE user_id=$user_id";
mysqli_query($conn, $query);
echo true;
?>