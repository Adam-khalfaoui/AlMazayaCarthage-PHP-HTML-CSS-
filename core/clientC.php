<?php
require_once "C:/wamp64/www/almazaya/config.php";

class clientC
{
 function ajouterclient($client)
 {
   $sql="insert into user values (:id,:nom,:prenom,:email,:mdp,:tel,:adresse,:point_fid,:nbrcmnd,:verifemail)";
   //$sql="INSERT INTO `user`(`id`, `nom`, `prenom`, `email`, `mdp`, `num`, `adresse`, `point_fid`, `nbr_cmnd`) VALUES (':id',':nom',':prenom',':email',':mdp',':tel',':adresse',':point_fid',':nbrcmnd')";
   $db = config::getConnexion();
   try
   {
     //$db = config::getConnexion();
       $req=$db->prepare($sql);

       $id=$client->getid();
       $nom=$client->getnom();
       $prenom=$client->getprenom();
       $email=$client->getemail();
       $adresse=$client->getadresse();
       $tel=$client->gettel();
       $password=$client->getpassword();
       $point_fid=$client->getpoint_fid();
       $nbrcmnd=$client->getnbrcmnd();
       $verifemail=$client->getverifemail();

   $req->bindValue(':id',$id);
   $req->bindValue(':nom',$nom);
   $req->bindValue(':prenom',$prenom);
   $req->bindValue(':email',$email);
   $req->bindValue(':adresse',$adresse);
   $req->bindValue(':tel',$tel);
   $req->bindValue(':mdp',$password);
   $req->bindValue(':point_fid',$point_fid);
   $req->bindValue(':nbrcmnd',$nbrcmnd);
   $req->bindValue(':verifemail',$verifemail);




           $req->execute();

       }
       catch (Exception $e){
           echo 'Erreur: '.$e->getMessage();
       }

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
 function supprimerclient($id)
 {
   $sql="DELETE FROM user where id= :id";
   $db = config::getConnexion();
       $req=$db->prepare($sql);
   $req->bindValue(':id',$id);
   try{
           $req->execute();
          // header('Location: index.php');
       }
       catch (Exception $e){
           die('Erreur: '.$e->getMessage());
       }
 }

function modifierclient($id,$nom,$prenom,$email,$adresse,$tel,$password,$point_fid,$nbrcmnd)
 {
   $db = config::getConnexion();
   $sql="UPDATE user SET nom='".$nom."',email='".$email."',adresse='".$adresse."',num='".$tel."',mdp='".$password."',prenom='".$prenom."'  where id=".$id.";";
   // (,,'".$username."','".$adresse."','".$tel."','".$password."','".$nom."')where id=".$id.0;

   try
   {
       $req=$db->prepare($sql);

           $req->execute();

       }
       catch (Exception $e){
           echo 'Erreur: '.$e->getMessage();
       }

 }
 function trier(){
   $sql="SELECT * from user order by nom desc";
   $db = config::getConnexion();
   try{
   $liste=$db->query($sql);
   return $liste;
   }
       catch (Exception $e){
           die('Erreur: '.$e->getMessage());
       }
 }
 function getAllclients($keywords){
   $sql="SELECT * FROM user WHERE CONCAT(`id`,`nom`,`prenom`,`email`,`username`,`adresse`,`num`,`mdp`,`point_fid`,`nbrcmnd`) LIKE '%".$keywords."%'";
   $db = config::getConnexion();
   try{
   $liste=$db->query($sql);
   return $liste;
   }
       catch (Exception $e){
           die('Erreur: '.$e->getMessage());
       }
   }


}
?>
