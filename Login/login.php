<?PHP
include'admin.php';
$a=new admin($_POST['id'],$_POST['mdp']);

if($a->authentification()){
header('Location: /almazaya/index.html');
}
else
    {
echo '<script>alert("mot de passe ou id incorrect ");
window.location.assign("index.html");
</script>';
    }

?>
