<?php
	include('conn.php');

	$id=$_GET['id'];

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$num=$_POST['num'];
	$address=$_POST['address'];


	mysqli_query($conn,"update user set nom='$firstname', prenom='$lastname', email='$email', mdp='$password', num='$num', adresse='$address' where id='$id'");
	//, prenom='$lastname', email='$email', mdp='$password', num='$num', addresse='$address'

	header('location:index1.php');

?>
