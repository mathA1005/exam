<?php

function updateAdmin($infos, $pk){
  include('connection.php');
   $query = "UPDATE admin
              SET nom = :nom, prenom = :prenom, login = :login
              WHERE pk = :pk";
   $query_params = array(':nom' => $infos['nom'],
                          ':prenom' => $infos['prenom'],
                          ':login' => $infos['login'],
                          ':pk' => $pk,);
   try{
       $stmt = $db->prepare($query);
       $result = $stmt->execute($query_params);
   }
   catch(PDOException $ex){
       die("Failed query : " . $ex->getMessage());
   }
}

function updateUser(){
    include('connection.php');
    $query = "UPDATE `employe` SET `mail`=:mail,`souper`=:souper,`fk_cp`=:codePostal,`fk_locomotion`=:locomotion,`fk_departement`=:departement,`fk_activite`=:activite WHERE pk= :id";
    $query_params = array(
        'mail'=>htmlentities($_POST['email']),
        'souper'=>htmlentities($_POST['souper']),
        'codePostal'=>$_POST['codePostal'],
        'locomotion'=>$_POST['moyenDeTransport'],
        'departement'=>$_POST['departement'],
        'activite'=>$_POST['activite'],
        'id' => $_POST["id"]
    );
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
}