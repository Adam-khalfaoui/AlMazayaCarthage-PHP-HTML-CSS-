<?php
/**
 *
 */
include 'config.php';
class admin
{

	public $id;
  private $mdp;

	function __construct($id,$mdp)
	{
		$this->id=$id;
		$this->mdp=$mdp;
 	}
 	function authentification(){

    $db=config::getConnexion();
    try{
		$liste=$db->prepare("select * from admin where id_admin = :id and mdpadmin = :mdp");
		 $liste->bindValue(':id',$this->id);
		 $liste->bindValue(':mdp',$this->mdp);
		 $liste->execute();
         return ($liste->fetchColumn()>-1);
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
 }
}
?>
