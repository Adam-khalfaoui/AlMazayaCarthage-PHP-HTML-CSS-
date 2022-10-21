<?PHP
require_once 'C:/wamp64/www/almazaya/entities/user.php';

/*if ($_GET['action']=="out") {
session_start();
//session_unset ();

session_destroy();
header("Location: /almazaya/index.html");

}*/
//else{
$user=client::checklogin($_POST['id'],$_POST['mdp']);
if($user)
{
session_start();

$_SESSION['id']=$user['id'];
$_SESSION['nom']=$user['nom'];
$_SESSION['prenom']=$user['prenom'];
$_SESSION['email']=$user['email'];
$_SESSION['point_fid']=$user['point_fid'];
$_SESSION['adresse']=$user['adresse'];
$_SESSION['tel']=$user['tel'];
$_SESSION['password']=$user['password'];
$_SESSION['nbrcmnd']=$user['nbrcmnd'];
$_SESSION['verifemail']=$user['verifemail'];
if ($_SESSION['verifemail']=="1") {
	if ($_SESSION['id'][0]=='A') {
		header("Location: /almazaya/template/index1.php");
	}
	else {
		header("Location: /almazaya/index.php");
	}
}
else {
	echo '<script>alert("Mail not verified check email ");
	window.location.assign("index.html");
	</script>';
}

}
else
{
    //header("Location: index.html");
		echo '<script>alert("mot de passe ou id incorrect ");
		window.location.assign("index.html");
		</script>';
}
//}



?>
