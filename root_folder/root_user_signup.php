<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "password";
$dbname = "registration_user";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
	die('Database Connection Error');
}

$name=$_POST['name'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
// echo $pwd;

$api_key = '1c2b4c37f9c944989f00697973ae607c';
// $email = 'biswajitbala88@gmail.com';

// email validation check using API
$ch = curl_init('https://emailvalidation.abstractapi.com/v1/?api_key='.$api_key.'&email='.$email);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);

// convert json data to array
$result = json_decode($data, TRUE);
//print_r($result);

// valid email checking and query run
if($result['deliverability']=='DELIVERABLE'){
	$query="INSERT INTO `user_table`(`name`, `email`, `password`) VALUES ('$name','$email','$pwd')";
	$return_qry=mysqli_query($conn, $query);
	if($return_qry){
		echo 1;
	}else{
		echo 0;
	}
}else{
	echo 2;
}
?>
