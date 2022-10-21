<?php

require '../SimpleMail-master/classSimpleMail.php';
session_start();
$m= $_POST['email'];
$_SESSION['email']=$m;

$mail = new SimpleMail('smtp.gmail.com', 587, 'tls');
$mail->auth('chiheb.chikhaoui@esprit.tn', '181JMT3508');

$mail->from('burt.johnson@hotmail.com', 'AL MAZAYA CARTHAGE');
$mail->to($m, 'John Smith');

$mail->subject = 'WELCOME';
$mail->message = '<WELCOME TO MAZAYA </h3>
                  <b>recover password:</b> <a href="localhost/almazaya/Login/recovery2.php">this is the link</a> ';

if ($mail->send())
	echo 'Mail sent successfully.'.$_SESSION['email'];
else
	echo 'Error: ' . $mail->error;
?>
