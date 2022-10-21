<?PHP
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
  $client1=new client($id,$_POST['first_name'],$_POST['last_name'],$_POST['email'],$adresse,$_POST['phone'],$_POST['password'],"0","0");
$clientC=new clientC();
$clientC->ajouterclient($client1);

//header('location: ../index.html' );
// echo "3";
}
}

else{
	echo "vérifier les champs";
}
?>
