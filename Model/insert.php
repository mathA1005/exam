<?php

function insertAdmin($data, $pass){
  include('connection.php');
   $query = "INSERT INTO admin (login, mdp) VALUES (:login, :mdp)";
   $query_params = array(':login'=>$data['login'],
                         ':mdp'=>$pass);
   try{
       $stmt = $db->prepare($query);
       $result = $stmt->execute($query_params);
   }
   catch(PDOException $ex){
       die("Failed query : " . $ex->getMessage());
   }
}
function insertEmploye(){
    include('connection.php');
    $query = "INSERT INTO `employe`(`nom`, `prenom`, `mail`, `souper`, `fk_cp`, `fk_locomotion`, `fk_departement`, `fk_activite`) VALUES (:nom,:prenom,:mail,:souper,:fk_cp,:fk_locomotion,:fk_departement,:fk_activite)";
    $query_params = array(
        ':nom'=> htmlentities($_POST['nom']),
        ':prenom'=>htmlentities($_POST['prenom']),
        ':mail'=>htmlentities($_POST['email']),
        ':souper'=>htmlentities($_POST['souper']),
        ':fk_cp'=>$_POST['codePostal'],
        ':fk_locomotion'=>$_POST['moyenDeTransport'],
        ':fk_departement'=>$_POST['departement'],
        ':fk_activite'=>$_POST['activite'],
    );

    $query2 = "UPDATE activites set nbParticipantActivite = nbParticipantActivite + 1 WHERE idActivite = :idActivite";
    $query_params2 = array(
        ':idActivite'=>$_POST['activite']
    );
    try{
        $stmt = $db->prepare($query);
        $stmt->execute($query_params);
        $stmt = $db->prepare($query2);
        $stmt->execute($query_params2);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
}
 ?>
