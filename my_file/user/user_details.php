<?php 
$servername = "localhost";
$username = "root";
$password = "java22030";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * from shift_user ORDER BY user_id ASC";
$result = mysqli_query($conn, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
	while($row = mysqli_fetch_assoc($result)) {
			$arr[] = $row;
	}
}
// Return json array containing data from the database
echo $json_info = json_encode($arr);

?>