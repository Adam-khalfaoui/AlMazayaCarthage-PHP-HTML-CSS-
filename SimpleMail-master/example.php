<?php

require 'classSimpleMail.php';

$mail = new SimpleMail('smtp.gmail.com', 587, 'tls');
$mail->auth('chiheb.chikhaoui@esprit.tn', '181JMT3508');

$mail->from('burt.johnson@hotmail.com', 'AL MAZAYA CARTHAGE');
$mail->to('chiheb.marijuana@gmail.com', 'John Smith');

$mail->subject = 'WELCOME';
$mail->message = '<WELCOME TO MAZAYA </h3>
                  <b>recover password:</b> <a href="localhost/almazaya/Login/recoverpwd.html">this is the link</a> ';

if ($mail->send())
	echo 'Mail sent successfully.';
else
	echo 'Error: ' . $mail->error;
