<?php
	include('conn.php');

  $id="A".rand(0,9999);
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$num=$_POST['num'];
	$address=$_POST['address'];

	mysqli_query($conn,"insert into user values ('$id','$firstname', '$lastname','$email','$password','$num','$address','0','0','1')");
	header('location:index1.php');

?>
