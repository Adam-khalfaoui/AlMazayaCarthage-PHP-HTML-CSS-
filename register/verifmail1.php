<?php
require_once "C:/wamp64/www/almazaya/config.php";
session_start();

    $db = config::getConnexion();
    $email=$_SESSION['email'];
    $sql="update `user` set `verifemail`='1' where email=:email";
    // (,,'".$username."','".$adresse."','".$tel."','".$password."','".$nom."')where id=".$id.0;

    try
    {
        $req=$db->prepare($sql);
        $req->bindValue(':email',$email);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        // On détruit les variables de notre session
        session_unset ();

        // On détruit notre session
        session_destroy ();
      header("Location: mailverified.html");


 ?>
