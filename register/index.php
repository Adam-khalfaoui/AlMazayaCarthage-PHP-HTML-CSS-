<?php
require_once 'recaptcha/autoload.php';
require_once 'C:/wamp64/www/almazaya/entities/user.php';
if (isset($_POST['submitpost'])) {
if (isset($_POST['g-recaptcha-response'])) {

$recaptcha = new \ReCaptcha\ReCaptcha('6LdqRKUZAAAAAAnkzegwdaT4Atz_i8QhVlvhTm8v');
$resp = $recaptcha->verify($_POST['g-recaptcha-response']);
if ($resp->isSuccess()) {

    /*********************adduser********************/
    require_once 'C:/wamp64/www/almazaya/entities/user.php';
    require_once 'C:/wamp64/www/almazaya/core/clientC.php';
    require_once "verifmail.php";
    // var_dump($_POST);
    if (isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST['email']) and isset($_POST['adresse']) and isset($_POST['phone']) and isset($_POST['password'])) {
    	// echo "1";
    	//$d=date("Y-m-j");
    	//$v=verifmail($_POST['email']);
    	if (verifmail($_POST['email'])) {

    	$id=rand(0,9999);
    	$adresse=$_POST['adresse'];
      $client1=new client($id,$_POST['first_name'],$_POST['last_name'],$_POST['email'],$adresse,$_POST['phone'],$_POST['password'],"0","0","0");
    $clientC=new clientC();
    $clientC->ajouterclient($client1);
    session_start();
    $_SESSION['email']=$_POST['email'];
    echo '<script>alert("Captcha Valid");
    window.location.assign("mailsend.html");
    </script>';
    //header('location: mailsent.html' );

    }
    }

    else{
      echo '<script>alert("Verifier les champ");
  		window.location.assign("index.php");
  		</script>';
      return;
    }
    /*****************************************/

} else {
    $errors = $resp->getErrorCodes();
    var_dump($errors);
    echo '<script>alert("Captcha invalid");
    window.location.assign("index.php");
    </script>';
}
}
else {
  echo '<script>alert("Captcha non rempli");
  window.location.assign("index.php");
  </script>';
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer>  </script>
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
  <video autoplay muted loop id="vd">
	<source src="back.mp4" type="video/mp4" >
	</video>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST" action="#">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="first_name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Last Name" name="last_name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Phone" name="phone">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Confirm Password" name="confirm">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Adresse" name="adresse">
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LdqRKUZAAAAAKG66tQvOQj8JkA4ubihpWjOT6lR"></div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="submitpost">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
