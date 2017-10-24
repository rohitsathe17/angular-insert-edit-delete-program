
<?php 
$servername = "localhost";
$username = "root";
$password = "java22030";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
$data = json_decode(file_get_contents("php://input")); 

 
$first_name = mysqli_real_escape_string($conn, $data->first_name);
$last_name = mysqli_real_escape_string($conn, $data->last_name);
$email = mysqli_real_escape_string($conn, $data->email);
$userpassword = mysqli_real_escape_string($conn, $data->userpassword);
$userlevel=mysqli_real_escape_string($conn, $data->userlevel);
 
$query = "INSERT into shift_user(first_name,last_name,email,userlevel,userpassword,active) VALUES('$first_name','$last_name','$email','$userlevel','$userpassword',1)";
 
mysqli_query($conn, $query);
echo true;
?>