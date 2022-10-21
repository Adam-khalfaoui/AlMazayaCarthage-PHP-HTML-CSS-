<?php
require '../SimpleMail-master/classSimpleMail.php';
function verifmail($to)
{
$m= $to;

$mail = new SimpleMail('smtp.gmail.com', 587, 'tls');
$mail->auth('chiheb.chikhaoui@esprit.tn', '181JMT3508');

$mail->from('burt.johnson@hotmail.com', 'AL MAZAYA CARTHAGE');
$mail->to($m, 'John Smith');
//$hash=md5(rand(0,500));

$mail->subject = 'WELCOME';
$mail->message = '<WELCOME TO MAZAYA </h3>
                  <b>Click this <a href="localhost/almazaya/register/verifmail1.php">link</a></b> ';

if ($mail->send())
{
  return true;
	//echo 'Mail sent successfully.';
}
else
{
  return false;
	//echo 'Error: ' . $mail->error;
}
}
?>
