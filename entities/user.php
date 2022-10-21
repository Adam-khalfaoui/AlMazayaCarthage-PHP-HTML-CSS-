<?PHP
require_once "C:/wamp64/www/almazaya/config.php";
class client{

	private $id;
	private $nom;
	private $prenom;
	private $email;
	private $adresse;
	private $tel;
	private $password;
	private $point_fid;
	private $nbrcmnd;
	private $verifemail;

	function __construct($id,$nom,$prenom,$email,$adresse,$tel,$password,$point_fid,$nbrcmnd,$verifemail){
		$this->id=$id;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->adresse=$adresse;
		$this->tel=$tel;
		$this->password=$password;
		$this->point_fid=$point_fid;
		$this->nbrcmnd=$nbrcmnd;
		$this->verifemail=$verifemail;
	}

	function getid(){
		return $this->id;
	}
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function gettype(){
		return $this->email;
	}
	function getadresse(){
		return $this->adresse;
	}
	function gettel(){
		return $this->tel;
	}
	function getpassword(){
		return $this->password;
	}
	function getpoint_fid(){
		return $this->point_fid;
	}
	function getemail(){
		return $this->email;
	}
	function getnbrcmnd(){
		return $this->nbrcmnd;
	}
	function getverifemail(){
		return $this->verifemail;
	}
	function setid($id){
		$this->id=$id;
	}
	function setnom($nom){
		$this->nom=$nom;
	}
	function setprenom($prenom){
		$this->prenom;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setadresse($adresse){
		$this->adresse=$adresse;
	}
	function settel($tel){
		$this->tel=$tel;
	}
	function setpassword($password){
		$this->password=$password;
	}
	function setpoint_fid($point_fid){
		$this->point_fid=$point_fid;
	}
	function setnbrcmd($nbrcmnd){
		$this->nbrcmnd=$nbrcmnd;
	}
	function setverifemail($verifemail){
		$this->verifemail=$verifemail;
	}
	public static function checklogin($email,$password)
	{
		$db = config::getConnexion();
		$sql="select * from user where email=:email and mdp=:password";
		$req = $db->prepare($sql);
		$req->bindParam(':email',$email);
		$req->bindParam(':password',$password);
		$req->execute();
		$resultat=$req->fetch();
		return $resultat;
	}
	function afficherclient()
	{
		//$sql="SElECT * From client inner join formationphp.client a on e.id= a.id";
		$sql="SElECT * From user";
		$db = config::getConnexion();
		try
		{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

}


?>
