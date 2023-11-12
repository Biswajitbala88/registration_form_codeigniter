<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "password";
$dbname = "registration_user";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
	die('Database Connection Error');
}

$email=$_POST['emailVal'];
// echo $email;

// query run start
$query="SELECT email FROM `user_table` WHERE email='$email'";
$return_qry=mysqli_query($conn, $query);
$row=mysqli_num_rows($return_qry);
if($row>0){
	echo 1;
}else{
	echo 0;
}
// query run end
?>
